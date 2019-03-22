<?php
    include ('../logic/login.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Вход в систему</title>
</head>
<body>
        <form class="login-form" method="post">
            <h1>Добро пожаловать в ИС </br>"Регистр больных с патологией СГХС"</h1>
            <span>Для продолжения работы Вам необходимо авторизоваться!</span>
            <div class="container">
                <input type="text" name="login" placeholder="Логин"/>
                <input type="password" name="password" placeholder="Пароль"/>
            </div>
            <div style="color:red"><?php if(isset($error)) echo $error; ?></div>
                <label>
                    <input type="checkbox" checked="checked" name="remember" checked> Запомнить меня
                </label>
            <input type="submit" name="submit" value="Вход" style="margin: 10px;">
        </form>
</body>
</html>