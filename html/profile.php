
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
$mysqli = ConnectDB();
if (!$res = $mysqli->query("CALL getMeFromLogin('$_SESSION[login]')")) {
    echo "Не удалось вызвать хранимую процедуру: (" . $mysqli->errno . ") " . $mysqli->error;
}
else {
    $row = $res->fetch_assoc();
}
echo "
<div class=\"container\" style=\"min-height: 1000px;\">
<div class=\"elips\">
	<img src=\"img/user.svg\" width=\"189\" height=\"255\" alt=\"icon\" class=\"icon\">
</div>

<p class=\"fio_profil\">ФИО:</p>
<p class=\"fio_profil_F\">$row[last_name]</p>
<p class=\"fio_profil_I\">$row[first_name]</p>
<p class=\"fio_profil_O\">$row[middle_name]</p>

<p class=\"tel_profil\">Телефон:</p>
<p class=\"tel_profil_nom\">$row[phone]</p>

<hr class=\"line_1_profil\">

<p class=\"schet_profil\">Статус:</p>
<p class=\"schet_profil_nom\">$row[name]</p>


<p class=\"balans_profil\">Баланс:</p>
<p class=\"balans_profil_nom\">$row[balance]р.</p>

<hr class=\"line_2_profil\">

<p class=\"adres_profil\">Адрес:</p>
<p class=\"adres_profil_nom\">г. Новороссийск, ул. Ленина, д.44-20</p>

<div class=\"verefikacia_profil\">
	<a class=\"verefikacia_profil_name\" href='https://esia.gosuslugi.ru/idp/rlogin?cc=bp'>Верификация через </a>
		<img src=\"img/gos.jpg\"  alt=\"Госуслуги\" class=\"gos_profil\">
</div>
</div>";



include ("footer.php"); //Подлючение подвала на каждой стр прописывать
include ("bootstrap.php"); // Подключение bootstap на каждой стр такая штука в конце прописывать на каждой стр
echo '

</body>
</html>';