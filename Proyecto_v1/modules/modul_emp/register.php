<?php

if (isset($_POST['registrar'])) {
    
    if (empty($_POST["nombre"]) || empty($_POST["apellido"]) || empty($_POST["idd"]) || empty($_POST["dni"]) || empty($_POST["sueldo"])) {
        header('Location: ../../employees.php?mensaje=falta');
        exit();
    }

    include_once '../../connection/connection.php';
    $nombres = $_POST["nombre"];
    $apellidos = $_POST["apellido"];
    $id_emp = $_POST["idd"];
    $dni = $_POST["dni"];
    $sueldo = $_POST["sueldo"];
    $horas = $_POST["horas"];
    $tele = $_POST["telefono"];

    $sentencia = $conn->prepare("INSERT INTO EMPLEADOS() VALUES (?, ?, ?, ?, ?, ?, ?);");
    $resultado = $sentencia->execute([$nombres, $apellidos, $id_emp, $dni, $sueldo, $horas, $tele]);
    
    if ($horas > 6) {
        $sentencia1 = $conn->prepare("INSERT INTO BENEFICIOS(monto, canasta, id_emp) VALUES (800.00, 'SÍ', ?);");
        $resultado1 = $sentencia1->execute([$id_emp]);
    }

    if ($resultado === TRUE) {
        header('Location: ../../employees.php?mensaje=registrado');
    } else {
        header('Location: ../../employees.php?mensaje=error');
        exit();
    }
    
} else {
    header('Location: ../../employees.php');
    exit();
}