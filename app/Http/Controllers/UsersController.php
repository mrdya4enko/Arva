<?php

namespace App\Http\Controllers;

use App\City;
use App\Friend;
use App\Subscription;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function showUsers()
    {
        $myId = Auth::id();
        $users = User::take(10)->where([['status', 'active'], ['id', '!=', $myId]])->get();
        $cityId = $users->pluck('city_id')->toArray();
        $cityId = array_unique($cityId);
        $cities = City::whereIn('id', $cityId)->get()->pluck('name', 'id')->toArray();
        $usersId = $users->pluck('id')->toArray();

        /*$friendStatus = Friend::where('id', $myId . '/4')->get();
        dd($friendStatus);*/

        $checkFriends = Friend::where(function($checkId) use($myId, $usersId) {
            $checkId->where('friend1', $myId)
                ->whereIn('friend2', $usersId);
        })
            ->orWhere(function($checkId) use($myId, $usersId) {
                $checkId->whereIn('friend1', $usersId)
                    ->where('friend2', $myId);
            })->get()->toArray();
        $checkRequests = \App\Request::where(function($checkReq) use($myId, $usersId) {
            $checkReq->where('sender', $myId)
                         ->whereIn('receiver', $usersId);
                        })
                         ->orWhere(function($checkReq) use($myId, $usersId) {
            $checkReq->whereIn('sender', $usersId)
                         ->where('receiver', $myId);
                        })->get()->toArray();
        $checkSubscriptions = Subscription::where(function($checkSub) use($myId, $usersId) {
            $checkSub->where('subscriber', $myId)
                ->whereIn('followed', $usersId);
        })
            ->orWhere(function($checkSub) use($myId, $usersId) {
                $checkSub->whereIn('subscriber', $usersId)
                    ->where('followed', $myId);
            })->get()->toArray();
        $friends = [];
        $senders = [];
        $receivers = [];
        foreach ($checkFriends as $people) {
            if ($people['friend1'] === $myId) {
                $friends[] = $people['friend2'];
            } else {
                $friends[] = $people['friend1'];
            }
        }

        foreach ($checkRequests as $request) {
            if($request['sender'] === $myId) {
                $receivers[] = $request['receiver'];
            } else {
                $senders[] = $request['sender'];
            }
        }

        foreach ($checkSubscriptions as $subscription) {
            if($subscription['subscriber'] === $myId) {
                $senders[] = $subscription['followed'];
            } else {
                $receivers[] = $subscription['subscriber'];
            }
        }
        $data = ['cities' => $cities, 'users' => $users, 'friends' => $friends,
                 'senders' => $senders, 'receivers' => $receivers];
        return view('users/users', $data);
    }

    /*public function checkStatusUser($id)
    {
        $myId = Auth::id();
        $friend = Friend::where([['user_sender', $id],
                                ['user_reciver', $myId]])
                        ->orWhere([['user_sender', $myId],
                                ['user_reciver', $id]])
                        ->get();
        return $friend -> status;
    }*/

    public function findUsers(Request $request)
    {
        if (isset($request->findUsers)) {
            $myId = Auth::id();
            $name = explode(' ', $request->findUsers);
            $count = count($name);
            if ($count === 1) {
                $users = User::take(10)->where('id', '!=', $myId)
                    ->where(function($query) use($name) {
                        $query->where('last_name', $name[0])
                            ->orWhere('first_name', $name[0]);
                    })->get();
            } else {
                $users = User::take(10)->where('id', '!=', $myId)
                    ->where(function($query) use($name) {
                        $query->where([['first_name', $name[0]],
                            ['last_name', $name[1]]])
                            ->orWhere([['first_name', $name[1]],
                                ['last_name', $name[0]]]);
                    })->get()->pluck('id')->toArray();
            }
        } else {
            return redirect()->back();
        }
        //dd($users);
        $friend = Friend::where('id', $myId . '/' . $users[0]['id'])->get();
        //dd($friend);
        $data = ['users' => $users, 'friend' => $friend];
        return view('users/users', $data);
    }

    public function sendingRequest(Request $request)
    {
        $myId = Auth::id();
        if (!$request || $request->id == $myId) {
            throw new \Exception('Wrong user id');
        }
        \App\Request::insert(array('sender' => $myId, 'receiver' => $request->id));
        return redirect()->back();
    }

    public function acceptRequest(Request $request)
    {
        $myId = Auth::id();
        if (!$request || $request->id == $myId) {
            throw new \Exception('Wrong user id');
        }
        Friend::insert(array('friend1' => $myId, 'friend2' => $request->id));
        /*\App\Request::where('id', $request->id . '/' . $myId)->delete();*/
        \App\Request::where('sender', $request->id)
                      ->where('receiver', $myId)->delete();
        Subscription::where('followed', $request->id)
            ->where('subscriber', $myId)->delete();

        return redirect()->back();
    }

    public function declineRequest(Request $request)
    {
        $myId = Auth::id();
        if (!$request->id || $request->id == $myId) {
            throw new \Exception('Wrong user id');
        }
        Subscription::insert(array('subscriber' => $myId, 'followed' => $request->id));
        /*\App\Request::where('id', $request->id . '/' . $myId)->delete();*/
        \App\Request::where('sender', $request->id)
            ->where('receiver', $myId)->delete();
        return redirect()->back();
    }

    public function deleteFriend(Request $request)
    {
        $myId = Auth::id();
        if (!$request || $request->id == $myId) {
            throw new \Exception('Wrong user id');
        }
        Subscription::insert(array('subscriber' => $myId, 'followed' => $request->id));

        /*Friend::where('id', $myId . '/' . $request->id)
                ->orWhere('id', $request->id . '/' . $myId)->delete();*/

        Friend::where(function($del) use($myId, $request) {
            $del->where('friend1', '=', $myId)
                ->where('friend2', '=', $request->id);
        })
            ->orWhere(function($del) use($myId, $request){
                $del->where('friend1', '=', $request->id)
                    ->where('friend2', '=', $myId);
            })->delete();
        return redirect()->back();
    }
}
