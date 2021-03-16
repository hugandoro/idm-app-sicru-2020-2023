<?php include("includes/header.php"); ?>
<?php include("includes/title.php"); ?>
<?php include("includes/login_valid_session.php"); ?>


<div class="row">

	<aside class="col-sm-12">

		<?php
		//ELIMINA EL REGISTRO SELECCIONADO Y VUELVE A CARGAR EL LISTADO ACTUALIZADO
		if (isset($_GET['cedula'])) {
			$cedula = $_GET['cedula'];
			$convocatoria = $_GET['convocatoria'];

			mysqli_select_db($sle, $database_sle);
			mysqli_query($sle, "SET NAMES 'utf8'");

			if ($_SESSION["POSTULACION"] == "4") {
				$sql = "DELETE FROM convocatorias_ciudadanos WHERE ((cedula = '$cedula') AND (id_proyecto = '$convocatoria'))";
				$resultado = mysqli_query($sle, $sql) or die(mysqli_error());
				$paso = 1;

				//Registra el EVENTO EN EL LOG
				$sql = "INSERT INTO log_eventos (fecha, hora, usuario, registro, evento) VALUES (now(), now(), " . $_SESSION["cedula"] . ", '$cedula', 'DESPOSTULACION')";
				mysqli_query($sle, $sql) or die(mysqli_error());
				//****************************
			} else {
				echo "<CENTER><BR><BR>";
				echo "NO TIENE PERMISOS PARA ELIMINAR POSTULACIONES<BR>";
				echo "</CENTER>";
			}
		}
		?>


		<script type="text/javascript">
			//VALIDA ANTES DE ELIMINAR
			function confirmar(texto) {
				if (confirm(texto)) return true;
				else return false;
			}
		</script>


		<?php
		mysqli_select_db($sle, $database_sle);
		mysqli_query($sle, "SET NAMES 'utf8'");

		if (isset($_GET['convocatoria']))
			//Recibe de un refresh a la misma pantalla
			$convocatoria = $_GET['convocatoria'];
		else
			// Recibe de una primera consulta
			$convocatoria = $_POST['convocatoria'];

		$sqlC = "SELECT * FROM convocatorias WHERE id_proyecto = '$convocatoria'";
		$resultC = mysqli_query($sle, $sqlC);
		$rowC = mysqli_fetch_row($resultC);
		echo "<BR>Postulados al Proyecto : <B>" . $rowC[1] . "</B><BR><BR>";

		$sqlCC = "SELECT * FROM convocatorias_ciudadanos WHERE id_proyecto = '$convocatoria' ORDER BY fecha DESC";
		$resultCC = mysqli_query($sle, $sqlCC);
		$cantidad = mysqli_num_rows($resultCC);
		echo "$cantidad Registros<BR><BR>";

		echo "<table class='table'>";
		echo "<thead class='thead-dark'>";
		echo "<TR>";
		echo "<TH width='2%'><B>Accion</B></TH>";
		echo "<TH width='5%'><B>Cedula</B></TH>";
		echo "<TH width='12%'><B>Nombre 1</B></TH>";
		echo "<TH width='10%'><B>Nombre 2</B></TH>";
		echo "<TH width='12%'><B>Apellido 1</B></TH>";
		echo "<TH width='10%'><B>Apellido 2</B></TH>";
		echo "<TH width='10%'><B>Postulado</B></TH>";
		echo "<TH width='20%'><B>Barrio</B></TH>";
		echo "<TH width='20%'><B>Direccion</B></TH>";
		echo "</TR>";
		echo "</thead>";

		echo "<tbody>";

		while ($rowCC = mysqli_fetch_row($resultCC)) {
			$sqlCI = "SELECT * FROM ciudadanos WHERE cedula = '$rowCC[1]'";
			$resultCI = mysqli_query($sle, $sqlCI);
			$rowCI = mysqli_fetch_row($resultCI);
			echo "<TR>";

			if ($_SESSION["POSTULACION"] == "4") {
		?>
				<TD><a href='convocatorias_ver1.php?convocatoria=<?php echo $convocatoria; ?>&cedula=<?php echo $rowCI[0]; ?>' onclick='return confirmar("Anular postulacion, ESTA SEGURO DE LA ACCION ?")'><button type="button" class="btn btn-danger">Anular</button></a></TD>
		<?php
			} else
				echo "<TD></TD>";

			echo "<TD>$rowCI[0]</TD>";
			echo "<TD>$rowCI[3]</TD>";
			echo "<TD>$rowCI[4]</TD>";
			echo "<TD>$rowCI[5]</TD>";
			echo "<TD>$rowCI[6]</TD>";
			echo "<TD>$rowCC[2]</TD>";
			echo "<TD>$rowCI[9]</TD>";
			echo "<TD>$rowCI[8]</TD>";
			echo "</TR>";
		}
		echo "</tbody>";
		echo "</table>";

		?>

		<?php
		if ($_SESSION["POSTULACION_ADMIN"] == "4") {
		?>
			<a href='convocatorias_ver0.php?convocatoria=<?php echo $convocatoria; ?>' onclick='return confirmar("ALERTA !!! ¿Si cierra esta convocatoria no se podra postular mas registros, ESTA SEGURO DE LA ACCION ?")'>
				<input name='Cerrar' type='submit' class='btn btn-warning btn-block' id='Cerrar' value='*** CERRAR CONVOCATORIA ***' />
			</a>
			<br>
		<?php
		}
		echo "<HR><a href='convocatorias.php'><input type='submit' name='Volver' id='Volver' value='Volver a la ventana anterior...' class='btn btn-info btn-block'/></a>";
		?>

	</aside>

</div>

<?php include("includes/footer.php"); ?>