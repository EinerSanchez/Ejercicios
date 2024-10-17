<?php
session_start();

if (!isset($_SESSION['numero_secreto'])) {
    $_SESSION['numero_secreto'] = rand( 1, 100); 
    $_SESSION['intentos'] = 0; 
}

if (isset($_POST['intento'])) {
    $intento_usuario = $_POST['intento'];
    $_SESSION['intentos']++;

    if ($intento_usuario > $_SESSION['numero_secreto']) {
        $mensaje = "El numero es menor que $intento_usuario. Intente otra vez.";
    } elseif ($intento_usuario < $_SESSION['numero_secreto']) {
        $mensaje = "El numero es mayor que $intento_usuario. Intente otra vez.";
    } else {
        $mensaje = "¡Felicidades! Adivinaste el numero en " . $_SESSION['intentos'] . " intentos.";
        session_destroy();
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Juego de Adivinanza</title>
</head>
<body>
    <h1>Juego de Adivinanza</h1>
    <h2>Adivina el número secreto entre 1 y 100</h2>

    <form action="" method="post">
        <label for="intento">Ingresa tu número predictivo:</label>
        <br>
        <input type="number" id="intento" name="intento" required min="1" max="100">
        <br><br>
        <input type="submit" value="Enviar">
    </form>

    <?php
    if (isset($mensaje)) {
        echo "<h2>$mensaje</h2>";
    }

    if (isset($_SESSION['intentos'])) {
        echo "<p>Número de intentos: " . $_SESSION['intentos'] . "</p>";
    }
    ?>
</body>
</html>
