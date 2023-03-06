<?php 
    $menu = "menu.php";
    include "cabecera.php";
    
    
    echo "<div id='tabla_inicio'>";
    echo "<table><tr><th>Título</th><th>Duración</th><th>Fecha estreno</th></tr>";
    foreach ($peliculas as $pelicula) 
    {
?>
    <tr>
        <td><?php echo filtrarDato($pelicula['titulo'])?></td>
        <td><?php echo filtrarDato($pelicula['duracion'])?></td>
        <td><?php echo filtrarDato($pelicula['fechestreno'])?></td>
        <td>
            <form action="index.php" method="post" >
                <div>
                    <input type='submit' name='borrar' value='Borrar' />
                    <input type='hidden' name = 'id' value = "<?php echo filtrarDato($pelicula['id']); ?>" />
                </div>
            </form>
        </td>
    </tr>
 <?php
    }
    echo  "</table>";
    include "pie.php";
?>