<?php
    include ("../../logic/check_user.php");
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Главная страница</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</head>
<body>
    <?php 
        include '../header.php';
    ?>
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
    <div style="text-align: center">
    <h3>Добро пожаловать в ИС "Регистр больных с патологией СГХС"!</h3>
    <h4>Руководство по использованию системы</h4>
    <p>Для <b>добавления нового пациента</b> наведите курсор на вкладку "Пациенты" и выберете из выпадающего меню опцию "Новый пациент". На открывшейся форме, заполните все поля и нажмите кнопку "Внести данные".</p><br>
    <p>Для <b>просмотра истории болезни пациента</b> наведите курсор на вкладку "Пациенты" и выберете из выпадающего меню опцию "Поиск". В поисковую строку введите имя/фамилию/отчество пациента. Из появившейся таблице выберете необходимого пациента и нажмите на него.</p><br>
    <p>Для <b>добавления результатов исследования</b> нажмите на вкладку "Результаты исследований".  В поисковую строку введите имя/фамилию/отчество пациента. Из появившейся таблице выберете необходимого пациента и нажмите на него. На открывшейся форме, заполните все поля и нажмите кнопку "Внести данные".</p><br>
    <p>Для <b>назначения терапии</b> нажмите на вкладку "Назначение терапии".  В поисковую строку введите имя/фамилию/отчество пациента. Из появившейся таблице выберете необходимого пациента и нажмите на него. На открывшейся форме, заполните все поля и нажмите кнопку "Внести данные".</p><br>
    <p>Для <b>создания отчета</b> нажмите на вкладку "Создать отчет".  В поисковую строку введите имя/фамилию/отчество пациента. Из появившейся таблице выберете необходимого пациента и нажмите на него. На открывшейся форме, нажмите кнопку "Сформировать отчет". На Ваш компьютер загрузится файл формата .xlsx, содержащий паспорт пациента и результаты его первого исследования.</p>
    </div>
    <?php 
        include '../footer.php';
    ?>
</body>
</html>