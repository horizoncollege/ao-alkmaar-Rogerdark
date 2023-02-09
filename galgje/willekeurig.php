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
    <h3>Je hebt een willekeurig woord gekozen</h3>

    <?php
    $randomwoorden = array(
        "central",
        "around",
        "bike",
        "errors",
        "conflict",
        "highway",
        "corner",
        "trust",
        "dinner",
        "alliance",
        "animal",
        "space",
        "airplane",
        "house",
        "apple"
    );
    $kiezen = array_rand($randomwoorden);
    setcookie('woord', $randomwoorden[$kiezen]);
    ?>

    <form>
        <button class="startbutton" type="submit" formaction="galgjespel.php">Start een willekeurig woord</button>
    </form>

</body>

</html>