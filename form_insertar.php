<?php
    $menu = "menu.php";
    include "cabecera.php";
?>

<form id='form' action="index.php" method="post">
    <div id='datos'>
    <label>NOMBRE ACTOR</label>
    <input type="text" name="nombre" value ="<?php if (isset($nombre)) echo filtrarDato($nombre) ?>" />
    <span class="error"><?php if (isset($errores["nombre"])) echo $errores["nombre"]?></span><br />
    
     <label>DNI</label>
    <input type="text" name="dni" value ="<?php if (isset($dni)) echo filtrarDato($dni) ?>" />
    <span class="error"><?php if (isset($errores["dni"])) echo $errores["dni"]?></span><br />
    
    <label>FECHA NACIMIENTO</label>
    <input type="date" name="fechnaci" value ="<?php if (isset($fech_naci)) echo filtrarDato($fech_naci) ?>" />
    <span class="error"><?php if (isset($errores["fechnaci"])) echo $errores["fechnaci"]?></span><br />
    
    <label>&nbsp;</label>
    <input type="submit" name="insertar" value="Insertar producto" /><br />
    </div>
</form>
<?php
    include "pie.php";
?>
