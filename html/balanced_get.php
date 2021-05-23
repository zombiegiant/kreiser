
<?php
require_once ('/var/www/html/novros/config.php');
const SECRET_KEY = 'eyJ2ZXJzaW9uIjoiUDJQIiwiZGF0YSI6eyJwYXlpbl9tZXJjaGFudF9zaXRlX3VpZCI6Imo2amFiZS0wMCIsInVzZXJfaWQiOiI3OTAwMzc5NDE2MSIsInNlY3JldCI6IjJmNTg0NmEwMTRjNjdjMWNhOTg5OWU1ZmJhMGFjMzJhMWY5ZTExOTNkNjdlODY5MjE2OTMwY2NkMmZiZTVhODMifX0=';
require_once("/tmp/bill-payments-php-sdk/vendor/autoload.php");
$billPayments = new Qiwi\Api\BillPayments(SECRET_KEY);
$publicKey = '48e7qUxn9T7RyYE1MVZswX1FRSbE6iyCj2gCRwwF3Dnh5XrasNTx3BGPiMsyXQFNKQhvukniQG8RTVhYm3iPsTCvehiymuKntXbw5mFjRp8DPvN5sydt4UuYww4YgHKcgChzU7ffpKLMcAR6YManyWpX8fimDxf1nxSNJPJC31BdNrY9X6Cotb4mQazaF';

$billId = $_SESSION['billId'];

/** @var \Qiwi\Api\BillPayments $billPayments */
$response = $billPayments->getBillInfo($billId);


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

echo '<div class="container" style="min-height: 800px;">';
if($response['status']['value']==='PAID'){
    $mysqli = ConnectDB();

    if (!$res = $mysqli->query("Update user set balance = balance + $_SESSION[money] WHERE user.id=$_SESSION[id]")) {
        echo "Не удалось вызвать хранимую процедуру: (" . $mysqli->errno . ") " . $mysqli->error;
    } else {
        echo "<br><br><br><br><br><legend align='center'>Баланс успешно пополнен на $_SESSION[money] р.</legend><br>
<div class='row justify-content-center'><div class='col-md-4 offset-md-3'> <img src='https://support.songtradr.com/hc/article_attachments/115010619108/tick.png' style='height: 100px; width: 100px;'></div>
</div> ";

    }
}




echo '</div>';

echo "<script type=\"text/javascript\">

setTimeout('location.replace(\"http://80.87.195.174/novros/\")',1500);

</script>
";

include ("footer.php"); //Подлючение подвала на каждой стр прописывать
include ("bootstrap.php"); // Подключение bootstap на каждой стр такая штука в конце прописывать на каждой стр
echo '

</body>
</html>';


//print_r($response);


