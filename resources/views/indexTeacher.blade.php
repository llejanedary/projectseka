<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="indexteacher.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Mitr:wght@300&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />


</head>
<body>

    <header></header>
    <div class="boxprofile">
        <img src="pic/profile.png" alt="รูปโปรไฟล์">
         <div class="username">{{$teacher->fname}}</div>
         <div class="email">{{$teacher->kkumail}}</div> 
         <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="logout" @click.prevent="$root.submit();">ออกจากระบบ</button>
        </form>
         
    </div>
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
        <div id="openModalBtn" class="material-symbols-outlined">add</div>
    </div>
    
    
    
    <!-- Modal -->
    <div id="addsubjectmodal" class="modal">
        <div class="modal-content">
            <span class="close" id="closeModalBtn">&times;</span>
            <h2>สร้างรายวิชา</h2>
            <hr>
            <form id="subjectForm" method="POST" action="{{ route('makesubject') }}" >
                @csrf
                <input type="text" id="subjectcode" name="subjectcode" placeholder="รหัสวิชา"  required> <br>
                <input type="text" id="subjectName" name="subjectName" placeholder="ชื่อวิชา"  required> <br>
                <textarea id="detail" rows="5" cols="20" name="detail"  placeholder="รายละเอียด" ></textarea> <br>
                <button type="submit" id="submitsubject">สร้าง</button>
            </form>
        </div>
    </div>
  

<script>

document.getElementById("openModalBtn").addEventListener("click", function() {
    document.getElementById("addsubjectmodal").style.display = "block";
});

document.getElementById("closeModalBtn").addEventListener("click", function() {
    document.getElementById("addsubjectmodal").style.display = "none";
});


</script>


</body>
</html>