<?php
    // Je recupère les pokemons en JSON
    $json_pokemons = file_get_contents("pokemons.json");
    // Je decode le JSON en véritable tableau de pokemons
    $pokemons = json_decode($json_pokemons,true);

    if(isset($_GET["id"])){
        $id = $_GET["id"];
        // Supprimer le pokemon
        unset($pokemons[$id]);
        // Enregistrer les changements dans la BDD JSON
        $json_pokemons = json_encode($pokemons);
        file_put_contents("pokemons.json",$json_pokemons);
    }
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
    <div class="button"><a href="addPokemon.php">Ajouter un pokemon</a></div>
    <section class="cards">
        <?php  foreach($pokemons as $index=>$pokemon): ?>
            <div class="card">
                <h2><a href="detailPokemon.php?id=<?=$index?>"> <?= $pokemon["name"]?> </a></h2>
                <p>Pokedex Id : <?= $pokemon["pokedexId"]?></p>
                <img src="<?= $pokemon["sprite"]?>" alt="<?= $pokemon["name"]?>">

                <p> <a href="index.php?id=<?= $index ?>">Supprimer</a> </p>
                <p> <a href="updatePokemon.php?id=<?= $index ?>">Modifier</a> </p>

            </div>
        <?php endforeach;?>
    </section>
</body>
</html>