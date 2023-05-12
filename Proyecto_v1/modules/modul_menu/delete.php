<?php

if (isset($_POST['eliminar'])) {
 
    if (empty($_POST["nombre"]) || empty($_POST["precio"])) {
        header('Location: ../../menu.php?mensaje=falta');
        exit();
    }

    include_once '../../connection/connection.php';
    $nombre = $_POST["nombre"];

    $sentencia = $conn->prepare("DELETE FROM MENU WHERE nombre_plato=?;");
    $resultado = $sentencia->execute([$nombre]);

    if ($resultado === TRUE) {
        header('Location: ../../menu.php?mensaje=eliminado');
    } else {
        header('Location: ../../menu.php?mensaje=error');
        exit();
    }
    
} else {
    header('Location: ../../menu.php');
    exit();
}
