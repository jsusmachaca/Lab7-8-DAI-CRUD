<?php

if (isset($_POST['registrar'])) {
  
    if (empty($_POST["nombre"]) || empty($_POST["cantidad"]) || empty($_POST["preciok"]) || empty($_POST["preciog"])) {
        header('Location: ../../products.php?mensaje=falta');
        exit();
    }

    include_once '../../connection/connection.php';
    $nombre = $_POST["nombre"];
    $cantidad = $_POST["cantidad"];
    $preciok = $_POST["preciok"];
    $preciog = $_POST["preciog"];

    $sentencia = $conn->prepare("INSERT INTO PRODUCTOS() VALUES (?, ?, ?, ?);");
    $resultado = $sentencia->execute([$nombre, $cantidad, $preciok, $preciog]);

    if ($resultado === TRUE) {
        header('Location: ../../products.php?mensaje=registrado');
    } else {
        header('Location: ../../products.php?mensaje=error');
        exit();
    }
    
} else {
    header('Location: ../../products.php');
    exit();
}