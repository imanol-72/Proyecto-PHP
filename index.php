<?php
    require_once 'utils.php';
    require_once 'conexion.php';
    require_once 'modelo.php';


    /* Modificar */   
     if (isset($_GET['oper']) && $_GET['oper'] == 'editar')
      {
          $mensaje = 'Registro modificado correctamente';
      }
     // se ha pulsado el botón editar  en form_editar.php
      if (isset($_POST['accion']))
      {
          $codact = mysqli_real_escape_string($conexion, $_POST['codact']);
          // recoger los datos del formulario y valida
          $dni = trim($_POST['dni']);
          $nombre = trim($_POST['nombre']);
          $fechnaci = trim($_POST['fechnaci']);
          $errores = validar($nombre, $dni, $salario, $fechnaci);
          if (!empty($errores))
          {
              // ha habido errores
              include "forrm_editar.php";
              exit();
      }

          $dni = mysqli_real_escape_string($conexion, $dni);
          $nombre = mysqli_real_escape_string($conexion, $nombre);
          $fechnaci = mysqli_real_escape_string($conexion, $fechnaci);

          // consulta de actualización en la BD
          $sql = "UPDATE actores SET dni = '$dni',
                                    nombre = '$nombre',
                                    fechnaci = '$fechnaci'
                                    WHERE codact = '$codact' ";
          modificarActor($conexion, $sql);
          header('Location: index.php?oper=editar');
          exit();
     }
      // se ha pulsado el botón editar  en vista_editar.php
     if (isset($_POST['editar']))
     {
          $codact = mysqli_real_escape_string($conexion, $_POST['codact']);
          // leo el registro con el Codigo de actor trasmitido y que hay que modificar
          $sql = "SELECT dni, nombre, fechnaci FROM actores   ";
          $fila = obtenerActor($conexion, $sql);          
          $dni = $fila['dni'];
          $nombre = $fila['nombre'];
          $fechnaci = $fila['fechnaci'];
          include "forrm_editar.php";
          exit();
    }
    
    
    if (isset($_GET['opcion']) && $_GET['opcion'] == 'editar') {
              $sql = 'SELECT dni, nombre, fechnaci FROM actores'
                      ;
              $actorese = obtenerActores($conexion, $sql);
              include "vista_editar.php";
              exit();
    }


    /* Borrar */

    if (isset($_GET['oper']) && $_GET['oper'] == 'borrar')
    {
        $mensaje = 'Registro borrado correctamente';
    }

    if (isset($_POST['borrar']))
    {
        $id = mysqli_real_escape_string($conexion, $_POST['id']);
        $sql= "DELETE FROM peliculas where ID = '$id'";
        borrarPelicula($conexion, $sql);
        header('Location: index.php?oper=borrar');
        exit();
    }
    
     if (isset($_GET['opcion']) && $_GET['opcion'] == 'borrar')
     {
          $sql = 'SELECT titulo,duracion,fechestreno,id FROM peliculas';
          $peliculas = obtenerPeliculas($conexion, $sql);
          include "vista_borrar.php";
          exit();
     }
      
    /* Insertar */

    if (isset($_GET['oper']) && $_GET['oper'] == 'insertar')
      {
          $msg = 'Registro insertado correctamente';
      }

      // se ha hecho click en el enlace Insertar
      if (isset($_GET['opcion']) && $_GET['opcion'] == 'inser')
      {
          include "form_insertar.php";
          exit();
      }
    
        if (isset($_POST['insertar']))
        {
          // recoger los datos del formulario y validar
          $nombre = trim($_POST['nombre']);
          $dni = trim($_POST['dni']);
          $fech_naci = trim($_POST['fechnaci']);
          $errores = array();
           
         
         if (empty($nombre))
         {
             $errores['nombre'] = "Introduzca un nombre";
         }
         if (empty($dni))
         {
             $errores['dni'] = "Introduzca un dni";
         }
          if (!empty($errores))
          {
              include "form_insertar.php";
              exit();
          }
        
         
            $nombre = mysqli_real_escape_string($conexion, $nombre);
            $dni = mysqli_real_escape_string($conexion, $dni);
            $fech_naci = mysqli_real_escape_string($conexion, $fech_naci);
            $sql_1="select count(*) as codact1 from actores";
            $cod_act = obtenerPeliculas($conexion, $sql_1);
            //$total=0;
            foreach ($cod_act as $cod_act1){
                $cod_act1=$cod_act1['codact1'] + 1;
            }
            $cod_act1 = mysqli_real_escape_string($conexion, $cod_act1);
            // consulta de inserci&oacute;n en la BD
    
            // consulta de inserci&oacute;n en la BD
            $sql = "INSERT INTO ACTORES (codact,dni, nombre, fechnaci)
                  VALUES ('$cod_act1','$dni', '$nombre', '$fech_naci') ";
            insertarPersona($conexion, $sql);
            header('Location: index.php?oper=insertar');
            exit();
      }

    /* Listar */ 
    
    if (isset($_GET['opcion']) && $_GET['opcion'] == 'actores') 
        {
              $sql = "select nombre,salario,fechnaci from actores";
              $actores = obtenerActores($conexion, $sql);
              include "vista_actores.php";
              exit();
        }
        
    /* Buscar */

    if (isset($_POST['enviar']))
    {
         $titulo = trim($_POST['titulo']);
         $genero = trim($_POST['genero']);
         $errores = array();

         if (empty($titulo))
         {
             $errores['titulo'] = "Introduzca un título";
         }

         if (isset($_POST['ano']))
         {
             $ano = $_POST['ano'];
         }
         else
         {
             $errores['ano']= "Introduce el año de estreno.";
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
             case 'A': $tex = "(fechestreno >= 2003)";
                 break;
             case 'B': $tex = "(fechestreno >= 2006)";
                 break;
             case 'C': $tex = "(fechestreno >= 2011)";
                 break;
             case 'D': $tex = "(fechestreno >= 2016)";
                 break;
             case 'E': $tex = "(fechestreno >= 2021)";
                 break;
         }

          $sql = "SELECT  titulo, genero, fechestreno FROM peliculas p WHERE p.titulo LIKE '%$titulo%' and genero = '$genero' and $tex";

          $peliculas = obtenerPeliculas($conexion, $sql);
          include "form_buscar.php";
          exit();
    }


       if (isset($_GET['opcion']) && $_GET['opcion'] == 'buscar') {
              include "form_buscar.php";
              exit();
          }

    /* Inicio */

          $sql = "SELECT titulo,duracion,fechestreno FROM peliculas";
          $peliculas = obtenerPeliculas($conexion, $sql);
          include "vista_inicio.php";
?>
