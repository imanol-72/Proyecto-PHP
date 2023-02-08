<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="form.css">
  <title>Encuesta</title>
</head>
<body>

    <form action="process.php" method="POST">
      <h1>Encuesta sobre películas</h1>
      <div>
        <label for="name">Titulo: </label>
        <input type="text" name="name" id="name" />
      </div>
      <!---->
      <div>
        <label for="date">Fecha: </label>
        <input type="date" name="date" id="date" />
      </div>
      <!---->
      <div>
        <label for="duration">Duración: </label>
        <input type="text" name="duration" id="duration" />
      </div>
      <!---->
      <div>
        <label for="genre">Genero: </label>
        <select name="genre" id="genre">
          <option value="accion">Acción</option>
          <option value="belico">Bélico</option>
          <option value="infantil">Infantil</option>
          <option value="drama">Drama</option>
        </select>
      </div>
      <!---->
      <div>
        <h4>Años de estreno</h4>
        <input type="radio" checked="checked" name="option" value="A">Todos los años<br>
        <input type="radio" name="option" value="A">2000 - 2005<br>
        <input type="radio" name="option" value="B">2006 - 2010<br>
        <input type="radio" name="option" value="B">2011 - 2015<br>
        <input type="radio" name="option" value="B">2016 - 2020<br>
        <input type="radio" name="option" value="B">2021 +<br>
      </div>
      <!---->  
      <div>
        <h3>Público</h3>
        <input type="checkbox" checked="checked" name="option" value="all">Todos los públicos<br>
        <input type="checkbox" name="option" value="+6">+ 6<br>
        <input type="checkbox" name="option" value="+12">+12<br>
        <input type="checkbox" name="option" value="+18">+18<br>
      </div>
       <!---->
      <div>
        <h3>Actores Famosos</h3>
        <select multiple>
            <option value="A">Brad Pitt</option>
            <option value="B">Johnny Depp</option>
            <option value="C">Bruce Willis</option>
            <option value="D">Leonardo DiCaprio</option>
            <option value="E">Angelina Jolie</option>
            <option value="F">Scarlett Johansson</option>
        </select>
      </div>
    
      <div>
        <input type="submit" value="Enviar" />
      </div>
    </form>
</body>
</html>
