<?php
if (isset($_POST['num1']) && isset($_POST['num2']) && isset($_POST['num3']) && isset($_POST['num4'])) {
    $resultado = (($_POST['num1'] + $_POST['num2'] * ($_POST['num3'] - $_POST['num4'])));
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expresiones Matematicas</title>
</head>
<body>
    <h1>Calculadora Expresiones Matematicas</h1>
    <form action="" method="post">
        <div>
            <br>
            (
            <input type="text" name="num1" id="num1" value="<?php echo isset($_POST['num1']) ? $_POST['num1'] : ''; ?>"> +
            <input type="text" name="num2" id="num2" value="<?php echo isset($_POST['num2']) ? $_POST['num2'] : ''; ?>"> * (
            <input type="text" name="num3" id="num3" value="<?php echo isset($_POST['num3']) ? $_POST['num3'] : ''; ?>"> - 
            <input type="text" name="num4" id="num4" value="<?php echo isset($_POST['num4']) ? $_POST['num4'] : ''; ?>"> )
            )
        </div>
        <div>
            <label for="resultado">Resultado:</label>
            <br>
            <input type="text" name="resultado" id="resultado" value="<?php echo isset($resultado) ? $resultado : ''; ?>">
            <br>
            <br>
        </div>
        <input type="submit" value="Calcular">
    </form>
</body>
</html>
