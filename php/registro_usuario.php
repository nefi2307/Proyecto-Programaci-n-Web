<?php

require 'conexion.php';

$repetido = false; // Variable para checar que no se repita el correo

$nombre = $_POST['nombre'];
$apellidoPaterno = $_POST['apellidoPaterno'];
$apellidoMaterno = $_POST['apellidoMaterno'];
$edad = $_POST['edad'];
$email = $_POST['email'];
$contraseña = $_POST['contrasena'];
if($_POST['apellidoMaterno'] == "ADMIN"){
    $rol = "admin";
}else{
    $rol = "usuario";   
}

$sql = $enlace->query("SELECT user_Correo from usuarios");

if ($sql && $sql->num_rows > 0) {
    $results = $sql->fetch_all();

    for ($i = 0; $i < count($results); $i++) {
        if ($email == $results[$i][0]) {
            $repetido = true;
            echo "<script> alert('Este correo ya ha sido registrado, favor de usar otro')
            location.href = '../registrar.php';</script>";;
            break;
        }
    }
}

if (!$repetido) {
    $insertar = "INSERT INTO usuarios (user_Id, user_Correo, user_Contraseña, user_nombres, user_ApPaterno,
        user_ApMaterno, use_Edad, user_Rol) VALUES (NULL, '$email', '$contraseña', '$nombre' , '$apellidoPaterno', '$apellidoMaterno',
         '$edad', '$rol');";

    $query = mysqli_query($enlace, $insertar);

    if ($query) {
        echo "<script> location.href = '../inicio_sesion.php';
             </script>";
    } else {
        echo ("Error en el server, intente de nuevo más tarde.");
    }
}

session_start();
$_SESSION = array();
session_destroy();
