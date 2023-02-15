<?php

   
        if (!isset($_POST['Enviar']))
        {
            include 'form_buscar.php';
            exit();
        }
      
    
          $texto = trim($_POST['titulo']);
          $duracion = trim($_POST['duration']);
          $errores = array();
          if (empty($texto))
          {
              $errores['titulo'] = "Introduce el nombre";
          }
         
                
          if (!empty($errores)) {
              include "form_buscar.php";
              exit();
          }
          
            $resultado = "Nombre: ".htmlspecialchars(trim($texto))."
            Duracion:".htmlspecialchars(trim($duracion)).
            "
            Año: ".htmlspecialchars(trim($ano))."
            ".
            "Edad: ";
            $edad = $_POST['edad'];
            foreach ($edad as $valor)
            {
            $resultado .= htmlspecialchars(trim($valor))." ";
            }
            $resultado .= "
            Actores
            ";
            $actores = $_POST['actores'];
            foreach ($actores as $valor)
            {
            $resultado .= htmlspecialchars(trim($valor))." ";
            
}
    
 include "form_buscar.php";
?>
