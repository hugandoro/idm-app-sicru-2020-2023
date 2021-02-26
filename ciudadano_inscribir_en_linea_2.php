<?php include("includes/header.php"); ?>
<?php include("includes/title.php"); ?>

<!-- Realiza cruces con las bases de datos -->
<?php
$cedula = $_POST['cedula'];
?>

<div class="row">
	<aside class="col-sm-3"></aside>

	<aside class="col-sm-6">

			<form name="form1" method="post" onSubmit="return revisar(form1);" action="ciudadano_inscribir_en_linea_3.php">
				<div class="form-group">
					<label><h6>Seleccione BASE DE DATOS para inscripcion</h6></label>
					<select name="base" id="base" input class="form-control">
						<option value='3' selected>Vivienda Nueva</option>
						<option value='7'>Mejoramiento</option>
					</select>
				</div>
				<div class="form-group">
					<input type="hidden" name="cedula" id="cedula" <?php echo "value=" . $cedula ?>>
					<input type="submit" class="btn btn-success btn-block" value=" Continuar | Paso N° 3... " />
				</div>
			</form>

	</aside>

	<aside class="col-sm-3"></aside>
</div>

<?php include("includes/footer.php"); ?>