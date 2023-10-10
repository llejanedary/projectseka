<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('addstd.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Mitr:wght@300&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />


    <title>nger</title>
</head>
<body>
    <header></header>
    <div class="sidebar">
        <img src="pic/profile.png" alt="รูปโปรไฟล์">
        <div class="username">{{$teacher->fname}}</div>
        <div class="email">{{$teacher->kkumail}}</div>        
        <div class="stdlist"> <a href="{{ route('class', ['id' => $classroom->id]) }}">รายชื่อนักศึกษา</a></div>
        <div class="talist"> <a href="{{ route('talist') }}">รายชื่อผู้ช่วยสอน</a></div>
        <div class="stdscore"> <a href="{{ route('score') }}">คะแนนนักศึกษา</a> </div>
        <div class="logout"><a href="">ออกจากระบบ</a></div>
</div>
<div class="content">
@isset($classroom)
    {{ $classroom->subjectName }}
@endisset
 
    <div class="filtercontainer">
    <form action="{{ route('searchstd') }}" method="post">
        @csrf
        <input type="text" id="filterstd" name="filterstd" placeholder="กรอกอีเมลนักศึกษา">
        <button id="search" class="search">ค้นหา</button>
    </form>

    </div>

    @if(isset($students) && $students->count() > 0)
    <table id="addtatable" class="table">
        <thead>
            <tr>
                <td>ลำดับ</td>
                <td>รหัสนักศึกษา</td>
                <td>ชื่อ-นามสกุล</td>
                <td>kkumail</td>
                <td>การดำเนินการ</td>
            </tr>
        </thead>
        <tbody>
            @foreach($students as $student)
                <tr>
                    <td>{{ $loop->iteration }}</td> 
                    <td>{{ $student->idStd }}</td> 
                    <td>{{ $student->fname . ' ' . $student->lname }}</td>
                    <td>{{ $student->kkumail }}</td>
                    <td>
                        <form action="{{ route('addStudentToClass', ['id' => $student->id]) }}" method="post">
                            @csrf
                            <button type="submit" class="addstdbt">เพิ่ม</button>
                        </form>
                    </td>
                    
                </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</div>
</body>
</html>