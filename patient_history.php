<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ИБ Пациента</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</head>
<body>
<?php include 'header.php';?>
    <nav>
        <ul>
            <li class="dropdown"> 
                <a class="active dropbtn" href="javascript:void(0)">Пациенты</a>
                <div class="dropdown-content">
                    <a href="add_patient.php"><i class="fas fa-plus"></i>&nbsp;Новый пациент</a>
                    <a href="search.php"><i class="fas fa-search"></i>&nbsp;Найти</a>
                </div>
            </li>
            <li><a href="add_result.php">Результаты исследований</a></li>
            <li><a href="add_therapy.php">Назначение терапии</a></li>
            <li><a href="report.html">Создать отчет</a></li>
            <li class="dropdown" style="float: right;"> 
                    <a class="dropbtn" href="javascript:void(0)">Username</a>
                    <div class="dropdown-content">
                        <a href=""><i class="fas fa-key"></i>&nbsp;Сменить пароль</a>
                        <a href=""><i class="fas fa-sign-out-alt"></i>&nbsp;Выйти</a>
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
        printf("<h1>Пациент %s</h1><p><i>Дата ввода данных: %s<br>Номер ИБ: %s<br>Пол: %s<br>Группа СГХС: %s<br>Возраст: %s<br>Дата рождения: %s<br>Мутация: %s<br>ИБС: %s<br>ОИМ в анамнезе: %s<br>АГ: %s<br>Курение: %s<br>Нутритивный статус: %s<br>Операция в анамнезе: %s<br>Примержен терапии: %s<br>Рост (см): %s</i></p>",$row['txtPatientFullName'],$row['datInput'],$row['intDiseaseHistoryNumber'],$row['txtPatientGender'],$row['txtSGHSGroup'],$row['intPatientAge'],$row['datBirthday'],$row['txtMutation'],$row['txtIBS'],$row['intOIM'],$row['txtAG'],$row['txtSmoking'],$row['txtNutritionSatus'],$row['txtOperation'],$row['txtTherapyOK'],$row['intHeight']);
        do{
        printf("<table border='1'><tr><td><b>Дата исследования:</b></td><td>%s</td></tr>
        <tr><td><b>Вес:</b></td><td>%s</td></tr>
        <tr><td><b>ИМТ (м<sup>2</sup>/кг):</b></td><td>%s</td></tr><tr><td><b>ОХС:</b></td><td>%s</td></tr><tr><td><b>ЛПНП:</b></td><td>%s</td></tr><tr><td><b>ЛПВП:</b></td><td>%s</td></tr><tr><td><b>ТГ:</b></td><td>%s</td></tr><tr><td><b>ЛП(а):</b></td><td>%s</td></tr><tr><td><b>АСТ:</b></td><td>%s</td></tr><tr><td><b>АЛТ:</b></td><td>%s</td></tr><tr><td><b>Билирубин:</b></td><td>%s</td></tr>
        <tr><td><b>Глюкоза:</b></td><td>%s</td></tr>
        </table><br>",$row1['datAnalysis'],$row1['decWeight'],$row1['decIMT'],$row1['decOHS'],$row1['decLPNP'],$row1['decLPVP'],$row1['decTG'],$row1['decLPa'],$row1['decAST'],$row1['decALT'],$row1['decBilirubin'],$row1['decGlucose']);	
        }
        while($row1 = mysqli_fetch_array($result2))
        ?>
        <a href="search.php">Вернуться к поиску</a>
    <?php include 'footer.php';?>
</body>
</html>