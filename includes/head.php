<?php
require_once("soporte.php");
if ($auth->estaLogueado()) {
  $usuarioLogueado = $auth->usuarioLogueado($db);

  $username = $usuarioLogueado->getUsername();
  $name = $usuarioLogueado->getName();
  $apellido = $usuarioLogueado->getApellido();
  $email = $usuarioLogueado->getEmail();
  $edad = $usuarioLogueado->getEdad();
  $pais = $usuarioLogueado->getPais();
  $img = glob("img/" . $email . ".*")[0];
}

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximun-scale=1, minimun-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
    <link rel="stylesheet" href="css/fontello.css">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="icon" href="images/libro-icono-MRK-2.ico">
    <title><?=$tituloDePagina;?></title>
  </head>
  <body>
      <header>
        <div class="contenedor">
          <h1 class="icon-book"> Long story </h1>
          <input type="checkbox" id="menu-bar">
          <label class="icon-menu" for="menu-bar"></label>
          <nav class="menu">
            <a href="index.php"> Inicio </a>
            <a href="preguntas.php"> Preguntas</a>
		<?php if ($auth->estaLogueado()) : ?>
			<a class="button" href="miPerfil.php">Hola <?=$username?></a>
      <img src="<?=$img?>" alt="avatar" width="50" height="50" style="border-radius: 50%;">
      <a class="button" href="logout.php">Salir</a>
		<?php else: ?>
            <a href="register.php"> Registro </a>
            <a href="login.php"> Login </a>
		<?php endif; ?>
          </nav>
        </div>
      </header>

         <section id="banner">
        <img src="images/banner2.jpg" >
          <div class="contenedor">
            <h2> Long story | Tu librería online</h2>
            <p> ¿Cuál es tu libro favorito?</p>
            <a href="#"> Leer más </a>
          </div>
        </section>
