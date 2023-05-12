<?php

if (isset($_POST['eliminar'])) {
    
    if (empty($_POST["nombre"]) || empty($_POST["precio"])) {
        header('Location: ../../bebidas.php?mensaje=falta');
        exit();
    }

    include_once '../../connection/connection.php';
    $nombre = $_POST["nombre"];
    $precio = $_POST["precio"];

    $sentencia = $conn->prepare("DELETE FROM BEBIDAS WHERE nombre=?;");
    $resultado = $sentencia->execute([$nombre]);

    if ($resultado === TRUE) {
        header('Location: ../../bebidas.php?mensaje=eliminado');
    } else {
        header('Location: ../../bebidas.php?mensaje=error');
        exit();
    }
    
} else {
    header('Location: ../../bebidas.php');
    exit();
}
