<?php

$id = $_GET["id"];

// Je recupere mon pokemon par son Index
$json_pokemons = file_get_contents("pokemons.json");
$pokemons = json_decode($json_pokemons,true);
$pokemon = $pokemons[$id];

?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokedex</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <a href="index.php">Retour accueil.</a>
    <div class="grid-element">
        <h2> <?= $pokemon["name"]?> </h2>
        <p>Pokedex Id : <?= $pokemon["pokedexId"]?></p>
        <img src="<?= $pokemon["sprite"]?>" alt="<?= $pokemon["name"]?>">
    </div>
</body>
</html>