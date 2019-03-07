<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Результаты и назначения</title>
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</head>
<body>
    <?php include 'header.php';?>
    <nav>
        <ul>
            <li class="dropdown"> 
                <a class="dropbtn" href="javascript:void(0)">Пациенты</a>
                <div class="dropdown-content">
                    <a href="add_patient.php"><i class="fas fa-plus"></i>&nbsp;Новый пациент</a>
                    <a href="search.php"><i class="fas fa-search"></i>&nbsp;Найти</a>
                </div>
            </li>
            <li><a href="add_result.php" class="active">Результаты исследований</a></li>
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
    <form action="./add_data_result.php" method="POST">
        <fieldset>
            <?php 
                if(!isset($_GET["id"])) {
                    $output = "";
                    $output .= '<h2 style="">Выберите пациента:</h2>
                    <div class="form-group">
                        <div class="input-group" style="display:flex; justify-content: center;">
                            <input type="text" name="search_text" id="search_text" placeholder="Найти пациента..." class="form-control">
                        </div>
                    </div>
                    <div id="result"></div>';
                    echo $output;
                } else {
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
                        $output .= '<h2 aligh="center"> Результаты поиска:</h2>';
                        $output .= '<div class="table-responsive">
                                        <table class="table bordered"
                                            <tr>
                                                <th>Номер ИБ</th>
                                                <th>ФИО пациента</th>
                                                <th>Пол</th>
                                                <th>Дата рождения</th>
                                                <th>Группа СГХС</th>
                                            </tr>';
                        while($row = mysqli_fetch_array($result)){
                            $output .= '
                                <tr>
                                    <td>'.$row["intDiseaseHistoryNumber"].'</td>
                                    <td><a href="patient.php?id='.$row["intPatientId"].'">'.$row["txtPatientFullName"].'</a></td>
                                    <td>'.$row["txtPatientGender"].'</td>
                                    <td>'.$row["datBirthday"].'</td>
                                    <td>'.$row["txtSGHSGroup"].'</td>
                                </tr>';
                        }
                    }
                    echo $output;
                }
                ?>
                <h2>Данные исследования:</h2>
                    <legend>Результаты исследования:</legend>
                    <span class="required_notification">* Обязательное поле</span>
                        <div class="passport">
                            <input name="id" type="hidden" value="<?php echo htmlspecialchars($_GET["id"]) ?>"/>
                            <label for="dateInput">Дата обследования</label>
                            <input type="date" id="dateInput" name="dateInput" required autofocus>
                            <label for="weight">Вес</label>
                            <input type="number" id="weight" name="weight" min="30" max="150" step="any"  required>
                            <label for="IMT">ИМТ</label>
                            <input type="number" id="IMT" name="IMT" step="any" required>
                            <label for="OHS">OXC</label>
                            <input type="number" id="OHS" name="OHS" min="2.0" max="18.0" step="any" required>
                            <label for="LPNP">ЛПНП</label>
                            <input type="number" name="LPNP" id="LPNP" min="1.0" max="15.0" step="any" required>
                            <label for="LPVP">ЛПВП</label>
                            <input type="number" name="LPVP" id="LPVP" min="0.1" max="4.0" step="any" required>
                            <label for="TG">ТГ</label>
                            <input type="number" id="TG" name="TG" min="0.1" max="9.0" step="any" required>
                            <label for="LPa">ЛП(а)</label>
                            <input type="number" id="LPa" name="LPa" min="0.01" max="3.5" step="any" required>
                            <label for="AST">АСТ</label>
                            <input type="number" name="AST" id="AST" min="1.0" max="5000.0" step="any" required>
                            <label for="ALT">АЛТ</label>
                            <input type="number" name="ALT" id="ALT" min="1.0" max="5000.0" step="any" required>
                            <label for="bilirubin">Билирубин</label>
                            <input type="number" id="bilirubin" name="bilirubin" min="1.0" max="100.0" step="any" required>
                            <label for="glucose">Глюкоза</label>
                            <input type="number" id="glucose" name="glucose" min="1.0" max="25.0" step="any" required> 
                            <input type="submit" value="Внести данные">
                        </div>
        </fieldset>
    </form>
    <?php include 'footer.php';?>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="search.js"></script>
</body>
</html>