<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function action()
    {
        return view('settings/settings');
    }
}
