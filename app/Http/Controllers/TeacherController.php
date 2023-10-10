<?php

namespace App\Http\Controllers;
use App\Models\Classroom;
use App\Models\Classhasstudent;
use App\Models\Teacher;
use App\Models\Student;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function stdlist($id)
    {
        $classroom = Classroom::find($id);
        $students = Student::all();
        $classhasstd = Classhasstudent::all();
        $session=session('teacher_id');
        $teacher = Teacher::where('kkumail', $session)->first();
        return view('class', compact('students','teacher','classhasstd','classroom'));
    }

    public function deletestd()
{
    $students = Student::find();

    $students->delete(); // โดยการใช้ delete() method ของ Eloquent Model จะทำ Soft Delete
    return redirect()->route('class');

}

public function exportStudents()
{
    return Excel::download(new StudentsExport, 'students.xlsx');
}

public function stdscore()
{
    $students = Student::all();
    $session=session('teacher_id');
    $teacher = Teacher::where('kkumail', $session)->first();
    return view('score', compact('students','teacher'));
}
public function searchstd(Request $request)
{
    $email = $request->input('filterstd');
    $session = session('teacher_id');
    $teacher = Teacher::where('kkumail', $session)->first();
    $students = Student::where('kkumail', $email)->get(); // หรือใช้ ->paginate(10); หากต้องการให้ได้ Collection ที่สามารถใช้ paginate ได้
  
    return view('addstudent', compact('students', 'teacher'));
}
public function addstd()
{
    $students = Student::all(); 
    $students = collect([]); 
    $session = session('teacher_id');
    $teacher = Teacher::where('kkumail', $session)->first();
    $classroom = Classroom::find($id);    
    return view('addstudent', compact('students', 'teacher', 'classroom'));
}



public function addStudentToClass($id)
{
    $classroom = Classroom::find($id);
    $session = session('teacher_id');
    $teacher = Teacher::where('id', $session)->first();
    
    $student = Student::find($id);

    if (!$student) {
        return redirect()->route('addstd')->with('error', 'ไม่พบนักศึกษาที่คุณต้องการเพิ่ม');
    }

    Classhasstudent::create([
        'idClassroom' => $classroom->id,
        'idStudent' => $student->id,
    ]);

    return redirect()->route('addstd')->with('success', 'เพิ่มนักศึกษาเรียบร้อยแล้ว');
}






public function talist($id)
{
    $classroom = Classroom::find($id);

    $students = Student::all();
    $session=session('teacher_id');
    $teacher = Teacher::where('kkumail', $session)->first();
    return view('talist', compact('students','teacher', 'classroom'));
}

public function addta()
{
    $students = Student::all();
    $students = collect([]); 
    $session=session('teacher_id');
    $teacher = Teacher::where('kkumail', $session)->first();
    return view('addta', compact('students','teacher'));
}

public function searchta(Request $request)
{
    $email = $request->input('filterstd');
    $session = session('teacher_id');
    $teacher = Teacher::where('kkumail', $session)->first();
    $students = Student::where('kkumail', $email)->get(); // หรือใช้ ->paginate(10); หากต้องการให้ได้ Collection ที่สามารถใช้ paginate ได้
  
    return view('addstudent', compact('students', 'teacher'));
}

public function createLab(Request $request, $id)
{
    $fullScoreLab = 10;
    $room = Classroom::find($id);
    $labs = new Lab;
    $labs->nameLab = $request->newLabName;
    $labs->fullscore = $fullScoreLab;
    $labs->room_id = $room->id;
    $labs->save();
    return redirect()->route('score', ['id' => $room->id]);
}

}