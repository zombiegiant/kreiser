<?php
const SECRET_KEY = 'eyJ2ZXJzaW9uIjoiUDJQIiwiZGF0YSI6eyJwYXlpbl9tZXJjaGFudF9zaXRlX3VpZCI6Imo2amFiZS0wMCIsInVzZXJfaWQiOiI3OTAwMzc5NDE2MSIsInNlY3JldCI6IjJmNTg0NmEwMTRjNjdjMWNhOTg5OWU1ZmJhMGFjMzJhMWY5ZTExOTNkNjdlODY5MjE2OTMwY2NkMmZiZTVhODMifX0=';
require_once("/var/www/html/novros/config.php");
require_once("/opt/bill-payments-php-sdk/vendor/autoload.php");
$billPayments = new Qiwi\Api\BillPayments(SECRET_KEY);
$publicKey = '48e7qUxn9T7RyYE1MVZswX1FRSbE6iyCj2gCRwwF3Dnh5XrasNTx3BGPiMsyXQFNKQhvukniQG8RTVhYm3iPsTCvehiymuKntXbw5mFjRp8DPvN5sydt4UuYww4YgHKcgChzU7ffpKLMcAR6YManyWpX8fimDxf1nxSNJPJC31BdNrY9X6Cotb4mQazaF';

$mysqli = ConnectDB();

/*if (!$res = $mysqli->query("select id")) {
    echo "Не удалось вызвать хранимую процедуру: (" . $mysqli->errno . ") " . $mysqli->error;
} else {*/
    //echo "Регистрация прошла успешно";
    //mysqli_fetch_assoc($res);

if($_POST['money']<=0) $_POST['money']=9999999;
    $billId = $billPayments->generateId();
    $lifetime = $billPayments->getLifetimeByDay(1);
    $fields = [
        'amount' => $_POST['money'],
        'currency' => 'RUB',
        'comment' => "Пополнение счёта Крейсер пользователя $_SESSION[last_name] $_SESSION[first_name] $_SESSION[middle_name]",
        'expirationDateTime' => $lifetime,
        'email' => 'sanyakop98@yandex.ru',
        'account' => $_SESSION['id']
    ];

    /** @var \Qiwi\Api\BillPayments $billPayments */
    $response = $billPayments->createBill($billId, $fields);
    $_SESSION['billId']=$billId;
    $_SESSION['money']=$response['amount']['value'];
    $payUrl = $billPayments->getPayUrl($response, 'http://80.87.195.174/novros/balanced_get.php');
    //echo "<a href=$payUrl>YOBA</a>";
echo "<script type=\"text/javascript\">

setTimeout('location.replace(\"$payUrl\")',200);

</script>
";
    //print_r($billId);
//}
?>
