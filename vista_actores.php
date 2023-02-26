<?php 
    $menu = "menu.php"; 
    include "cabecera.php";
   
    echo "<h2>Actores</h2>";
    foreach ($actores as $actor) 
    {
        echo "<p>".filtrarDato($actor['nombre'])." -- ".filtrarDato($actor['salario'])." -- ".filtrarDato($actor['fechnaci'])."</p>";
    }
    include "pie.php";
     
?>