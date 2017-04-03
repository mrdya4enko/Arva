<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MessagesController extends Controller
{
    public function action()
    {
        return view('messages/messages');
    }
}
