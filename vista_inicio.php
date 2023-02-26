<?php 
    $menu = "menu.php";
    include "cabecera.php";
?>
<div id="tabla_inicio">
    <table><tr><th>Título</th><th>Duración</th><th>Fecha estreno</th></tr>
<?php
    foreach ($peliculas as $pelicula) 
    {
        echo "<tr><td>".filtrarDato($pelicula['titulo'])."</td>";
        echo "<td>".filtrarDato($pelicula['duracion'])."</td>";
        echo "<td>".filtrarDato($pelicula['fechestreno'])."</td>";
        echo "</tr>\n";
    }
?>
    </table> 
</div>
 <?php
    include "pie.php";
?>
