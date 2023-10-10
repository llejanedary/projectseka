<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function student(Request $request){
        // $std = Student::find($id);
        // $user = Auth::user(); // รับข้อมูลผู้ใช้ที่ล็อกอินอยู่
        // $student = $user; // ดึงข้อมูล student ของผู้ใช้ที่ล็อกอินอยู่
        // $user = Student::find(); 
        return view('Student'); //ดึงค่ามาจาก id ไม่มีสิทธิ์การเข้าถึงคะแนนดูได้อย่างเดียว
    }

    public function course($id){
        $course = Subject::find($id);
        return view('Student',compact('course'));
    }

    public function detailStudent(Request $request){
        // $std = Student::find($id);
        $user = Auth::user(); // รับข้อมูลผู้ใช้ที่ล็อกอินอยู่
        $student = $user; // ดึงข้อมูล student ของผู้ใช้ที่ล็อกอินอยู่
        // $user = Student::find(); 
        return view('detailStudent',compact('student')); //ดึงค่ามาจาก id ไม่มีสิทธิ์การเข้าถึงคะแนนดูได้อย่างเดียว
    }
}
