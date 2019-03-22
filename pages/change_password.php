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
    <header>
            <img src="../img/logo.png" alt="ИС 'Регистр больных с патологией СГХС'">
            <h1> Информационная система <br> "Регистр больных с патологией СГХС" </h1>
    </header>
    <form name="add_user" action="../logic/change_password.php" method="POST">   
                <div class="passport login-form" style="margin-top: 25px; margin-bottom: 25px;">
                    <div class="container">
                        <input type="password" id="oldPassword" name="oldPassword" maxlength="100" placeholder="Старый пароль" required>
                        <input type="password" id="newPassword1" name="newPassword1" maxlength="100" placeholder="Новый пароль" required>
                        <input type="password" id="newPassword2" name="newPassword2" maxlength="100" placeholder="Повторите новый пароль" required>
                    </div>
                    <input type="submit" value="Сохранить новый пароль">
                </div>
    </form>
    <?php 
        include 'footer.php';
    ?>
</body>
</html>