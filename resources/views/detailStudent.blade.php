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
        <div class="text">
            <p>ดูคะแนน</p>
        </div>
        <div class="text2">
            <p>ระบบเช็คชื่อ</p>
        </div>
        <div class="logout">ออกจากระบบ</div>

    </div>
    <div class="textcenter">
        <center>
            <p>คะแนนรายวิชา ....</p>
        </center>
        <center>
            <p>นาย .... Sec ....</p>
        </center>
    </div>
    <div class="labscore">
        <p>Lab score</p><br>
        <table>
            <thead>
                <tr>
                    <th>Lab1</th>
                    <th>Lab1</th>
                    <th>Lab1</th>
                    <th>Lab1</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>คะแนน</td>
                    <td>คะแนน</td>
                    <td>คะแนน</td>
                    <td>คะแนน</td>
                </tr>
                <!-- สร้างแถวอื่น ๆ ตามความต้องการ -->
            </tbody>
        </table>
    </div>
    <br>
    <div class="assignmetscore">
        <p>Assignment Score</p><br>
        <table class="table2">
            <thead>
                <tr>
                    <th>Lab1</th>
                    <th>Lab1</th>
                    <th>Lab1</th>
                    <th>Lab1</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>คะแนน</td>
                    <td>คะแนน</td>
                    <td>คะแนน</td>
                    <td>คะแนน</td>
                </tr>
                <!-- สร้างแถวอื่น ๆ ตามความต้องการ -->
            </tbody>
        </table>
    </div>
    <br>
    <div class="testscore">
        <p>Test Score</p><br>
        <table class="table3">
            <thead>
                <tr>
                    <th>Lab1</th>
                    <th>Lab1</th>
                    <th>Lab1</th>
                    <th>Lab1</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>คะแนน</td>
                    <td>คะแนน</td>
                    <td>คะแนน</td>
                    <td>คะแนน</td>
                </tr>
                <!-- สร้างแถวอื่น ๆ ตามความต้องการ -->
            </tbody>
        </table>
    </div>
    



</body>

</html>
