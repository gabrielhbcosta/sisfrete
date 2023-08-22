<?php

if(!isset($_SESSION)) {
    session_start();
}

if(!isset($_SESSION['id_user'])) {
    die("É preciso estar logado para acessar a página.<p><a href=\"index.php\">Entrar</a></p>");
}
?>