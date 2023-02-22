<?php
require_once 'utils.php';
require_once 'conexion.php';
require_once 'modelo.php';



if (!isset($_POST['enviar']))
{
     $titulo = trim($_POST['titulo']);
     $errores = array();

     if (empty($titulo))
     {
         $errores['titulo'] = "Introduzca un título";
     }

     if (isset($_POST['genero']))
     {
         $genero = $_POST['genero'];
     }

     if (isset($_POST['ano']))
     {
         $ano = $_POST['ano'];
     }

     if (!isset($_POST['edad']))
     {
         $errores['edad'] = "Seleccione el público objetivo.";
     }
     else
     {
         $edad = $_POST['edad'];
     }

     if (!isset($_POST['actores']))
     {
         $errores['actores'] = "Seleccione algún actor.";
     }
     else
     {
         $actores = $_POST['actores'];
     }

     if (!empty($errores))
     {
         include "form_buscar.php";
         exit();
     }
     $titulo = mysqli_real_escape_string($conexion, $titulo);
     $genero = mysqli_real_escape_string($conexion, $genero);
     $ano = mysqli_real_escape_string($conexion, $ano);
     $edad = mysqli_real_escape_string($conexion, $edad);
     $actores = mysqli_real_escape_string($conexion, $actores);

      $sql = "SELECT  titulo, genero, fechestreno, rangoedad, a.nombre FROM peliculas p JOIN actores a ON p.id=a.codact
                       WHERE p.titulo LIKE '%$titulo%' and genero=$genero and fechestreno=$ano and rangoedad=$edad and nombre=$actores;";

      $peliculas = obtenerPeliculas($conexion, $sql);
      include "form_buscar.php";
      exit();
}


  if (isset($_GET['opcion']) && $_GET['opcion'] == 'listar') {
          // generar consulta 
          $sql = "select id,titulo,fechestreno,duracion,genero from peliculas;";
          $peliculas = obtenerPeliculas($conexion, $sql);
          include "listar.php";
          exit();
      }


   if (isset($_GET['opcion']) && $_GET['opcion'] == 'buscar') {
          include "form_buscar.php";
          exit();
      }

 
      $sql = "SELECT titulo,duracion,fechestreno FROM peliculas";
      $productos = obtenerPeliculas($conexion, $sql);
      include "vista_inicio.php";
?>
