<?php

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

echo "
<div class=\"container\" style=\"min-height: 800px;\"><br><br><br><br>
<p class=\"h1 hh\" align=\"center\">Вход </p><br><br>

<form method=\"post\" action=\"login_site_post.php\" >

  <div class=\"form-group row justify-content-center\">
    <label for=\"login\" class=\"col-2 col-form-label\">Логин</label>
    <div class=\"col-3\">
      <input type=\"text\" class=\"form-control\" id=\"login\" name='login'>
    </div>
  </div>


  <div class=\"form-group row justify-content-center\">
    <label for=\"password\" class=\"col-2 col-form-label\">Пароль</label>
    <div class=\"col-3\">
      <input type=\"password\" class=\"form-control\" name=password id=\"password\">
    </div>
  </div>

  <br>
  <div class=\"send\">
		<input class=\"btn btn-primary  align-self-center \" type=\"submit\" value='Вход' name='login_site'>
	</div>

</form>	
<br><br>
<div class='row justify-content-center'>
<div class='col-auto'><a href='https://vk.com/'><img class='img-fluid' width='80' height='80' src='https://avatars.mds.yandex.net/get-pdb/1515151/e17390c4-4015-41e0-9062-ae9de232ccbc/s1200'></a></div>
<div class='col-auto'><a href='https://ok.ru/'><img class='img-fluid' width='60' height='60' src='https://smmmarket24.ru/wp-content/uploads/2021/01/odnoklassniki.png'></a></div>
<div class='col-auto'><a href='https://www.instagram.com/'><img class='img-fluid' width='90' height='90' src='https://i.pinimg.com/originals/63/ea/5a/63ea5acc128f6687e37c74970eb42838.jpg'></a></div>
<div class='col-auto'><a href='https://www.youtube.com/'><img class='img-fluid' width='80' height='80' src='https://conversion-system.ru/wp-content/uploads/2020/10/youtube_icono-1280x902.png'></a></div>
</div>
<p class='text-center'>Авторизация через социальные сети</p>
</div>
";



include ("footer.php"); //Подлючение подвала на каждой стр прописывать
include ("bootstrap.php"); // Подключение bootstap на каждой стр такая штука в конце прописывать на каждой стр
echo '

</body>
</html>';