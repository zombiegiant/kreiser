
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
<p class="dob">Добавление организации</p>

<div class="elips_dob">
	<img src="img/user.svg" width="189" height="255" alt="icon" class="icon_dob">
</div>

<form method="post" action="add_organization_post.php" >
	<button class="btn btn-outline-dark dob_foto  ">Добавить фото</button>

	

	<hr class="line_1_dob">

	<div class="form-group">
   		<p class="dob_name"> Название организации:</p>
    
     	 <input type="text" class="form-control dob_name_name" name="name">
   
 	 </div>


  	<div class="form-group ">

    	<p class="dob_type"> Тип деятельности:</p>
      	<select class="form-select form-control dob_name_name" required aria-label="Статус" name="type_organization_id">';
  $mysqli = ConnectDB();


    if (!$res = $mysqli->query("Select * From type_organization")) {
        echo "Не удалось вызвать хранимую процедуру: (" . $mysqli->errno . ") " . $mysqli->error;
    }
    while ($row=$res->fetch_assoc()){
        echo "<option value=\"$row[id]\">$row[name]</option>";
    }

    	echo '</select>
    	
 	 </div>

 	   <div class="form-group ">

    		<p class="dob_type"> Описание:</p>
			<div class="form-floating">
 				 <textarea class="form-control dob_name_name" placeholder="Описание" id="fdob_op" style="height: 100px" name="about"></textarea>
  				<!-- <label for="dob_op">Comments</label> -->
			</div>
		</div>

		<div class="form-group">
   			<p class="dob_type"> Адрес:</p>
    
   		  	 <input type="text" class="form-control dob_name_name" name="address">
   
 		</div>

		<div class="form-group">
   			<p class="dob_type"> Телефон:</p>
    
   		  	 <input type="number" class="form-control dob_name_name" name="phone">
   
 		</div>
<button class="btn btn-outline-dark btn-lg dob_dob" name="add_organization">Добавить</button>
    	
 	</div>

  <br>


</form>
</div>	';



include ("footer.php"); //Подлючение подвала на каждой стр прописывать
include ("bootstrap.php"); // Подключение bootstap на каждой стр такая штука в конце прописывать на каждой стр
echo '

</body>
</html>';