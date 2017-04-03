<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AlbumsController extends Controller
{
    public function action()
    {
        return view('albums/albums');
    }
}
