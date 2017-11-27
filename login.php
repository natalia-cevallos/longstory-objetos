<?php

	include_once("soporte.php");

  if ($auth->estaLogueado()) {
		header("Location:index.php");exit;
	}

	$errores = [];
	if ($_POST) {
		$errores = $validator->validarLogin($_POST, $db);
		if (count($errores) == 0) {
			// LOGUEAR
      $auth->loguear($_POST["email"]);
			if (isset($_POST["recordame"])) {
				//Quiere que lo recuerde
				$auth->recordame($_POST["email"]);
			}
      header("Location:index.php");
		}
	}
	$tituloDePagina = 'Login';
	include("includes/head.php");
?>
		<form method="POST" class="form-register" action="login.php" enctype="multipart/form-data">
			<h2 class="form-titulo"> INGRESA </h2>
			<div class="contenedor-inputs">
				<div class="unInput lg">
				<input  type="text" name="email" id="email" placeholder="Correo" value="">
				<?php if (isset($errores['email'])): ?>
					<span class="error"><?=$errores['email'];?></span>
				<?php endif; ?>
			</div>
			<div class="unInput lg">
				<input id="password" type="password" name="password" placeholder="Contraseña">
			</div>
			<div class="unInput lg">
				<input class="btn-enviar" type="submit">
			</div>
			<div class="container-recordarme">
				<label for="recordame">Recordame</label>
				<input type="Checkbox" name="recordame">
			</div>
			</div>
		</form>

<?php include("includes/end.php"); ?>
