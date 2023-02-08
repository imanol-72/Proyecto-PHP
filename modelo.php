<?php
       function buscarPeliculas($conexion, $sql)
      {

          $resul = mysqli_query($conexion, $sql);
          if (!$resul)
          {
              $error = "Error en consulta - " . mysqli_error($conexion);
              include "error.php";
              exit();
          }
          $productos = [];
          while ($fila = mysqli_fetch_array($resul))
          {
              $peliculas[] = $fila;
          }
          return $peliculas;
         
      }
?>
