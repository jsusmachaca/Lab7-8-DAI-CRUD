<?php

if (isset($_POST['modificar'])) {

    if (empty($_POST["nombre"]) || empty($_POST["cantidad"]) || empty($_POST["preciok"]) || empty($_POST["preciog"])) {
        header('Location: ../../products.php?mensaje=falta');
        exit();
    }

    include_once '../../connection/connection.php';
    $nombre = $_POST["nombre"];
    $cantidad = $_POST["cantidad"];

    $sentencia = $conn->prepare("UPDATE PRODUCTOS SET cantidad_Kg=? WHERE nombre_producto=?;");
    $resultado = $sentencia->execute([$cantidad, $nombre]);

    if ($resultado === TRUE) {
        header('Location: ../../products.php?mensaje=modificado');
    } else {
        header('Location: ../../products.php?mensaje=error');
        exit();
    }
    
} else {
    header('Location: ../../products.php');
    exit();
}