<?php
    $host = "localhost";
    $user = "root";
    $password = "";
    $db  = "dbHospital";
    
    $link = mysqli_connect($host, $user, $password, $db);
	mysqli_query($link, "set names cp1251");
	mysqli_set_charset($link, "utf8");

    $names = array();
    array_push($names, "Петров Игорь Васильевич", 
    				   	"Петренко Владимир Алексеевич", 
    				   	"Шишкин Антон Владимирович",
    				   	"Анопренко Виктор Тарасович", 
    				   	"Титов Сергей Батькович", 
    				   	"Путин Алексей Дмитриевич");
    $logins = array();
    array_push($logins, "login1", 
    				   	"login2",
    				   	"login3",
    				   	"login4",
    				   	"login5",
    				   	"login6");
    $passes = array();
    array_push($passes, "pass1", 
    				   	"pass2",
    				   	"pass3",
    				   	"pass4",
    				   	"pass5",
    				   	"pass6");

    for($i = 0; $i < 6; $i++) {
    	$login = $logins[$i];
    	$pass = $passes[$i];
    	$name = $names[$i];
    	if($i % 2 == 0) 
    		$admin = "yes";
    	else 
    		$admin = "no";
    	$str = "INSERT INTO tblUser values ('$i', '$login', '$name', '$pass', '$admin')";
    	if (mysqli_query($link, $str) === TRUE) {
    		printf("<p>User #$i added.</p>");
		}
		else {
    		printf("<p>Error occured: %s </p>", mysqli_error($link));
		}
    }
?>        