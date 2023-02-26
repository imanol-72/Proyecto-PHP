<?php
      $menu = 'menu.php';
    include "cabecera.php";
?>


<form id="form"  action="index.php" method="post">
    <div>
        <h1>Formulario de búsqueda</h1>
        <hr/><br>
        <label>Título</label>
        <input type="text" name="titulo" value="<?php if (isset($titulo)) echo filtrarDato($titulo) ?>"  /><br />
        <span class="error" > 
            <?php if (isset($errores['titulo'])) echo $errores['titulo'] ?>
        </span><br />    

        <div>
        <label>Género</label>
        <select name="genero"> 
                <?php
                    $genero=array('Acción','Bélico','Infantil','Drama');
                    foreach ($genero as $valor)
                    {
                        echo "<option value='$valor' ";
                        if (isset($genero) && ($genero == $valor))
                                {echo "selected = 'selected' ";};
                        echo ">$valor</option>";
                    }
                ?>  
          </select><br/><br/>
        </div>
        
            <div class="cajas_form">
                <h3>Años de estreno</h3>
                <input type="radio" checked="checked" name="ano" value="todos"  <?php  if (isset($ano)&& ($ano == "todos")){echo 'checked = "checked"';} ?>>Todos los años<br>
                <input type="radio" name="ano" value="A" <?php  if (isset($ano)&& ($ano == "A")){echo 'checked = "checked"';} ?>>2000 - 2005<br>
                <input type="radio" name="ano" value="B" <?php  if (isset($ano)&& ($ano == "B")){echo 'checked = "checked"';} ?>>2006 - 2010<br>
                <input type="radio" name="ano" value="C" <?php  if (isset($ano)&& ($ano == "C")){echo 'checked = "checked"';} ?>>2011 - 2015<br>
                <input type="radio" name="ano" value="D" <?php  if (isset($ano)&& ($ano == "D")){echo 'checked = "checked"';} ?>>2016 - 2020<br>
                <input type="radio" name="ano" value="E" <?php  if (isset($ano)&& ($ano == "E")){echo 'checked = "checked"';} ?>>2021 +<br>
            </div>

            <div class="cajas_form">
                <h3>Público</h3>
                <input type="checkbox" checked="checked" name="edad[]" value="todos" <?php  if (isset($edad)&& in_array("todos", $edad)){echo 'selected = "selected"';} ?>>Todos los públicos<br>
                <input type="checkbox" name="edad[]" value="+6" <?php  if (isset($edad)&& in_array("+6", $edad)){echo 'selected = "selected"';} ?>>+ 6<br>
                <input type="checkbox" name="edad[]" value="+12"<?php  if (isset($edad)&& in_array("+12", $edad)){echo 'selected = "selected"';} ?>>+12<br>
                <input type="checkbox" name="edad[]" value="+18"<?php  if (isset($edad)&& in_array("+18", $edad)){echo 'selected = "selected"';} ?>>+18<br>

            <span class="error"> 
                <?php if (isset($errores['edad'])) echo $errores['edad'] ?>   
            </span><br />
            </div>

            <div class="cajas_form">
            <h3>Actores Famosos</h3>
                <select name="actores[]" size="4" multiple="multiple"> 
                <option value="Brad Pitt"  <?php if (isset($actores) && in_array("Brad Pitt", $actores)) echo "selected = 'selected'" ?>  >Brad Pitt </option>
                <option value="Johnny Depp"  <?php if (isset($actores) && in_array("Johnny Depp", $actores)) echo "selected = 'selected'" ?>  >Johnny Depp</option>
                <option value="Bruce Willis" <?php if (isset($actores) && in_array("Bruce Willis", $actores)) echo "selected = 'selected'" ?>  >Bruce Willis</option>
                <option value="Leonardo DiCaprio" <?php if (isset($actores) && in_array("Leonardo DiCaprio", $actores)) echo "selected = 'selected'" ?>  >Leonardo DiCaprio</option>
                <option value="Angelina Jolie" <?php if (isset($actores) && in_array("Angelina Jolie", $actores)) echo "selected = 'selected'" ?>  >Angelina Jolie</option>
                <option value="Scarlett Johansson" <?php if (isset($actores) && in_array("Scarlett Johansson", $actores)) echo "selected = 'selected'" ?>  >Scarlett Johansson</option>
            </select><br />
            <span class='error'>
                <?php if (isset($errores['actores'])) echo $errores['actores'] ?>
            </span>
            </div>
        
        <br /><label>&nbsp;</label>
        
        <button name="enviar" class="cssbuttons-io-button"> Enviar
            <div class="icon">
              <svg height="24" width="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 0h24v24H0z" fill="none"></path>
                <path d="M16.172 11l-5.364-5.364 1.414-1.414L20 12l-7.778 7.778-1.414-1.414L16.172 13H4v-2z" fill="currentColor"></path>
              </svg>
            </div>
        </button>

    </div>
</form>
<?php
    echo "<div class='resultado'>";
        if (isset($resultado))
        {
            echo $resultado;
        }
    echo "</div>";

    include "pie.php";
?>