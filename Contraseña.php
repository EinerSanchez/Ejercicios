<?php
function generar_contraseña($longitud, $mayusculas, $minusculas, $numeros, $simbolos) {
    $conjunto = '';
    if (!empty($mayusculas)) {
        $conjunto .= $mayusculas;
    } else {
        $conjunto .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    }
    if (!empty($minusculas)) {
        $conjunto .= $minusculas;
    } else {
        $conjunto .= 'abcdefghijklmnopqrstuvwxyz';
    }
    if (!empty($numeros)) {
        $conjunto .= $numeros;
    } else {
        $conjunto .= '0123456789';
    }
    if (!empty($simbolos)) {
        $conjunto .= $simbolos;
    } else {
        $conjunto .= '!@#$%^&*()-_=+[]{}|;:,.<>?';
    }
    $contraseña = '';
    for ($i = 0; $i < $longitud; $i++) {
        $contraseña .= $conjunto[rand(0, strlen($conjunto) - 1)];
    }
    return $contraseña;
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $longitud = intval($_POST['longitud']);
    $mayusculas = $_POST['mayusculas'];
    $minusculas = $_POST['minusculas'];
    $numeros = $_POST['numeros'];
    $simbolos = $_POST['simbolos'];
    
    $contraseña_generada = generar_contraseña($longitud, $mayusculas, $minusculas, $numeros, $simbolos);
    
    echo "<h2>Tu contraseña generada es: <strong>$contraseña_generada</strong></h2>";
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generador de Contraseñas Seguras</title>
</head>
<body>
    <h1>Generador de Contraseñas Seguras</h1>
    <form action="generar_contraseña.php" method="post">
        <label for="longitud">Longitud de la contraseña (8-12):</label>
        <input type="number" id="longitud" name="longitud" min="8" max="12" required><br>
        <label for="mayusculas">Letras mayúsculas :</label>
        <input type="text" id="mayusculas" name="mayusculas" placeholder="Ej: ABCD"><br>
        <label for="minusculas">Letras minúsculas :</label>
        <input type="text" id="minusculas" name="minusculas" placeholder="Ej: abcd"><br>
        <label for="numeros">Números específicos :</label>
        <input type="text" id="numeros" name="numeros" placeholder="Ej: 012345"><br>
        <label for="simbolos">Símbolos específicos :</label>
        <input type="text" id="simbolos" name="simbolos" placeholder="Ej: !@#$%^&*()"><br>
        <input type="submit" value="Generar Contraseña">
    </form>
</body>
</html>
