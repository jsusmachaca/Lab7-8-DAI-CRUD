<?php

include_once 'connection/connection.php';
$sql = "SELECT e.nombres, e.apelllidos, a.id_emp, a.monto, a.canasta, e.telefono FROM BENEFICIOS a INNER JOIN EMPLEADOS e on a.id_emp = e.id_emp;";
$res = $conn->query($sql)

?>