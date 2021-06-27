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
$familiar = 0;
$mejora = 0; //MEJORAMIENTO

mysqli_select_db($sle, $database_sle);
mysqli_query($sle, "SET NAMES 'utf8'");

$sql = "SELECT * FROM ciudadanos WHERE (cedula = '$cedula')";
$resultado = mysqli_query($sle, $sql) or die(mysqli_error());

while ($row = mysqli_fetch_row($resultado)) {
	$nombre_ciudadano = $row[3] . " " . $row[4] . " " . $row[5] . " " . $row[6];
	$cedula_ciudadano = $row[0];

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


// CONSULTA A BASES DE DATOS INDIVIUDALES DE CRUCES

// Cruce Caja de Compensacion Familiar
$sql = "SELECT * FROM cruce_caja WHERE identificacion = '$cedula'";
$resultado = mysqli_query($sle, $sql) or die(mysqli_error());
$cruce_caja = 0;
if (mysqli_num_rows($resultado) > 0) {
	$cruce_caja = 1;
	$row = mysqli_fetch_row($resultado);
	$caja_nit_entidad = $row[1];
	$caja_nombre_entidad = $row[2];
}

// Cruce Subsidio de Vivienda
$sql = "SELECT * FROM cruce_subsidio_vivienda WHERE identificacion = '$cedula'";
$resultado = mysqli_query($sle, $sql) or die(mysqli_error());
$cruce_subsidio_vivienda = 0;
if (mysqli_num_rows($resultado) > 0) {
	$cruce_subsidio_vivienda = 1;
	$row = mysqli_fetch_row($resultado);
	$sub_vivienda_nit_entidad = $row[1];
	$sub_vivienda_nombre_entidad = $row[2];
	$sub_vivienda_fecha_asignacion = $row[7];
}

// Cruce Subsidio de Vivienda Otros
$sql = "SELECT * FROM cruce_subsidio_vivienda_otros WHERE identificacion = '$cedula'";
$resultado = mysqli_query($sle, $sql) or die(mysqli_error());
$cruce_subsidio_vivienda_otros = 0;
if (mysqli_num_rows($resultado) > 0) {
	$cruce_subsidio_vivienda_otros = 1;
	$row = mysqli_fetch_row($resultado);
	$sub_vivienda_otro_nit_entidad = $row[1];
	$sub_vivienda_otro_nombre_entidad = $row[2];
	$sub_vivienda_otro_fecha_asignacion = $row[7];
}

// Cruce Catastro
$sql = "SELECT * FROM cruce_catastro WHERE identificacion = '$cedula'";
$resultado = mysqli_query($sle, $sql) or die(mysqli_error());
$cruce_catastro = 0;
if (mysqli_num_rows($resultado) > 0) {
	$cruce_catastro = 1;
	$row = mysqli_fetch_row($resultado);
	$catastro_nit_entidad = $row[1];
	$catastro_nombre_entidad = $row[2];
	$catastro_matricula = $row[8];
	$catastro_departamento= $row[9];
	$catastro_municipio= $row[10];

}

// Cruce Nuevo Hogar
$sql = "SELECT * FROM cruce_nuevo_hogar WHERE identificacion = '$cedula'";
$resultado = mysqli_query($sle, $sql) or die(mysqli_error());
$cruce_nuevo_hogar = 0;
if (mysqli_num_rows($resultado) > 0) {
	$cruce_nuevo_hogar = 1;
	$row = mysqli_fetch_row($resultado);
	$nuevo_hogar_fecha = $row[3];
	$nuevo_hogar_entidad = $row[4];
	$nuevo_hogar_caja = $row[5];
}

// Cruce Sisben
$sql = "SELECT * FROM cruce_sisben WHERE identificacion = '$cedula'";
$resultado = mysqli_query($sle, $sql) or die(mysqli_error());
$cruce_sisben = 0;
if (mysqli_num_rows($resultado) > 0) {
	$cruce_sisben = 1;
	$row = mysqli_fetch_row($resultado);
	$sisben_puntaje = $row[4];
	$sisben_zona = $row[6];
	$sisben_parentesco = $row[7];
}

// Cruce Unidos
$sql = "SELECT * FROM cruce_unidos WHERE identificacion = '$cedula'";
$resultado = mysqli_query($sle, $sql) or die(mysqli_error());
$cruce_unidos = 0;
if (mysqli_num_rows($resultado) > 0) {
	$cruce_unidos = 1;
	$row = mysqli_fetch_row($resultado);
	$unidos_folio = $row[4];
	$unidos_parentesco = $row[6];
	$unidos_departamento = $row[7];
	$unidos_municipio = $row[8];

}

// Cruce Reunidos
$sql = "SELECT * FROM cruce_reunidos WHERE documento = '$cedula'";
$resultado = mysqli_query($sle, $sql) or die(mysqli_error());
$cruce_reunidos = 0;
if (mysqli_num_rows($resultado) > 0) {
	$cruce_reunidos = 1;
	$row = mysqli_fetch_row($resultado);
	$reunidos_municipio = $row[5];
	$reunidos_departamento = $row[6];
}

// FIN CONSULTA DE CRUCES


$aux = $mr + $mu + $pr + $vip + $vis + $des + $sip + $mejora + $reubicado;
$aux = $aux + $cruce_caja + $cruce_subsidio_vivienda + $cruce_subsidio_vivienda_otros + $cruce_catastro + $cruce_nuevo_hogar + $cruce_sisben + $cruce_unidos + $cruce_reunidos;
?>

<div class="row">
	<!-- <aside class="col-sm-1"></aside> -->

	<aside class="col-sm-12">

		<?php
		if ($aux > 0) {

			echo "<h3>$nombre_ciudadano</h3>Documento N° <b>$cedula_ciudadano</b>";
			echo "<hr>";

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
			echo "<TH>Motivo</TH>";
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

				echo "<TD>$rowCO1[6]</TD>";

				echo "</TR>";
			}
			echo "</TABLE>";

			//***********************************************************************		
			//HISTORICO DE VISITAS TECNICAS******************************************		
			echo "<hr><h4>Visitas tecnicas recibidas</h4>";

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

			//***********************************************************************		
			//VERIFICA LOS CRUCES A BD **********************************************
			if ($cruce_caja == 1) {
				echo "<div class='alert-danger'><hr><b>Cruce con BD caja de compensacion familiar</b></div>";
				echo "<table class='table table-bordered'>";
				echo "<tr>";
				echo "<td><b>Nit</b></td>";
				echo "<td>$caja_nit_entidad</td>";
				echo "<td><b>Entidad</b></td>";
				echo "<td>$caja_nombre_entidad</td>";
				echo "</tr>";
				echo "</table>";
			}

			if ($cruce_subsidio_vivienda == 1) {
				echo "<div class='alert-danger'><hr><b>Cruce con BD subsidio vivienda</b></div>";
				echo "<table class='table table-bordered'>";
				echo "<tr>";
				echo "<td><b>Nit</b></td>";
				echo "<td>$sub_vivienda_nit_entidad</td>";
				echo "<td><b>Entidad</b></td>";
				echo "<td>$sub_vivienda_nombre_entidad</td>";
				echo "<td><b>Fecha asignacion</b></td>";
				echo "<td>$sub_vivienda_fecha_asignacion</td>";
				echo "</tr>";
				echo "</table>";
			}

			if ($cruce_subsidio_vivienda_otros == 1) {
				echo "<div class='alert-danger'><hr><b>Cruce con BD subsidio vivienda (Otros)</b></div>";
				echo "<table class='table table-bordered'>";
				echo "<tr>";
				echo "<td><b>Nit</b></td>";
				echo "<td>$sub_vivienda_otro_nit_entidad</td>";
				echo "<td><b>Entidad</b></td>";
				echo "<td>$sub_vivienda_otro_nombre_entidad</td>";
				echo "<td><b>Fecha asignacion</b></td>";
				echo "<td>$sub_vivienda_otro_fecha_asignacion</td>";
				echo "</tr>";
				echo "</table>";
			}

			if ($cruce_catastro == 1) {
				echo "<div class='alert-danger'><hr><b>Cruce con BD catastro</b></div>";

				$sql = "SELECT * FROM cruce_catastro WHERE identificacion = '$cedula'";
				$resultado = mysqli_query($sle, $sql) or die(mysqli_error());
				while ($row = mysqli_fetch_row($resultado)) {
					echo "<table class='table table-bordered'>";
					echo "<tr>";
					echo "<td><b>Nit</b></td>";
					echo "<td>$row[1]</td>";
					echo "<td><b>Entidad</b></td>";
					echo "<td>$row[2]</td>";
					echo "<td><b>Matricula</b></td>";
					echo "<td>$row[8]</td>";
					echo "<td><b>Departamento</b></td>";
					echo "<td>$row[9]</td>";
					echo "<td><b>Municipio</b></td>";
					echo "<td>$row[10]</td>";
					echo "</tr>";
					echo "</table>";
				}
			}

			if ($cruce_nuevo_hogar == 1) {
				echo "<div class='alert-danger'><hr><b>Cruce con BD nuevo hogar</b></div>";
				echo "<table class='table table-bordered'>";
				echo "<tr>";
				echo "<td><b>Fecha</b></td>";
				echo "<td>$nuevo_hogar_fecha</td>";
				echo "<td><b>Entidad</b></td>";
				echo "<td>$nuevo_hogar_entidad</td>";
				echo "<td><b>FCaja</b></td>";
				echo "<td>$nuevo_hogar_caja</td>";
				echo "</tr>";
				echo "</table>";
			}

			if ($cruce_sisben == 1) {
				echo "<div class='alert-danger'><hr><b>Cruce con BD sisben</b></div>";
				echo "<table class='table table-bordered'>";
				echo "<tr>";
				echo "<td><b>Puntaje</b></td>";
				echo "<td>$sisben_puntaje</td>";
				echo "<td><b>Zona</b></td>";
				echo "<td>$sisben_zona</td>";
				echo "<td><b>Parentesco</b></td>";
				echo "<td>$sisben_parentesco</td>";
				echo "</tr>";
				echo "</table>";
			}

			if ($cruce_unidos == 1) {
				echo "<div class='alert-danger'><hr><b>Cruce con BD unidos</b></div>";
				echo "<table class='table table-bordered'>";
				echo "<tr>";
				echo "<td><b>Folio</b></td>";
				echo "<td>$unidos_folio</td>";
				echo "<td><b>Parentesco</b></td>";
				echo "<td>$unidos_parentesco</td>";
				echo "<td><b>Departamento</b></td>";
				echo "<td>$unidos_departamento</td>";
				echo "<td><b>Municipio</b></td>";
				echo "<td>$unidos_municipio</td>";
				echo "</tr>";
				echo "</table>";
			}

			if ($cruce_reunidos == 1) {
				echo "<div class='alert-danger'><hr><b>Cruce con BD reunidos</b></div>";
				echo "<table class='table table-bordered'>";
				echo "<tr>";
				echo "<td><b>Departamento</b></td>";
				echo "<td>$reunidos_departamento</td>";
				echo "<td><b>Municipio</b></td>";
				echo "<td>$reunidos_municipio</td>";
				echo "</tr>";
				echo "</table>";
			}

			//*************************************************************************		
			//BASES DE DATOS REGISTRADAS **********************************************
			echo "<hr><h4>Bases de datos registradas</h4>";
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
			echo "<hr><span class='Estilo7'><font size='+2' color='red'>ATENCION - Miembro del grupo familiar del titular...</font></span><BR>";
			echo "<span class='Estilo7'><font size='+1' color='black'>" . $rowFAM[0] . " - " . $rowFAM[3] . " " . $rowFAM[4] . " " . $rowFAM[5] . " " . $rowFAM[6] . "</font></span><BR>";
		}

		echo "<BR><a href='menu.php'><input type='submit' name='Volver' id='Volver' value='Volver a la ventana anterior...' class='btn btn-success btn-block'/></a>";
		?>

	</aside>

	<!-- <aside class="col-sm-1"></aside> -->
</div>

<?php include("includes/footer.php"); ?>