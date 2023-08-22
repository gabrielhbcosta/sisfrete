<?php

    $usuario = "root";
    $senha = "";
    $database = "bd_sistema";
    $host = "localhost";

$mysqli = new mysqli($host, $usuario, $senha, $database);

if($mysqli->error){
    die("Falha ao conectar! ".$mysqli->error);
}
?>