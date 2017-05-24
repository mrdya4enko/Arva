<?php

namespace App\Http\ViewComposers;

use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class RightSidebarComposer
{
    /**
     * Binding data to a View.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
      $myId = Auth::id();
      $request = \App\Request::take(1)->where('receiver', $myId)->get()->pluck('sender')->toArray();
       if(!empty($request)) {
           $view->with('dataUser', User::whereId($request[0])->get()->toArray()) ;
       }
    }
    
}