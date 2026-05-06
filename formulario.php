<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuário</title>
    <link rel="stylesheet" href="css/formulario.css">
</head>
<body>
    <a href="home.php">Voltar</a>
    <div class="container">
        <form action="form-cad.php" method="POST">
            <fieldset>
                <legend><b>Formulário de clientes</b></legend>
                <br>
                <div class="inBox">
                    <input type="text" id="name" name="name" class="inputUser" required>
                    <label for="name" class="labelIn">Nome do usuário</label>
                </div>
                <br><br>
                <div class="inBox">
                    <input type="text" id="email" name="email" class="inputUser" required>
                    <label for="email" class="labelIn">Email</label>
                </div>
                <br><br>
                <div class="inBox">
                    <input type="password" id="password" name="password" class="inputUser" required>
                    <label for="password" class="labelIn">Senha</label>
                </div>
                <br><br>
                
                <label for="date" id="date">Data de nascimento</label>
                <input type="date" id="date" name="date" required>

                <br><br>

                <input type="submit" id="submit" name="submit">
                
            </fieldset>    
        </form>
    </div>
</body>
</html>