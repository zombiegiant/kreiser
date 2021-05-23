
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


<form method=\"post\" action=\"register_post.php\" >
  <div class=\"form-group row justify-content-center\" >

    <label for=\"surname\" class=\"col-2 col-form-label\">Фамилия</label>
    <div class=\"col-3\">
      <input type=\"text\" class=\"form-control\" id=\"surname\" name='surname'>
    </div>
  </div>

  <div class=\"form-group row justify-content-center\">
    <label for=\"name\" class=\"col-2 col-form-label\">Имя</label>
    <div class=\"col-3\">
      <input type=\"text\" class=\"form-control\" id=\"name\" name='name'>
    </div>
  </div>

  <div class=\"form-group row justify-content-center\">
    <label for=\"patronymic\" class=\"col-2 col-form-label\">Отчество</label>
    <div class=\"col-3\">
      <input type=\"text\" class=\"form-control\" id=\"patronymic\" name='patronymic'>
    </div>
  </div>

  <div class=\"form-group row justify-content-center\">
    <label for=\"tel\" class=\"col-2 col-form-label\">Номер телефона</label>
    <div class=\"col-3\">
      <input type=\"tel\" class=\"form-control\" id=\"tel\" name='tel'>
    </div>
  </div>

  <div class=\"form-group row justify-content-center\">
    <label for=\"age\" class=\"col-2 col-form-label\">Возраст</label>
    <div class=\"col-3\">
      <input type=\"number\" class=\"form-control\" id=\"age\" name='age'>
    </div>
  </div>

  <div class=\"form-group row justify-content-center\">
    <label for=\"gender\" class=\"col-2 col-form-label\">Пол</label>
    <div class=\"col-3\" id=\"gender\">
      	<div>
      		<label class=\"form-check-label\" for=\"gender_m\">
      			Мужской
  			</label><br>

      		<label class=\"form-check-label\" for=\"gender_w\">
      			Женский
  			</label>
		</div>

  		<div class=\"radio\">
  			<input type=\"radio\" class=\"form-check-label\" id=\"gender_m\" value=1 name=\"gender\"> <br>
  			<input type=\"radio\" class=\"form-check-input\" id=\"gender_w\" value=2 name=\"gender\"> </div>
    </div>
  </div>

  <div class=\"form-group row justify-content-center\">
    <label for=\"status\" class=\"col-2 col-form-label\">Статус</label>
    <div class=\"col-3\">
   		 <select class=\"form-select form-control\" required aria-label=\"Статус\" id=\"status\" name='status'>";
      $mysqli = ConnectDB();
 if (!$res = $mysqli->query("Select * From status_user")) {
        echo "Не удалось вызвать хранимую процедуру: (" . $mysqli->errno . ") " . $mysqli->error;
    }

    while($row = $res->fetch_assoc()){
     echo "<option value=\"$row[id]\">$row[name]</option>";
    }




    	echo "</select>
	</div>
  </div>

  <div class=\"form-group row justify-content-center\">
    <label for=\"login\" class=\"col-2 col-form-label\">Логин</label>
    <div class=\"col-3\">
      <input type=\"text\" class=\"form-control\" id=\"login\" name='login'>
    </div>
  </div>


  <div class=\"form-group row justify-content-center\">
    <label for=\"password\" class=\"col-2 col-form-label\">Пароль</label>
    <div class=\"col-3\">
      <input type=\"password\" class=\"form-control\" id=\"password\" name='password'>
    </div>
  </div>

  <br>
  <div class=\"send\">
		<input class=\"btn btn-primary  align-self-center \" type=\"submit\" value='Зарегистрироваться' name='register'>
	</div>

  </div>
</form>
	";

echo "	
</body>

</html>";


