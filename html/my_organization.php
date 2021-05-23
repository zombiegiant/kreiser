
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

echo '<div class="container" style="min-height: 800px;"><br><br>';
echo "<legend>Мои организации</legend><br>";
$mysqli = ConnectDB();
if (!$res = $mysqli->query("Select organization.id as id, organization.name, organization.about, organization.address, organization.phone, type_organization.name as type_organization From organization inner join type_organization on organization.type_organization_id = type_organization.id Where user_id=$_SESSION[id]")) {
    echo "Не удалось вызвать хранимую процедуру: (" . $mysqli->errno . ") " . $mysqli->error;
}
echo '<table class="table table-bordered table-hover table-sm">
        <thead class="thead-light"><tr class="text-center"><th>Организация</th><th>Описание</th><th>Адрес</th><th>Телефон</th><th>Тип</th><th>Услуги</th><th>Совершенные операции</th></tr></thead>
        <tbody>';
while($row = $res->fetch_assoc()) {
    echo '<tr class="text-center">';
    echo "<td>$row[name]</td><td>$row[about]</td><td>$row[address]</td><td>$row[phone]</td><td>$row[type_organization]</td><td><a href='products_organization.php?organization_id=$row[id]'>Услуги</a> </td><td><a href='selOrganization.php?organization_id=$row[id]'>Операции</a> </td>";
    echo '</tr>';
}
echo '</tbody></table>
      </div>';



include ("footer.php"); //Подлючение подвала на каждой стр прописывать
include ("bootstrap.php"); // Подключение bootstap на каждой стр такая штука в конце прописывать на каждой стр
echo '

</body>
</html>';