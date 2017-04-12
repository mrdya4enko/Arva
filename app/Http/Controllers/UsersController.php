<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function showUsers()
    {
        $myId = Auth::id();
        $users = User::take(10)->where([['status', 'active'], ['id', '!=', $myId]])->get();

        /*foreach($users as $user) {
            $city = $user->city()->where('id', $user->city_id)->get();
            $user -> city = $city -> name;
        }*/
        //dd($users);
        $data = ['users' => $users];

        return view('users/users', $data);
    }

    public function findUsers(Request $request)
    {
        if (isset($request -> findUsers)) {
            $myId = Auth::id();
            $name = explode(' ', $request -> findUsers);
            $count = count($name);
            if($count === 1) {
                $users = User::take(10)->where('id', '!=', $myId)
                    ->where(function ($query) use ($name) {
                        $query -> where('last_name', $name[0])
                                ->orWhere('first_name', $name[0]);
                    })->get();
            } else {
                $users = User::take(10)->where('id', '!=', $myId)
                    ->where(function ($query) use ($name) {
                        $query -> where([['first_name', $name[0]],
                                        ['last_name', $name[1]]])
                                ->orWhere([['first_name', $name[1]],
                                        ['last_name', $name[0]]]);
                    })->get();
            }
        } else {
            return redirect() -> back();
        }

        $data = ['users' => $users];
        return view('users/users', $data);
    }
    
}
