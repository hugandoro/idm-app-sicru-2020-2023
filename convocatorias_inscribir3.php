<?php include("includes/header.php"); ?>
<?php include("includes/title.php"); ?>
<?php include("includes/login_valid_session.php"); ?>

<div class="row">
	<aside class="col-sm-3"></aside>

	<aside class="col-sm-6">

		<?php
		$cedula = $_POST['cedula'];
		$base = $_POST['base'];
		$proyecto = $_POST['convocatoria'];

		mysqli_select_db($sle, $database_sle);
		mysqli_query($sle, "SET NAMES 'utf8'");

		$paso = 0;
		if ($_SESSION["POSTULACION"] >= "3") $paso = 1;

		if ($paso == 1) {
			//PROCEDEMOS A INGRESAR EL NUEVO REGISTRO SEGUN LA BASE SELECCIONADA
			$sql = "INSERT INTO convocatorias_ciudadanos (id_proyecto, cedula, fecha, estado) VALUES ($proyecto, '$cedula', now(), '1')";

			mysqli_query($sle, $sql) or die(mysqli_error());
			$sql = "SELECT * FROM ciudadanos WHERE (cedula = '$cedula')";
			$resultadoCI = mysqli_query($sle, $sql) or die(mysqli_error());
			$rowCI = mysqli_fetch_row($resultadoCI);
			$nombre = $rowCI[3] . " " . $rowCI[4] . " " . $rowCI[5] . " " . $rowCI[6];
			$sqlPO = "SELECT * FROM convocatorias WHERE (id_proyecto = '$proyecto')";
			$resultadoPO = mysqli_query($sle, $sqlPO) or die(mysqli_error());
			$rowPO = mysqli_fetch_row($resultadoPO);
			$nombre_proyecto = $rowPO[1];

			echo "<center><span class='Estilo7'><font size='+2'><BR><B>$nombre</B><BR>Postulado exitosamente</font></span>";
			echo "<hr><span class='Estilo7'><font size='+1'><BR><B>$nombre_proyecto</B></font></span><hr></center>";

			//Registra el EVENTO EN EL LOG
			$sql = "INSERT INTO log_eventos (fecha, hora, usuario, registro, evento) VALUES (now(), now(), " . $_SESSION["cedula"] . ", '$cedula', 'POSTULACION')";
			mysqli_query($sle, $sql) or die(mysqli_error());
			//**************************** 
		} else {
			echo "<CENTER><BR><BR>";
			echo "NO TIENE PERMISOS PARA POSTULAR<BR>";
			echo "</CENTER>";
		}
		?>

		<a href="menu.php"><input type="submit" name="Volver" id="Volver" value="Volver a la ventana anterior..." class="btn btn-success btn-block" /></a>

	</aside>

	<aside class="col-sm-3"></aside>
</div>

<?php include("includes/footer.php"); ?>