<?php
session_start();
include_once('conn.php');

if(!empty($_POST['name']) && !empty($_POST['password']))
{
    $name = $_POST['name'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM usuarios_cad WHERE nome = ?");
    $stmt->bind_param("s", $name);
    $stmt->execute();

    $result = $stmt->get_result();
    if(mysqli_num_rows($result) == 1)
    {
        $user = mysqli_fetch_assoc($result);

        if(password_verify($password, $user['senha']))
        {
            session_regenerate_id(true);
            $_SESSION['name'] = $name;

            header("Location: index.php");
            exit();
        }
        else
        {
            header("Location: login.php?erro=1");
            exit();
        }
    }
    else
    {
        header("Location: login.php?erro=1");
        exit();
    }
}
else
{
    header("Location: login.php");
    exit();
}
?>
