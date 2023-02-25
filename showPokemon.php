<?php
$json_data = file_get_contents("pokemons.json");
$pokemons = json_decode($json_data, true);
$pokemon = $pokemons[$_GET["id"]];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $pokemon["name"] ?></title>
</head>
<body>
<a href="index.php">Retour à la liste</a>
    <h1><?= $pokemon["name"] ?></h1>
    <img src="<?= $pokemon["sprite"] ?>">
    <p># : <?= $pokemon["id"] ?></p>
    <p>HP : <?= $pokemon["stats"]["HP"] ?></p>
    <p>Attaque : <?= $pokemon["stats"]["attack"] ?></p>
    <p>Défense : <?= $pokemon["stats"]["defense"] ?></p>
    <p>Attaque Spé. : <?= $pokemon["stats"]["special_attack"] ?></p>
    <p>Défense Spé. : <?= $pokemon["stats"]["special_defense"] ?></p>
    <p>Vitesse : <?= $pokemon["stats"]["special_defense"] ?></p>
    <ul>
        <?php foreach ($pokemon["apiTypes"] as $type): ?>
            <li><?= $type["name"] ?></li>
            <img src="<?= $type["image"] ?>">
        <?php endforeach; ?>
    </ul>
</body>
</html>