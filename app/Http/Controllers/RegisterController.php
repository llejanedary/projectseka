<?php

namespace App\Http\Controllers;
use \Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Teacher; 
use App\Models\Ta;
use App\Models\Student;
use App\Models\User;

class RegisterController extends Controller
{
    public function registerForm()
    {
        return view('register');
    }
    
    public function register(Request $request)
{
    $kkumail = $request->kkumail;

    $existingTeacher = Teacher::where('kkumail', $kkumail)->first();
    $existingStudent = Student::where('kkumail', $kkumail)->first();
    $existingTa = Ta::where('kkumail', $kkumail)->first();

    if ($existingTeacher || $existingStudent || $existingTa) {
        session()->flash('alert', 'Email นี้ถูกใช้งานแล้ว');
        return redirect()->back();
    }

    $password = $request->input('password');
    
    if (strlen($password) > 20) {
        session()->flash('alert', 'รหัสผ่านต้องมีความยาวไม่เกิน 20 ตัว');
        return redirect()->back();
    }

    if ($request->role === 'teacher') {
        $teacher = new Teacher;
        $teacher->fname = $request->fname;
        $teacher->lname = $request->lname;
        $teacher->password = Hash::make($password);
        $teacher->kkumail = $kkumail;
        $teacher->save();
    } elseif ($request->role === 'student') {
        $student = new Student;
        $student->fname = $request->fname;
        $student->lname = $request->lname;
        $student->idStd = $request->idStd; // Assuming "idStd" is part of student data
        $student->password = Hash::make($password);
        $student->kkumail = $kkumail;
        $student->save();
    } elseif ($request->role === 'ta') {
        $ta = new Ta;
        $ta->fname = $request->fname;
        $ta->lname = $request->lname;
        $ta->id_std = $request->idStd;
        $ta->password = Hash::make($password);
        $ta->kkumail = $kkumail;
        $ta->save();
    }

    return redirect()->route('login');
}

}
