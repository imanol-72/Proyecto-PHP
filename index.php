<?php
    
   
 
   include 'vista_inicio.php';
   
   
    if (isset($_POST['buscar'])) {
          $texto = trim($_POST['titulo']);
          $duracion = trim($_POST['duration']);
          $errores = array();
          if (empty($texto))
          {
              $errores['nombre'] = "Introduce el nombre";
          }
           if (empty($duracion))
          {
              $errores['duration'] = "Introduce la duración";
          }
           /* proceso del botón de radio; como no hay atributo checked="cheked" preguntamos if isset primero  */
            if (!isset($_POST['genre']))
            {
                $errores['genre']="Introduce el género";
            }   else 
            {
                $genero = trim($_POST['genre']); 
            } 
             if (!isset($_POST['ano']))
            {
                $errores['ano']="Introduce el año";
            }   else 
            {
                $año = trim($_POST['ano']); 
            }  
            
          if (!empty($errores)) {
              include "form_buscar.php";
              exit();
          }
    }
?>
