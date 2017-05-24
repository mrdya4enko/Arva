<?php

namespace App\Http\ViewComposers;

use App\{City, Country, User};
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class LeftSidebarComposer
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
        $info['all'] = User::find($myId)->firstOrFail();
        $info['city'] = City::find($info['all']->city_id)->firstOrFail();
        $info['country'] = Country::find($info['city']->country_id)->firstOrFail();
        $view->with('info', $info);
    }
}
