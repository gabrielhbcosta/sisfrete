<?php
include('conexao.php');
include('seguranca.php');

$servico = mysqli_real_escape_string($mysqli, trim($_POST['servico']));
$data = mysqli_real_escape_string($mysqli, trim($_POST['dtag']));

$user = $_SESSION['id_user'];

$sql = "SELECT id FROM `servicos` WHERE (`servicos`.`desc_serv` = '$servico')";

$result = $mysqli->query($sql);

$agenda_id = $result->fetch_assoc();
$id = $agenda_id['id'];

$sql2 = "INSERT INTO agenda(desc_agenda, id_user, id_servico) VALUES('$data', '$user', '$id');";

if($mysqli->query($sql2) === TRUE) {
    echo "Agendamento cadastrado com sucesso!";
}

$mysqli->close();

if($_SESSION['permissao'] == '1') {
    header("Location: sala_controle.php");
}else if($_SESSION['permissao'] == ''){
    header("Location: painel.php");
}

exit;
?>