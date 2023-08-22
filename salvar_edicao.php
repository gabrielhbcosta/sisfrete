<?php
include('conexao.php');
include('seguranca.php');

    if(isset($_POST['alterar'])) {
        $id = $_POST['id'];
        $servico = $_POST['servico'];
        $data = $_POST['dtag'];

        $sql2 = "SELECT id FROM serv WHERE desc_serv = '$servico';";

        $result2 = $mysqli->query($sql2);

        $id_servico = mysqli_fetch_assoc($result2);

        $sqlAtualiza = "UPDATE `agenda` SET `desc_agenda` = '$data', `id_serv` = '$id_servico[id] WHERE `agenda`.`id_agenda` = $id';";

        $result = $mysqli->query($sqlAtualiza);
    }
    header("Location: sala_controle.php");

?>