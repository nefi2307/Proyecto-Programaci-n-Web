<?php
session_start();

require './php/conexion.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador</title>
</head>

<body>

    <p>
        Registros de Asientos
    </p>

    <form method="post" action="./php/admin.php">
        <select id="viaje" name="viaje">
            <option value="1">Vergel</option>
            <option value="2">Saltillo</option>
        </select>
        <input type="submit" value="Mostrar">
    </form>

    <br>
    
    <button onclick='redireccionar()'>Regresar</button>

    <script>
        function redireccionar() {
            window.location.href = 'index.php';
        }
    </script>

</body>

</html>