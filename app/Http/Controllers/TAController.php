<?php

namespace App\Http\Controllers;

use App\Models\Classhasstudent;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\classroomhasTa;
use App\Models\Classroom;
use App\Models\Ta;

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
        $session=session('id_ta');
        $student =Ta::where('kkumail', $session)->first();
        $classrooms = classroomhasTa::where('id_ta', $student->id)->get();
        return view('Home_TA', compact('student', 'classrooms'));
    }  
    public function create(Request $request)
    {
        // $photoRoom = 'pic/default_poster.jpg';

        // if ($request->hasFile('photoRoom')) {
        //     $photoRoom = $request->file('photoRoom')->store('photos');
        // }
        // $room->photoRoom = $photoRoom;
        $newclass = new Classroom;
        $newclass->subjectcode = $request->input('subjectcode');
        $newclass->subjectName = $request->input('subjectName');
        $newclass->detail = $request->input('detail');
    
        $teacherEmail = $request->session()->get('teacher_id');
        $teacher = Teacher::where('kkumail', $teacherEmail)->first();
    
        $newclass->idTeacher = $teacher->id;
        $newclass->save();
    
        return redirect()->route('Home_TA')->with('success', 'success');
    }
}
