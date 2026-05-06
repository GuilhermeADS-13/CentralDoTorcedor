<?php 

include_once('conn.php');

if(!isset($_GET['token']))
    {
        die("Token inválido");
    }

    $token = $_GET['token'];

    $sql = "SELECT * FROM usuarios_cad
            WHERE reset_token='$token'
            AND token_expira > NOW()";

    $result = $conn->query($sql);

    if(mysqli_num_rows($result) == 0)
        {
            die("Token inválido ou expirado");
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
        <h2>Digite sua nova senha</h2>
        <div class="newPass">
            <form action="novaSenha.php" method="post">
                <input type="hidden" name="token" value="<?php echo $token; ?>">
                <br><br>
                <input type="password" name="newpass" placeholder="Nova senha" required>
                <br><br>
                <button type="submit">Salvar senha</button>
            </form>
        </div>
    </div>
</body>
</html>