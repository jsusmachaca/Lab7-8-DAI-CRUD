<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
     <link rel="stylesheet" href="css/style.css"> 
     <title>Registro productos</title>
</head>

<body>
     <div id="tabla">
          <table border="1" class="table table-bordered table-dark">
               <thead>
                    <tr>
                         <th bgcolor="grey">Nombre</th>
                         <th bgcolor="grey">Cantidad</th>
                         <th bgcolor="grey">Precio por kilo</th>
                         <th bgcolor="grey">Precio General</th>
                    </tr>
               </thead>

               <tbody>
                    <?php include("modules/modul_prod/data.php"); ?>
                    <?php foreach($res as $fila) { ?>
                    <tr id="<?php echo $fila['nombre_producto']; ?>" onclick="Formulario('<?php echo $fila['nombre_producto']; ?>')" class="table-light">
                         <td><?php echo $fila["nombre_producto"]; ?></td>
                         <td><?php echo $fila["cantidad_Kg"]; ?></td>
                         <td><?php echo $fila["precio_Kg"]; ?></td>
                         <td><?php echo $fila["precio_Gral"]; ?></td>
                    </tr>
                    <?php } ?>

               </tbody>
          </table>
     </div>

     <div id="crud">
          <form  method="POST" id="">
               Nombre:      <input type="text" name="nombre" autofocus required> <br>
               Cantidad:    <input type="text" name="cantidad" autofocus required> <br>
               Precio Kg:   <input type="text" name="preciok" autofocus required> <br>
               Precio Gral:  <input type="text" name="preciog" autofocus required> <br>
               <input type="submit" value="Registrar" name="registrar" formaction="modules/modul_prod/register.php"> 
               <input type="submit" value="Eliminar" name="eliminar" formaction="modules/modul_prod/delete.php">
               <input type="submit" value="Modificar" name="modificar" formaction="modules/modul_prod/modify.php">
          </form>
     </div>

     <div id="lista">
          <select name="registros" id="" onchange="location = this.value">
               <option value="employees.php">Empleados</option>
               <option value="products.php" selected>Productos</option>
               <option value="menu.php">Menu</option>
               <option value="bebidas.php">Bebidas</option>
          </select>
     </div>

     <script>
          function Formulario(nombre_producto) {
          var fila = document.getElementById(nombre_producto);

          var nombre = fila.cells[0].innerHTML;
          var cantidad = fila.cells[1].innerHTML;
          var preciok = fila.cells[2].innerHTML;
          var preciog = fila.cells[3].innerHTML;
          
          document.getElementsByName("nombre")[0].value = nombre;
          document.getElementsByName("cantidad")[0].value = cantidad;
          document.getElementsByName("preciok")[0].value = preciok;
          document.getElementsByName("preciog")[0].value = preciog;
     }
     </script>
</body>
</html>
