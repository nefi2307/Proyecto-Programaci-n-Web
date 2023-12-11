<?php

    require 'conexion.php';    

    session_start();

    $valorAtributo = $_GET['asiento'];

    $numeros = explode(", ", $valorAtributo);

    // Mandar la query que tendrá los datos del carrito de compras
    if(isset($_SESSION['loginState'])){
        $idViaje = 1;
        // ASIENTOS = $valorAtributo
        $user_Id = $_SESSION['id'];
        $total = $_GET['precio'];


        $insertar = "INSERT INTO `pagos` (`pago_Id`, `viaje_Id`, `pago_Asientos`, `user_Id`, `pago_Total`) 
                    VALUES (NULL, '$idViaje', '$valorAtributo', '$user_Id', '$total')";

        $query = mysqli_query($enlace, $insertar);
    }

    // Guardar los asientos en la base de datos
    for($i = 1; $i < count($numeros); $i++){
        $cons = "UPDATE asientos SET asiento_Ocupado = 1 WHERE asiento_Id = $numeros[$i] and viaje_Id = 1";

        $query = mysqli_query($enlace, $cons);
    }

    $enlace->close();

    header("Location: ../index.php");
    exit; 
?>