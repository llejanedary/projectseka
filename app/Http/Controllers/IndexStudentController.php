<?php

namespace App\Http\Controllers;
use App\Models\Teacher; 
use App\Models\Student;
use App\Models\Classroom;
use Illuminate\Http\Request;

class IndexStudentController extends Controller
{
    public function index()
    { 
        $session=session('std_id');
        $student = Student::where('kkumail', $session)->first();
        // $classrooms = RoomStudent::where('student_id', $student->id)->get();
        return view('indexStudent', compact('student'));
    }
}
