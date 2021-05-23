<?php

const SECRET_KEY = 'eyJ2ZXJzaW9uIjoiUDJQIiwiZGF0YSI6eyJwYXlpbl9tZXJjaGFudF9zaXRlX3VpZCI6Imo2amFiZS0wMCIsInVzZXJfaWQiOiI3OTAwMzc5NDE2MSIsInNlY3JldCI6IjJmNTg0NmEwMTRjNjdjMWNhOTg5OWU1ZmJhMGFjMzJhMWY5ZTExOTNkNjdlODY5MjE2OTMwY2NkMmZiZTVhODMifX0=';
require_once("/tmp/bill-payments-php-sdk/vendor/autoload.php");
$billPayments = new Qiwi\Api\BillPayments(SECRET_KEY);
$publicKey = '48e7qUxn9T7RyYE1MVZswX1FRSbE6iyCj2gCRwwF3Dnh5XrasNTx3BGPiMsyXQFNKQhvukniQG8RTVhYm3iPsTCvehiymuKntXbw5mFjRp8DPvN5sydt4UuYww4YgHKcgChzU7ffpKLMcAR6YManyWpX8fimDxf1nxSNJPJC31BdNrY9X6Cotb4mQazaF';

$billId = 'f0a7a805-72ee-4808-9e7f-1a251637b5f5';

/** @var \Qiwi\Api\BillPayments $billPayments */
$response = $billPayments->getBillInfo($billId);

print_r($response);

?>
