<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
     <link rel="stylesheet" href="css/style.css"> 
     <title>Registro de bebidas</title>
</head>
<body>
     <div id="tabla">
          <table border="1"  class="table table-bordered table-dark">
               <thead>
                    <tr>
                         <th bgcolor="grey">Nombres</th>
                         <th bgcolor="grey">Precio</th>
                    </tr>
               </thead>

               <tbody>
                    <?php include("modules/modul_beb/data.php"); ?>

                    <?php foreach($res as $fila) { ?>
                    <tr id="<?php echo $fila['nombre']; ?>" onclick="Formulario('<?php echo $fila['nombre']; ?>')" class="table-light">
                    
                         <td><?php echo $fila["nombre"]; ?></td>
                         <td><?php echo $fila["precio"]; ?></td>
                    </tr>
                    <?php } ?>

               </tbody>
          </table>
     </div>

     <div id="crud">
          <form  method="POST" id="">
               Nombre: <input type="text" name="nombre" autofocus required> <br>
               Precio: <input type="text" name="precio" autofocus required> <br>
              
               <input type="submit" value="Registrar" name="registrar" formaction="modules/modul_beb/register.php"> 
               <input type="submit" value="Eliminar" name="eliminar" formaction="modules/modul_beb/delete.php">
               <input type="submit" value="Modificar" name="modificar" formaction="modules/modul_beb/modify.php">
          </form>
     </div>

     <div id="lista">
          <select name="registros" id="" onchange="location = this.value">
               <option value="employees.php">Empleados</option>
               <option value="products.php">Productos</option>
               <option value="menu.php">Menu</option>
               <option value="bebidas.php" selected>Bebidas</option>
          </select>
     </div>

     <script>
          function Formulario(nombre_plato) {
          var fila = document.getElementById(nombre_plato);

          var nombre = fila.cells[0].innerHTML;
          var precio = fila.cells[1].innerHTML;

          document.getElementsByName("nombre")[0].value = nombre;
          document.getElementsByName("precio")[0].value = precio;
     }
     </script>
</body>
</html>