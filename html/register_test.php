
<?php
session_start();

include('config');
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

echo "
<br>
<p class=\"h1 hh\" align=\"center\">Регистрация </p>
<br>

<form method=\"conteiner post\" action=\"register_post.php\" >
  <div class=\"form-group row justify-content-center\" >

    <label for=\"surname\" class=\"col-1 col-form-label\">Фамилия</label>
      <input type=\"text\" class=\"col-2 form-control\" id=\"surname\" name='surname'>
  </div>

  <div class=\"form-group row justify-content-center\">
    <label for=\"name\" class=\"col-1 col-form-label\">Имя</label>
      <input type=\"text\" class=\"col-2 form-control\" id=\"name\" name='name'>
  </div>

  <div class=\"form-group row justify-content-center\">
    <label for=\"patronymic\" class=\"col-1 col-form-label\">Отчество</label>
      <input type=\"text\" class=\"col-2 form-control\" id=\"patronymic\" name='patronymic'>
  </div>

  <div class=\"form-group row justify-content-center\">
    <label for=\"tel\" class=\"col-1 col-form-label\">Номер телефона</label>
      <input type=\"tel\" class=\"col-2 form-control\" id=\"tel\" name='tel'>
  </div>

  <div class=\"form-group row justify-content-center\">
    <label for=\"age\" class=\"col-1 col-form-label\">Возраст</label>
      <input type=\"number\" class=\"col-2 form-control\" id=\"age\" name='age'>
  </div>

  <div class=\"form-group row justify-content-center\">
    <label for=\"gender\" class=\"col-1 col-check-label\">Пол</label>
    <div class=\"col-1\"><label class=\" form-check-label\" for=\"gender_m\">Мужской</label>
        <input type=\"radio\" class=\"col-5 form-check-input\" id=\"gender_m\" value=1 name=\"gender\">
    </div>
    <div class=\"col-1\"><label class=\" form-check-label\" for=\"gender_w\">Женский</label>
        <input type=\"radio\" class=\"col-5 form-check-input\" id=\"gender_w\" value=2 name=\"gender\">
    </div>
  </div>

  <div class=\"form-group row justify-content-center\">
    <label for=\"status\" class=\"col-1 col-form-label\">Статус</label>
   		 <select class=\"col-2 form-select form-control\" required aria-label=\"Статус\" id=\"status\" name='status'>";
      $mysqli = ConnectDB();
 if (!$res = $mysqli->query("Select * From status_user")) {
        echo "Не удалось вызвать хранимую процедуру: (" . $mysqli->errno . ") " . $mysqli->error;
    }

    while($row = $res->fetch_assoc()){
     echo "<option value=\"$row[id]\">$row[name]</option>";
    }




    	echo "</select>
  </div>

  <div class=\"form-group row justify-content-center\">
    <label for=\"login\" class=\"col-1 col-form-label\">Логин</label>
    <input type=\"text\" class=\"col-2 form-control\" id=\"login\" name='login'>
  </div>


  <div class=\"form-group row justify-content-center\">
    <label for=\"password\" class=\"col-1 col-form-label\">Пароль</label>
    <input type=\"password\" class=\"col-2 form-control\" id=\"password\" name='password'>
  </div>

  <br>
  <div class='offset-5'><input class=\" btn btn-primary\" type=\"submit\" value='Зарегистрироваться' name='register'></div>

</form>
	";

echo "	
</body>

</html>";


