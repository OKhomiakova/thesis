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
            <li><a href="add_result.php">Результаты исследований и назначение терапии</a></li>
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
    <form action="./add_data_patient.php" method="POST">
        <fieldset>
            <legend>Паспорт пациента</legend>
                <div class="passport">
                    <label for="dateInput">Дата ввода данных</label>
                    <input type="date" id="dateInput" name="dateInput">
                    <label for="patientCard">Номер ИБ</label>
                    <input type="number" id="patientCard" name="card" required>
                    <label for="patientName">ФИО Пациента</label>
                    <input type="text" id="patientName" name="patientName" required>
                    <label for="patientGender">Пол</label>
                    <select name="gender" id="patientGender" required>
                        <option value="Мужской" selected>Мужской</option>
                        <option value="Женский">Женский</option>
                    </select>
                    <label for="SGHSGroup">Группа СГХС</label>
                    <select name="SGHSGroup" id="SGHSGroup" required>
                        <option value="Определенная" selected>Определенная</option>
                        <option value="Возможная">Возможная</option>
                        <option value="Вероятная">Вероятная</option>
                    </select>
                    <label for="patientAge">Возраст</label>
                    <input type="number" id="patientAge" name="age" required>
                    <label for="patientDateOfBirth">Дата рождения</label>
                    <input type="date" id="patientDateOfBirth" name="bithDay" required>
                    <label for="mutation">Мутации</label>
                    <div class="align" style="display:flex;">
                        <p><input type="radio" id="mutation" name="mutation" value="Есть">Есть</p>
                        <p><input type="radio" id="mutation" name="mutation" value="Нет" selected>Нет</p>
                    </div>
                    <label for="IBS">ИБС</label>
                    <div class="align">
                        <p><input type="radio" id="IBS" name="ibs" value="Есть">Есть</p>
                        <p><input type="radio" id="IBS" name="ibs" value="Да" checked>Нет</p>
                    </div>
                        <label for="OIM">ОИМ в анамнезе</label>
                    <input type="number" id="OIM" name="oim" required>
                    <label for="AG">АГ</label>
                    <div class="align">
                        <p><input type="radio" id="AG" name="ag" value="Есть">Есть</p>
                        <p><input type="radio" id="AG" name="ag" value="Да" checked>Нет</p>
                        </div>
                    <label for="smoking">Курение</label>
                    <div class="align">
                        <p><input type="radio" id="smoking" name="smoking" value="Да">Да</p>
                        <p><input type="radio" id="smoking" name="smoking" value="Нет" checked>Нет</p>
                        </div>
                    <label for="nutStatus">Нутриритивный статус</label>
                    <select name="nutStatus" id="nutStatus" required>
                            <option value="Гипотрофия">Гипотрофия</option>
                            <option value="Норма" selected>Норма</option>
                            <option value="Ожирение">Ожирение</option>
                            <option value="Выраженное ожирение">Выраженное ожирение</option>
                        </select>
                    <label for="operationNum">Операция в анамнезе</label>
                    <input type="number" id="operationNum" name="operationNum">
                    <label for="therapyOk">Привержен терапии</label>
                    <div class="align">
                        <p><input type="radio" id="therapyOk" name="therapyOk" value="Да" checked>Да</p>
                        <p><input type="radio" id="therapyOk" name="therapyOk" value="Нет">Нет</p>
                        </div>
                    <label for="height">Рост</label>
                    <input type="number" id="height" name="height" min="100" max="250" required>
                    <input type="submit" value="Внести данные">
                </div>
        </fieldset>
    </form>
    <?php include 'footer.php';?>
</body>
</html>