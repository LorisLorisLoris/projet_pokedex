<?php
$json_data = file_get_contents("pokemons.json");
$pokemons = json_decode($json_data, true);
unset($pokemons[$_GET["id"]]);
$json_data = json_encode($pokemons);
file_put_contents("pokemons.json", $json_data);
header("Location: index.php");
?>