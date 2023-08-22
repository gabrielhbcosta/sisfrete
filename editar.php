<?php
include('conexao.php');
include('seguranca.php');


include('conexao.php');
include('seguranca.php');

if (isset($_GET['id_agendamento'])) {
    $id_agendamento = $_GET['id_agendamento'];

    $sql = "SELECT `desc_agenda` FROM `agenda` WHERE `id_agenda` = $id_agendamento";
    $result = $mysqli->query($sql);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $data_agendada = strtotime($row['desc_agenda']);
        $data_atual = time();

        $diferenca_em_segundos = $data_agendada - $data_atual;
        $limite_em_segundos = 24 * 60 * 60;         
        if ($diferenca_em_segundos <= $limite_em_segundos) {
            //echo "Você só pode editar agendamentos até 24 horas antes da data e hora agendada.";
        } else {
            if (isset($_POST['descricao']) && isset($_POST['dtag']) && isset($_POST['servico'])) {
                $nova_descricao = $_POST['descricao'];
                $nova_data = $_POST['dtag'];
                $novo_servico = $_POST['servico'];


                echo "Agendamento atualizado com sucesso!";
            }
        }
    } else {
        echo "Agendamento não encontrado.";
    }
} else {
    //echo "Nenhum ID de agendamento foi fornecido.";
}

if (isset($_SESSION['nome'])) {
    $nome_usuario = $_SESSION['nome'];
} else {
    $nome_usuario = "Nome de Usuário não encontrado";
}

if (isset($_GET['id_agendamento'])) {
    $id_agendamento = $_GET['id_agendamento'];

    if (isset($_POST['descricao']) && isset($_POST['dtag']) && isset($_POST['servico'])) {
        $nova_descricao = $_POST['descricao'];
        $nova_data = $_POST['dtag'];
        $novo_servico = $_POST['servico'];

        $mysqli->begin_transaction();

        $sql_agenda = "UPDATE `agenda` SET `desc_serv_fk` = '$nova_descricao', `desc_agenda` = '$nova_data', `id_servico` = '$novo_servico' WHERE `id_agenda` = $id_agendamento";

        $sql_servicos = "UPDATE `servicos` SET `desc_serv` = '$novo_servico' WHERE `id` = (SELECT `id_servico` FROM `agenda` WHERE `id_agenda` = $id_agendamento)";

        if ($mysqli->query($sql_agenda) === TRUE) {
            if ($mysqli->query($sql_servicos) === TRUE) {
                $mysqli->commit();
                echo "Agendamento e serviço atualizados com sucesso!";
            } else {
                $mysqli->rollback();
                echo "Erro ao atualizar o serviço: " . $mysqli->error;
            }
        } else {
            $mysqli->rollback();
            echo "Erro ao atualizar o agendamento: " . $mysqli->error;
        }
        $mysqli->close();
    }
} else {
    //echo "Nenhum ID de agendamento foi fornecido.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Agendamento</title>
    <link rel="stylesheet" href="edit.css">
</head>
<body>
    <h1 class="titulo">Editar Agendamento</h1>
    
    <form action="" method="POST">
        <label for="descricao">Nova Descrição do Agendamento:</label>
        <input type="text" name="descricao" id="descricao" required>
        
        <label for="dtag">Nova Data do Agendamento:</label>
        <input type="datetime-local" name="dtag" id="dtag" required>
        
        <label for="servico">Novo Tipo de Serviço:</label>
        <div>
            <input type="radio" id="serv1" name="servico" value="1" required>
            <label for="serv1">SERVIÇO 1</label>
        </div>
        
        <div>
            <input type="radio" id="serv2" name="servico" value="2" required>
            <label for="serv2">SERVIÇO 2</label>
        </div>

        <div>
            <input type="radio" id="serv3" name="servico" value="3" required>
            <label for="serv3">SERVIÇO 3</label>
        </div>
        
        <input type="submit" value="Salvar">
    </form>
    
    <button type="submit">
    <?php
    if ($_SESSION['permissao'] == '1') {
        echo '<a href="sala_controle.php">Retornar à Sala de Controle</a>';
    } else {
        echo '<a href="painel.php">Retornar ao Painel</a>';
    }
    ?>
</button>
</body>
</html>
