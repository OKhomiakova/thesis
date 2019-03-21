<?php
    if(!isset($_GET["id"])) {
        $output = "";
        $output .= '
        <div class="form-group">
            <div class="input-group" style="display:flex; justify-content: center;">
                <input type="text" name="search_text" id="search_text" placeholder="Введите фамилию пациента.." class="form-control" autofocus>
            </div>
        </div>
        <div id="result"></div>';
        echo $output;
    } else {
        $id = $_GET["id"];
        $host = "localhost";
        $user = "root";
        $password = "";
        $db  = "dbHospital";
        
        $link = mysqli_connect($host, $user, $password, $db);
        mysqli_query($link, "set names cp1251");
        mysqli_set_charset($link, "utf8");
       
        $output = '';
        $sql = "SELECT * FROM tblPatient WHERE intPatientId=".$id."";
        $result = mysqli_query($link, $sql);

        $p_height = 0;
        if(mysqli_num_rows($result)>0){
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
                $p_height = $row["intHeight"];
                $output .= '
                    <tr>
                        <td>'.$row["intDiseaseHistoryNumber"].'</td>
                        <td>'.$row["txtPatientFullName"].'</a></td>
                        <td>'.$row["txtPatientGender"].'</td>
                        <td>'.$row["datBirthday"].'</td>
                        <td>'.$row["txtSGHSGroup"].'</td>
                    </tr>';
            }
        }
        $output .= '</table>';
        
        $output .= '<input id="height" name="height" type="hidden" value="';
        $output .= $p_height;
        $output .= '"/>';
        $output .= '</div>';
        echo $output;
    }
?>