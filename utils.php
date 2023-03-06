<?php

      function verArray($array)
      {
          echo "<pre>";
          print_r($array);
          echo "</pre>";
      }

      function validar($dni, $nombre, $fechnaci)
     {
         $errores = array();
         if (empty($dni))
         {
             $errores['dni'] = 'Introduzca dni';
         }
         if (empty($nombre))
         {
             $errores['nombre'] = 'Introduzca nombre';
         }
         
         if (empty($fechnaci))
         {
             $errores['fechnaci'] = 'Introduzca fecha de nacimiento';
         }

         return $errores;
     }

      function filtrarDato($dato)
      {
          return htmlspecialchars(trim($dato));
      }

?>
