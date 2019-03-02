<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Новый пациент</title>
    <link rel="stylesheet" href=".\style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</head>
<body>
    <?php include 'header.php';?>
    <form action="./add_data_result.php" method="POST">
        <fieldset>
            <h2>Выберите пациента:</h2>
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon">Search</span>
                    <input type="text" name="search_text" id="search_text" placeholder="Найти пациента..." class="form-control">
                    </div>
            </div>
            <div id="result"></div>
            <h2>Результаты обследования:</h2>
            <legend>Результаты обследования:</legend>
                <div class="passport">
                    <label for="dateInput">Дата обследования</label>
                    <input type="date" id="dateInput" name="dateInput">
                    <label for="weight">Вес</label>
                    <input type="number" id="weight" name="weight" required>
                    <label for="IMT">ИМТ</label>
                    <input type="number" id="IMT" name="IMT" required>
                    <label for="OHS">OXC</label>
                    <input type="number" id="OHS" name="OHS" required>
                    <label for="LPNP">ЛПНП</label>
                    <input type="number" name="LPNP" id="LPNP" required>
                    <label for="LPVP">ЛПВП</label>
                    <input type="number" name="LPVP" id="LPVP" required>
                    <label for="TG">ТГ</label>
                    <input type="number" id="TG" name="TG" required>
                    <label for="LPa">ЛП(а)</label>
                    <input type="number" id="LPa" name="LPa" required>
                    <label for="AST">АСТ</label>
                    <input type="number" name="AST" id="AST" required>
                    <label for="ALT">АЛТ</label>
                    <input type="number" name="ALT" id="ALT" required>
                    <label for="bilirubin">Билирубин</label>
                    <input type="number" id="bilirubin" name="bilirubin" required>
                    <label for="glucose">Глюкоза</label>
                    <input type="number" id="glucose" name="glucose" required> 
                    <input type="submit" value="Внести данные">
                </div>
        </fieldset>
    </form>
    <?php include 'footer.php';?>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="search.js"></script>
</body>
</html>