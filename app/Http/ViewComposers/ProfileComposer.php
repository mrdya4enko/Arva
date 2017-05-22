<?php

namespace App\Http\ViewComposers;

//для версии 5.2 и выше:
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
//use App\Repositories\UserRepository;

//для версии 5.1 и ранее:
//use Illuminate\Contracts\View\View;
//use Illuminate\Users\Repository as UserRepository;

class ProfileComposer
{
    /**
     * Реализация пользовательского репозитория.
     *
     * @var UserRepository
     */
    //protected $users;

    /**
     * Создание построителя нового профиля.
     *
     * @param  UserRepository  $users
     * @return void
     */
    /*public function __construct(UserRepository $users)
    {
        // Зависимости автоматически извлекаются сервис-контейнером...
        $this->users = $users;
    }*/

    /**
     * Привязка данных к представлению.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
//        $myId = Auth::id();
//        $request = \App\Request::take(1)->where('receiver', $myId)->get()->pluck('sender')->toArray();
//        if(!empty($request)) {
//            $view->with('dataUser', User::where('id', $request[0])->get()->toArray()) ;
//        }
        $view->with('data', 'Some content') ;
    }

}