<?php
if(isset($_GET['msg'])){
    echo "<p>" . $_GET['msg'] . "</p>";
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site | GA</title>
</head>
<body>
    <div class="container">
        <h2>Recuperar senha</h2>
        <form action="enviar_token.php" method="post">
            <input type="text" id="email" name="email" placeholder="Digite seu e-mail" required>
            <br><br>
            <button type="submit">Enviar link</button>
        </form>
        <br>
        <a href="login.php">Voltar ao login</a>
    </div>
</body>
</html>