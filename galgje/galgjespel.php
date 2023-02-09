<!DOCTYPE html>
<html>

<head>
    <link href="icon.png" rel="icon" type="icon.png" />
    <meta charset="utf-8">
    <title>Galgje | Spel</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
        .mid {
            display: inline-block;
            width: 55%;
        }

        .right {
            display: inline-block;
            width: 44%;
        }

        .right img {
            width: 50%;
        }
    </style>
</head>

<body>
    <div class="mid">
        <?php
        error_reporting(0);
        $foutenteller = 0;
        if (isset($_POST['button'])) {
            if ($_POST['button'] != 'reset') {
                $lastCharacter   = $_POST['button'];
                if (isset($_COOKIE['characters'])) {
                    $characters = $_COOKIE['characters'] . ',' . $_POST['button'];
                } else {
                    $characters = $_POST['button'];
                }
                setcookie('characters', $characters, time() + (86400 * 10));
                header("Location: galgjespel.php");
            } else {
                setcookie("woord", "", time() - 3600);
                setcookie("characters", "", time() - 3600);
                setcookie("mistakes", "", time() - 3600);
                header("Location: galgje.php");
            }
        }
        $woordKarakters = str_split($_COOKIE['woord']);
        $keuzeKarakters = explode(",", $_COOKIE["characters"]);
        $won = true;
        foreach ($woordKarakters as $woordKarakter) {
            $keuzeCorrect = false;
            foreach ($keuzeKarakters as $keuzeKarakter) {
                if ($woordKarakter === $keuzeKarakter) {
                    $keuzeCorrect = true;
                }
            }
            if ($keuzeCorrect) {
                echo ($woordKarakter);
            } else {
                echo ('_ ');
                $won = false;
            }
        }
        foreach ($keuzeKarakters as $keuzeKarakter) {
            $keuzeCorrect = false;
            foreach ($woordKarakters as $woordKarakter) {
                if ($woordKarakter === $keuzeKarakter) {
                    $keuzeCorrect = true;
                }
            }

            if (!$keuzeCorrect) {
                $foutenteller++;
            }
        }
        $lose = false;
        if ($foutenteller === 6) {
            $lose = true;
        }

        if ($won) {
            echo '<br>' . '<h1 class="Gewonnen">Je hebt gewonnen</h1>';
        }
        if ($lose) {
            echo '<br>' . '<h1 class="Verloren">Je hebt verloren</h1>';
            echo "<br><h3 class='Verloren'> Het woord was " . $_COOKIE['woord'];
        }

        ?>
        <br>
        <br>
        <br>
        <form action="galgjespel.php" method="post">
            <button type="submit" name="button" value="reset">reset</button>

            <?php
            $alphabet = array('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', ' ');
            foreach ($alphabet as $value) {
                $display = true;
                foreach ($keuzeKarakters as $keuzeKarakter) {
                    if ($value === $keuzeKarakter) {
                        $display = false;
                    }
                }
                if ($won) {
                    $display = false;
                    setcookie('woord', "");
                    setcookie('characters', "");
                }
                if ($lose) {
                    $display = false;
                    setcookie('woord', "");
                    setcookie('characters', "");
                }
                if ($display) {
                    echo ('<button type="submit" name="button" value="' . $value . '">' . $value . '</button>');
                } else {
                    echo ('<button type="submit" name="button" value="' . $value . '" disabled>' . $value . '</button>');
                }
            }
            ?>

        </form>

        <h1>Gebruikte letters:</h1>
        <p>
            <?php
            foreach ($keuzeKarakters as $keuzeKarakter) {
                echo ($keuzeKarakter . ' , ');
            }
            ?>
        </p>
    </div>
    <div class="right">
        <?php
        if ($foutenteller === 0) {
            echo ('<img id="dood" src="fout2.png">');
        }
        if ($foutenteller === 1) {
            echo ('<img id="dood" src="fout4.png">');
        }
        if ($foutenteller === 2) {
            echo ('<img id="dood" src="fout5.png">');
        }
        if ($foutenteller === 3) {
            echo ('<img id="dood" src="fout6.png">');
        }
        if ($foutenteller === 4) {
            echo ('<img id="dood" src="fout7.png">');
        }
        if ($foutenteller === 5) {
            echo ('<img id="dood" src="fout8.png">');
        }
        if ($foutenteller === 6) {
            echo ('<img id="dood" src="fout9.png">');
        }
        if ($foutenteller === 7) {
            echo ('<img id="dood" src="END.png">');
        }
        ?>

    </div>
</body>

</html>