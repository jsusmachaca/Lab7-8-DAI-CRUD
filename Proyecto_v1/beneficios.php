<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
     <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"/>
     <title>Document</title>
</head>
<body>
     <h2>Beneficios solo para Empleados que hayan trabajado más de 6 horas en el último mes</h2>
     <br>
     <div id="tabla">
          <table border="0" class="table table-bordered table-dark">
               <thead>
                    <tr>
                         <th bgcolor="white">Nombres</th>
                         <th bgcolor="white">Apellidos</th>
                         <th>ID Empleado</th>
                         <th bgcolor="white">Monto</th>
                         <th bgcolor="white">Canasta</th>  
                         <th>Contacto</th>       
                    </tr>
               </thead>

               <tbody >
                    <?php include("modules/beneficios/data.php"); ?>
                    <?php foreach($res as $fila) { ?>
                    <tr id="<?php echo $fila['id_emp']; ?>" onclick="Formulario(<?php echo $fila['id_emp']; ?>)" class="table-light">
                        
                         <td><?php echo $fila["nombres"]; ?></td>
                         <td><?php echo $fila["apelllidos"]; ?></td>
                         <td><?php echo $fila["id_emp"]; ?></td>
                         <td><?php echo $fila["monto"]; ?></td>
                         <td><?php echo $fila["canasta"]; ?></td>
                         <!-- <td><?php echo $fila["telefono"]; ?></td> -->
                         <td>
                              <form>   
                                   <input type="hidden" name="telefono" value="<?php echo $fila["telefono"]; ?>">
                                   <button type="button" onclick="enviarMensaje(this)">Contactar<span class="material-symbols-outlined">call</span></button>
                              </form>
                         </td>
                    </tr>
                    <?php } ?>

               </tbody>
          </table>
     </div>
          <script>
               function enviarMensaje(button) {
               var telefono = button.form.telefono.value;
               var xhttp = new XMLHttpRequest();
               xhttp.open("POST", "sendMessage.php", true);
               xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
               xhttp.send("telefono=" + telefono);
               alert("El mensaje ha sido enviado correctamente.");
               }
     </script>

</body>
</html>