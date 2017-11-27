<?php
  include("soporte.php");
  if (!$auth->estaLogueado()) {
    header("Location:index.php");exit;
  }

?>
<?php
$tituloDePagina = 'Perfil del Usuario';
include("includes/head.php");
?>

<div class="form-register">
<br><br><br><br>
<section class="imagen-perfil">
		<img src="<?=$img?>" width="180" alt="avatar" style="border-radius: 50%;">
	<div class="contenedor-perfil">
		<h2>Hola <?=$username?></h2>
			<h2><?=$email?></h2>
      <h2><?=$name?></h2>
      <h2><?=$apellido?></h2>
	          <p> <a href="index.php" class="button">Volver al inicio</a></p>
      		  <p> <a href="logout.php" class="button">Salir</a></p>
  </div>
</section>
</div>

<?php include("includes/end.php"); ?>
