<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PlayController extends Controller
{
  /**
     * Create a new controller instance.
     * @return void
     */

    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     * @return \Illuminate\Http\Response
     */

    public function play()
    {
        return view('play');
    }
}
