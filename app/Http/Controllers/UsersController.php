<?php

namespace App\Http\Controllers;

use App\{City, Friend, Subscription, User, Request as Req};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function showUsers()
    {
        $myId = Auth::id();
        $users = User::where([['status', 'active'], ['id', '!=', $myId]])->paginate(5);
        $cityId = $users->pluck('city_id')->toArray();
        $cityId = array_unique($cityId);
        $cities = City::whereIn('id', $cityId)->get()->pluck('name', 'id')->toArray();
        $usersId = $users->pluck('id')->toArray();

        $checkFriends = Friend::where(function($checkId) use($myId, $usersId) {
            $checkId->where('friend1', $myId)
                ->whereIn('friend2', $usersId);
        })
            ->orWhere(function($checkId) use($myId, $usersId) {
                $checkId->whereIn('friend1', $usersId)
                    ->where('friend2', $myId);
            })->get()->toArray();

        $checkRequests = Req::where(function($checkReq) use($myId, $usersId) {
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

    public function findUsers(Request $request)
    {
        if ($request->findUsers != '') {
        $request->flash();
            $myId = Auth::id();
            $name = explode(' ', $request->findUsers);
            $count = count($name);

            if ($count === 1) {
                $users = User::where('id', '!=', $myId)
                    ->where(function ($query) use ($name) {
                        $query->where('last_name', $name[0])
                            ->orWhere('first_name', $name[0]);
                    })->paginate(1);
            } else {
                $users = User::where('id', '!=', $myId)
                    ->where(function ($query) use ($name) {
                        $query->where([['first_name', $name[0]],
                            ['last_name', $name[1]]])
                            ->orWhere([['first_name', $name[1]],
                                ['last_name', $name[0]]]);
                    })->paginate(1);
            }
        } else {
           return redirect()->back();
        }

        $cityId = $users->pluck('city_id')->toArray();
        $cityId = array_unique($cityId);
        $cities = City::whereIn('id', $cityId)->get()->pluck('name', 'id')->toArray();

        $usersId = $users->pluck('id')->toArray();

        $checkFriends = Friend::where(function($checkId) use($myId, $usersId) {
            $checkId->where('friend1', $myId)
                ->whereIn('friend2', $usersId);
        })
            ->orWhere(function($checkId) use($myId, $usersId) {
                $checkId->whereIn('friend1', $usersId)
                    ->where('friend2', $myId);
            })->get()->toArray();

        $checkRequests = Req::where(function($checkReq) use($myId, $usersId) {
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

        foreach ($checkRequests as $req) {
            if($req['sender'] === $myId) {
                $receivers[] = $req['receiver'];
            } else {
                $senders[] = $req['sender'];
            }
        }

        foreach ($checkSubscriptions as $subscription) {
            if($subscription['subscriber'] === $myId) {
                $senders[] = $subscription['followed'];
            } else {
                $receivers[] = $subscription['subscriber'];
            }
        }

        $users->appends($request->only('findUsers'))->links();
        $data = ['cities' => $cities, 'users' => $users, 'friends' => $friends,
            'senders' => $senders, 'receivers' => $receivers];
        return view('users/users', $data);
    }

    public function sendingRequest(Request $request)
    {
        $myId = Auth::id();
        if (!$request || $request->id == $myId) {
            throw new \Exception('Wrong user id');
        }
        Req::insert(array('sender' => $myId, 'receiver' => $request->id));
        return redirect()->back();
    }

    public function acceptRequest(Request $request)
    {
        $myId = Auth::id();
        if (!$request || $request->id == $myId) {
            throw new \Exception('Wrong user id');
        }
        Friend::insert(array('friend1' => $myId, 'friend2' => $request->id));
        Req::where('sender', $request->id)
                      ->where('receiver', $myId)->delete();
        Subscription::where([['followed', $request->id], ['subscriber', $myId]])->delete();
            //->where('subscriber', $myId)->delete();

        return redirect()->back();
    }

    public function declineRequest(Request $request)
    {
        $myId = Auth::id();
        if (!$request->id || $request->id == $myId) {
            throw new \Exception('Wrong user id');
        }
        Subscription::insert(array('subscriber' => $myId, 'followed' => $request->id));
        Req::where('sender', $request->id)
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
