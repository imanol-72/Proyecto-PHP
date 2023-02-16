<?php
     $conexion = mysqli_connect("localhost", "root", "");
     if (!$conexion)
     {
         $error = "Imposible conectar con servidor";
         include "error.php"; // vista error
         exit();
     }
     $bd = 'bdproductos';
     $resul = mysqli_select_db($conexion, $bd);
     if (!$resul)
     {
         $error = "Imposible conectar con la base de datos de productos";
         include "error.php"; // vista error
         exit();
     }
?>
