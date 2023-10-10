<?php

namespace App\Http\Controllers;
use App\Models\Classroom;
use App\Models\Teacher;
use Illuminate\Http\Request;

class IndexTeacherController extends Controller
{
    public function index()
    {
        $session=session('teacher_id');
        $teacher = Teacher::where('kkumail', $session)->first();
        $classrooms = Classroom::where('idTeacher', $teacher->id)->get();
        return view('indexTeacher', compact('classrooms','teacher'));
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
    
        return redirect()->route('indexteacher')->with('success', 'success');
    }
}    

