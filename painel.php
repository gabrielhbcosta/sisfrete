<?php
include('conexao.php');
include('seguranca.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PAINEL</title>
    <link rel="stylesheet" href="panel.css">
</head>
<body>
    <h1 class="titulo">
        Bem vindo ao Painel principal, <?php echo $_SESSION['nome']; ?>!
    </h1>
    
    <p class="hidden">
        <?php
        $id = $_SESSION['id_user'];
        $sql = "SELECT * FROM `agenda` WHERE (`agenda`.`id_user` = $id);";
        $result = $mysqli->query($sql);
        $user = $mysqli->query($sql);
        ?>
    </p>
    <hr>
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
            <button class="sair"><a href="sair.php">Sair</a></button>
        </p>
    </div>
</body>
</html>