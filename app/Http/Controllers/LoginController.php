<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Login; 
use \Illuminate\Support\Facades\Hash;
use App\Models\Teacher; 
use App\Models\Student;
use App\Models\Classroom;
use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{
    public function loginForm()
    {
        return view('login');
    }
    
    public function login(Request $request)
    {
        $kkumail = $request->kkumail;
        $password = $request->password;
        
       
        $teacher = Teacher::where('kkumail', $kkumail)->first();

        if (!$teacher) {
            $student = Student::where('kkumail', $kkumail)->first();
        }

        if ($teacher && Hash::check($password, $teacher->password)) {
 
            $teacher = Teacher::where('kkumail', $kkumail)->first();
        
            $request->session()->put('teacher_id', $teacher->kkumail);
        
            return redirect()->route('indexteacher');
            
        } elseif ($student && Hash::check($password, $student->password)) {

            $students = Student::where('kkumail', $kkumail)->first();

            $request->session()->put('std_id', $students->kkumail);
            return redirect('student');
            

        } else {
            session()->flash('alert', 'อีเมลหรือรหัสผ่านไม่ถูกต้อง');
            return redirect()->back();
        }
        
    }




    public function logout()
    {
    Auth::logout();
    session()->flush();
    return redirect('/login');
    }

    
}
