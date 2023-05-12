<?php

if (isset($_POST['modificar'])) {
   
    if (empty($_POST["nombre"]) || empty($_POST["apellido"]) || empty($_POST["idd"]) || empty($_POST["dni"]) || empty($_POST["sueldo"])) {
        header('Location: ../../employees.php?mensaje=falta');
        exit();
    }

    include_once '../../connection/connection.php';
    $nombres = $_POST["nombre"];
    $apellidos = $_POST["apellido"];
    $dni = $_POST["dni"];
    $sueldo = $_POST["sueldo"];
    $id_emp = $_POST["idd"];
    $horas = $_POST["horas"];
    $tele = $_POST["telefono"];
    
    $sentencia = $conn->prepare("UPDATE EMPLEADOS SET nombres=?, apelllidos=?, dni=?, sueldo=?, horas_trabajo=?, telefono=? WHERE dni=?;");
    $resultado = $sentencia->execute([$nombres, $apellidos, $dni, $sueldo, $horas, $tele, $dni]);

    if ($horas > 6) {
        $sentencia1 = $conn->prepare("INSERT INTO BENEFICIOS(monto, canasta, id_emp) VALUES (800, 'Sí', ?);");
        $resultado1 = $sentencia1->execute([$id_emp]);
    }

    if ($resultado === TRUE) {
        header('Location: ../../employees.php?mensaje=modificado');
    } else {
        header('Location: ../../employees.php?mensaje=error');
        exit();
    }
    
} else {
    header('Location: ../../employees.php');
    exit();
}