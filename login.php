<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <a href="home.php">Voltar</a>
    <div class="container">
        <div class="login">
            <form action="testLogin.php" method="POST">
                <h1>Login</h1>
                
                <?php
                    if(isset($_GET['erro']))
                        {
                            echo "<p style='color:red;'>Usuário ou senha incorretos!</p>";
                        }
                ?>

                <input type="text" id="name" name="name" placeholder="Nome">
                <br><br>
                <input type="password" id="password" name="password" placeholder="Senha">
                <br><br>
                <input class="inputSubmit" type="submit" name="submit" value="Entrar">
                <br><br>
                <a href="resetSenha.php">Esqueci a senha</a>
            </form>    
        </div>
    </div>
</body>
</html>