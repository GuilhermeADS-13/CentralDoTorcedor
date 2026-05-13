<?php
session_start();

if(!isset($_SESSION['name']))
{
    header("Location: login.php");
    exit();
}

$logado = $_SESSION['name'];

$ligas = [
    "Brasileirão Série A" => 4351,
    "Premier League" => 4328,
    "La Liga" => 4335,
    "Champions League" => 4480
];
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

        <?php 
            echo "<li><u>$logado</u></li>"
        ?>
    </ul>
</nav>

<?php

foreach($ligas as $nomeLiga => $idLiga)
{
    $url = "https://www.thesportsdb.com/api/v1/json/3/eventsseason.php?id=$idLiga&s=2026";

    $response = file_get_contents($url);

    $data = json_decode($response, true);

    echo "<h1>$nomeLiga</h1>";

    echo "<div class='container-jogos'>";

    if(isset($data['events']))
    {
        $contador = 0;

        foreach($data['events'] as $jogo)
        {
            if($contador >= 3)
            {
                break;
            }

            echo "<div class='jogo'>";

            echo "<div class='times'>";
            echo strtoupper($jogo['strHomeTeam']);
            echo " VS ";
            echo strtoupper($jogo['strAwayTeam']);
            echo "</div>";

            echo "<div class='data'>";

            $dataFormatada = date("d/m/Y", strtotime($jogo['dateEvent']));

            echo "📅 " . $dataFormatada;

            echo "<br>";

            echo "⏰ " . $jogo['strTime'];

            echo "</div>";

            echo "</div>";

            $contador++;
        }
    }
    else
    {
    echo "<p style='text-align:center;'>Sem jogos disponíveis</p>";
    }

    echo "</div>";
}

?>

</body>
</html>