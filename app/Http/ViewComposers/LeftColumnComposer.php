<?php

namespace App\Http\ViewComposers;

use App\City;
use App\Country;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class LeftColumnComposer
{
    /**
     * Привязка данных к представлению.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $myId = Auth::id();
        $info['all'] = User::where('id', $myId)->get();
        $info['city'] = City::where('id', $info['all'][0]->city_id)->get();
        $info['country'] = Country::where('id', $info['city'][0]->country_id)->get();
        $view->with('info', $info);
    }

}