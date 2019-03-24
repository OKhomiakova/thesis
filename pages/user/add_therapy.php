<?php
    include ("../../logic/check_user.php");
    include ("../../logic/add_data_therapy.php");
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Результаты и назначения</title>
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
            <li><a href="add_therapy.php" class="active">Назначение терапии</a></li>
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
    <div style='display: grid; justify-items:center;'>
        <?php 
            if(isset($message)) {
                echo $message;
            }
        ?>
    </div>
    <div style='display: grid; justify-items:center;'>
        <fieldset style='width: 80%;'>
            <legend><h2>Выбор пациента</h2></legend>
            <?php 
                include '../../logic/patient_select_table.php';
            ?>
        </fieldset>
    </div>
    <form method="POST" id="therapy_form" name="add_therapy">
        <div style='display: grid; justify-items:center;'>
        <fieldset style='width: 80%;'>
            <legend><h2>Назначение терапии</h2></legend>
            <span class="required_notification">* Обязательное поле</span>
            <div class="passport">
                <input id="file_to_redirect" type="hidden" value="add_therapy.php"/>
                <input name="id" type="hidden" value="<?php echo htmlspecialchars($_GET["id"]) ?>"/>
                <label for="dateInput">Дата назначения</label>
                <input type="date" id="dateInput" name="dateInput" required autofocus>
                <label for="drug">Препарат</label>
                <select name="drug" id="drug" required>
                    <option value="" selected disabled>Please select an option...</option>
                    <option value="drug2" selected>drug1</option>
                    <option value="drug2">drug2</option>
                </select>
                <label for="dosage">Доза</label>
                <select name="dosage" id="dosage" required>
                    <option value="" selected disabled>Please select an option...</option>
                    <option value="Низкая" selected>Низкая</option>
                    <option value="Средняя">Средняя</option>
                    <option value="Высокая">Высокая</option>
                </select>
                <label for="therapyOK">Переносимость</label>
                <select name="therapyOK" id="therapyOK" required>
                    <option value="" selected disabled>Please select an option...</option>
                    <option value="Да" selected>Да</option>
                    <option value="Нет">Нет</option>
                </select>
                <input type="submit" name="submit" value="Внести данные">
            </div>
        </fieldset>
        </div>
    </form>
    <?php 
        include '../footer.php';
    ?>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="../../logic/search.js"></script>
    <?php 
        if(!isset($_GET["id"])) {
            $str = 'document.getElementById("therapy_form").style.display="none";';
            echo "<script> ".$str." </script>";
        }
    ?>
    </body>
</html>