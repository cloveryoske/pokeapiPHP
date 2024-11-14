<?php
function existeURL($url){
    if(!fopen($url,"r")){
        header("Location: buscar.php");
        exit();
    }
}
function pokemonMoves($str, $gen){
    str_contains($str, $gen);
    echo $str;
}
$id = $_POST["pokemonID"] ?? null;
strtolower($id);
$url = "https://pokeapi.co/api/v2/pokemon/{$id}/";
existeURL($url);
$contenido = file_get_contents($url);
$contenido = json_decode($contenido, true);
$idPokemon = $contenido["id"];

$urldesc = "https://pokeapi.co/api/v2/pokemon-species/$idPokemon";
existeURL($urldesc);
$contenidodesc = file_get_contents($urldesc);
$contenidodesc = json_decode($contenidodesc, true);
$desc = $contenidodesc["flavor_text_entries"];
$sprites = $contenido["sprites"]["versions"]["generation-v"]["black-white"]["animated"]["front_default"];
$sprites2 = $contenido["sprites"]["front_default"];
function imagenSrc($sprite, $sprites2){
    if($sprite == null){
        echo $sprites2;

    }
    else{
        echo $sprite;
    }
    
    
}
function devolverEntriesESP($entries){
    $desc = $entries["flavor_text_entries"];
    foreach($desc as $entr){
    if($entr["language"]["name"] == "es"){
        echo $entr["flavor_text"];
        break;
    }
    }
}

function devolverEntriesEN($entries){
    $desc = $entries["flavor_text_entries"];
    foreach($desc as $entrie){
    if($entrie["language"]["name"] == "en"){
        echo $entrie["flavor_text"];
        break;
    }
}
    


}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *{
            margin:0;
            padding:0;
            box-sizing: border-box;

        }
        body{
            background-color: powderblue;

        }
        #charac{
            margin-top: 40px;
            display: block;
            width:30%;
            margin-left:auto;
            margin-right:auto;
            background-color: pink;
            text-align: center;
            align-items: center;
            border-radius: 10px;

        }
        #pokemonsprite{
            display: block;
            height:40%px;
            width:40%px;
            margin-left:auto;
            margin-right:auto;

        }
        #moves{
            display: block;
            width:30%;
            margin-left:auto;
            margin-right:auto;
            background-color: pink;
            text-align: center;
            align-items: center;
            border-radius: 10px;
        }

    </style>
</head>
<body>
    <div id="charac">
        <h1><?php echo ucfirst($contenido["name"]); ?></h1>
        <h3>ID: <?php echo $contenido["id"]; ?></h3>
        <img id="pokemonsprite" onclick="grito()" src="<?php imagenSrc($sprites, $sprites2); ?>">
        <audio id="audio" src="<?php echo $contenido["cries"]["latest"];?>" type="audio/ogg" hidden></audio>
        <p><?php devolverEntriesESP($contenidodesc); ?></p>
        <hr>
        <p>TIPOS</p>
        <h3><?php 
        foreach ($contenido["types"] as $tipos){
            echo $tipos["type"]["name"] . " ";

        }
        
        
        ?></h3>
        <hr>
        <p>HABILIDADES</p>
        <h3><?php echo $contenido["abilities"][0]["ability"]["name"] ?></h3>
        


        


    </div><br><br>
    <div id="moves">
        <h2>MOVES</h2>
        <?php 
            $array = array();
            foreach($contenido["moves"] as $move){
                array_push($array,$move["version_group_details"][0]["version_group"]["name"]. " NIVEL ". $move["version_group_details"][0]["level_learned_at"]. " ". $move["move"]["name"]);
            }
            sort($array);
            foreach($array as $elemento){
                echo $elemento . "<br>";
            }
           
        ?>


    </div>
</body>
<script>
     function grito(){
       var audio =  document.getElementById("audio");
       audio.play();
     }


</script>
</html>