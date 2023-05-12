<!DOCTYPE html>
<html lang="en">
     <head>
          <meta charset="UTF-8">
          <meta http-equiv="X-UA-Compatible" content="IE=edge">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
          <link rel="stylesheet" href="css/style.css">  
          <title>Registro de empleados</title>
     </head>
<body>
     <div id="tabla">
          <table border="2" class="table table-bordered table-dark">
               <thead>
                    <tr>
                         <th bgcolor="white">Nombres</th>
                         <th bgcolor="white">Apellidos</th>
                         <th bgcolor="white">ID Empleado</th>
                         <th bgcolor="white">DNI</th>
                         <th bgcolor="white">Sueldo</th>
                         <th>Horas de Trabajo</th>
                         <th>Teléfono</th>
                    </tr>
               </thead>
               
               <tbody >
                    <?php include("modules/modul_emp/data.php"); ?>
                    <?php foreach($res as $fila) { ?>
                         <tr id="<?php echo $fila['id_emp']; ?>" onclick="Formulario(<?php echo $fila['id_emp']; ?>)" class="table-light">
                              
                         <td><?php echo $fila["nombres"]; ?></td>
                         <td><?php echo $fila["apelllidos"]; ?></td>
                         <td><?php echo $fila["id_emp"]; ?></td>
                         <td><?php echo $fila["dni"]; ?></td>
                         <td><?php echo $fila["sueldo"]; ?></td>
                         <td><?php echo $fila["horas_trabajo"]; ?></td>
                         <td><?php echo $fila["telefono"]; ?></td>
                    </tr>
                    <?php } ?>
                    
               </tbody>
          </table>
     </div>
     
     <div id="crud">
          <form  method="POST" id="">
               Nombre : <input type="text" name="nombre" autofocus required> <br>
               Apellido : <input type="text" name="apellido" autofocus required> <br>
               ID : <input type="text" name="idd" autofocus required> <br>
               DNI : <input type="text" name="dni" autofocus required> <br>
               Sueldo : <input type="text" name="sueldo" autofocus required> <br>
               Horas : <input type="text" name="horas" autofocus required> <br>
               Teléfono : <input type="text" name="telefono" autofocus required> <br>
               
               <input type="submit" value="Registrar" name="registrar" formaction="modules/modul_emp/register.php"> 
               <input type="submit" value="Eliminar" name="eliminar" formaction="modules/modul_emp/delete.php">
               <input type="submit" value="Modificar" name="modificar" formaction="modules/modul_emp/modify.php">
          </form>
     </div>
     
     <div id="lista">
          <select name="registros" id="" onchange="location = this.value">
               <option value="employees.php" selected>Empleados</option>
               <option value="products.php">Productos</option>
               <option value="menu.php">Menu</option>
               <option value="bebidas.php">Bebidas</option>
          </select>
     </div>
     
     <script>
          function Formulario(id_emp) {
               var fila = document.getElementById(id_emp);
               
               var nombres = fila.cells[0].innerHTML;
               var apellidos = fila.cells[1].innerHTML;
          var id = fila.cells[2].innerHTML;
          var dni = fila.cells[3].innerHTML;
          var sueldo = fila.cells[4].innerHTML;
          var horas = fila.cells[5].innerHTML;
          var telefono = fila.cells[6].innerHTML;
          
          document.getElementsByName("nombre")[0].value = nombres;
          document.getElementsByName("apellido")[0].value = apellidos;
          document.getElementsByName("idd")[0].value = id;
          document.getElementsByName("dni")[0].value = dni;
          document.getElementsByName("sueldo")[0].value = sueldo;
          document.getElementsByName("horas")[0].value = horas;
          document.getElementsByName("telefono")[0].value = telefono; 
     }
     </script>
</body>
</html>