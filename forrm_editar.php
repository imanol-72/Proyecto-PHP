
<?php
    $menu = 'menu.php';
    include "cabecera.php";
?>

<form id='form' action="index.php" method="post">
    <div id='datos'>
    
    <label>Nombre</label>
    <input type="text" name="nombre" value ="<?php if (isset($nombre))echo htmlspecialchars($nombre) ?>"/>
    <span class="error"><?php if (isset($errores["nombre"])) echo $errores["nombre"]?></span><br />
    
    
    
    <label>DNI</label>
    <input type="text" name="dni" value ="<?php if (isset($dni)) echo htmlspecialchars($dni) ?>" />
    <span class="error"><?php if (isset($errores["dni"])) echo $errores["dni"]?></span><br />
    
    <label>FECHA NACIMIENTO</label>
    <input type="text" name="fechnaci" value ="<?php if (isset($fechnaci)) echo htmlspecialchars($fechnaci) ?>" />
    <span class="error"><?php if (isset($errores["fechnaci"])) echo $errores["fechnaci"]?></span><br />
    
    <input type="submit" name="editar" value="Editar" /><br />
    <input type="hidden" name="accion" value="editar" /><br />
    <input type='hidden' name = 'codact' value = "<?php if (isset($codact)) echo $codact; ?>" />
    </div>
</form>
<?php
    include "pie.php";
?>