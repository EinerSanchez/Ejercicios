<?php
if (isset($_POST['num1']) && isset($_POST['num2'])) {
    $resultado = $_POST['num1'] + $_POST['num2'];
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suma</title>
</head>

<body>
    <form action="" method="post">
        <div>
            <label for="num1">Numero 1:</label>
            <br>
            <input type="text" name="num1" id="num1" value="<?php echo isset($_POST['num1']) ? $_POST['num1'] : ''; ?>">
            <br>
        </div>
        <div>
            <label for="num2">Numero 2:</label>
            <br>
            <input type="text" name="num2" id="num2" value="<?php echo isset($_POST['num2']) ? $_POST['num2'] : ''; ?>">
            <br>
        </div>
        <div>
            <label for="resultado">Resultado:</label>
            <br>
            <input type="text" name="resultado" id="resultado" value="<?php echo $resultado?>">
            <br>
        </div>
        <input type="submit" value="Calcular">
    </form>
</body>

</html>
