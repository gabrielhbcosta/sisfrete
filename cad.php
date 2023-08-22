<?php
session_start();
include('conexao.php');

$nome = mysqli_real_escape_string($mysqli, trim($_POST['nome']));
$senha = mysqli_real_escape_string($mysqli, trim(($_POST['senha'])));

$sql = "SELECT COUNT(*) as total from users where nome = '$usuario';";
$result = mysqli_query($mysqli, $sql);
$row = mysqli_fetch_assoc($result);

if($row['total'] == 1) {
    $_SESSION['user_existe'] = true;
    header("Location: cadastro.php");
    exit;
}

$sql = "INSERT INTO users (nome, senha) VALUES ('$nome', md5('$senha'));";


if($mysqli->query($sql) === TRUE) {
    $_SESSION['status_cad'] = true;
}

$mysqli->close();

header("Location: cadastro.php");
exit;
?>