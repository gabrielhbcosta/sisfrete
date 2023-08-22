<?php
include('conexao.php');

if (isset($_GET['id_agendamento'])) {
    $id_agendamento = $_GET['id_agendamento'];

    $sql = "DELETE FROM `agenda` WHERE `id_agenda` = $id_agendamento";

    if ($mysqli->query($sql) === TRUE) {
        echo "Agendamento excluído com sucesso!";
    } else {
        echo "Erro ao excluir o agendamento: " . $mysqli->error;
    }
} else {
    echo "Nenhuma ID de agendamento foi fornecida para exclusão.";
}

header("Location: sala_controle.php");
exit();
?>