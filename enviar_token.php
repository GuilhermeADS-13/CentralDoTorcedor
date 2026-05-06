<?php
include_once('conn.php');

$email = $_POST['email'];

$sql = "SELECT * FROM usuarios_cad WHERE email = '$email'";
$result = $conn->query($sql);

if(mysqli_num_rows($result) > 0){

    $token = bin2hex(random_bytes(16));
    $expira = date("Y-m-d H:i:s", strtotime("+1 hour"));

    $update = "UPDATE usuarios_cad 
               SET reset_token='$token', token_expira='$expira'
               WHERE email='$email'";

    $conn->query($update);

   $link = "http://localhost/Projeto6mestral/reset.php?token=$token";

    echo "Link gerado com sucesso!<br><br>";
    echo "<a href='$link'>$link</a>";
    exit;

}else{
    header("Location: forgot.php?msg=Email não encontrado");
    exit;
}
?>
