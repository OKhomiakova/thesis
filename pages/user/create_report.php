<?php
    // include ("../../logic/check_user.php");
    include ("../../logic/create_data_report.php");
    session_start();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Создание отчета</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</head>
<body>
    <?php include '../header.php';?>
    <nav>
        <ul>
            <li class="dropdown"> 
                <a class="dropbtn" href="javascript:void(0)">Пациенты</a>
                <div class="dropdown-content">
                    <a href="add_patient.php"><i class="fas fa-plus"></i>&nbsp;Новый пациент</a>
                    <a href="patient_search.php"><i class="fas fa-search"></i>&nbsp;Найти</a>
                </div>
            </li>
            <li><a href="add_result.php">Результаты исследований</a></li>
            <li><a href="add_therapy.php">Назначение терапии</a></li>
            <li><a href="create_report.php" class="active">Создать отчет</a></li>
            <li class="dropdown" style="float: right;"> 
                    <a class="dropbtn" href="javascript:void(0)"><?php echo $_SESSION['user_name']?></a>
                    <div class="dropdown-content">
                        <a href="../change_password.php"><i class="fas fa-key"></i>&nbsp;Сменить пароль</a>
                        <a href="../../logic/logout.php"><i class="fas fa-sign-out-alt"></i>&nbsp;Выйти</a>
                    </div>
                </li>
        </ul>  
    </nav>
    <div style='display: grid; justify-items:center;'>
        <fieldset style='width: 80%;'>
            <legend><h2>Выбор пациента</h2></legend>
            <?php 
                include '../../logic/patient_select_table.php';
            ?>
        </fieldset>
    </div>
    <form method="POST" id="report_form" name="create_report" style="display:none">
        <div style='display: grid; justify-items:center;'>
            <input type="submit" name="submit" value="Сформировать отчет">
            <input id="file_to_redirect" type="hidden" value="create_report.php"/>
            <input id="tmp" name="user_id" type="hidden" 
            <?php
                if(isset($_GET['id']))
                    echo "value=\"" . $_GET['id'] . "\"";
            ?>
            />
        </div>
    </form>
    <?php include '../footer.php';?>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src='../../logic/search.js'></script>
    <?php 
        if(isset($_GET["id"])) {
            $str = 'document.getElementById("report_form").style.display="block";';
            echo "<script> ".$str." </script>";
        }
    ?>
</body>
</head>