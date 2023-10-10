<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="{{ asset('./student.css') }}">
    <style>
        body {
            background-color: #f9f6e3;
        }
    </style>
</head>

<body>
    <div class="my-nav">

    </div>
    {{-- <header></header> --}}
    <div class="boxprofile">
        <img src="pic\image 5.png" alt="รูปโปรไฟล์">
        {{-- <div class="username">{{ Auth::user()->name }}</div>
        <div class="email">{{ Auth::user()->email }}</div> --}}
        {{-- <div class="stdlist">รายชื่อนักศึกษา</div> --}}
        <div class="logout">ออกจากระบบ</div>
    </div>
    {{-- <h3>You are student {{$student->name}}</h3> --}}

    <div class="cardSubJ">
        {{-- @forelse ($course as $subject) --}}
        <a href="http://127.0.0.1:8000/detailStudent">
            <div class="card" style="width: 18rem;">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                    <p class="card-text">test 1</p>
                </div>
            </div>
        </a>
        {{-- @empty
            ไม่มีข้อมูล --}}
        {{-- @endforelse --}}
        
    </div>

</body>

</html>
