<?php
    include("conexao.php");

if(isset($_POST['nome']) || isset($_POST['senha'])) {

    if(strlen($_POST['nome']) == 0){
        echo "Preencha o campo com o seu nome de usuario";
    }else if(strlen($_POST['senha']) == 0){
        echo "Preencha a senha";
    }else {

        $nome =$mysqli->real_escape_string($_POST['nome']);
        $senha =$mysqli->real_escape_string($_POST['senha']);

        $sql_cod = "SELECT * FROM `users` WHERE nome = '$nome' and senha = md5('$senha');";
        $sql_query = $mysqli->query($sql_cod) or die("Erro de conexão: " .$mysqli->error);
    
        $qtde = $sql_query->num_rows;

        if($qtde == 1) {
            $user = $sql_query->fetch_assoc();

            if(!isset($_SESSION)) {
                session_start();
            }

            $_SESSION['id_user'] = $user['id_user'];
            $_SESSION['nome'] = $user['nome'];
            $_SESSION['permissao'] = $user['permissao'];

            if($_SESSION['permissao'] == '1') {
                header("Location: sala_controle.php");
            }else if($_SESSION['permissao'] == ''){
                header("Location: painel.php");
            }

        }else {
            echo "E-mail ou senha incorretos";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AGENDAMENTO</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="titulo">
        <h1>Sistema de Agendamento</h1>
    </div>
    <div class="login">
        <h1>Seja bem-vindo!</h1>
        <form method="post" action="">
            <input type="text" name="nome" placeholder="usuario">
            <input type="password" name="senha" placeholder="senha">
            <button type="submit">Entrar</button>
        </form>
    </div>
    <div class="cadastro">
        <form action="" method="post">
            <h2>Não possui uma conta? Acesse nossa tela de cadastro!</h2>
            <a href="cadastro.php" class="href">Cadastre-se aqui</a>
        </form>
    </div>
</body>
</html>