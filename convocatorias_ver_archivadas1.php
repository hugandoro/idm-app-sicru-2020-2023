<?php include("includes/header.php"); ?>
<?php include("includes/title.php"); ?>
<?php include("includes/login_valid_session.php"); ?>

<script type="text/javascript">
	//VALIDA ANTES DE ELIMINAR
	function confirmar(texto) {
		if (confirm(texto)) return true;
		else return false;
	}
</script>

<div class="row">
	<aside class="col-sm-12">

		<?php
		mysqli_select_db($sle, $database_sle);
		mysqli_query($sle, "SET NAMES 'utf8'");

		$convocatoria = $_POST['convocatoria'];

		$sqlC = "SELECT * FROM convocatorias WHERE id_proyecto = '$convocatoria'";
		$resultC = mysqli_query($sle, $sqlC);
		$rowC = mysqli_fetch_row($resultC);
		echo "<BR>Postulados al Proyecto : <B>" . $rowC[1] . "</B><BR><BR>";

		$sqlCC = "SELECT * FROM convocatorias_ciudadanos WHERE id_proyecto = '$convocatoria' ORDER BY cedula ASC";
		$resultCC = mysqli_query($sle, $sqlCC);
		$cantidad = mysqli_num_rows($resultCC);
		echo "$cantidad Registros<BR><BR>";

		echo "<table class='table'>";
		echo "<thead class='thead-dark'>";
		echo "<TR>";
		echo "<TH width='5%'><B>Resultado</B></TH>";
		echo "<TH width='5%'><B>Cedula</B></TH>";
		echo "<TH width='10%'><B>Nombre 1</B></TH>";
		echo "<TH width='10%'><B>Nombre 2</B></TH>";
		echo "<TH width='10%'><B>Apellido 1</B></TH>";
		echo "<TH width='10%'><B>Apellido 2</B></TH>";
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

			if ($rowCC[5] == "0")
				echo "<TD><div class='alert alert-danger'>Negado</div></TD>";
			if ($rowCC[5] == "1")
				echo "<TD><div class='alert alert-success'>Aprobado</div></TD>";

			echo "<TD>$rowCI[0]</TD>";
			echo "<TD>$rowCI[3]</TD>";
			echo "<TD>$rowCI[4]</TD>";
			echo "<TD>$rowCI[5]</TD>";
			echo "<TD>$rowCI[6]</TD>";
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
			<a href='convocatorias_ver_archivadas0.php?convocatoriaDesarchivar=<?php echo $convocatoria; ?>' onclick="return confirmar('Desarchivar - ESTA SEGURO DE LA ACCION ?')">
				<input name='desarchivar' type='submit' class="btn btn-warning btn-block" id='desarchivar' value='*** DES ARCHIVAR CONVOCATORIA ***' />
			</a>

		<?php
		}

		echo "<HR><a href='convocatorias.php'><input type='submit' name='Volver' id='Volver' value='Volver a la ventana anterior...' class='btn btn-success btn-block'/></a>";
		?>

	</aside>

</div>

<?php include("includes/footer.php"); ?>