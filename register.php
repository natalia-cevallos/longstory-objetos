<?php

	include_once("soporte.php");

	if ($auth->estaLogueado()) {
		header("Location:index.php");exit;
	}

	$emailDefault = "";
	$nameDefault = "";
	$apellidoDefault = "";
	$edadDefault = "";
	$usernameDefault = "";
	$telefonoDefault = "";

	$paises = [
		"Ar" => "Argentina",
		"Br" => "Brasil",
		"Co" => "Colombia",
		"Fr" => "Francia"
	];

	$errores = [];
	if ($_POST) {
		$errores = $validator->validarInformacion($_POST, $db);

		if (!isset($errores["email"])) {
			$emailDefault = $_POST["email"];
		}

		if (!isset($errores["name"])) {
			$nameDefault = $_POST["name"];
		}

		if (!isset($errores["apellido"])) {
			$apellidoDefault = $_POST["apellido"];
		}

		if (!isset($errores["edad"])) {
			$edadDefault = $_POST["edad"];
		}

		if (!isset($errores["username"])) {
			$usernameDefault = $_POST["username"];
		}

		if (!isset($error["telefono"])) {
			$telefonoDefault = $_POST["telefono"];
		}

		if (count($errores) == 0) {
			$usuario = new Usuario($_POST["email"], $_POST["name"], $_POST["apellido"], $_POST["password"], $_POST["edad"], $_POST["username"], $_POST["pais"]);

			$usuario->guardarImagen();
			$usuario = $db->guardarUsuario($usuario);

			header("Location:miPerfil.php");exit;
		}
	}
	$tituloDePagina = 'Registro';
	include("includes/head.php");
?>
		<form method="POST" action="register.php" class="form-register" enctype="multipart/form-data">
			<h2 class="form-titulo"> CREA UNA CUENTA </h2>
			<div class="contenedor-inputs">
				<div class="unInput">
					<input type="text" name="name" id="name" placeholder="Nombre" value="<?=$nameDefault?>" class="input-48" >
					<?php if (isset($errores['name'])): ?>
						<span class="error"><?=$errores['name'];?></span>
					<?php endif; ?>
				</div>

				<div class="unInput">
					<input type="text" name="apellido" id="apellido" value="<?=$apellidoDefault?>" placeholder="Apellido" class="input-48">
					<?php if (isset($errores['apellido'])): ?>
						<span class="error"><?=$errores['apellido'];?></span>
					<?php endif; ?>
				</div>

			<div class="unInput lg">
				<input class="form-control" type="text" name="email" id="email" value="<?=$emailDefault?>" placeholder="Correo Electronico" class="input-48">
				<?php if (isset($errores['email'])): ?>
					<span class="error"><?=$errores['email'];?></span>
				<?php endif; ?>
			</div>
			<div class="unInput lg">
				<input class="form-control" type="text" name="username" id="username" value="<?=$usernameDefault?>" placeholder="Usuario" class="input-48">
				<?php if (isset($errores['username'])): ?>
					<span class="error"><?=$errores['username'];?></span>
				<?php endif; ?>
			</div>
			<div class="unInput">
				<input class="form-control" type="text" name="telefono" id="telefono" value="<?=$telefonoDefault?>" placeholder="Telefono">
				<?php if (isset($errores['telefono'])): ?>
					<span class="error"><?=$errores['telefono'];?></span>
				<?php endif; ?>
			</div>
			<div class="unInput">
				<input class="form-control" type="text" name="edad" id="edad" value="<?=$edadDefault?>" placeholder="Edad">
				<?php if (isset($errores['edad'])): ?>
					<span class="error"><?=$errores['edad'];?></span>
				<?php endif; ?>
			</div>

			<div class="unInput lg">
				<input id="password" class="form-control" type="password" name="password" placeholder="Contraseña">
				<?php if (isset($errores['password'])): ?>
					<span class="error"><?=$errores['password'];?></span>
				<?php endif; ?>
			</div>
			<div class="unInput lg">
				<input id="cpassword" class="form-control" type="password" name="cpassword" placeholder="Repetir Contraseña">
				<?php if (isset($errores['cpassword'])): ?>
					<span class="error"><?=$errores['cpassword'];?></span>
				<?php endif; ?>
			</div>

			<div class="unInput">
				<label for="pais">Pais:</label>
				<select id="pais" name="pais">
					<?php foreach ($paises as $clave => $pais) : ?>
						<?php if ($clave == $_POST["pais"]) : ?>
							<option value="<?=$clave?>" selected>
								<?=$pais?>
							</option>
						<?php else: ?>
							<option value="<?=$clave?>">
								<?=$pais?>
							</option>
						<?php endif; ?>
					<?php endforeach; ?>
				</select>
			</div>

			<div class="unInput">
				<label for="avatar">Foto de perfil:</label>
				<input id="avatar" class="form-control" type="file" name="avatar">
				<?php if (isset($errores['avatar'])): ?>
					<span class="error"><?=$errores['avatar'];?></span>
				<?php endif; ?>
			</div>


				<input class="btn-enviar" type="submit">
			</div>
		</form>


<?php include("includes/end.php"); ?>
