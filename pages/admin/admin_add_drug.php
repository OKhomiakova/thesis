<?php
    include ("../../logic/check_admin.php");
    include ("../../logic/add_data_drug.php");
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Новый препарат</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</head>
<body>
    <?php include '../header.php';?>
    <nav>
        <ul>
            <li class="dropdown"> 
                <a class="dropbtn" href="javascript:void(0)">Пользователи</a>
                <div class="dropdown-content">
                    <a href="admin_add_user.php"><i class="fas fa-user-plus"></i>&nbsp;Добавить</a>
                    <a href="admin_delete_user.php"><i class="fas fa-user-times"></i>&nbsp;Удалить</a>
                </div>
            </li>
            <li class="dropdown active"> 
                    <a class="dropbtn" href="javascript:void(0)">Препараты</a>
                    <div class="dropdown-content">
                        <a href="admin_add_drug.php"><i class="fas fa-plus"></i>&nbsp;Добавить</a>
                        <a href="admin_delete_drug.php"><i class="fas fa-minus"></i>&nbsp;Удалить</a>
                    </div>
            </li>
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
    <form name="add_drug" method="POST">
    <div style='display: flex; justify-content:center;'>
        <fieldset style='width: 80%;' >
            <legend><h2 style="margin: 0;">Новый препарат</h2></legend>
                <div class="passport">

                    <label for="drugName">Название препарата</label>
                    <input type="text" id="drugName" name="drugName" maxlength="100" required>
                    
                    <input type="submit" name="submit" value="Добавить препарат">
                </div>
        </fieldset>
        </div>
    </form>
    <?php include '../footer.php';?>
</body>
</html>