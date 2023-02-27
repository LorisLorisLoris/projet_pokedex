<?php
    $isCreated = false;
    if(isset($_FILES["sprite"]) && isset($_POST["name"]) && isset($_POST["pokedexId"])){
        //Ajout d'un photo
        $from = $_FILES["sprite"]["tmp_name"];
        $to = "images/".$_FILES["sprite"]["name"];
        move_uploaded_file($from,$to);

        // Récupération des pokemons depuis le JSON
        $json_pokemons = file_get_contents("pokemons.json");
        $pokemons = json_decode($json_pokemons,true);

        // Création d'un pokemon
        $pokemon = [
            "name" => $_POST["name"],
            "pokedexId"=>$_POST["pokedexId"],
            "sprite"=>$to
        ];

        // Ajout d'un pokemon au tableau de pokemons
        $pokemons[] = $pokemon;

        // Enregistrements des pokemons dans le JSON
        $json_pokemons = json_encode($pokemons);
        file_put_contents("pokemons.json",$json_pokemons);
        $isCreated = true;
    }
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un pokemon</title>
</head>
<body>
    <h2>Ajouter un pokemon</h2>
    <a href="index.php">Retour accueil.</a>
    <form action="<?=$_SERVER["PHP_SELF"]?>" method="post" enctype="multipart/form-data">
        <label for="name">Name :</label>    
        <input type="text" name="name" id="name">

        <label for="pokedexId">PokedexId :</label>    
        <input type="text" name="pokedexId" id="pokedexId">

        <label for="sprite">Sprite :</label> 
        <input type="file" name="sprite" id="sprite">

        <button type="submit">Ajouter un pokemon</button>
    </form>
    <p><?= $isCreated ?"Le pokemon est crée !":""?></p>
</body>
</html>