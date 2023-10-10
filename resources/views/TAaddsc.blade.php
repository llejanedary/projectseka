<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('/TAaddsc.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body>
    <header></header>
    <div class="hk">
        <p>รายวิชา .....</p>
    </div>
    <div class="boxprofile">
        <img src="pic/profile.png" alt="รูปโปรไฟล์">
        <div class="addsc">
             <button><p>กรอกคะแนน</p></button>
        </div>
        <div class="viewsc">
            <button><p>ดูคะแนน</p></button>
        </div>
        <div class="logout">
            <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                    {{ __('ออกจากระบบ') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                </form>
            </a>
        </div>
    </div>

    <div class="Adddata">
        <form action="">
            <input type="text" name="std_id" id="" placeholder="รหัสนักศึกษา"><br>
            <div class="custom-dropdown">
                <input type="text" name="scoretype" id="scoretype" placeholder="คะแนนเข้าเรียน" list="scoreList">
                <div class="arrow-down"></div>
                <datalist id="scoreList">
                  <option value="คะแนนเข้าเรียน">
                  <option value="คะแนน LAB">
                  <option value="คะแนน Assigment">
                  <option value="คะแนน Test">
                </datalist>
              </div><br>
            <input type="text" name="score id" id="" placeholder="คะแนน"><br>
            <input type="text" name="std_id" id="" placeholder="กลุ่มเรียน"><br>
            <input type="submit" value = "เพิ่ม">
        </form>
    </div>


</body>
</html>
