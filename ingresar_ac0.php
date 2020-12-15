<?php include("includes/header.php"); ?>
<?php include("includes/title.php"); ?>
<?php include("includes/login_valid_session.php"); ?>

<!-- Realiza cruces con las bases de datos -->
<?php
$cedula = $_POST['cedula'];

$mr = 0;
$mu = 0;
$pr = 0;
$vip = 0;
$vis = 0; //VIVIENDA NUEVA
$des = 0;
$sip = 0;
$reubicado = 0;
$grupo = 0;
$mejora = 0; //MEJORAMIENTO
//$comfamiliar = 0;

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


//$sql="SELECT * FROM cruce_comfamiliar WHERE ((afiliado!='') || (beneficiario!='') || (otras_ciudades!='')) && (cedula = '$cedula')";
//$resultado=mysqli_query($sle,$sql)or die (mysqli_error()); 
//if (mysqli_num_rows($resultado) > 0) {	
//  $comfamiliar=1;
//  $row = mysqli_fetch_row($resultado);
//  $afiliado=$row[1];
//  $beneficiario=$row[2];
//  $otras_ciudades=$row[3];
//}

//CONSULTA SI ESTA EN ALGUN NUCLEO FAMILIAR
$sqlFAM = "SELECT * FROM ciudadanos WHERE ((doc_fami1 = '$cedula') || (doc_fami2 = '$cedula') || (doc_fami3 = '$cedula') || (doc_fami4 = '$cedula') || (doc_fami5 = '$cedula') || (doc_fami6 = '$cedula') || (doc_fami7 = '$cedula') || (doc_fami8 = '$cedula') || (doc_fami9 = '$cedula') || (doc_fami10 = '$cedula'))";
$resultadoFAM = mysqli_query($sle, $sqlFAM) or die(mysqli_error());
while ($rowFAM = mysqli_fetch_row($resultadoFAM)) {
	$grupo = 1;
}
//*********************************************		

$aux = $mr + $mu + $pr + $vip + $vis + $des + $sip + $mejora + $reubicado + $grupo; // + $comfamiliar;
?>

<div class="row">
	<aside class="col-sm-3"></aside>

	<aside class="col-sm-6">

		<?php
		if ($aux > 0) {
			echo "<div class='alert alert-danger'><center>Novedad encontrada para el documento digitado</center></div><br>";
			if ($mr == 1) echo "<center>N° de identificacion registrado para <B>Mejoramiento Rural</B><HR></center>";
			if ($mu == 1) echo "<center>N° de identificacion registrado para <B>Mejoramiento Urbano</B><HR></center>";
			if ($pr == 1) echo "<center>N° de identificacion registrado para <B>Por Reubicar</B><HR></center>";
			if ($vip == 1) echo "<center>N° de identificacion registrado para <B>Vivienda de Interes Prioritario VIP</B><HR></center>";
			if ($vis == 1) echo "<center>N° de identificacion registrado para <B>Vivienda Nueva</B><HR></center>";
			if ($des == 1) echo "<center>N° de identificacion registrado para <B>Condicion de Desplazamiento</B><HR></center>";
			if ($sip == 1) echo "<center>N° de identificacion registrado para <B>Construccion en Sitio Propio</B><HR></center>";
			if ($mejora == 1) echo "<center>N° de identificacion registrado para <B>Mejoramiento</B><HR></center>";
			if ($reubicado == 1) echo "<center><B>N° de identificacion en lista de *** REUBICADOS ***</B><HR></center>";

			//CONSULTA SI ESTA EN ALGUN NUCLEO FAMILIAR
			$sqlFAM = "SELECT * FROM ciudadanos WHERE ((doc_fami1 = '$cedula') || (doc_fami2 = '$cedula') || (doc_fami3 = '$cedula') || (doc_fami4 = '$cedula') || (doc_fami5 = '$cedula') || (doc_fami6 = '$cedula') || (doc_fami7 = '$cedula') || (doc_fami8 = '$cedula') || (doc_fami9 = '$cedula') || (doc_fami10 = '$cedula'))";
			$resultadoFAM = mysqli_query($sle, $sqlFAM) or die(mysqli_error());
			while ($rowFAM = mysqli_fetch_row($resultadoFAM)) {
				echo "<HR><center><B>MIEMBRO DEL GRUPO FAMILIAR DEL TITULAR...</B></center><BR>";
				echo "" . $rowFAM[0] . " - " . $rowFAM[3] . " " . $rowFAM[4] . " " . $rowFAM[5] . " " . $rowFAM[6] . "<HR>";
			}
			//*********************************************		

			//if ($comfamiliar==1) echo "<B>CRUCE COMFAMILIAR</B><BR>$afiliado - $beneficiario - $otras_ciudades<HR></center>";

			echo "<CENTER><a href='menu.php'><input type='submit' class='btn btn-success btn-block' name='Volver' id='Volver' value='Volver a la ventana anterior...' /></a></CENTER>";
		}

		if ($aux == 0) {
		?>

			<form name="form1" method="post" onSubmit="return revisar(form1);" action="ingresar_ac1.php">
				<div class="form-group">
					<label><h6>Seleccione BASE DE DATOS para inscripcion</h6></label>
					<select name="base" id="base" input class="form-control">
						<?php
						//if ($_SESSION["REU"] >= "3") echo "<option value='0'>Por Reubicar</option>";
						//if ($_SESSION["MU"] >= "3") echo "<option value='1'>Mejora de Vivienda Urbana</option>";
						//if ($_SESSION["MR"] >= "3") echo "<option value='2'>Mejora de Vivienda Rural</option>";
						if ($_SESSION["VIS"] >= "3") echo "<option value='3'>Vivienda Nueva</option>";
						//if ($_SESSION["VIP"] >= "3") echo "<option value='4'>Vivienda de Interes Prioritario</option>";
						//if ($_SESSION["DES"] >= "3") echo "<option value='5'>Desplazados</option>";
						//if ($_SESSION["SP"] >= "3") echo "<option value='6'>Construccion en Sitio Propio</option>";
						if ($_SESSION["MEJORAMIENTO"] >= "3") echo "<option value='7'>Mejoramiento</option>";
						?>
					</select>
				</div>
				<div class="form-group">
					<input type="hidden" name="cedula" id="cedula" <?php echo "value=" . $cedula ?>>
					<input type="submit" class="btn btn-success btn-block" value="Siguiente Paso >>" />
				</div>
			</form>

		<?php } ?>
	</aside>

	<aside class="col-sm-3"></aside>
</div>

<?php include("includes/footer.php"); ?>