<?php 
header('Content-Type:' . "text/plain");
$link = mysqli_connect('localhost', 'root', '', 'desafio');
mysqli_query($link,"SET CHARACTER SET utf8");
?>