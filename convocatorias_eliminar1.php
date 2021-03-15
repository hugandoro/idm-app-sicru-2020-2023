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

		if ($_SESSION["POSTULACION"] == "4") {
			$sql = "SELECT * FROM ciudadanos WHERE (cedula = '$cedula')";
			$resultado = mysqli_query($sle, $sql) or die(mysqli_error());
			$nombre = '';
			while ($row = mysqli_fetch_row($resultado)) {
				$nombre = $row[3] . " " . $row[4] . " " . $row[5] . " " . $row[6];
			}

			if ($nombre != '') {
				echo "<BR><center><B><font size='+2'>$nombre</font></B><BR>";
				echo "<center><font size='-1'>Registrado con Documento <B>$cedula</B></font><BR><BR>";
			}

			//VERIFICA QUE NO TENGA POSTULACION ACTIVA PARA ALGUNO OTRO PROYECTO
			$paso = 0;
			$sqlCO = "SELECT * FROM convocatorias_ciudadanos WHERE ((cedula = '$cedula') && (estado = '1'))";
			$resultadoCO = mysqli_query($sle, $sqlCO) or die(mysqli_error());
			if (mysqli_num_rows($resultadoCO) > 0) {
				$rowCO = mysqli_fetch_row($resultadoCO);
				echo "<BR><center><B><font size='+1'>Postulacion ANULADA de la convocatoria</font></B><BR><BR>";

				$sqlPO = "SELECT * FROM convocatorias WHERE (id_proyecto = '$rowCO[0]')";
				$resultadoPO = mysqli_query($sle, $sqlPO) or die(mysqli_error());
				$rowPO = mysqli_fetch_row($resultadoPO);

				echo "<BR><center><B><font size='+1'>$rowPO[1]</font></B><BR><BR>";

				$sql = "DELETE FROM convocatorias_ciudadanos WHERE ((cedula = '$cedula') AND (id_proyecto = '$rowCO[0]'))";
				$resultado = mysqli_query($sle, $sql) or die(mysqli_error());
				$paso = 1;

				echo "<BR><center>Proceso de anulación postulacion exitoso<BR><BR>";
			} else {
				echo "<BR><center><B><font size='+1'>NO PRESENTA POSTULACION EN NINGUNA CONVOCATORIA ACTIVA</font></B><BR><BR>";
			}
			//================================

			if ($paso == 1) {
				//Registra el EVENTO EN EL LOG
				$sql = "INSERT INTO log_eventos (fecha, hora, usuario, registro, evento) VALUES (now(), now(), " . $_SESSION["cedula"] . ", '$cedula', 'DESPOSTULACION')";
				mysqli_query($sle, $sql) or die(mysqli_error());
				//****************************
			}
		} else {
			echo "<CENTER><BR><BR>";
			echo "NO TIENE PERMISOS PARA ELIMINAR POSTULACIONES<BR>";
			echo "</CENTER>";
		}

		echo "<HR><a href='convocatorias.php'><input type='submit' name='Volver' id='Volver' value='Volver a la ventana anterior...' class='btn btn-success btn-block'/></a>";
		?>

	</aside>

	<aside class="col-sm-3"></aside>
</div>

<?php include("includes/footer.php"); ?>