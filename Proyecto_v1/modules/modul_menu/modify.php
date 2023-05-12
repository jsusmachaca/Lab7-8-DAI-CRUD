<?php

if (isset($_POST['modificar'])) {
  
    if (empty($_POST["nombre"]) || empty($_POST["precio"])) {
        header('Location: ../../menu.php?mensaje=falta');
        exit();
    }


    include_once '../../connection/connection.php';
    $nombre = $_POST["nombre"];
    $precio = $_POST["precio"];

 
    $sentencia = $conn->prepare("UPDATE MENU SET precio=? WHERE nombre_plato=?;");
    $resultado = $sentencia->execute([$precio, $nombre]);

    if ($resultado === TRUE) {
        header('Location: ../../menu.php?mensaje=modificado');
    } else {
        header('Location: ../../menu.php?mensaje=error');
        exit();
    }
    
} else {
    header('Location: ../../menu.php');
    exit();
}