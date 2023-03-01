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
                    $genero=array('ACCION','BELICO','INFANTIL','DRAMA');
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
                <input type="radio" name="ano" value="A" <?php  if (isset($ano)&& ($ano == "A")){echo 'checked = "checked"';} ?>>2000 - 2005<br>
                <input type="radio" name="ano" value="B" <?php  if (isset($ano)&& ($ano == "B")){echo 'checked = "checked"';} ?>>2006 - 2010<br>
                <input type="radio" name="ano" value="C" <?php  if (isset($ano)&& ($ano == "C")){echo 'checked = "checked"';} ?>>2011 - 2015<br>
                <input type="radio" name="ano" value="D" <?php  if (isset($ano)&& ($ano == "D")){echo 'checked = "checked"';} ?>>2016 - 2020<br>
                <input type="radio" name="ano" value="E" <?php  if (isset($ano)&& ($ano == "E")){echo 'checked = "checked"';} ?>>2021 +<br>
            </div>
            <span class="error" > 
                <?php if (isset($errores['ano'])) echo $errores['ano'] ?>
            </span><br />  

        
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
        if (isset($peliculas))
        {
            echo "Resultado de la búsqueda:";
            foreach ($peliculas as $pelicula)
            {
                echo "<div class ='pelicula'>";
                echo "<br/>".filtrarDato($pelicula['titulo']." -- ".$pelicula['genero'])." -- ".filtrarDato($pelicula['fechestreno']);
                echo "</div>";
            }
        }
        echo "</div>";
   
    include "pie.php";
?>
