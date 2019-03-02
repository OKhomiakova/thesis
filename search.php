<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Поиск</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</head>
<body>
<?php include 'header.php';?>
<div class="form-group">
   <div class="input-group">
      <span class="input-group-addon">Search</span>
      <input type="text" name="search_text" id="search_text" placeholder="Найти пациента..." class="form-control">
      </div>
</div>
<div id="result"></div>
<!-- <div class="wrap">
   <div class="search">
      <input type="text" class="searchTerm" placeholder="Найти пациента...">
      <button type="submit" class="searchButton">
        <i class="fas fa-search"></i>
     </button>
   </div>
</div> -->
<?php include 'footer.php';?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src=""></script>
</body>
</html>