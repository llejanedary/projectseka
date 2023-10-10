<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('class.css') }}" rel="stylesheet" type="text/css">
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
        <div class="talist"> <a href="{{ route('talist', ['id' => $classroom->id]) }}">รายชื่อผู้ช่วยสอน</a></div>
        <div class="stdscore"> <a href="{{ route('score') }}">คะแนนนักศึกษา</a> </div>
        <div class="logout">ออกจากระบบ</div>
</div>

<div class="content">

 
    <div class="filtercontainer">
        <select name="section" id="section" onchange="">
            <option value="sec1">Section 1</option>
            <option value="sec2">Section 2</option>
        </select>
        <input type="text" id="filterstd" name="filterstd">
        <button id="search" class="search">ค้นหา</button>
    </div>

    
    <table id="stdtable" class="table"  >
        <thead>
            <tr>
                <td>ลำดับ</td>
                <td>รหัสนักศึกษา</td>
                <td>ชื่อ-นามสกุล</td>
                <td>kkumail</td>
                <td></td>

            </tr>
        </thead>
        <tbody>
            @foreach($classhasstd as $std)
                <tr>
                    <td>{{ $loop->iteration }}</td> 
                    <td>{{ $std->idStd }}</td> 
                    <td>{{ $std->fname . ' ' . $std->lname }}</td>
                    <td>{{ $std->kkumail}}</td>
                    <td><form id="deletestd" action="{{ route('deletestd') }}" method="post">

                        @csrf
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16" class="deleteicon" class="deleteicon" stdid="{{ $std->id }}" stdname="{{ $std->fname }}">
                                <path d="M11 1.75V3h2.25a.75.75 0 0 1 0 1.5H2.75a.75.75 0 0 1 0-1.5H5V1.75C5 .784 5.784 0 6.75 0h2.5C10.216 0 11 .784 11 1.75ZM4.496 6.675l.66 6.6a.25.25 0 0 0 .249.225h5.19a.25.25 0 0 0 .249-.225l.66-6.6a.75.75 0 0 1 1.492.149l-.66 6.6A1.748 1.748 0 0 1 10.595 15h-5.19a1.75 1.75 0 0 1-1.741-1.575l-.66-6.6a.75.75 0 1 1 1.492-.15ZM6.5 1.75V3h3V1.75a.25.25 0 0 0-.25-.25h-2.5a.25.25 0 0 0-.25.25Z"></path></svg> 
                    </form>
                </td>
                </tr>
            @endforeach
        </tbody>
    </table>   

    <script>

        let deleteIcons = document.querySelectorAll('.deleteicon');
        
                    deleteIcons.forEach(icon => {
                        icon.addEventListener('click', () => {
                            let stdId = icon.getAttribute('stdid');
                            let stdName = icon.getAttribute('stdname');
                            let confirmation = confirm(คุณต้องการลบ "${stdName}" หรือไม่ ?);
        
                        });
                    });
        
                </script>

    <div class="filtercontainer">
        <button id="addstd" class="addstd" onclick="addstd()">เพิ่มนักศึกษา</button>

    </div>

<script>
       function addstd() {
        window.location.href = '/addstd';
    }

</script>

</div>   
</body>
</html>