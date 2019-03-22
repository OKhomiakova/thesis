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
            <li><a href="add_result.php" class="active">Результаты исследований</a></li>
            <li><a href="add_therapy.php">Назначение терапии</a></li>
            <li><a href="create_report.php">Создать отчет</a></li>
            <li class="dropdown" style="float: right;"> 
                    <a class="dropbtn" href="javascript:void(0)">Username</a>
                    <div class="dropdown-content">
                        <a href="../change_password.php"><i class="fas fa-key"></i>&nbsp;Сменить пароль</a>
                        <a href=""><i class="fas fa-sign-out-alt"></i>&nbsp;Выйти</a>
                    </div>
                </li>
        </ul>  
    </nav>
    <form action="../../logic/add_data_result.php" method="POST" name="add_result">
    <div style='display: grid; justify-items:center;'>
        <fieldset style='width: 80%;'>
            <legend><h2>Выбор пациента</h2></legend>
            <?php 
                include '../../logic/patient_select_table.php';
            ?>
        </fieldset>
        <fieldset style='width: 80%;'>
            <legend><h2>Данные исследования</h2></legend>
            <span class="required_notification">* Обязательное поле</span>
                <div class="passport">
                    <input id="file_to_redirect" type="hidden" value="add_result.php"/>
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
        </div>
    </form>
    <?php include '../footer.php';?>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>

        let form = document.forms.add_result;

        form.weight.onchange = calculate;

        function calculate() {
            let wght = document.getElementById('weight').value;
            let hght = document.getElementById('height').value;
            if(wght == "") wght = "0";
            wght = parseInt(wght, 10);
            hght = parseInt(hght, 10);
            // alert(hght);
            // alert(wght);
            let res = hght * hght;
            if(wght != 0) res = res / wght;
            res = res.toFixed(1);
            document.getElementById('IMT').value = res;
        }
    </script>
<script src="../../logic/search.js"></script>
</body>
</html>