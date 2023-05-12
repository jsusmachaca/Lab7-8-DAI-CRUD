<?php

if (isset($_POST['eliminar'])) {
   
    if (empty($_POST["nombre"]) || empty($_POST["apellido"]) || empty($_POST["idd"]) || empty($_POST["dni"]) || empty($_POST["sueldo"] || empty($_POST["horas"]) || empty($_POST["telefono"]))) {
        header('Location: ../../employees.php?mensaje=falta');
        exit();
    }

    include_once '../../connection/connection.php';
    $nombres = $_POST["nombre"];
    $apellidos = $_POST["apellido"];
    $id_emp = $_POST["idd"];
    $dni = $_POST["dni"];
    $sueldo = $_POST["sueldo"];

    $sentencia1 = $conn->prepare("DELETE FROM BENEFICIOS WHERE id_emp=?;");
    $sentencia = $conn->prepare("DELETE FROM EMPLEADOS WHERE dni=?;");

    $resultado2 = $sentencia1->execute([$id_emp]);    
    $resultado = $sentencia->execute([$dni]);
    
    if ($resultado === TRUE) {
        header('Location: ../../employees.php?mensaje=eliminado');
    } else {
        header('Location: ../../employees.php?mensaje=error');
        exit();
    }
    
} else {
    header('Location: ../../employees.php');
    exit();
}
