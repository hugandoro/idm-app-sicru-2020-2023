<?php include("includes/header.php"); ?>
<?php include("includes/title.php"); ?>

<!-- Realiza cruces con las bases de datos -->
<?php
if (isset($_POST['cedula']))
	$cedula = $_POST['cedula'];
else
	$cedula = $_GET['cedula'];

$vis = 0; //VIVIENDA NUEVA
$mejora = 0; //MEJORAMIENTO

mysqli_select_db($sle, $database_sle);
mysqli_query($sle, "SET NAMES 'utf8'");

$sql = "SELECT * FROM ciudadanos WHERE (cedula = '$cedula')";
$resultado = mysqli_query($sle, $sql) or die(mysqli_error());
while ($row = mysqli_fetch_row($resultado)) {
	if ($row[73] == 3)
		$vis = 1;
	if ($row[73] == 7)
		$mejora = 1;

	$subbase = 'Vivienda de interes social VIS'; // Por defecto si no esta asignado a ninguna subbase se asume que es VIS
	if ($row[84] == 'SI')
		$subbase = 'Reubicacion';
	if ($row[85] == 'SI')
		$subbase = 'Mejoramiento ubano';
	if ($row[86] == 'SI')
		$subbase = 'Mejoramiento rural';
	if ($row[87] == 'SI')
		$subbase = 'VIP - Vivienda prioritaria';
	if ($row[88] == 'SI')
		$subbase = 'Condicion de desplazamiento';
	if ($row[89] == 'SI')
		$subbase = 'Sitio propio';

	$posicion = $row[80];
}

$aux = $vis + $mejora;
?>

<div class="row">
	<aside class="col-sm-1"></aside>

	<aside class="col-sm-10">

		<?php
		if ($aux > 0) {

			//***********************************************************************
			//HISTORICO DE POSTULACIONES Y BENEFICIOS *******************************		
			echo "<div class='alert alert-info'><h4>Historico de postulaciones y beneficios</h4></div>";

			echo "<TABLE class='table table-bordered'>";
			$sqlCO1 = "SELECT * FROM convocatorias_ciudadanos WHERE cedula = '$cedula' ORDER BY resultado ASC";
			$resultadoCO1 = mysqli_query($sle, $sqlCO1) or die(mysqli_error());
			echo "<thead>";
			echo "<TR>";
			echo "<TH>Proyecto</TH>";
			echo "<TH>Estado</TH>";
			echo "<TH>Motivo</TH>";
			echo "</TR>";
			echo "</thead>";

			while ($rowCO1 = mysqli_fetch_row($resultadoCO1)) {
				$sqlPO1 = "SELECT * FROM convocatorias WHERE (id_proyecto = '$rowCO1[0]')";
				$resultadoPO1 = mysqli_query($sle, $sqlPO1) or die(mysqli_error());
				$rowPO1 = mysqli_fetch_row($resultadoPO1);

				echo "<TR>";
				echo "<TD>$rowPO1[1]</TD>";

				if (($rowCO1[5] == 0) && ($rowCO1[3] == 1)) echo "<TD><div class='alert alert-info'>Postulacion en proceso - No preseleccionado</div></TD>";
				if (($rowCO1[5] == 0) && ($rowCO1[3] == 0)) echo "<TD><div class='alert alert-danger'>Negado</div></TD>";
				if (($rowCO1[5] == 1) && ($rowCO1[3] == 0)) echo "<TD><div class='alert alert-success'>Asignado</div></TD>";
				if (($rowCO1[5] == 1) && ($rowCO1[3] == 1)) echo "<TD><div class='alert alert-primary'>Postulacion en proceso - Preseleccionado</div></TD>";

				echo "<TD>$rowCO1[6]</TD>";

				echo "</TR>";
			}
			echo "</TABLE>";


			//*************************************************************************		
			//BASES DE DATOS REGISTRADAS **********************************************
			echo "<div class='alert alert-info'><h4>Base de datos actual</h4></div>";
			echo "<TABLE class='table table-bordered'>";
			echo "<thead>";
			echo "<TR>";
			echo "<TH>Base principal</TH>";
			echo "<TH>Sub base</TH>";
			echo "</TR>";
			echo "</thead>";
			echo "<TR>";
				if ($vis == 1) echo "<TD><h3>Vivienda nueva</h3></TD>";
				if ($mejora == 1) echo "<TD><h3>Mejoramiento</h3></TD>";

			echo "<TD>$subbase</TD>";
			echo "</TR>";
			echo "</TABLE>";
		}

		//***********************************************************************	
		//CONSULTA SI ESTA EN ALGUN NUCLEO FAMILIAR******************************
		$sqlFAM = "SELECT * FROM ciudadanos WHERE ((doc_fami1 = '$cedula') || (doc_fami2 = '$cedula') || (doc_fami3 = '$cedula') || (doc_fami4 = '$cedula') || (doc_fami5 = '$cedula') || (doc_fami6 = '$cedula') || (doc_fami7 = '$cedula') || (doc_fami8 = '$cedula') || (doc_fami9 = '$cedula') || (doc_fami10 = '$cedula'))";
		$resultadoFAM = mysqli_query($sle, $sqlFAM) or die(mysqli_error());
		while ($rowFAM = mysqli_fetch_row($resultadoFAM)) {
			echo "<br><center><h5>Vinculado como miembro del grupo familiar para la ficha del postulado...</h5><br>";
			echo "<h3>" . $rowFAM[0] . " - " . $rowFAM[3] . " " . $rowFAM[4] . " " . $rowFAM[5] . " " . $rowFAM[6] . "</h3><br><br></center>";
			$aux++;
		}

		if ($aux == 0) {
			echo "<br><center><h5>No existe ficha registrada con este N° de cedula</h5><br><h3><b>$cedula</b></h3><br><br></center>";
		}


		echo "<BR><a href='index.php'><input type='submit' name='Volver' id='Volver' value='Volver a la ventana anterior...' class='btn btn-success btn-block'/></a>";
		?>

	</aside>

	<aside class="col-sm-1"></aside>
</div>

<?php include("includes/footer.php"); ?>