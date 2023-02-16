<?php 
    $menu = "menu.php";
    include "cabecera.php";
    
    //echo "Conexión establecida";
?>
   
    <table><tr><th>Título</th><th>Duración</th><th>Fecha estreno</th></tr>
<?php
    foreach ($peliculas as $pelicula) 
    {
        echo "<tr><td>". filtrarDato( $peliculas['titulo'])."</td>";
        echo "<td>".  filtrarDato($peliculas['duracion'])."</td>";
        echo "<td>".filtrarDato($peliculas['fechestreno'])."</td>";
        echo "</tr>\n";
    }
    ?>
    </table> 
 <?php
    include "pie.php";
?>
