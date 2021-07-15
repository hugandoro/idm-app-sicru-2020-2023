<?php include("includes/header.php"); ?>
<?php include("includes/title.php"); ?>
<?php include("includes/login_valid_session.php"); ?>

<div class="row">
	<aside class="col-sm-3"></aside>

	<aside class="col-sm-6">
		<?php
		$cedula = $_POST['cedula'];

		mysqli_select_db($sle, $database_sle);
		mysqli_query($sle, "SET NAMES 'utf8'");

		$sql = "SELECT * FROM ciudadanos WHERE (cedula = '$cedula')";
		$resultado = mysqli_query($sle, $sql) or die(mysqli_error());

		$row = mysqli_fetch_row($resultado);
		$nombre = $row[3] . " " . $row[4] . " " . $row[5] . " " . $row[6];

		if ($nombre != '') {
			echo "<center><B><font size='+2'>$nombre</font></B><BR>";
			echo "<center><font size='-1'>Registrado con Documento <B>$cedula</B></font><BR><BR>";
		}

		//VERIFICA QUE NO TENGA POSTULACION ACTIVA PARA ALGUNO OTRO PROYECTO
		$sqlCO = "SELECT * FROM convocatorias_ciudadanos WHERE ((cedula = '$cedula') && (estado = '1'))";
		$resultadoCO = mysqli_query($sle, $sqlCO) or die(mysqli_error());

		if (mysqli_num_rows($resultadoCO) > 0) {
			$rowCO = mysqli_fetch_row($resultadoCO);
			echo "<BR><center><B><font size='+1'>Ciudadano con Postulacion Vigente en el proyecto</font></B><BR>";

			$sqlPO = "SELECT * FROM convocatorias WHERE (id_proyecto = '$rowCO[0]')";
			$resultadoPO = mysqli_query($sle, $sqlPO) or die(mysqli_error());
			$rowPO = mysqli_fetch_row($resultadoPO);

			echo "<center><font size='+1'>$rowPO[1]</font><BR><BR>";
			echo "<center>Solo se permite estar postulado activamente para un proyecto, por lo tanto debe retirarlo de la postulacion actual o definir su estadio definitivo antes de poder inscribir al ciudadano en otra convocatoria<BR><BR>";
			echo "<HR><a href='convocatorias_ficha0.php?cedula=$cedula&convocatoria=$rowCO[0]'><input type='submit' name='Volver' id='Volver' value='Imprimir Ficha de Postulacion' class='btn btn-info btn-block'/></a>";
		} else {
			echo "<BR><center>Actualmente NO se encuentra postulado a ninguna convocatoria vigente";
		}
		//================================


		echo "<HR><a href='convocatorias.php'><input type='submit' name='Volver' id='Volver' value='Volver a la ventana anterior...' class='btn btn-success btn-block'/></a>";
		?>

	</aside>

	<aside class="col-sm-3"></aside>
</div>

<?php include("includes/footer.php"); ?>