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

            function get_type($val) { # Allows for invalid input - should prompt user/disallow
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
            <h1 class="nameplate"> Generate a Team! </h1>
            <form method="post" class="labelForm">
                <div>
                    <label for="teamsize" class="nameplate"> Size of team to generate: </label>
                    <input type="number" id="teamsize" class="stackedLabel" name="teamsize" min="1" max="6"/>
                </div>
                <div>
                    <label for="primary" class="nameplate"> Primary typing of Pokemon: </label>
                    <input type="text" id="primary" class="stackedLabel" name="primary">
                </div>
                <div>
                    <label for="secondary" class="nameplate"> Secondary typing of Pokemon: </label>
                    <input type="text" id="secondary" class="stackedLabel" name="secondary">
                </div>
                <input type="submit" name="randteam" value="Generate Random Team"/>
            </form>

            <div class="pokeholder">
            <?php
                if(isset($_POST['randteam'])) {
                    $teamsize = size_of_team($_POST['teamsize']);
                    $primary = get_type($_POST['primary']);
                    $secondary = get_type($_POST['secondary']);
                    $json = file_get_contents('http://app/teamgen/' . $teamsize . '/' . $primary . '/' . $secondary);
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
