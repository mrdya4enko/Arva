<?php

namespace App\Http\Controllers;

use App\City;
use App\User;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SettingsController extends Controller
{
    public function action(Request $request)
    {
        if($request -> isMethod('post')) {
            $userId = Auth::id();
            $user = User::find($userId);

            $input = $request -> except('_token');

            /*$validator = Validator::make($input, [
                'first_name' => 'required|max:255',
                'last_name' => 'required|max:255',
                'email' => 'required|email|max:255|unique:users',
                'password' => 'required|min:6|confirmed',
                'birthday' => 'required|date'
                //...
            ]);

            if($validator -> fails()) {
                return redirect() -> route('settings') -> withErrors($validator);
            }
            */
            dd($input);
            $city = City::where('name', $input['city'])->first();
            if($city != NULL) {
                $input['city_id'] = $city->id;
            } else {
                $input['city_id'] = NULL;
            }

            if($request -> hasFile('avatar')) {
                $file = $request -> file('avatar');
                $date = date("Y-m-d H:i:s");
                $fileName = $file -> getClientOriginalName();
                $input['avatar'] = md5($fileName.$date).'.jpeg';
                $file -> move(public_path().'/img/avatar', $input['avatar']);
            }

            foreach ($input as $key=>$value) {
                if ($value == NULL) {
                    unset($input[$key]);
                }
            }

            $user -> fill($input);

            if($user -> update()) {
                return redirect()->route('settings');
            }
        }

        if(view() -> exists('settings.settings')) {
            return view('settings/settings');
        }
    }
}
