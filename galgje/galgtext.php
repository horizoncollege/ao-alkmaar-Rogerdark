<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Galgje</title>
</head>

<body>
    <h1>Galgje</h1>
    <br>
    <h3>Je hebt gekozen om zelf een woord te kiezen</h3>

    <form method="POST">
        <input class="textinput" type="text" name="woordinvoeren" id="woordinvoeren" placeholder="Voer een woord in" />
        <button class="start" type="submit" name="Opslaan" id="Start">opslaan</button>
    </form>

    <h2>
        <?php
        if (isset($_POST["Opslaan"])) {
            setcookie('woord', $_POST["woordinvoeren"]);
            header("refresh: 0 ");
        }

        if (isset($_COOKIE["woord"])) {
            echo ("Je hebt") . " " . $_COOKIE["woord"] . " gekozen om mee te spelen!";
        }
        ?>
    </h2>

    <form>
        <button class="startbutton" type="submit" formaction="galgjespel.php">start het spel</button>
    </form>

</body>

</html>