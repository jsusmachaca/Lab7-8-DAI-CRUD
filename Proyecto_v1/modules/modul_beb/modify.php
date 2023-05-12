<?php

if (isset($_POST['modificar'])) {

    if (empty($_POST["nombre"]) || empty($_POST["precio"])) {
        header('Location: ../../bebidas.php?mensaje=falta');
        exit();
    }

    include_once '../../connection/connection.php';
    $nombre = $_POST["nombre"];
    $precio = $_POST["precio"];

    
    $sentencia = $conn->prepare("UPDATE BEBIDAS SET precio=? WHERE nombre=?;");
    $resultado = $sentencia->execute([$precio, $nombre]);

    if ($resultado === TRUE) {
        header('Location: ../../bebidas.php?mensaje=modificado');
    } else {
        header('Location: ../../bebidas.php?mensaje=error');
        exit();
    }
    
} else {
    header('Location: ../../bebidas.php');
    exit();
}