<?php
    require "conexion.php";

    $asientos = $_POST['asiento'];
    $viaje = $_POST['viaje'];
    $asientosAdmin = explode(", ", $asientos);

    $arregloNumPagos = array(); // Id de los pagos a borrar
    

    for($i = 1; $i <= 32; $i++){
        if(in_array($i, $asientosAdmin)){
            $pos = array_search($i, $asientosAdmin);
            $cons = "UPDATE asientos SET asiento_Ocupado = 1 WHERE asiento_Id = $asientosAdmin[$pos] and viaje_Id = $viaje";
            $query = mysqli_query($enlace, $cons);
        }else{
            $cons = "UPDATE asientos SET asiento_Ocupado = 0 WHERE asiento_Id = $i and viaje_Id = $viaje";
            $query = mysqli_query($enlace, $cons);
        }
    }

    header("Location: ../adminPage.php");
    exit;
?>