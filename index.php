<?php

if (!isset($_POST['enviar']))
{
    include "form_buscar.php";
    exit();
}

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

$resultado = "Nombre: ".htmlspecialchars(trim($titulo)).
            "<br>Género: ".htmlspecialchars(trim($genero)).
             "<br>Año: ".htmlspecialchars(trim($ano))."<br>Edad: ";
             $edad = $_POST['edad'];
            foreach ($edad as $valor)
            {
                $resultado .= htmlspecialchars(trim($valor))." ";
            }
            $resultado .= "<br>Actores: ";
            $actores = $_POST['actores'];
            foreach ($actores as $valor)
            {
                $resultado .= htmlspecialchars(trim($valor))." ";
            }

include "form_buscar.php";
?>