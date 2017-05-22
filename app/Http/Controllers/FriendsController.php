<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FriendsController extends Controller
{
    public function action()
    {
        return view('friends/friends');
    }
    
    public function addFriend()
    {
        $myId = Auth::id();
    }
}
