<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('/HomeTA.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body>
    <header></header>
    <div class="hk">
        <p>กรุณาเลือกรายวิชาที่ต้องการเพิ่มคะแนน</p>
    </div>
    <div class="boxprofile">
        <img src="pic/profile.png" alt="รูปโปรไฟล์">
        <div class="username">{{$student->fname}}</div>
        <div class="email">{{$student->kkumail}}</div>  
        <form method="GET" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="logout" @click.prevent="$root.submit();">ออกจากระบบ</button>
        </form>

    </div>


{{-- <div class="container2">
            <div class="card" style="width: 18rem;">
            <a href="{{route('TAaddsc')}}">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                    <p class="card-text">test 1</p>
                </div>
            </a>
        </div>

</div> --}}
<div class="headsubject">
    รายวิชาของคุณ
</div>
<div class="contentsubject">
    @if(count($classrooms) > 0)
        @foreach ($classrooms as $class)
        <a href="{{ route('class', ['id' => $class->id]) }}">
            <div class="subject">
                <img src="pic/default_poster.png" alt="รูปวิชา">
                <hr class="hr">
                <p class="subjectcode"> {{ $class->subjectcode }} {{ $class->subjectName }} </p>
            </div>
            </a> 
        @endforeach
    @else
        <p class="emptyclass">ยังไม่มีรายวิชาที่ถูกสร้าง</p>
    @endif                                                                                                                                          
</div>

</body>
</html>


