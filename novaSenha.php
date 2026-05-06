<?php
include_once('conn.php');

if(!isset($_POST['token']) || !isset($_POST['newpass'])){
    die("Erro: dados não enviados corretamente");
}

$token = $_POST['token'];
$senha = $_POST['newpass'];

$senhaHash = password_hash($senha, PASSWORD_DEFAULT);

$sql = "UPDATE usuarios_cad 
        SET senha='$senhaHash', 
            reset_token=NULL, 
            token_expira=NULL 
        WHERE reset_token='$token'";

if($conn->query($sql))
    {
        echo"<script>
                alert('Senha alterada com sucesso!');
                window.location.href = 'login.php';
            </script>";
    }else
    {
        echo "Erro: " . $conn->error;
    }
?>
