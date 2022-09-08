<html>
    <head>
        <title>Dummy Site</title>
        <link rel="stylesheet" href="style.php" media="screen">
        <?php 
            function get_sprite($val) {
                return '<img src="sprites/Pokémon/RSE/Emerald/' . "$val.png" . '"/>';
            }
        ?>
    </head>

    <body>
        <h1> Randomized List </h1>
        <form method="post">
            <label for="teamsize"> Size of team to generate: </label>
            <input type="number" id="teamsize" name="teamsize" min="1" max="6"/>
            <input type="submit" name="randteam" value="Generate Random Team"/>
        </form>

        <div class="pokeholder">
        <?php
            if(isset($_POST['randteam'])) {
                $json = file_get_contents('http://app/teamgen/' . $_POST['teamsize']);
                $obj = json_decode($json);
                    $pokeds = $obj->Pokemon;

                foreach ($pokeds as $pokedict) {
                    $o = "<div class=pokemon ";
                    $id = "";
                    foreach ($pokedict as $k => $v) {
                        $o .= "$k=$v ";
                        if ($k == "Name") {
                            $name = $v;
                        }
                        if ($k == "PokeID") {
                            $img = get_sprite($v);
                        }
                    }
                    $o .= '>' . '<div>' . $name . '</div>' . $img . '</div>';
                    echo($o);
                }
            }
        ?>
        </div>
    </body>
</html>
