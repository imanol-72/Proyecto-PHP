<?php
    
   
   include 'vista_inicio.php';
   
   
    if (isset($_POST['buscar'])) {
          $texto = trim($_POST['titulo']);
          $duracion = trim($_POST['duration']);
          $errores = array();
          if (empty($texto))
          {
              $errores['titulo'] = "Introduce el nombre";
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
            
             if (!isset($_POST['edad']))
                {
                    $errores['edad']="Introduce la edad";
                }   else 
                {
                    $edad = trim($_POST['edad']); 
                }  
            
            if (!isset($_POST['actores']))
                {
                    $errores['actores']="Introduce algún actor";
                }   else 
                {
                    $actores = trim($_POST['actores']); 
                }  
                
          if (!empty($errores)) {
              include "form_buscar.php";
              exit();
          }
          $resultado= " ";
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
    }
 
?>
