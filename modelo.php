<?php

      function obtenerPeliculas($conexion, $sql)
      {

          $resul = mysqli_query($conexion, $sql);
          if (!$resul) // ha ocurrido un error
          {
              $error = "Error en consulta - " . mysqli_error($conexion);
              include "error.php";
              exit();
          }
//
          $peliculas = []; // guardo en esta array las personas devueltas por la consulta
          // para mostrar la plantilla de vista_inicio.php
          while ($fila = mysqli_fetch_array($resul))
          {
              $peliculas[] = $fila;
          }
          return $peliculas;
      }
      
      function obtenerActores($conexion, $sql)
      {

          $resul = mysqli_query($conexion, $sql);
          if (!$resul) // ha ocurrido un error
          {
              $error = "Error en consulta - " . mysqli_error($conexion);
              include "error.php";
              exit();
          }
//
          $actores = []; // guardo en esta array las personas devueltas por la consulta
          // para mostrar la plantilla de vista_inicio.php
          while ($fila = mysqli_fetch_array($resul))
          {
              $actores[] = $fila;
          }
          return $actores;
      }
      
?>