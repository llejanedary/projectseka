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
        $existingTa = Ta::where('kkumail',$kkumail)->first();
        if ($existingTeacher || $existingStudent) {
            session()->flash('alert', 'Email นี้ถูกใช้งานแล้ว');
            return redirect()->back();
        }
        // else if ($existingTeacher || $existingTa){
        //     session()->flash('alert', 'Email นี้ถูกใช้งานแล้ว');
        //     return redirect()->back();
        // }

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
            } elseif ($request->role === 'ta') {
                if ($request->has('id_std')) {
                    $existingTa = Ta::where('id_Std', $request->id_Std)->first();
            
                    if ($existingTa) {
                        session()->flash('alert', 'ผู้ช่วยสอนนี้ถูกใช้งานแล้ว');
                        return redirect()->back();
                    }
            
                    $Ta = new Ta;
                    $Ta->idStd = $request->idStd;
                    $Ta->fname = $request->fname;
                    $Ta->lname = $request->lname;
                    $password = $request->input('password');
                    
                    if (strlen($password) > 20) {
                        session()->flash('alert', 'รหัสผ่านต้องมีความยาวไม่เกิน 20 ตัว');
                        return redirect()->back();
                    }
            
                    $Ta->password = Hash::make($password);
                    $Ta->kkumail = $kkumail;
                    $Ta->save();
                    
                }
            }
            
            return redirect()->route('login');
    }
}
}
