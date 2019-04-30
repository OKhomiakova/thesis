<?php
    include ("../../logic/check_user.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ИБ Пациента</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.2.0/css/all.css">
    <style>
body {font-family: Arial;}

/* Style the tab */
.tab {
  overflow: hidden;
  border: 1px solid #ccc;
  background-color: #f1f1f1;
}

/* Style the buttons inside the tab */
.tab button {
  background-color: inherit;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
  font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
}

/* Create an active/current tablink class */
.tab button.active {
  background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
  display: none;
  padding: 6px 12px;
  -webkit-animation: fadeEffect 1s;
  animation: fadeEffect 1s;
}

/* Fade in tabs */
@-webkit-keyframes fadeEffect {
  from {opacity: 0;}
  to {opacity: 1;}
}

@keyframes fadeEffect {
  from {opacity: 0;}
  to {opacity: 1;}
}
</style>
</head>
<body>
<?php include '../header.php';?>
    <nav>
        <ul>
            <li class="dropdown"> 
                <a class="active dropbtn" href="javascript:void(0)">Пациенты</a>
                <div class="dropdown-content">
                    <a href="add_patient.php"><i class="fas fa-plus"></i>&nbsp;Новый пациент</a>
                    <a href="patient_search.php"><i class="fas fa-search"></i>&nbsp;Найти</a>
                </div>
            </li>
            <li><a href="add_result.php">Результаты исследований</a></li>
            <li><a href="add_therapy.php">Назначение терапии</a></li>
            <li><a href="create_report.php">Создать отчет</a></li>
            <li class="dropdown" style="float: right;"> 
                    <a class="dropbtn" href="javascript:void(0)"><?php echo $_SESSION['user_name']?></a>
                    <div class="dropdown-content">
                        <a href="../change_password.php"><i class="fas fa-key"></i>&nbsp;Сменить пароль</a>
                        <a href="../../logic/logout.php"><i class="fas fa-sign-out-alt"></i>&nbsp;Выйти</a>
                    </div>
                </li>
        </ul>  
    </nav>
    <?php 
        $id = $_GET["id"];
        
        $host = "localhost";
        $user = "root";
        $password = "";
        $db  = "dbHospital";
        
        $link = mysqli_connect($host, $user, $password, $db);
        mysqli_query($link, "set names cp1251");
        mysqli_set_charset($link, "utf8");
       
        $output = '';
        $sql = "SELECT * FROM tblPatient WHERE intPatientId=".$id."";
        $result = mysqli_query($link, $sql);
        $row = mysqli_fetch_array($result);
        $sql2 = "SELECT * FROM tblAnalysis WHERE intPatientId=".$id."";
        $result2 = mysqli_query($link, $sql2);
        $row1 = mysqli_fetch_array($result2);
        $sql3 = "SELECT * FROM tblTherapy WHERE intPatientId=".$id."";
        $result3 = mysqli_query($link, $sql3);
        $row2 = mysqli_fetch_array($result3);
        printf('<h2 style="text-align:center">Пациент %s</h2>
        <h3 style="text-align: center; padding: 0px; margin-top: 0px;">История болезни</h3>',$row['txtPatientFullName']);
?>

<div class="tab">
  <button class="tablinks" onclick="openCity(event, 'passport')">Паспорт пациента</button>
  <button class="tablinks" onclick="openCity(event, 'result')">Результаты исследований</button>
  <button class="tablinks" onclick="openCity(event, 'prescription')">Назнчение терапии</button>
</div>

<div id="passport" class="tabcontent">
<main class="fancy">
        <form name="add_patient" method="POST">
            <div style='display: flex; justify-content:center;'>
                <fieldset style='width: 80%;' >
                    <legend><h2 style="margin: 0;">Паспорт пациента</h2></legend>
                        <div class="passport">
                        <div style="display:flex;">
                                <div style="flex: 50%; margin-right: 10px;" >
                                <label>Дата ввода данных</label>
                                <input type="date" id="dateInput" name="dateInput" required>    
                                </div>
                                <div style="display:grid; flex: 50%; margin-left: 10px;">
                                <div>
                                <label>№ Истории Болезни</label>
                                <input type="number" id="patientCard" name="card" min="0"  required>
                                </div>
                            </div>
                        </div>

                            <div>
                            <label>ФИО Пациента</label>
                            <input type="text" id="patientName" name="patientName" maxlength="100" placeholder="Фамилия Имя Отчество" required>
                            </div>

                            <div style="display:flex;">
                                <div style="display:grid; flex: 40%; margin-right: 10px;" >
                                <div style="flex: 40%; margin-right: 10px;" >
                                    <label>Дата рождения</label>
                                    <input type="date" id="patientDateOfBirth" name="bithDay" required>
                                    </div>
                                </div>
                                <div style="display:grid; flex: 40%; margin-left: 10px;">
                                <div>
                                    <label>Возраст</label>
                                    <input type="number" id="patientAge" name="age" min="0" required>
                                    </div>
                                </div>
                            </div>

                            <div>
                            <label>Пол</label>
                            <select name="gender" id="patientGender" required>
                                <option value="" selected disabled>Please select an option...</option>
                                <option value="Мужской" selected>Мужской</option>
                                <option value="Женский">Женский</option>
                            </select>
                            </div>

                            <div>
                            <label>Группа СГХС</label>
                            <select name="SGHSGroup" id="SGHSGroup" required>
                                <option value="Определенная" selected>Определенная</option>
                                <option value="Возможная">Возможная</option>
                                <option value="Вероятная">Вероятная</option>
                            </select>
                            </div>

                            <div style="display:flex;">
                                <div style="display:grid; flex: 40%; margin-right: 10px;" >
                                <fieldset style='width: 93%' >
                                <legend><label for="IBS">ИБС</label></legend>
                                    <div class="align">
                                        <p><input type="radio" id="IBS" name="ibs" value="Есть">Есть</p>
                                        <p><input type="radio" id="IBS" name="ibs" value="Нет" checked>Нет</p>
                                    </div>
                                </fieldset>
                                </div>
                                <div style="display:grid; flex: 40%; margin-left: 10px;">
                                <fieldset style='width: 93%' >
                                <legend><label for="AG">АГ</label></legend>
                                    <div class="align">
                                        <p><input type="radio" id="AG" name="ag" value="Есть">Есть</p>
                                        <p><input type="radio" id="AG" name="ag" value="Нет" checked>Нет</p>
                                    </div>
                                </fieldset>
                                </div>
                            </div>
                            <div>
                            <label>ОИМ в анамнезе</label>
                            <input type="number" id="OIM" name="oim" min="0" required>
                            </div>

                            <div>
                            <label>Операция в анамнезе</label>
                            <input type="number" id="operationNum" name="operationNum" min="0">
                            </div>

                            <div>
                            <label>Нутритивный статус</label>
                            <select name="nutStatus" id="nutStatus" required>
                                    <option value="Гипотрофия">Гипотрофия</option>
                                    <option value="Норма" selected>Норма</option>
                                    <option value="Ожирение">Ожирение</option>
                                    <option value="Выраженное ожирение">Выраженное ожирение</option>
                            </select>
                            </div>

                            <div>
                            <label>Рост</label>
                            <input type="number" id="height" name="height" min="100" max="250" required>
                            </div>

                            <div style="display:flex;">
                                <div style="display:grid; flex: 40%; margin-right: 10px;" >
                    
                                <div style="display:flex;">
                                <div style="display:grid; flex: 40%; margin-right: 10px;" >
                                <fieldset style='width: 94%' >
                                    <legend><label for="mutation">Мутации</label></legend>
                                    <div class="align">
                                        <p><input type="radio" id="mutation" name="mutation" value="Есть">Есть</p>
                                        <p><input type="radio" id="mutation" name="mutation" value="Нет" checked>Нет</p>
                                    </div>
                                </fieldset>
                                </div>
                                <div style="display:grid; flex: 40%; margin-left: 10px; margin-right: 10px;">
                                <fieldset style='width: 94%' >
                                    <legend><label for="therapyOk">Привержен терапии</label></legend>
                                    <div class="align">
                                        <p><input type="radio" id="therapyOk" name="therapyOk" value="Да" checked>Да</p>
                                        <p><input type="radio" id="therapyOk" name="therapyOk" value="Нет">Нет</p>
                                    </div>
                                </fieldset>
                                </div>
                                <div style="display:grid; flex: 40%; margin-left: 10px; ">
                                <fieldset style='width: 93%' >
                                    <legend> <label for="smoking">Курение</label></legend>
                                    <div class="align">
                                        <p><input type="radio" id="smoking" name="smoking" value="Да">Да</p>
                                        <p><input type="radio" id="smoking" name="smoking" value="Нет" checked>Нет</p>
                                    </div>
                                </fieldset>
                                </div>
                            </div> 
                             <input type="submit" name="submit" value="Редактировать">
                        </div>
                </fieldset>
            </div>
        </form>
    </main>
<!-- <?php
    printf("<form action='./edit.php' method='POST' name='edit_data'>
        <div style='display: flex; justify-content:center;'>
<div class='passport'>
        <label for='dateInput'>Дата ввода данных</label></br>
        <input type='date' id='dateInput' name='dateInput' value='%s'></br></div></div></form>",$row['txtPatientFullName'],$row['datInput']);
        
?> -->
</div>
<div id="result" class="tabcontent">
<div class="sortDate" style="display:flex; float: right;">
<div style="display:flex; margin: 5px;">
<label style="display:inline-block; float:left;">С:</label>
<input type="date" id="dateFrom" style="display:inline-block;" name="dateFrom">
</div>
<div style="display:flex; margin: 5px;">
<label>По:</label><input type="date" id="dateUntill" name="dateUntil">
</div>
</div>
    <?php
    do {
        printf("<table border='1'><tr><td><b>Дата исследования:</b></td><td>%s</td></tr>
        <tr><td><b>Вес:</b></td><td>%s</td></tr>
        <tr><td><b>ИМТ (м<sup>2</sup>/кг):</b></td><td>%s</td></tr><tr><td><b>ОХС:</b></td><td>%s</td></tr><tr><td><b>ЛПНП:</b></td><td>%s</td></tr><tr><td><b>ЛПВП:</b></td><td>%s</td></tr><tr><td><b>ТГ:</b></td><td>%s</td></tr><tr><td><b>ЛП(а):</b></td><td>%s</td></tr><tr><td><b>АСТ:</b></td><td>%s</td></tr><tr><td><b>АЛТ:</b></td><td>%s</td></tr><tr><td><b>Билирубин:</b></td><td>%s</td></tr>
        <tr><td><b>Глюкоза:</b></td><td>%s</td></tr>
        </table><br>",$row1['datAnalysis'],$row1['decWeight'],$row1['decIMT'],$row1['decOHS'],$row1['decLPNP'],$row1['decLPVP'],$row1['decTG'],$row1['decLPa'],$row1['decAST'],$row1['decALT'],$row1['decBilirubin'],$row1['decGlucose']);}
        while($row1 = mysqli_fetch_array($result2));
    ?>
</div>

<div id="prescription" class="tabcontent">
<div class="sortDate" style="display:flex; float: right;">
<div style="display:flex; margin: 5px;">
<label style="display:inline-block; float:left;">С:</label>
<input type="date" id="dateFrom" style="display:inline-block;" name="dateFrom">
</div>
<div style="display:flex; margin: 5px;">
<label>По:</label><input type="date" id="dateUntill" name="dateUntil">
</div>
</div>
<?php
        do {
        printf("<table border='1'><tr><td><b>Дата назначения терапии:</b></td><td>%s</td></tr>
        <tr><td><b>Препарат:</b></td><td>%s</td></tr>
        <tr><td><b>Доза:</b></td><td>%s</td></tr><tr><td><b>Переносимость:</b></td><td>%s</td></tr></table></br>",$row2['datPrescription'],$row2['txtDrugName'],$row2['txtDrugDose'],$row2['txtTolerance']);	
        }
        while($row2 = mysqli_fetch_array($result3));
    ?>
</div>

<script>
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}
</script>
    <div style="text-align: center; margin: 5px 0;"><a href="patient_search.php">Вернуться к поиску</a></div>
    <?php include '../footer.php';?>
</body>
</html>