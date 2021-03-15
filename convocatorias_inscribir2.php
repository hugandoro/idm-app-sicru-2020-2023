<?php include("includes/header.php"); ?>
<?php include("includes/title.php"); ?>
<?php include("includes/login_valid_session.php"); ?>

<div class="row">
	<aside class="col-sm-2"></aside>

	<aside class="col-sm-8">

		<?php
		$cedula = $_GET['cedula'];
		$base = $_GET['base'];

		mysqli_select_db($sle, $database_sle);
		mysqli_query($sle, "SET NAMES 'utf8'");


		echo "<center>CONVOCATORIAS VIGENTES Y ABIERTAS QUE APLICAN PARA<BR><BR>";
		if ($base == 0) echo "<B>Por Reubicar</B><HR></center>";
		if ($base == 1) echo "<B>Mejoramiento Urbano</B><HR></center>";
		if ($base == 2) echo "<B>Mejoramiento Rural</B><HR></center>";
		if ($base == 3) echo "<B>Vivienda de Interes Social VIS</B><HR></center>";
		if ($base == 4) echo "<B>Vivienda de Interes Prioritario VIP</B><HR></center>";
		if ($base == 5) echo "<B>Condicion de Desplazamiento</B><HR></center>";
		if ($base == 6) echo "<B>Construccion en Sitio Propio</B><HR></center>";


		?>

		<script type="text/javascript">
			//VALIDA ANTES DE POSTULAR
			function confirmar(texto) {
				if (confirm(texto)) {
					return true;
				} else return false;
			}
		</script>

		<form name="form1" method="post" onSubmit="return confirmar('ATENCION !!! ¿Estas seguro de postular? El ciudadano no podra postularse a ningun otro proyecto');" action="convocatorias_inscribir3.php">
			<?php
			$sqlC = "SELECT * FROM convocatorias";
			$resultC = mysqli_query($sle, $sqlC);
			echo "<select name='convocatoria' id='convocatoria' class='form-control'>";
			while ($rowC = mysqli_fetch_row($resultC)) {
				//Convocatorias estado 1 ( Abiertas para postular )
				if ($rowC[3] == 1) {
					if (($base == 0) && ($rowC[4] == 1))
						echo "<option value='$rowC[0]'>$rowC[1] ($rowC[2])</option>";
					if (($base == 1) && ($rowC[5] == 1))
						echo "<option value='$rowC[0]'>$rowC[1] ($rowC[2])</option>";
					if (($base == 2) && ($rowC[6] == 1))
						echo "<option value='$rowC[0]'>$rowC[1] ($rowC[2])</option>";
					if (($base == 3) && ($rowC[7] == 1))
						echo "<option value='$rowC[0]'>$rowC[1] ($rowC[2])</option>";
					if (($base == 4) && ($rowC[8] == 1))
						echo "<option value='$rowC[0]'>$rowC[1] ($rowC[2])</option>";
					if (($base == 5) && ($rowC[9] == 1))
						echo "<option value='$rowC[0]'>$rowC[1] ($rowC[2])</option>";
					if (($base == 6) && ($rowC[10] == 1))
						echo "<option value='$rowC[0]'>$rowC[1] ($rowC[2])</option>";
				}
			}
			echo "</select><br>";
			?>
			<input type="hidden" name="cedula" id="cedula" <?php echo "value=" . $cedula ?>>
			<input type="hidden" name="base" id="base" <?php echo "value=" . $base ?>>
			<p> <input type="submit" class="btn btn-success btn-block" value="Postular al ciudadano en esta convocatoria..." /></p>
		</form>

		<?php
		echo "<HR><a href='convocatorias.php'><input type='submit' name='Volver' id='Volver' value='Volver a la ventana anterior...' class='btn btn-success btn-block'/></a>";
		?>

	</aside>

	<aside class="col-sm-2"></aside>
</div>

<?php include("includes/footer.php"); ?>