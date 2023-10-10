<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('score.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Mitr:wght@300&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />


    <title>score</title>
</head>
<body>
    <header></header>
    <div class="sidebar">
        <img src="pic/profile.png" alt="รูปโปรไฟล์">
        <div class="username">{{$teacher->fname}}</div>
        <div class="email">{{$teacher->kkumail}}</div>
        <div class="stdlist"> <a href="{{ route('class') }}">รายชื่อนักศึกษา</a></div>
        <div class="talist"> <a href="{{ route('talist') }}">รายชื่อผู้ช่วยสอน</a></div>
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

    
    <table id="labtable" class="table"  >
        <thead>
            <tr>
                <td>ลำดับ</td>
                <td>รหัสนักศึกษา</td>
                <td>ชื่อ-นามสกุล</td>

            </tr>
        </thead>
        <tbody>
            @foreach($students as $student)
                <tr>
                    <td>{{ $loop->iteration }}</td> 
                    <td>{{ $student->idStd }}</td> 
                    <td>{{ $student->fname . ' ' . $student->lname }}</td>
                    
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


<div id="overlay" class="overlay"></div>

    <div class="filtercontainer">
         <button id="addlab" class="addlab">เพิ่มแล็บ</button> 
         <button id="addscore" class="addscore">เพิ่มคะแนน</button> 
         <button id="editscorebt" class="editscorebt">แก้ไขคะแนน</button>
    
    </div>


<form action="" method="post" onsubmit="return validateForm();">
    @csrf
    <div id="labmodal" class="modal">
        <div class="addlabmodal">
            <h2>กรอกชื่อ Lab</h2>
            <div class="labnameip">
                <input type="text" id="labnameip" name="newLabName" placeholder="กรุณากรอกชื่อLab" required>

            </div>

            <div class="addlabbt">
                <input type="submit" id="savelabbt"  value="บันทึก">
                <button id="closelabbt">ปิด</button>
            </div>
        </div>
    </div>
</form>

<script>
    
    document.addEventListener('DOMContentLoaded', function () {
        let addlab = document.getElementById('addlabbt');
        let overlay = document.getElementById('overlay');
        let labmodal = document.getElementById('labmodal');
        let closelab = document.getElementById('closelabbt');
        let labname = document.getElementById('labnameip');
        let savelab = document.getElementById('savelabbt');

        addlab.addEventListener('click', () => {
            overlay.style.display = 'block';
            labmodal.style.display = 'block';
        });

        closelab.addEventListener('click', () => {
    overlay.style.display = 'none';
    labmodal.style.display = 'none';
    document.getElementById('labnameip').value = '';
    event.preventDefault();
});


        savelab.addEventListener('click', () => {
    let labname = labnameip.value;
    if (!labname) {
        alert('กรุณากรอกชื่อ Lab');
        event.preventDefault(); 
        return;
    }

    addLabColumn(labname);

    document.getElementById('newLabName').value = labname;

overlay.style.display = 'none';
labmodal.style.display = 'none';
document.getElementById('labnameip').value = '';
});

    });

  
    function addLabColumn(labname) {
    let select = document.getElementById("scoretype");
    let labtable = document.getElementById("labtable");
    let thead = labtable.querySelector("thead");
    let tbody = labtable.querySelector("tbody");

    if (select.value === "labscore") {
        let th = document.createElement("th");
        th.textContent = labname;
        thead.querySelector("tr").appendChild(th);

        let rows = tbody.querySelectorAll("tr");
        rows.forEach((row) => {
            let td = document.createElement("td");
            td.id = row.cells[1].textContent.trim() + "-" + labname;
            row.appendChild(td);
        });

        select.value = "labscore";
    }
}

</script>









<form action="" method="post" onsubmit="return validateForm();">
    @csrf
    <div id="editscoremodal" class="modal">
        <div class="editscoremodal">
            <div class="headmodal">
                <span class="close">&times;</span>
                <h4>แก้ไขคะแนน</h4>
            </div>

                <input type="hidden" id="editscorelab" name="labname">
                <input type="hidden" id="editscorestd" name="stdid">
    
                <div class="studentid">
                    <span id="stdid">รหัสนักศึกษา</span>
                    <input type="text" id="editstudentid" name="stdid">
                </div>
    
                <div class="scoretext">
                    <span id="labname">Lab</span>
                    <span id="labscore">คะแนน</span>
                </div>
    
                <div class="labandscore">
                    <select id="editlabselect" name="labselect">
                        
                    </select>
    
                    <input type="number" id="editscore" min="0" max="10" step="1" name="score">
                </div>
    
                <div class="scorebotton">
                    <!-- ปุ่ม "บันทึก" -->
                    <button id="editsavescorebt">บันทึก</button>
                   
                </div>
            </div>
        </div>
    
    </form>

         
<script>
    var editbt = document.getElementById("editscorebt");
    var modal = document.getElementById("editscoremodal");
    var closebt = document.getElementsByClassName("close")[0];
    
    editbt.onclick = function() {
        modal.style.display = "block";
        overlay.style.display = 'block';

    }
    
    closebt.onclick = function() {
        modal.style.display = "none";
        overlay.style.display = 'none';

    }
    
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>  

<form action="" method="post" onsubmit="return validateForm();">
    @csrf
    <div id="addscoremodal" class="modal">
        <div class="addscoremodal">
            <div class="headmodal">
                <span class="close">&times;</span>
                <h4>เพิ่มคะแนน</h4>
            </div>

                <input type="hidden" id="editscorelab" name="labname">
                <input type="hidden" id="editscorestd" name="stdid">
    
                <div class="studentid">
                    <span id="stdid">รหัสนักศึกษา</span>
                    <input type="text" id="editstudentid" name="stdid">
                </div>
    
                <div class="scoretext">
                    <span id="labname">Lab</span>
                    <span id="labscore">คะแนน</span>
                </div>
    
                <div class="labandscore">
                    <select id="editlabselect" name="labselect">
                        
                    </select>
    
                    <input type="number" id="editscore" min="0" max="10" step="1" name="score">
                </div>
    
                <div class="scorebotton">
                    <!-- ปุ่ม "บันทึก" -->
                <button id="editsavescorebt">บันทึก</button>
                   
                </div>
            </div>
        </div>
    
    </form>


<script>
    // หาปุ่ม "เพิ่ม" และ Modal
    var editbt = document.getElementById("addscore");
    var modal = document.getElementById("addscoremodal");
    var closebt = document.getElementsByClassName("close")[0];
    
    // เมื่อคลิกปุ่ม "เพิ่ม", เปิด Modal
    editbt.onclick = function() {
        modal.style.display = "block";
        overlay.style.display = 'block';

    }
    
    // เมื่อคลิกปุ่มปิด, ปิด Modal
    closebt.onclick = function() {
        modal.style.display = "none";
        overlay.style.display = 'none';

    }
    
    // เมื่อผู้ใช้คลิกนอกพื้นที่ของ Modal, ปิด Modal
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>  



</div>   
</body>
</html>