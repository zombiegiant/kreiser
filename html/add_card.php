
<?php
session_start();

include_once('config.php');
echo '<!doctype html>
<html lang="ru">
  <head>';
include ('meta.php');

echo " 
       <script src=\"https://code.jquery.com/jquery-latest.js\"></script>
";
echo ' </head>
  <body">';
include ("header.php"); //На каждой стр прописывать, так здесь подключаются конфиги с константами и функциями, запуск сессии

echo '<div class="container" style="min-height: 800px;">
<br><br>
<legend align="center">Добавить NFC устройство</legend><br>
<div class="row">
<div class="col-md-4 offset-md-4">    
<form method="post" action="add_card_post.php">
        <input type="number" class="form-control" name="card" required placeholder="Идентификатор метки"><br>
        <input type="submit" class="btn btn-primary" value="Добавить устройство">
    
</form>
</div> 
</div>


        
        
      </div>';



include ("footer.php"); //Подлючение подвала на каждой стр прописывать
include ("bootstrap.php"); // Подключение bootstap на каждой стр такая штука в конце прописывать на каждой стр
echo '

</body>
</html>';