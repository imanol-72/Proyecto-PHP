<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/form.css">
  <title>Encuesta</title>
</head>
<body>

    <form action="process.php" method="POST">
      <h1>Encuesta sobre películas</h1>
      <div>
        <label for="name">Titulo:  </label>
        <input type="text" name="titulo" value ="<?php if (isset($texto)) echo filtrarDato($texto) ?>"  />
        <span class="error">
        <?php if (isset($errores['nombre'])) echo $errores['nombre'] ?>
        </span><br />
      </div>
      <!---->
      <div>
        <label for="date">Fecha: </label>
        <input type="date" name="date" id="date" />
      </div>
      <!---->
      <div>
        <label for="duration">Duración: </label>
        <input type="text" name="duration" id="duration" value=" <?php if (isset($texto)) echo filtrarDato($texto) ?> "/>
      </div>
         <span class="error">
        <?php if (isset($errores['duration'])) echo $errores['duration'] ?>
        </span><br />
      <!---->
      <div>
        <label for="genre">Genero: </label>
        <select name="genre"> 
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
      <!---->
      <div>
        <h4>Años de estreno</h4>
        <input type="radio" checked="checked" name="option" value="A"  <?php  if (isset($ano)&& ($ano == "a")){echo 'checked = "checked"';} ?>>Todos los años<br>
        <input type="radio" name="option" value="A" <?php  if (isset($ano)&& in_array("A", $ano)){echo 'checked = "checked"';} ?>>2000 - 2005<br>
        <input type="radio" name="option" value="B" <?php  if (isset($ano)&& in_array("B", $ano)){echo 'checked = "checked"';} ?>>2006 - 2010<br>
        <input type="radio" name="option" value="C" <?php  if (isset($ano)&& in_array("C", $ano)){echo 'checked = "checked"';} ?>>2011 - 2015<br>
        <input type="radio" name="option" value="D" <?php  if (isset($ano)&& in_array("D", $ano)){echo 'checked = "checked"';} ?>>2016 - 2020<br>
        <input type="radio" name="option" value="E" <?php  if (isset($ano)&& in_array("E", $ano)){echo 'checked = "checked"';} ?>>2021 +<br>
      </div>
      <span class="error" ><?php if (isset($errores['ano'])) echo $errores['ano']?></span><br/><br/>
      <!---->  
      <div>
        <h3>Público</h3>
        <input type="checkbox" checked="checked" name="option" value="all" <?php  if (isset($edad)&& in_array("all", $edad)){echo 'selected = "selected"';} ?>>Todos los públicos<br>
        <input type="checkbox" name="option" value="+6" <?php  if (isset($edad)&& in_array("+6", $edad)){echo 'selected = "selected"';} ?>>+ 6<br>
        <input type="checkbox" name="option" value="+12"<?php  if (isset($edad)&& in_array("+12", $edad)){echo 'selected = "selected"';} ?>>+12<br>
        <input type="checkbox" name="option" value="+18"<?php  if (isset($edad)&& in_array("+18", $edad)){echo 'selected = "selected"';} ?>>+18<br>
      </div>
       <!---->
      <div>
        <h3>Actores Famosos</h3>
        <select name='actores[]' multiple='multiple'>
            <?php
                    $actores=array('Brad Pitt','Johnny Depp','Bruce Willis','Leonardo DiCaprio','Angelina Jolie','Scarlett Johansson');
                    foreach ($actores as $valor)
                    {
                        echo "<option value='$valor' ";
                        if (isset($actores) && in_array($valor, $actores));
                                {echo "selected = 'selected' ";};
                        echo ">$valor</option>";
                    }
                ?>  
        </select>
      </div>
    
      <div>
        <input type="submit" value="Enviar" />
      </div>
       <?php
          if (isset($resultado)) { echo $resultado ;}
     ?>
    </form>
     
</body>
</html>