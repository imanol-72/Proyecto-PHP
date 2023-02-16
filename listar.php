<?php 
    $menu = "menu.php"; 
    include "cabecera.php";
   
    echo "<h2>Películas</h2>";
    echo "<table><tr><th>Id</th><th>Título</th><th>Fecha estreno</th><th>Duración</th><th>Género</th></tr>";
    foreach ($peliculas as $pelicula) 
    {
        echo "<tr><td>".filtrarDato($pelicula['id'])."</td><td> ";
        echo filtrarDato($pelicula['titulo'])."&euro; </td><td>";
        echo filtrarDato($pelicula['fechestreno'])."</td>";
        echo filtrarDato($pelicula['duracion'])."</td>";
        echo filtrarDato($pelicula['genero'])."</td></tr>";
    }
    echo "</table>";
    include "pie.php";
     
?>