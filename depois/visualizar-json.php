<?php
header('Content-Type:' . "application/json");
$url="http://localhost/desafio/dados.php";
$json=file_get_contents($url);
$data=json_decode($json);


print_r($data);
?>