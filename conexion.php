<?php
     $conexion = mysqli_connect("localhost", "root", "");
     if (!$conexion)
     {
         $error = "Imposible conectar con servidor";
         include "error.php"; // vista error
         exit();
     }
     $bd = 'bdpeliculas';
     $resul = mysqli_select_db($conexion, $bd);
     if (!$resul)
     {
         $error = "Imposible conectar con la base de datos de películas";
         include "error.php"; // vista error
         exit();
     }
?>
