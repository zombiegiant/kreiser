
<?php
session_start();

include_once('config.php');
echo '<!doctype html>
<html lang="ru">
  <head>';
echo "<title>Крейсер</title>
	<meta http-equiv=\"content-type\" content=\"text/html;charset=utf-8\" />
    <link rel=\"shortcut icon\" href = \"http://80.87.195.174/novros/img/герб1.jpg\" type = \"image/jpg\">
	<link rel=\"stylesheet\" href=\"css2.css\">
	<link rel=\"stylesheet\" href=\"bootstrap-4.5.0-dist/css/bootstrap.min.css\">";

echo " 
       <script src=\"https://code.jquery.com/jquery-latest.js\"></script>
";
echo ' </head>
  <body">';
include ("header.php"); //На каждой стр прописывать, так здесь подключаются конфиги с константами и функциями, запуск сессии

echo "<div class=\"gl\">
		<div class=\"gl_fon\"></div>
		<p class=\"gl_text\">Единая карта жителя и гостя города Новороссийск “Крейсер”</p>
	</div>

	<div class=\"gl_body\">
		<div class=\"gl_body_blok\">
			<p class=\"gl_body_text\">Достоинства “Крейсер”</p>

			<img src=\"img/Coin.png\" width=\"245\" height=\"245\" alt=\"icon\" class=\"gl_icon_coin\">
			<p class=\"gl_icon_text_coin\">Покупай в один клик!</p>

			<img src=\"img/Family.png\" alt=\"icon\" class=\"gl_icon_Family\">
			<p class=\"gl_icon_text_Family\">Приглашай и зарабатывай!</p>

			<img src=\"img/Hands.png\" alt=\"icon\" class=\"gl_icon_Hands\">
			<img src=\"img/Hands - Creditcard.png\" alt=\"icon\" class=\"gl_icon_Hands1\">
			<p class=\"gl_icon_text_Hands\">Используй любое <br>NFC устройство!</p>

			<img src=\"img/Hands - Phone.png\" alt=\"icon\" class=\"gl_icon_Hands2\">
			<p class=\"gl_icon_text_Hands2\">Применяй как пропуск!</p>

			<img src=\"img/Humaaans - Wireframe.png\" alt=\"icon\" class=\"gl_icon_Humaaans\">
			<p class=\"gl_icon_text_Humaaans\">Получай индивидуальные <br>бонусы</p>
		</div>
	<!-- ------------- -->
<p class=\"service\"> Услуги</p>
	<div class=\"service_card_food\">
			<img src=\"img/food.png\" width=\"400\" height=\"400\" alt=\"icon\" class=\"service_icon\">
			<div class=\"service_heading_food\">
				<p class=\"service_food_header\"> Еда и напитки</p>

				<p class=\"service_food_text\"> Здесь вы можете забронировать столик и оплатить заказ онлайн. А так же заказать доставку блюд на дом.</p>

				<a href=\"1.html\" class=\"service_food_next\">Подробнее 🡢</a>
			</div>

	</div>

	<div class=\"service_card_concert\">
			<img src=\"img/concert.jpg\" width=\"400\" height=\"400\" alt=\"icon\" class=\"service_icon\">
			<div class=\"service_heading_food\">
				<p class=\"service_food_header\"> Мероприятия</p>

				<p class=\"service_food_text\"> Здесь вы можите забронировать место на концерт, спектакль, кино и т.д. Так же вы можете узнать расписание мероприятий.</p>

				<a href=\"1.html\" class=\"service_food_next\">Подробнее 🡢</a>
			</div>

	</div>

	<div class=\"service_card_museums\">
			<img src=\"img/музей.jpg\" width=\"400\" height=\"400\" alt=\"icon\" class=\"service_icon\">
			<div class=\"service_heading_food\">
				<p class=\"service_food_header\"> Достопримечательности</p>

				<p class=\"service_food_text\"> Здесь вы можете узнать об актуальных и интересных выставках, увидеть объекты исторчического наследия и т.д. Так же здесь вы можете приобрести билеты.</p>

				<a href=\"1.html\" class=\"service_food_next\">Подробнее 🡢</a>
			</div>

	</div>

	<div class=\"service_card_rental_services\">
			<img src=\"img/bike.jpg\" width=\"400\" height=\"400\" alt=\"icon\" class=\"service_icon\">
			<div class=\"service_heading_food\">
				<p class=\"service_food_header\"> Прокат оборудования</p>

				<p class=\"service_food_text\"> Здесь вы можете узнать расположение точек выдачи оборудования, а так же взять на прокат скутеры, велосипеды, самокаты и т.д. Так же можете отследить расположение взятого в прокат инвентаря.</p>

				<a href=\"1.html\" class=\"service_food_next\">Подробнее 🡢</a>
			</div>

	</div>

	<div class=\"service_card_public_transport\">
			<img src=\"img/bus.svg\" width=\"400\" height=\"400\" alt=\"icon\" class=\"service_icon\">
			<div class=\"service_heading_food\">
				<p class=\"service_food_header\"> Общественный транспорт</p>

				<p class=\"service_food_text\"> Здесь вы можете узнать расположение остановок и расписание общественного транспорта.</p>

				<a href=\"1.html\" class=\"service_food_next\">Подробнее 🡢</a>
			</div>

	</div>





	</div>";



include ("footer.php"); //Подлючение подвала на каждой стр прописывать
include ("bootstrap.php"); // Подключение bootstap на каждой стр такая штука в конце прописывать на каждой стр
echo '

</body>
</html>';