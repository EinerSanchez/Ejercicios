<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Registro</title>
</head>
<body>
    <h1>Registro de Usuario</h1>
    <form action="registro.php" method="post">
        <label for="usuario">Nombre de usuario:</label>
        <input type="text" id="usuario" name="usuario" value="<?php echo isset($_POST['usuario']) ? htmlspecialchars($_POST['usuario']) : ''; ?>" required><br>

        <label for="correo">Correo electrónico:</label>
        <input type="email" id="correo" name="correo" value="<?php echo isset($_POST['correo']) ? htmlspecialchars($_POST['correo']) : ''; ?>" required><br>

        <label for="contraseña">Contraseña:</label>
        <input type="password" id="contraseña" name="contraseña" required><br>

        <label for="confirmar">Confirmación de contraseña:</label>
        <input type="password" id="confirmar" name="confirmar" required><br>

        <input type="submit" value="Registrarse">
    </form>

    <?php
    if (isset($error)) {
        echo "<p style='color:red;'>$error</p>";
    } elseif (isset($mensaje_exito)) {
        echo "<p style='color:green;'>$mensaje_exito</p>";
    }
    ?>
</body>
</html>
<?php
$error = "";
$mensaje_exito = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = trim($_POST["usuario"]);
    $correo = trim($_POST["correo"]);
    $contraseña = $_POST["contraseña"];
    $confirmar = $_POST["confirmar"];

    // Validaciones
    if (empty($usuario) || empty($correo) || empty($contraseña) || empty($confirmar)) {
        $error = "Todos los campos son obligatorios.";
    } elseif (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        $error = "El correo electrónico no tiene un formato válido.";
    } elseif (strlen($contraseña) < 8 || !preg_match('/[A-Za-z]/', $contraseña) || !preg_match('/[0-9]/', $contraseña)) {
        $error = "La contraseña debe tener al menos 8 caracteres, incluyendo letras y números.";
    } elseif ($contraseña !== $confirmar) {
        $error = "La confirmación de contraseña no coincide.";
    } else {
        $mensaje_exito = "Registro exitoso. Bienvenido, $usuario!";
    }
}
?>