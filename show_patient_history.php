<?php
 $host = "localhost";
 $user = "root";
 $password = "";
 $db  = "dbHospital";
 
 $link = mysqli_connect($host, $user, $password, $db);
mysqli_query($link, "set names cp1251");
mysqli_set_charset($link, "utf8");
echo '<h2 style="text-align:center;">Результаты поиска пациента в базе:</h2>';
 $output = '';
 $sql = "SELECT * FROM tblPatient WHERE txtPatientFullName LIKE '%".$_POST["search"]."%'";

 $result = mysqli_query($link, $sql);
 if(mysqli_num_rows($result)>0){;
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
    
        $output .= '
            <tr>
                <td>'.$row["intDiseaseHistoryNumber"].'</td>
                <td><a href="patient_history.php?id='.$row["intPatientId"].'">'.$row["txtPatientFullName"].'</a></td>
                <td>'.$row["txtPatientGender"].'</td>
                <td>'.$row["datBirthday"].'</td>
                <td>'.$row["txtSGHSGroup"].'</td>
                
            </tr>';
    }
    echo $output;


 } else {
    echo "<h4 style='text-align:center;'> К сожалению, по Вашему запросу ничего не было найдено. </h4>";
 }
?>