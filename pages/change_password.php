<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Смена пароля</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</head>
<body>
    <?php 
        include 'header.php';
    ?>
    <nav>
        <ul>
            <li class="dropdown"> 
                <a class="active dropbtn" href="javascript:void(0)">Пользователи</a>
                <div class="dropdown-content">
                    <a href="admin_add_user.php"><i class="fas fa-user-plus"></i>&nbsp;Добавить</a>
                    <a href="admin_delete_user.php"><i class="fas fa-user-times"></i>&nbsp;Удалить</a>
                </div>
            </li>
            <li class="dropdown"> 
                    <a class="dropbtn" href="javascript:void(0)">Препараты</a>
                    <div class="dropdown-content">
                        <a href="admin_add_drug.php"><i class="fas fa-plus"></i>&nbsp;Добавить</a>
                        <a href="admin_delete_drug.php"><i class="fas fa-minus"></i>&nbsp;Удалить</a>
                    </div>
            </li>
            <li class="dropdown" style="float: right;"> 
                    <a class="dropbtn" href="javascript:void(0)">Username</a>
                    <div class="dropdown-content">
                        <a href="change_password.php"><i class="fas fa-key"></i>&nbsp;Сменить пароль</a>
                        <a href=""><i class="fas fa-sign-out-alt"></i>&nbsp;Выйти</a>
                    </div>
            </li>
        </ul>  
    </nav>
    <form name="add_user" action="./add_data_user.php" method="POST">
    <div style='display: flex; justify-content:center;'>
        <fieldset style='width: 80%;' >
            <legend><h2 style="margin: 0;">Смена пароля</h2></legend>
                <div class="passport">

                    <label for="oldPassword">Старый пароль</label>
                    <input type="password" id="oldPassword" name="oldPassword" maxlength="100" required>

                    <label for="newPassword1">Новый пароль</label>
                    <input type="password" id="newPassword1" name="newPassword1" maxlength="100" required>

                    <label for="newPassword2">Повторить новый пароль</label>
                    <input type="password" id="newPassword2" name="newPassword2" maxlength="100" required>

                    <input type="submit" value="Сохранить новый пароль">
                </div>
        </fieldset>
        </div>
    </form>
    <?php 
        include 'footer.php';
    ?>
</body>
</html>