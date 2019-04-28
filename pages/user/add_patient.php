<?php
    include ("../../logic/check_user.php");
    include ("../../logic/add_data_patient.php");
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Новый пациент</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.2.0/css/all.css">
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
    <div style='display: grid; justify-items:center;'>
        <?php if(isset($message)) echo $message . "<br>"; ?>
    </div>
    <main class="fancy">
        <form name="add_patient" method="POST">
            <div style='display: flex; justify-content:center;'>
                <fieldset style='width: 80%;' >
                    <legend><h2 style="margin: 0;">Паспорт пациента</h2></legend>
                    <span class="required_notification">* Обязательное поле</span>
                        <div class="passport">
                        <div style="display:flex;">
                                <div style="flex: 50%; margin-right: 10px;" >
                                <label>Дата ввода данных *</label>
                                <input type="date" id="dateInput" name="dateInput" required>    
                                </div>
                                <div style="display:grid; flex: 50%; margin-left: 10px;">
                                <div>
                                <label>№ Истории Болезни *</label>
                                <input type="number" id="patientCard" name="card" min="0"  required>
                                </div>
                            </div>
                        </div>

                            <div>
                            <label>ФИО Пациента *</label>
                            <input type="text" id="patientName" name="patientName" maxlength="100" placeholder="Фамилия Имя Отчество" required>
                            </div>

                            <div style="display:flex;">
                                <div style="display:grid; flex: 40%; margin-right: 10px;" >
                                <div style="flex: 40%; margin-right: 10px;" >
                                    <label>Дата рождения *</label>
                                    <input type="date" id="patientDateOfBirth" name="bithDay" required>
                                    </div>
                                </div>
                                <div style="display:grid; flex: 40%; margin-left: 10px;">
                                <div>
                                    <label>Возраст *</label>
                                    <input type="number" id="patientAge" name="age" min="0" required>
                                    </div>
                                </div>
                            </div>

                            <div>
                            <label>Пол *</label>
                            <select name="gender" id="patientGender" required>
                                <option value="" selected disabled>Please select an option...</option>
                                <option value="Мужской" selected>Мужской</option>
                                <option value="Женский">Женский</option>
                            </select>
                            </div>

                            <div>
                            <label>Группа СГХС *</label>
                            <select name="SGHSGroup" id="SGHSGroup" required>
                                <option value="Определенная" selected>Определенная</option>
                                <option value="Возможная">Возможная</option>
                                <option value="Вероятная">Вероятная</option>
                            </select>
                            </div>

                            <div style="display:flex;">
                                <div style="display:grid; flex: 40%; margin-right: 10px;" >
                                <fieldset style='width: 93%' >
                                <legend><label for="IBS">ИБС *</label></legend>
                                    <div class="align">
                                        <p><input type="radio" id="IBS" name="ibs" value="Есть">Есть</p>
                                        <p><input type="radio" id="IBS" name="ibs" value="Нет" checked>Нет</p>
                                    </div>
                                </fieldset>
                                </div>
                                <div style="display:grid; flex: 40%; margin-left: 10px;">
                                <fieldset style='width: 93%' >
                                <legend><label for="AG">АГ *</label></legend>
                                    <div class="align">
                                        <p><input type="radio" id="AG" name="ag" value="Есть">Есть</p>
                                        <p><input type="radio" id="AG" name="ag" value="Нет" checked>Нет</p>
                                    </div>
                                </fieldset>
                                </div>
                            </div>
                            <div>
                            <label>ОИМ в анамнезе *</label>
                            <input type="number" id="OIM" name="oim" min="0" required>
                            </div>

                            <div>
                            <label>Операция в анамнезе *</label>
                            <input type="number" id="operationNum" name="operationNum" min="0">
                            </div>

                            <div>
                            <label>Нутритивный статус *</label>
                            <select name="nutStatus" id="nutStatus" required>
                                    <option value="Гипотрофия">Гипотрофия</option>
                                    <option value="Норма" selected>Норма</option>
                                    <option value="Ожирение">Ожирение</option>
                                    <option value="Выраженное ожирение">Выраженное ожирение</option>
                            </select>
                            </div>

                            <div>
                            <label>Рост *</label>
                            <input type="number" id="height" name="height" min="100" max="250" required>
                            </div>

                            <div style="display:flex;">
                                <div style="display:grid; flex: 40%; margin-right: 10px;" >
                    
                                <div style="display:flex;">
                                <div style="display:grid; flex: 40%; margin-right: 10px;" >
                                <fieldset style='width: 94%' >
                                    <legend><label for="mutation">Мутации *</label></legend>
                                    <div class="align">
                                        <p><input type="radio" id="mutation" name="mutation" value="Есть">Есть</p>
                                        <p><input type="radio" id="mutation" name="mutation" value="Нет" checked>Нет</p>
                                    </div>
                                </fieldset>
                                </div>
                                <div style="display:grid; flex: 40%; margin-left: 10px; margin-right: 10px;">
                                <fieldset style='width: 94%' >
                                    <legend><label for="therapyOk">Привержен терапии *</label></legend>
                                    <div class="align">
                                        <p><input type="radio" id="therapyOk" name="therapyOk" value="Да" checked>Да</p>
                                        <p><input type="radio" id="therapyOk" name="therapyOk" value="Нет">Нет</p>
                                    </div>
                                </fieldset>
                                </div>
                                <div style="display:grid; flex: 40%; margin-left: 10px; ">
                                <fieldset style='width: 93%' >
                                    <legend> <label for="smoking">Курение *</label></legend>
                                    <div class="align">
                                        <p><input type="radio" id="smoking" name="smoking" value="Да">Да</p>
                                        <p><input type="radio" id="smoking" name="smoking" value="Нет" checked>Нет</p>
                                    </div>
                                </fieldset>
                                </div>
                            </div> 
                             <input type="submit" name="submit" value="Внести данные">
                        </div>
                </fieldset>
            </div>
        </form>
    </main>
    <?php include '../footer.php';?>
    <script>
        let form = document.forms.add_patient;
        form.bithDay.onchange = calculate;
        function calculate() {
            let bday = document.getElementById('patientDateOfBirth').value;
            var today = new Date();
            bday = new Date(bday);
            var timeDiff = Math.abs(today.getTime() - bday.getTime());
            var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24)); 
            res = diffDays / 365;
            res = (res - 0.5).toFixed(0);
            document.getElementById('patientAge').value = res;
        }
    </script>
</body>
</html>