<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Login; 
use \Illuminate\Support\Facades\Hash;
use App\Models\Teacher; 
use App\Models\Student;
use App\Models\Classroom;
use App\Models\Ta;
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
        
        $ta = Ta::where('kkumail', $request->kkumail)->first();
        $teacher = Teacher::where('kkumail', $request->kkumail)->first();
        $student = Student::where('kkumail', $request->kkumail)->first();
    
        if ($ta && Hash::check($password, $ta->password)) {
            $request->session()->put('id_ta', $ta->kkumail);
            return redirect()->route('Home_TA');
        } elseif ($teacher && Hash::check($password, $teacher->password)) {
            $request->session()->put('teacher_id', $teacher->kkumail);
            return redirect()->route('indexteacher');
        } elseif ($student && Hash::check($password, $student->password)) {
            $request->session()->put('std_id', $student->kkumail);
            return redirect('student');
        }
        
        session()->flash('alert', 'อีเมลหรือรหัสผ่านไม่ถูกต้อง');
        return redirect()->back();
    }
    public function logout()
    {
    Auth::logout();
    session()->flush();
    return redirect('/login');
    }

    
}
