<?php include("includes/header.php"); ?>
<?php include("includes/title.php"); ?>
<?php include("includes/login_valid_session.php"); ?>

<!-- Realiza cruces con las bases de datos -->
<?php
if (isset($_POST['cedula']))
	$cedula = $_POST['cedula'];
else
	$cedula = $_GET['cedula'];

$mr = 0;
$mu = 0;
$pr = 0;
$vip = 0;
$vis = 0; //VIVIENDA NUEVA
$des = 0;
$sip = 0;
$reubicado = 0;
$comfamiliar = 0;
$familiar = 0;
$mejora = 0; //MEJORAMIENTO

mysqli_select_db($sle, $database_sle);
mysqli_query($sle, "SET NAMES 'utf8'");

$sql = "SELECT * FROM ciudadanos WHERE (cedula = '$cedula')";
$resultado = mysqli_query($sle, $sql) or die(mysqli_error());
while ($row = mysqli_fetch_row($resultado)) {
	if ($row[73] == 0)
		$pr = 1;
	if ($row[73] == 1)
		$mu = 1;
	if ($row[73] == 2)
		$mr = 1;
	if ($row[73] == 3)
		$vis = 1;
	if ($row[73] == 4)
		$vip = 1;
	if ($row[73] == 5)
		$des = 1;
	if ($row[73] == 6)
		$sip = 1;
	if ($row[73] == 7)
		$mejora = 1;
}

$sql = "SELECT * FROM cruce_comfamiliar WHERE ((afiliado!='') || (beneficiario!='') || (otras_ciudades!='')) && (cedula = '$cedula')";
$resultado = mysqli_query($sle, $sql) or die(mysqli_error());
if (mysqli_num_rows($resultado) > 0) {
	$comfamiliar = 1;
	$row = mysqli_fetch_row($resultado);
	$afiliado = $row[1];
	$beneficiario = $row[2];
	$otras_ciudades = $row[3];
}

$aux = $mr + $mu + $pr + $vip + $vis + $des + $sip + $mejora + $reubicado + $comfamiliar;
?>

