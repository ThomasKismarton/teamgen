<html>
    <head>
        <title>Teamgen V.1</title>
        <link rel="stylesheet" href="style.php" media="screen">
        <?php 
            function get_sprite($val) {
                return '<img src="sprites/Pokémon/RSE/Emerald/' . "$val.png" . '"/>';
            }

            function size_of_team($val) {
                $ts = $_POST['teamsize'];
                if ($ts > 0 && $ts < 7) {
                    return $ts;
                }
                return 6;
            }

            function get_primary_type($val) { # Allows for invalid input - should prompt user/disallow
                $val = strtolower($val);
                $types = array('water', 'ice', 'grass', 'fire', 'electric', 'dark', 'fairy', 'steel', 'ground', 'flying', 'fighting', 'psychic',
                'ghost', 'rock', 'normal', 'poison', 'bug', 'dragon');
                if (in_array($val, $types, false)) {
                    return $val;
                }
                return "random";
            }
        ?>
    </head>

    <body>
        <div class="fontWrapper">
            <h1> Generate a Team! </h1>
            <form method="post" class="labelForm">
                <div>
                    <label for="teamsize"> Size of team to generate: </label>
                    <input type="number" id="teamsize" class="stackedLabel" name="teamsize" min="1" max="6"/>
                </div>
                <div>
                    <label for="primary"> Primary typing of Pokemon: </label>
                    <input type="text" id="primary" class="stackedLabel" name="primary">
                </div>
                <input type="submit" name="randteam" value="Generate Random Team"/>
            </form>

            <div class="pokeholder">
            <?php
                if(isset($_POST['randteam'])) {
                    $teamsize = size_of_team($_POST['teamsize']);
                    $primary = get_primary_type($_POST['primary']);
                    $json = file_get_contents('http://app/teamgen/' . $teamsize . '/' . $primary);
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
                        $o .= '>' . '<div class="nameplate">' . $name . '</div>' . $img . '</div>';
                        echo($o);
                    }
                }
            ?>
            </div>
        </div>
    </body>
</html>
