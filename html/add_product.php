
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

echo '
<div class="container" style="min-height: 900px;">
<p class="dob">Добавление услуги</p>

<div class="elips_dob">
    <img src="img/user.svg" width="189" height="255" alt="icon" class="icon_dob">
</div>

<form method="post" action="add_product_post.php" >
    <button class="btn btn-outline-dark dob_foto  ">Добавить фото</button>

    <input type="submit" class="btn btn-outline-dark btn-lg dob_dob" value="Добавить" name="add_product">

    <hr class="line_1_dob">

    <div class="form-group">
        <p class="dob_name"> Выберите организацию:</p>

        <select class="form-select form-control dob_name_name" required aria-label="Статус" name="organization_id">';
  $mysqli = ConnectDB();


    if (!$res = $mysqli->query("Select * From organization WHERE user_id=$_SESSION[id]")) {
        echo "Не удалось вызвать хранимую процедуру: (" . $mysqli->errno . ") " . $mysqli->error;
    }
    while ($row=$res->fetch_assoc()){
        echo "<option value=\"$row[id]\">$row[name]</option>";
    }

    	echo '</select>

    </div>


    <div class="form-group ">

        <p class="dob_type"> Название услуги:</p>
        <input type="text" class="form-control dob_name_name" name="name">


    </div>

    <p class="dob_type"> Установить цены на услугу :</p><br>
    <div class="form-group">
        <p class="dob_type"> Для туриста:</p>

        <input type="number" class="form-control dob_name_name" name="price_1">

    </div>

    <div class="form-group">
        <p class="dob_type"> Для жителя:</p>

        <input type="number" class="form-control dob_name_name" name="price_3">

    </div>

    <div class="form-group">
        <p class="dob_type"> Для малоимущих:</p>

        <input type="number" class="form-control dob_name_name" name="price_4">

    </div>

    </div>

    <br>


</form>	
</div>';



include ("footer.php"); //Подлючение подвала на каждой стр прописывать
include ("bootstrap.php"); // Подключение bootstap на каждой стр такая штука в конце прописывать на каждой стр
echo '

</body>
</html>';

