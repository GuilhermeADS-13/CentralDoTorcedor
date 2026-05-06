<?php
session_start();

if(!isset($_SESSION['name']))
{
    header("Location: login.php");
    exit();
}

$logado = $_SESSION['name'];
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="css/index.css">
</head>
<body>
    <nav class="navbar">
        <h2 class="logo">Site | GA</h2>

            <ul class="menu">
                <li><a href="exit.php">Sair</a></li>
                <li><a href="#">Sobre</a></li>
                <li><a href="#">Serviços</a></li>
                <li><a href="#">Contato</a></li>
            </ul>
    </nav>
    <br>
    <?php 
        echo "<h1>Bem vindo <u>$logado</u></h1>"
    ?>
    <br>
    <h1>Olá, Mundo!</h1>
</body>
</html>