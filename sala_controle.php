<?php
include('conexao.php');
include('seguranca.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data_inicial = $_POST["data_inicial"];
    $data_final = $_POST["data_final"];

    $data_inicial_formatada = date('Y-m-d', strtotime($data_inicial));
    $data_final_formatada = date('Y-m-d', strtotime($data_final));

    $sql = "SELECT * FROM `agenda` WHERE `desc_agenda` BETWEEN ? AND ? ORDER BY `desc_agenda`";
    
    $stmt = $mysqli->prepare($sql);
    
    $stmt->bind_param("ss", $data_inicial_formatada, $data_final_formatada);
    
    $stmt->execute();
    
    $result = $stmt->get_result();
}


if (isset($_GET['id_agendamento']) && is_numeric($_GET['id_agendamento'])) {
    $id_agendamento = $_GET['id_agendamento'];

    echo "Tem certeza de que deseja excluir este agendamento?";
    echo "<a href='apagar.php?id_agendamento=$id_agendamento&confirm=1'>Sim</a>";
    echo "<a href='sala_controle.php'>Não</a>";

    if (isset($_GET['confirm']) && $_GET['confirm'] == 1) {
        $sql = "DELETE FROM `agenda` WHERE `id_agenda` = $id_agendamento";

        if ($mysqli->query($sql) === TRUE) {
            echo "Agendamento excluído com sucesso!";
        } else {
            echo "Erro ao excluir o agendamento: " . $mysqli->error;
        }
        
        header("Location: sala_controle.php");
        exit();
    }
} else {
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SALA DE CONTROLE</title>
    <link rel="stylesheet" href="control.css">
</head>
<body>
    <h1 class="titulo">SALA DE CONTROLE - ADMINISTRAÇÃO</h1>

    <hr>

    <h2 class="subtitle">Bem-vindo a sala de controle, <?php echo $_SESSION['nome']; ?>!</h2>

    <form action="" method="POST">
        <label for="data_inicial">Data Inicial:</label>
        <input type="date" name="data_inicial" required>
        <label for="data_final">Data Final:</label>
        <input type="date" name="data_final" required>
        <input class="filtrar" type="submit" value="Filtrar">
    </form>

    <p>
        <?php
        $sql = "SELECT * FROM agenda WHERE `desc_agenda` BETWEEN ? AND ? ORDER BY `desc_agenda`";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("ss", $data_inicial_formatada, $data_final_formatada);
        $stmt->execute();
        $result = $stmt->get_result();
        ?>
    </p>
    
    <?php
    if (isset($result) && $result->num_rows > 0) {
        echo "<h2 class='titulo'>Relatório de Agendamentos</h2>";
        echo "<table>";
        echo "<tr><th class='titulo-coluna'>ID</th><th class='titulo-coluna'>Data</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr class='tr-itens'>";
            echo "<td>" . $row["id_agenda"] . "</td>";
            echo "<td>" . $row["desc_agenda"] . "</td>";;
            echo "</tr>";
        }
        echo "</table>";
    }
    ?>

    <?php

    $sql = "SELECT * FROM agenda ORDER BY desc_agenda;";

    $result = $mysqli->query($sql);

    $user = $mysqli->query($sql);

    $usuario = $mysqli->query($sql);

    ?>

<form action="editar.php" method="GET">
    <div class="agendamentos">
        <h1>Agendamentos cadastrados</h1>
        <table>
            <thead>
                <tr>
                    <th scope="col" class="titulo-coluna">Selecionar</th>
                    <th scope="col" class="titulo-coluna">Número</th>
                    <th scope="col" class="titulo-coluna">Data</th>
                    <th scope="col" class="titulo-coluna">Descrição</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($agend_data = mysqli_fetch_assoc($result)) {
                    echo "<tr class='tr-itens'>";
                    echo "<td><input type='radio' name='id_agendamento' value='" . $agend_data['id_agenda'] . "'></td>";
                    echo "<td>" . $agend_data['id_agenda'] . "</td>";
                    echo "<td>" . $agend_data['desc_agenda'] . "</td>";

                    if ($user->num_rows > 0) {
                        $user2 = $user->fetch_assoc();
                        $id_servico = $user2['id_servico'];
                        $sql2 = "SELECT * FROM `servicos` WHERE `id` = $id_servico";
                        $result2 = $mysqli->query($sql2);
                        if ($result2->num_rows > 0) {
                            $d_serv = mysqli_fetch_assoc($result2);
                            if($d_serv['desc_serv'] == 1) {
                                echo "<td> SERVIÇO 1 </td>";        
                            }elseif ($d_serv['desc_serv'] == 2) {
                                echo "<td> SERVIÇO 2 </td>";        
                            }else{
                                echo "<td> SERVIÇO 3 </td>";        
                            }
                        } else {
                            echo "<td>Dados de serviço não encontrados</td>";
                        }
                    } else {
                        echo "<td>Dados de usuário não encontrados</td>";
                    }
                    // echo "<td>" . 
                    echo "<td><button type='submit' formaction='apagar.php' class='botao-apagar'>Apagar</button></td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    
    <button type="submit"><p>Editar Agendamento Selecionado</p></button>
</form>

    <button><a href="agenda.php"><p>Cadastrar um novo agendamento</p></a></button>
    <div align="right">
        <p aling="right">
            <button style="background-color: red;"><a style="color: white;" href="sair.php">Sair</a></button>
        </p>
    </div>
</body>
</html>