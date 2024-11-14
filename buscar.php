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
        div{
            margin-top: 20px;
            display:block;
            width: 40%;
            margin-left: auto;
            margin-right: auto;
            text-align: center;
            border-color: grey;
            border-radius: 10px;
            background-color: #de4c8a;
            padding-bottom: 30px;


        }


    </style>
</head>
<body>
   <div>
        <h2>PROYECTO DE POKEAPI EN PHP!!!! BIENVENIDOOO</h2><br><br>
        <form method="POST" action="pokemon.php">
            <h2>INTRODUCE EL NOMBRE O EL ID DEL POKEMON </h2>
            <br>
            <input type="text" name="pokemonID" placeholder="Nombre o ID" required>
            <input type="submit">
        </form>
    </div>
</body>
</html>