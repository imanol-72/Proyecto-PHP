<?php
   
    $conexion = mysqli_connect("localhost", "root", "root");
    if (!$conexion)
    {
        $error = "Imposible establecer conexión con el servidor de BD";
        include "error.php";
        exit();
    }
    
    $bd = "bdpeliculas";
    $resul = mysqli_select_db($conexion, $bd);
    if (!$resul)
    {
        $error = "Imposible localizar la base de datos $bd";
        include "error.php";
        exit();
    }
     
?>
