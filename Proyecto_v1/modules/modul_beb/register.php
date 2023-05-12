<?php

if (isset($_POST['registrar'])) {

    if (empty($_POST["nombre"]) || empty($_POST["precio"])) {
        header('Location: ../../bebidas.php?mensaje=falta');
        exit();
    }

    include_once '../../connection/connection.php';
    $nombre = $_POST["nombre"];
    $precio = $_POST["precio"];
 

    $sentencia = $conn->prepare("INSERT INTO BEBIDAS() VALUES (?, ?);");
    $resultado = $sentencia->execute([$nombre, $precio]);

    if ($resultado === TRUE) {
        header('Location: ../../bebidas.php?mensaje=registrado');
    } else {
        header('Location: ../../bebidas.php?mensaje=error');
        exit();
    }
    
} else {
    header('Location: ../../bebidas.php');
    exit();
}