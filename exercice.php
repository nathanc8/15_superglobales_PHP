<?php
session_start();

if (isset($_POST['reset'])) {
    session_unset();
    session_destroy();
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Test PHP</title>
</head>

<body>
    <?php

    if (isset($_GET['first_name']) && !empty($_GET['first_name'])) {
        $first_name = htmlspecialchars($_GET['first_name']);
        echo "Bonjour " . $first_name . " !";
    } else if (isset($_SESSION['first_name']) && !empty($_SESSION['first_name'])) {
        $first_name = htmlspecialchars(string: $_SESSION['first_name']);
        echo "Bonjour " . $first_name . " !";
    } else if (isset($_POST['first_name']) && !empty($_POST['first_name'])) {
        $first_name = htmlspecialchars(string: $_POST['first_name']);
        $_SESSION['first_name'] = $first_name;
        echo "Bonjour " . $first_name . " !";
    } else {
        echo "Bonjour anonyme !";
    }

    ?>

    <form action="exercice.php" method="post">
        <p>Votre nom : <input type="text" name="first_name" /></p>
        <p><input type="submit" value="OK"></p>
    </form>
    <form action="exercice.php" method="post">
        <input type="submit" value="Clear session" name="reset">
    </form>
</body>

</html>