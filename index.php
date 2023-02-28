<?php
    require_once 'utils.php';
    require_once 'conexion.php';
    require_once 'modelo.php';

    if (isset($_GET['opcion']) && $_GET['opcion'] == 'actores') 
        {
              $sql = "select nombre,salario,fechnaci from actores";
              $actores = obtenerActores($conexion, $sql);
              include "vista_actores.php";
              exit();
        }
        

    if (isset($_POST['enviar']))
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


         if (!empty($errores))
         {
             include "form_buscar.php";
             exit();
         }
         $titulo = mysqli_real_escape_string($conexion, $titulo);
         $genero = mysqli_real_escape_string($conexion, $genero);
         $ano = mysqli_real_escape_string($conexion, $ano);
         
         switch ($ano)
         {
             case 'A' : $tex="select fechestreno between 2000 and 2005";
                 break;
             case 'B' : $tex="select fechestreno between 2006 and 2010";
                 break;
             case 'B' : $tex="select fechestreno between 2011 and 2015";
                 break;
             case 'D' : $tex="select fechestreno between 2016 and 2020";
                 break;
             case 'E' : $tex="select fechestreno > 2021";
                 break;
           
         }

          $sql = "SELECT  titulo, genero, fechestreno FROM peliculas p WHERE p.titulo LIKE '%$titulo%' and genero = '$genero' and fechestreno = '$ano'";

          $peliculas = obtenerPeliculas($conexion, $sql);
          include "form_buscar.php";
          exit();
    }


       if (isset($_GET['opcion']) && $_GET['opcion'] == 'buscar') {
              include "form_buscar.php";
              exit();
          }


          $sql = "SELECT titulo,duracion,fechestreno FROM peliculas";
          $peliculas = obtenerPeliculas($conexion, $sql);
          include "vista_inicio.php";
?>