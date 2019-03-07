<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Новый пациент</title>
    <link rel="stylesheet" href=".\style.css">
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
            <li><a href="add_result.php">Назначение терапии</a></li>
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

        if(mysqli_num_rows($result)>0){
            $output .= '<h4 aligh="center"> Результаты поиска:</h4>';
            $output .= '<div class="table-responsive">
                            <table class="table bordered"
                                <tr>
                                    <th>Номер ИБ</th>
                                    <th>ФИО пациента</th>
                                    <th>Пол</th>
                                    <th>Группа СГХС</th>
                                    <th>Дата рождения</th>
                                </tr>';
            while($row = mysqli_fetch_array($result)){
                $output .= '
                    <tr>
                        <td>'.$row["intDiseaseHistoryNumber"].'</td>
                        <td><a href="add_result.php?id='.$row["intPatientId"].'">'.$row["txtPatientFullName"].'</a></td>
                        <td>'.$row["txtPatientGender"].'</td>
                        <td>'.$row["txtSGHSGroup"].'</td>
                        <td>'.$row["datBirthday"].'</td>
                    </tr>';
            }
        echo $output; 
    }
    ?>
</body>
</html>