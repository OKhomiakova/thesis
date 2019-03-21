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
                    <a href="patient_search.php"><i class="fas fa-search"></i>&nbsp;Найти</a>
                </div>
            </li>
            <li><a href="add_result.php">Результаты исследований</a></li>
            <li><a href="add_therapy.php" class="active">Назначение терапии</a></li>
            <li><a href="create_report.php">Создать отчет</a></li>
            <li class="dropdown" style="float: right;"> 
                    <a class="dropbtn" href="javascript:void(0)">Username</a>
                    <div class="dropdown-content">
                        <a href=""><i class="fas fa-key"></i>&nbsp;Сменить пароль</a>
                        <a href=""><i class="fas fa-sign-out-alt"></i>&nbsp;Выйти</a>
                    </div>
                </li>
        </ul>  
    </nav>
    <form action="../logic/add_data_therapy.php" method="POST" name="add_therapy">
    <div style='display: grid; justify-items:center;'>
        <fieldset style='width: 80%;'>
            <legend><h2>Выбор пациента</h2></legend>
            <?php 
                if(!isset($_GET["id"])) {
                    $output = "";
                    $output .= '
                    <div class="form-group">
                        <div class="input-group" style="display:flex; justify-content: center;">
                            <input type="text" name="search_text" id="search_text" placeholder="Введите фамилию пациента.." class="form-control" autofocus>
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
            
                    $p_height = 0;
                    if(mysqli_num_rows($result)>0){
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
                            $p_height = $row["intHeight"];
                            $output .= '
                                <tr>
                                    <td>'.$row["intDiseaseHistoryNumber"].'</td>
                                    <td>'.$row["txtPatientFullName"].'</a></td>
                                    <td>'.$row["txtPatientGender"].'</td>
                                    <td>'.$row["datBirthday"].'</td>
                                    <td>'.$row["txtSGHSGroup"].'</td>
                                </tr>';
                        }
                    }
                    $output .= '</table>';
                    $output .= '</div>';
                    echo $output;
                }
                ?>
                </fieldset>
                <fieldset style='width: 80%;'>
                    <legend><h2>Назначение терапии</h2></legend>
                    <span class="required_notification">* Обязательное поле</span>
                        <div class="passport">
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
                            <input type="submit" value="Внести данные">
                        </div>
        </fieldset>
        </div>
    </form>
    <?php include 'footer.php';?>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="../logic/search.js"></script>
</body>
</html>