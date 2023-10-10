<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="register.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mitr:wght@300&display=swap" rel="stylesheet">
    <title>sss</title>
    <script>
        
        function validateForm() {
            var teacherRadio = document.querySelector('input[name="role"][value="teacher"]');
            var studentRadio = document.querySelector('input[name="role"][value="student"]');
            var password = document.getElementById('password').value;
            var confirm_password = document.getElementById('confirm_password').value;

            if (!teacherRadio.checked && !studentRadio.checked) {
                alert('กรุณาเลือก สถานะ ก่อนสมัครสมาชิก');
                return false; 
            }

            if (password !== confirm_password) {
                alert('รหัสผ่านและยืนยันรหัสผ่านไม่ตรงกัน');
                return false;
            }

            if (password.length > 20) {
                alert('รหัสผ่านต้องมีความยาวไม่เกิน 20 ตัว');
                return false;
            }

            return true; 
        }

        window.onload = function() {
            toggleStudentIdField(); 
        }

    function toggleStudentIdField() {
        var studentRadio = document.querySelector('input[name="role"][value="student"]');
        var studentIdField = document.getElementById('studentIdField');

        if (studentRadio.checked) {
            studentIdField.style.display = 'block';
        } else {
            studentIdField.style.display = 'none';
        }

    }
    function check() {
        var teacherRadio = document.querySelector('input[name="role"][value="teacher"]');
        var teachercheck = document.getElementById('studentIdField');

        if (teacherRadio.checked) {
            teachercheck.style.display = 'none';
        } else {
            teachercheck.style.display = 'block';
        }

    }

    @if (session('alert'))
        alert("{{ session('alert') }}");
    @endif
    </script>
</head>
<body>
    <header></header>
    <div class="container">
        <div class="content">
            <p class="register">สมัครสมาชิก</p>
            <form action="{{ route('register') }}" method="post" onsubmit="return validateForm();">
                @csrf
                <div class="radioitem">
                    <label><input type="radio" name="role" value="teacher" onclick="check()"> ผู้สอน </label> 
                    <label> <input type="radio" name="role" value="student" onclick="toggleStudentIdField()"> นักศึกษา </label> 
                </div>
                <input type="text" name="fname" id="fname" placeholder="ชื่อ" required><br>
                <input type="text" name="lname" id="lname" placeholder="นามสกุล"  required><br>
                <input type="email" name="kkumail" id="kkumail" placeholder="kkumail"  required>  
                <input type="password" name="password" id="password" pattern="[A-Za-z0-9]{8,20}" placeholder="รหัสผ่าน" required>
                <input type="password" name="confirm_password" id="confirm_password" placeholder="ยืนยันรหัสผ่าน" required>
                
                <div id="studentIdField">
                    <input type="text" name="idStd" id="idStd" pattern="[0-9]{9}-[0-9]" placeholder="รหัสนักศึกษา" ><br>
                </div>
                <button type="submit" class="goregister">สมัครสมาชิก</button>
                 
            </form>
         
        </div>
    </div>
</body>
</html>