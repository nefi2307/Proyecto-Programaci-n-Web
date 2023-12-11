<?php
echo "<h3>Registro de Asientos TecLag Express</h3>";

echo "
    <button onclick='redireccionar()''>Regresar</button>

    <script>
        function redireccionar() {
            window.location.href = '../adminPage.php';
        }
    </script>
    ";

require 'conexion.php';


$viajeSeleccionado = $_POST['viaje'];

switch ($viajeSeleccionado) {
    case "1":
        echo "<h2> Vergel </h2>";
        break;
    case "2":
        echo "<h2> Saltillo </h2>";
        break;
}

//<!--Consulta para mostrar todos los asientos y ver su estado-->    
$sql = $enlace->query("SELECT asiento_Ocupado FROM asientos WHERE viaje_Id = $viajeSeleccionado");
$asientos = $sql->fetch_all();

echo "<div id = cont>";
for ($i = 0; $i < count($asientos); $i++) {
    $numAsiento = $i + 1;

    if ($asientos[$i][0] == "1") {
        echo "<p>Asiento $numAsiento <input type='checkbox' class = 'checkB' name='$numAsiento' id='num$numAsiento' checked></p>";
    } else {
        echo "<p>Asiento $numAsiento <input type='checkbox' class = 'checkB' name='$numAsiento' id='num$numAsiento'></p>";
    }
}
echo "</div>";

echo "
    <form method='post' name='foorm' action = 'adminUpdateAsientos.php'>
        <input type='text' id='asiento' name='asiento' readonly><br>
        <input type='text' id='viaje' name='viaje' value ='$viajeSeleccionado' readonly><br>
        <button type='submit' name='btn' id='btn'>Guardar cambios</button>
    </form>";
?>
<script>
    var inputElement = document.getElementById("asiento");
    for (var i = 1; i <= 32; i++) {
        var check = document.getElementById('num' + i);
        if (check.checked) {
            inputElement.value = inputElement.value + ", " + i;
        }
    }

    document.addEventListener('DOMContentLoaded', function() {
        var cont = document.getElementById('cont');
        cont.addEventListener('click', function() {
            var inputElement = document.getElementById("asiento");
            inputElement.value = "";
            for (var i = 1; i <= 32; i++) {
                var check = document.getElementById('num' + i);
                if (check.checked) {
                    inputElement.value = inputElement.value + ", " + i;
                }
            }
        });
    });
</script>