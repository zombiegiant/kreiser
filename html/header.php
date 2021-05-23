<?php
include_once ("config.php");

    echo "<nav class=\"navbar navbar-expand-lg navbar-dark bg-dark\">
  <a class=\"navbar-brand\" href=\"index.php\"><img  style='width: 25px; height: 35px;' src=\"http://80.87.195.174/novros/img/герб1.jpg\"></a>
  <button class=\"navbar-toggler\" type=\"button\" data-toggle=\"collapse\" data-target=\"#navbarNav\" aria-controls=\"navbarNav\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
    <span class=\"navbar-toggler-icon\"></span>
  </button>
  
  

    <ul class=\"navbar-nav\">
      <li class=\"nav-item\">
   
        <a class=\"nav-link\" href=\"index.php\">Главная</a>
      </li>
      <li class=\"nav-item\">
   
        <a class=\"nav-link\" href=\"index.php\">Услуги</a>
      </li>
      <li class=\"nav-item\">
   
        <a class=\"nav-link\" href=\"index.php\">FAQ</a>
      </li>
      
      ";

    if(isset($_SESSION['id'])){
        $mysqli = ConnectDB();
        if (!$res = $mysqli->query("CALL getMeFromLogin('$_SESSION[login]')")) {
            echo "Не удалось вызвать хранимую процедуру: (" . $mysqli->errno . ") " . $mysqli->error;
        } else {
            $row = $res->fetch_assoc();
            $balance = $row['balance'];
        }

        if($_SESSION['status_user_id']==2){
            echo "<li class=\"nav-item\">
      <div class=\"dropdown\">
        <a class=\"nav-link\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\" href=\"#\">Личный кабинет</a>
          <div class=\"dropdown-menu\" aria-labelledby=\"dropdownMenuButton\">
    <a class=\"dropdown-item\" href=\"profile.php\">Профиль</a>
    <a class=\"dropdown-item\" href=\"add_organization.php\">Добавить организацию</a>
    <a class=\"dropdown-item\" href=\"add_product.php\">Добавить услугу</a>
    <a class=\"dropdown-item\" href=\"my_organization.php\">Мои организации</a>
    <a class=\"dropdown-item\" href=\"front_pay.php\">Пополнить баланс</a>
    <a class=\"dropdown-item\" href=\"exit.php\">Выход</a>
    
    
   
  </div>
  </div>
      </li>";
        } else {

            echo "<li class=\"nav-item\">
      <div class=\"dropdown\">
        <a class=\"nav-link\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\" href=\"#\">Личный кабинет</a>
          <div class=\"dropdown-menu\" aria-labelledby=\"dropdownMenuButton\">
    <a class=\"dropdown-item\" href=\"profile.php\">Профиль</a>
       <a class=\"dropdown-item\" href=\"add_card.php\">Добавить nfc устройство</a>
    <a class=\"dropdown-item\" href=\"front_pay.php\">Пополнить баланс</a>
    <a class=\"dropdown-item\" href=\"selProduct.php\">Список операций</a>
    <a class=\"dropdown-item\" href=\"exit.php\">Выход</a>
   
  </div>
  </div>
      </li>";
        }
        echo "<li class=\"nav-item\">
   
        <a class=\"nav-link\" href=\"front_pay.php\">Баланс: $balance р.</a>
      </li>";

        if($_SESSION['status_user_id']!=2) {

            echo "<li class=\"nav-item\">
   
        <a class=\"nav-link\" href=\"#\">Карты: ";

            $mysqli = ConnectDB();
            if (!$res = $mysqli->query("Select * From user_card WHERE user_id=$_SESSION[id]")) {
               // echo "Не удалось вызвать хранимую процедуру: (" . $mysqli->errno . ") " . $mysqli->error;
            } else {
                while ($row = $res->fetch_assoc())
                echo "$row[card]; ";
            }

            echo "</a>
      </li>";
        }
    }
    else {
        echo " <li class=\"nav-item\">
   
        <a class=\"nav-link\" href=\"login_site.php\">Вход</a>
      </li>
       <li class=\"nav-item\">
   
        <a class=\"nav-link\" href=\"register.php\">Регистрация</a>
      </li>";
    }
    echo " 
    </ul>
  </div>
</nav>
";
