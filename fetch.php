<?php
 $host = "localhost";
 $user = "root";
 $password = "";
 $db  = "dbHospital";
 
 $link = mysqli_connect($host, $user, $password, $db);

 $output = '';
 $sql = "SELECT * FROM tblPatient WHERE txtPatientFullName LIKE '%".$_POST["search"]."%'";
 $result = mysqli_query($link, $sql);
 if(mysqli_num_rows($result)>0){
    $output .= '<h4 aligh="center"> Результаты поиска:</h4>';
    $output .= '<div class="table-responsive">
                    <table class="table bordered"
                        <tr>
                            <th>Номер ИБ</th>
                            <th>ФИО пациента</th>
                            <th>Пол</th>
                            <th>Группа СГХС</th>
                            <th>Дата рождения</th>
                        </tr>';
    while($row = mysqli_fetch_array($result)){
        $output .= '
            <tr>
                <td>'.$row["intDiseaseHistoryNumber"].'</td>
                <td>'.$row["txtPatientFullName"].'</td>
                <td>'.$row["txtPatientGender"].'</td>
                <td>'.$row["txtSGHSGroup"].'</td>
                <td>'.$row["datBirthday"].'</td>
            </tr>';
    }
    echo $output;


 } else {
     echo "К сожалению, по Вашему запросу ничего не было найдено.";
 }
?>