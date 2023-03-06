<?php
    $menu = 'menu.php';
    include "cabecera.php";
    echo "<table><tr><th>DNI</th><th>NOMBRE</th><th>NACIMIENTO</th></tr>";
    foreach ($actorese as $actore)
    {
  ?>
  
    <tr>
    
             <td><?php echo filtrarDato($actore['dni']) ?> </td>
             <td><?php echo  filtrarDato($actore['nombre']) ?> </td>
             <td><?php echo filtrarDato($actore['fechnaci']) ?> </td>
             <td>
                 <form action="index.php" method="post" >
                     <div>
                 <input type='submit' name='editar' value='Editar' />
                 <input type='hidden' name = 'codact' value = "<?php echo filtrarDato($actore['codact']); ?>" />
                     </div>
                 </form>
             </td>

   
    </tr>

 <?php
    }
    echo "</table>";
    include "pie.php";
?>