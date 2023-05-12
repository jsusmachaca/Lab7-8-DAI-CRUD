<?php

if (isset($_POST['registrar'])) {
    if (empty($_POST["nombre"]) || empty($_POST["precio"])) {
        header('Location: ../../menu.php?mensaje=falta');
        exit();
    }

    include_once '../../connection/connection.php';
    $nombre = $_POST["nombre"];
    $precio = $_POST["precio"];
 

    $sentencia = $conn->prepare("INSERT INTO MENU() VALUES (?, ?);");
    $resultado = $sentencia->execute([$nombre, $precio]);

    if ($resultado === TRUE) {
        header('Location: ../../menu.php?mensaje=registrado');
    } else {
        header('Location: ../../menu.php?mensaje=error');
        exit();
    }
    
} else {
    header('Location: ../../menu.php');
    exit();
}