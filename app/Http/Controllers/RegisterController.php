<?php

namespace App\Http\Controllers;
use \Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Teacher; 
use App\Models\Student;

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

        if ($existingTeacher || $existingStudent) {
            session()->flash('alert', 'Email นี้ถูกใช้งานแล้ว');
            return redirect()->back();
        }

        if ($request->role === 'teacher') {
          
            $teacher = new Teacher;
            $teacher->fname = $request->fname;
            $teacher->lname = $request->lname;
            $password = $request->input('password');

          
            
            if (strlen($password) > 20) {
                session()->flash('alert', 'รหัสผ่านต้องมีความยาวไม่เกิน 20 ตัว');
                return redirect()->back();
            }
            
            $teacher->password = Hash::make($password);
            $teacher->kkumail = $request->kkumail;
            $teacher->save();
        } elseif ($request->role === 'student') {
            
            if ($request->has('idStd')) {
                $existingStudent = Student::where('idStd', $request->idStd)->first();

                if ($existingStudent) {
                    session()->flash('alert', 'รหัสนักศึกษานี้ถูกใช้งานแล้ว');
                    return redirect()->back();
                }

                $student = new Student;
                $student->idStd = $request->idStd;
                $student->fname = $request->fname;
                $student->lname = $request->lname;
                $password = $request->input('password');
                
                if (strlen($password) > 20) {
                    session()->flash('alert', 'รหัสผ่านต้องมีความยาวไม่เกิน 20 ตัว');
                    return redirect()->back();
                }

                $student->password = Hash::make($password);
                $student->kkumail = $kkumail;
                $student->save();
            } else {
                session()->flash('alert', 'กรุณากรอกข้อมูลรหัสนักศึกษา');
                return redirect()->back();
            }
        }

        return redirect()->route('login');
    }
}
