<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="cad.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CADASTRO</title>
</head>
<body>
    <div class="cad">
    <h1>Realize seu cadastro!</h1>
    <?php
    if(isset($_SESSION['status_cad'])):
    ?>
        <p>Cadastro realizado!</p>
        <p>Logue usando seu nome de usuário e senha!-><a href="index.php"> Acessar</a></p>
    <?php
    endif;
    unset($_SESSION['status_cad']);
    ?>
    <?php
    if(isset($_SESSION['user_existe'])):
    ?>
    <p>Esse usuário ja existe... Faça o login! <a href="index.php">Login</a></p>
    <?php
    endif;
    unset($_SESSION['user_existe']);
    ?>
    <form method="POST" action="cad.php">
        <input type="text" name="nome" placeholder="Nome">
        <input type="password" name="senha" placeholder="Senha">
        <button type="submit">Enviar</button>
    </form>
    </div>
</body>
</html>