<?php
if(isset($_POST['submit']))
{
    include_once('conn.php');

    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $date = $_POST['date'];

    // 🔒 validações básicas
    if(empty($name) || empty($email) || empty($password) || empty($date)){
        die("Preencha todos os campos");
    }

    if(strlen($password) < 6){
        die("A senha deve ter pelo menos 6 caracteres");
    }

    // 🔍 verificar se email já existe
    $check = $conn->prepare("SELECT id FROM usuarios_cad WHERE email = ?");
    $check->bind_param("s", $email);
    $check->execute();
    $check->store_result();

    if($check->num_rows > 0){
        die("Email já cadastrado");
    }

    // 🔐 criptografar senha
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    // 💾 inserir usuário
    $stmt = $conn->prepare("INSERT INTO usuarios_cad(nome, email, senha, data_nasc) VALUES(?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $email, $passwordHash, $date);

    if($stmt->execute()){
        echo "<script>
                alert('Cadastro efetuado com sucesso!');
                window.location.href = 'login.php';
              </script>";
    } else {
        echo "Erro ao cadastrar: " . $stmt->error;
    }
}
?>
