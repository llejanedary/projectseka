<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="login.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mitr:wght@300&display=swap" rel="stylesheet">
    <script>
        @if (session('alert'))
            alert("{{ session('alert') }}");
        @endif
    </script>
   <title>sss</title>
</head>
<body>
    <header></header>
    <div class="container">
        <div class="content">
            <p class="login">เข้าสู่ระบบ</p>
            <form action="{{ route('login') }}" method="post">
                 @csrf
            <input type="email" name="kkumail" id="kkumail" placeholder="kkumail" required autofocus><br>
            <input type="password" name="password" id="password" placeholder="รหัสผ่าน" required><br>
            
            <button type="submit" class="gologin"> เข้าสู่ระบบ </button>

                 
        </form>
            <br>
            <p class="titelregis">ยังไม่มีบัญชีผู้ใช้ ? <a href="./register">สมัครสมาชิก</a></p>
        </div>
    </div>
</body>
</html>