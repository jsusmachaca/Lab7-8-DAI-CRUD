<?php

if (isset($_POST['eliminar'])) {
    
    if (empty($_POST["nombre"]) || empty($_POST["cantidad"]) || empty($_POST["preciok"]) || empty($_POST["preciog"])) {
        header('Location: ../../products.php?mensaje=falta');
        exit();
    }

    include_once '../../connection/connection.php';
    $nombre = $_POST["nombre"];

    $sentencia = $conn->prepare("DELETE FROM PRODUCTOS WHERE nombre_producto=?;");
    $resultado = $sentencia->execute([$nombre]);

    if ($resultado === TRUE) {
        header('Location: ../../products.php?mensaje=eliminado');
    } else {
        header('Location: ../../products.php?mensaje=error');
        exit();
    }

} else {
    header('Location: ../../products.php');
    exit();
}
