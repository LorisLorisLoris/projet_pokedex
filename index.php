<?php

// 1. Afficher tous les pokemons
// 2. Creer la page showPokemon qui affiche un pokemon via son index dans le tableau
// 3. Creer la page addPokemon
// 4. Permettre la suppression d'un pokemon via un lien en GET par l'index
// 4. Creer la page modifier pokemon et rajouter un button modifier

//recuperer les données pokemons en json
$json_data = file_get_contents("pokemons.json");
//decoder le json en tableau
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
    <section class="cards">
        <!-- Afficher -->
        <?php foreach ($pokemons as $i => $pokemon): ?>
            <div class="card">
                <h2><?= $pokemon["name"] ?></h2>
                <a href="showPokemon.php?id=<?= $i ?>">Détails</a>
                <img src="<?= $pokemon["sprite"] ?>">
                <p>ID: <?= $pokemon["id"] ?></p>
                <a href="deletePokemon.php?id=<?= $i ?>" class="delete-link" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce Pokémon ?')">Supprimer</a>
            </div>
        <?php endforeach; ?>
    </section>
</body>
</html>