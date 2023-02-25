<?php
$json_data = file_get_contents("pokemons.json");
$pokemons = json_decode($json_data, true);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Pokédex</title>
</head>
<body>
    <h1>Pokédex</h1>
    <div class="cards">
        <?php foreach ($pokemons as $i => $pokemon): ?>
            <div class="card">
                <h2><?= $pokemon["name"] ?></h2>
                <a href="showPokemon.php?id=<?= $i ?>">Détails</a>
                <img src="<?= $pokemon["sprite"] ?>">
                <p>ID: <?= $pokemon["id"] ?></p>
                <a href="deletePokemon.php?id=<?= $i ?>" class="delete-link" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce Pokémon ?')">Supprimer</a>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>