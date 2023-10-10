<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TAController extends Controller
{
    public function TA(){
        return view("Home_TA");
    }

    public function name(){
        // $users = Auth::user()->name;
        return view('Home_TA');
    }

    public function TAadd(){
        return view("TAaddsc");
    }

    public function TAview(){
        return view("TAview");
    }
}
