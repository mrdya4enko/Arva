<?php

namespace App\Http\Controllers;

use App\Friend;
use App\Subscription;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /*public function action() {
        $this->showRequest();
        $dataUser[1] = '';
        $dataUser = $this->dataUser;
        dd($dataUser);
        return view('home/home', $dataUser);
    }*/

    public function action()
    {
        //$this->showRequest();
        //@inject('metrics', 'App\Services\MetricsService');
        //$dataUser[1] = '';
        //$dataUser = $this->dataUser;
        //dd($dataUser);
        $myId = Auth::id();
        $request = \App\Request::take(1)->where('receiver', $myId)->get()->pluck('sender')->toArray();
        if(!empty($request)) {
            $dataUser = User::where('id', $request[0])->get()->toArray();
            //dd($dataUser);
            $res = view('home/home')->with('dataUser', $dataUser);
        } else {
            $res = view('home/home');
        }
        return $res;
        /*dd($dataUser);
        if($this->dataUser) {

        } else {
            return view('home/home');
        }*/
    }

    public function showRequest()
    {
        $myId = Auth::id();
        $request = \App\Request::take(1)->where('receiver', $myId)->get()->pluck('sender')->toArray();
        if(!empty($request)) {
            $this->dataUser = User::where('id', $request[0])->get()->toArray();
        }
    }

    public function accept()
    {
        $myId = Auth::id();
        if (isset($_POST['friendRequestId'])) {
            $friendReqId = $_POST['friendRequestId'];
        }
        Friend::insert(array('friend1' => $myId, 'friend2' => $friendReqId));
        \App\Request::where('sender', $friendReqId)
                      ->where('receiver', $myId)->delete();
        return redirect()->back();
    }

    public function decline()
    {
        $myId = Auth::id();
        if (isset($_POST['friendRequestId'])) {
            $friendReqId = $_POST['friendRequestId'];
        }
        Subscription::insert(array('subscriber' => $myId, 'followed' => $friendReqId));
        \App\Request::where('sender', $friendReqId)
            ->where('receiver', $myId)->delete();
        return redirect()->back();
    }
}
