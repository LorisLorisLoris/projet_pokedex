<?php

// 1. Je recupère l'identifiant passé en GET
$id = $_GET["id"];

// 2. Je recupère tout les pokemons
$json_pokemons = file_get_contents("pokemons.json");
$pokemons = json_decode($json_pokemons,true);

// 3. Je crée une référence du pokemon à modifier pour la lisbilité du code.
$pokemon = &$pokemons[$id];


// 4. Si le formulaire est bien soumis
if(isset($_POST["submit"])){
    // Je récupère le nom et pokedexId
    $name = $_POST["name"];
    $pokedexId = $_POST["pokedexId"];

    // Si le nom convient je modifie le pokemon
    if($name != $pokemon["name"]){
        $pokemon["name"] = $name;
    }
    // Si le pokedexId convient je modifie le pokemon
    if($pokedexId != $pokemon["pokedexId"]){
        $pokemon["pokedexId"] = $pokedexId;
    }
    // Si un sprite est renseigné j'enregistre la photo et je modifie le pokemon
    if( isset($_FILES["sprite"]) && $_FILES["sprite"]["size"] > 0  ){
        $from = $_FILES["sprite"]["tmp_name"];
        $newSpritePath = "images/".$_FILES["sprite"]["name"];
        move_uploaded_file($from,$newSpritePath);

        $pokemon["sprite"] = $newSpritePath;
    }

    // 5. J'enregistre les modifications.
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
    <title>Modifier le pokemon</title>
</head>
<body>
    <a href="index.php">Retour accueil.</a>
    <h2>Modifier le pokemon</h2>
    <form action="<?=$_SERVER["PHP_SELF"]?>?id=<?= $id ?>" method="post" enctype="multipart/form-data">
        <label for="name">Name :</label>    
        <input type="text" name="name" id="name" value="<?=$pokemon["name"]?>">

        <label for="pokedexId">PokedexId :</label>    
        <input type="text" name="pokedexId" id="pokedexId" value="<?=$pokemon["pokedexId"]?>">

        <label for="sprite">Sprite :</label> 
        <input type="file" name="sprite" id="sprite">

        <button type="submit" name="submit">Modifier un pokemon</button>
    </form>
</body>
</html>