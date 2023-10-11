<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
class TAController extends Controller
{
    // public function TA(){
    //     return view("Home_TA");
    // }

    // public function name(){
    //     $users = auth()->user()->name;
    //     return view('Home_TA', ['users' => $users]);
    // }
    

    public function TAadd(){
        $session=session('std_id');
        $student = Student::where('kkumail', $session)->first();
        return view("/TAaddsc", compact('student'));
    }

    public function TAview(){
        return view("TAview");
    }
    public function index()
    { 
        $session=session('std_id');
        $student = Student::where('kkumail', $session)->first();
        // $classrooms = RoomStudent::where('student_id', $student->id)->get();
        return view('Home_TA', compact('student'));
    }
}
