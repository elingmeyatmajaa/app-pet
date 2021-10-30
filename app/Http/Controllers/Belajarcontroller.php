<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Belajarcontroller extends Controller
{
    //
    public function home()
    {
        return view('front_page.belajar');
    }
}