<div class="row">
	<aside class="col-sm-1"></aside>

	<aside class="col-sm-10">

		<?php
		if ($aux > 0) {

			//***********************************************************************
			//HISTORICO DE POSTULACIONES Y BENEFICIOS *******************************		
			echo "<h4>Historico de postulaciones y beneficios</h4>";

			echo "<TABLE class='table table-bordered'>";
			$sqlCO1 = "SELECT * FROM convocatorias_ciudadanos WHERE cedula = '$cedula' ORDER BY resultado ASC";
			$resultadoCO1 = mysqli_query($sle, $sqlCO1) or die(mysqli_error());
			echo "<thead>";
			echo "<TR>";
			echo "<TH>Proyecto</TH>";
			echo "<TH>Estado</TH>";
			echo "</TR>";
			echo "</thead>";

			while ($rowCO1 = mysqli_fetch_row($resultadoCO1)) {
				$sqlPO1 = "SELECT * FROM convocatorias WHERE (id_proyecto = '$rowCO1[0]')";
				$resultadoPO1 = mysqli_query($sle, $sqlPO1) or die(mysqli_error());
				$rowPO1 = mysqli_fetch_row($resultadoPO1);

				echo "<TR>";
				echo "<TD>$rowPO1[1]</TD>";

				if (($rowCO1[5] == 0) && ($rowCO1[3] == 1)) echo "<TD><div class='alert alert-info'>Postulado</div></TD>";
				if (($rowCO1[5] == 0) && ($rowCO1[3] == 0)) echo "<TD><div class='alert alert-danger'>Negado</div></TD>";
				if (($rowCO1[5] == 1) && ($rowCO1[3] == 0)) echo "<TD><div class='alert alert-success'>Asignado</div></TD>";
				if (($rowCO1[5] == 1) && ($rowCO1[3] == 1)) echo "<TD><div class='alert alert-info'>Postulado</div></TD>";

				echo "</TR>";
			}
			echo "</TABLE>";

			//***********************************************************************		
			//HISTORICO DE VISITAS TECNICAS******************************************		
			echo "<BR><h4>Visitas tecnicas recibidas</h4>";

			echo "<TABLE class='table table-bordered'>";
			$sqlVI1 = "SELECT * FROM visitas WHERE cedula = '$cedula' ORDER BY fecha ASC";
			$resultadoVI1 = mysqli_query($sle, $sqlVI1) or die(mysqli_error());
			echo "<thead>";
			echo "<TR>";
			echo "<TH>Codigo</TH>";
			echo "<TH>Fecha de la Visita</TH>";
			echo "</TR>";
			echo "</thead>";

			while ($rowVI1 = mysqli_fetch_row($resultadoVI1)) {
				echo "<TR>";
				echo "<TD>$rowVI1[0]</TD>";
				echo "<TD>$rowVI1[2]</TD>";
				echo "</TR>";
			}
			echo "</TABLE>";

			//***********************************************************************		
			//VERIFICA SI ES REUBICADO **********************************************
			if ($reubicado == 1) {
				echo "<div class='alert alert-danger'>";
				echo "<strong>REUBICADO</strong> Ciudadano inscrito en base de datos reubicados<BR><BR>";
				echo "</div>";
			}

			if ($comfamiliar == 1) {
				echo "<BR><h4>Cruce comfamiliar</h4>";
				echo "<a href='vernovedad0.php?cedula=" . $cedula . "'><input type='submit' name='Novedad Comfamiliar' id='COMFAMILIAR' value='Ver novedad de Comfamiliar' class='btn btn-warning btn-block'/></a>";
			}

			//*************************************************************************		
			//BASES DE DATOS REGISTRADAS **********************************************
			echo "<BR><h4>Bases de datos registradas</h4>";
			if ($mr == 1) echo "<a href='consulta0.php?cedula=" . $cedula . "&base=2'><input type='submit' class='btn btn-warning btn-block' name='Mejoramiento Rural' id='MR' value='Mejoramiento Rural' class='Botones'/></a>";
			if ($mu == 1) echo "<a href='consulta0.php?cedula=" . $cedula . "&base=1'><input type='submit' class='btn btn-warning btn-block' name='Mejoramiento Urbano' id='MU' value='Mejoramiento Urbano' class='Botones'/></a>";
			if ($pr == 1) echo "<a href='consulta0.php?cedula=" . $cedula . "&base=0'><input type='submit' class='btn btn-warning btn-block' name='Por Reubicar' id='PR' value='Por Reubicar' class='Botones'/></a>";
			if ($vip == 1) echo "<a href='consulta0.php?cedula=" . $cedula . "&base=4'><input type='submit' class='btn btn-warning btn-block' name='Vivienda VIP' id='VIP' value='Vivienda VIP' class='Botones'/></a>";
			if ($vis == 1) echo "<a href='consulta0.php?cedula=" . $cedula . "&base=3'><input type='submit' class='btn btn-warning btn-block' name='Vivienda Nueva' id='VIS' value='Vivienda Nueva' class='Botones'/></a>";
			if ($des == 1) echo "<a href='consulta0.php?cedula=" . $cedula . "&base=5'><input type='submit' class='btn btn-warning btn-block' name='Desplazado' id='DES' value='Desplazado' class='Botones'/></a>";
			if ($sip == 1) echo "<a href='consulta0.php?cedula=" . $cedula . "&base=6'><input type='submit' class='btn btn-warning btn-block' name='Sitio Propio' id='SIP' value='Sitio Propio' class='Botones'/></a>";
			if ($mejora == 1) echo "<a href='consulta0.php?cedula=" . $cedula . "&base=7'><input type='submit' class='btn btn-warning btn-block' name='Mejoramiento' id='MEJORA' value='Mejoramiento' class='Botones'/></a>";
		}

		//***********************************************************************	
		//CONSULTA SI ESTA EN ALGUN NUCLEO FAMILIAR******************************
		$sqlFAM = "SELECT * FROM ciudadanos WHERE ((doc_fami1 = '$cedula') || (doc_fami2 = '$cedula') || (doc_fami3 = '$cedula') || (doc_fami4 = '$cedula') || (doc_fami5 = '$cedula') || (doc_fami6 = '$cedula') || (doc_fami7 = '$cedula') || (doc_fami8 = '$cedula') || (doc_fami9 = '$cedula') || (doc_fami10 = '$cedula'))";
		$resultadoFAM = mysqli_query($sle, $sqlFAM) or die(mysqli_error());
		while ($rowFAM = mysqli_fetch_row($resultadoFAM)) {
			echo "<HR><span class='Estilo7'><font size='+2' color='red'>ATENCION - Miembro del grupo familiar del titular...</font></span><BR>";
			echo "<span class='Estilo7'><font size='+1' color='black'>" . $rowFAM[0] . " - " . $rowFAM[3] . " " . $rowFAM[4] . " " . $rowFAM[5] . " " . $rowFAM[6] . "</font></span><BR>";
		}

		echo "<BR><a href='menu.php'><input type='submit' name='Volver' id='Volver' value='Volver a la ventana anterior...' class='btn btn-success btn-block'/></a>";
		?>

	</aside>

	<aside class="col-sm-1"></aside>
</div>

<?php include("includes/footer.php"); ?>