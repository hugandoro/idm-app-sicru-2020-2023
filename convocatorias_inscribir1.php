<?php include("includes/header.php"); ?>
<?php include("includes/title.php"); ?>
<?php include("includes/login_valid_session.php"); ?>

<div class="row">
	<aside class="col-sm-3"></aside>

	<aside class="col-sm-6">

		<?php
		if (isset($_POST['cedula']))
			$cedula = $_POST['cedula'];
		else
			$cedula = $_GET['cedula'];


		//REALIZA CRUCES CON OTRAS BASES
		$mr = 0;
		$mu = 0;
		$pr = 0;
		$vip = 0;
		$vis = 0; //VIVIENDA NUEVA
		$des = 0;
		$sip = 0;
		$reubicado = 0;
		$mejora = 0; //MEJORAMIENTO

		mysqli_select_db($sle, $database_sle);
		mysqli_query($sle, "SET NAMES 'utf8'");

		$sql = "SELECT * FROM ciudadanos WHERE (cedula = '$cedula')";
		$resultado = mysqli_query($sle, $sql) or die(mysqli_error());
		$nombre = '';


		// Determina la sub base a la que pertenece
		while ($row = mysqli_fetch_row($resultado)) {
			$nombre = $row[3] . " " . $row[4] . " " . $row[5] . " " . $row[6];

			if ($row[84] == 'SI') $pr = 1;
			if ($row[85] == 'SI') $mu = 1; 
			if ($row[86] == 'SI') $mr = 1;
			if ($row[87] == 'SI') $vip = 1;
			if ($row[88] == 'SI') $des = 1;
			if ($row[89] == 'SI') $sip = 1;
			if (($pr==0) && ($mu==0) && ($mr==0) && ($vip==0) && ($des==0) && ($sip==0)) $vis = 1; // Si las variables bandera se mantienen en 0 entonces la subbase es VIS

		}
		// Fin identificacion sub base *************


		$aux = $mr + $mu + $pr + $vip + $vis + $des + $sip + $reubicado;


		if ($nombre != '') {
			echo "<BR><center><B><font size='+2'>$nombre</font></B><BR>";
			echo "<center><font size='-1'>Registrado con Documento <B>$cedula</B></font><BR><BR>";
		}

		//VERIFICA QUE NO TENGA POSTULACION ACTIVA PARA ALGUNO OTRO PROYECTO
		$sqlCO = "SELECT * FROM convocatorias_ciudadanos WHERE ((cedula = '$cedula') && (estado = '1'))";
		$resultadoCO = mysqli_query($sle, $sqlCO) or die(mysqli_error());
		if (mysqli_num_rows($resultadoCO) > 0) {
			$rowCO = mysqli_fetch_row($resultadoCO);
			echo "<BR><center><B><font size='+1'>Ciudadano con Postulacion Vigente en el proyecto</font></B><BR><BR>";

			$sqlPO = "SELECT * FROM convocatorias WHERE (id_proyecto = '$rowCO[0]')";
			$resultadoPO = mysqli_query($sle, $sqlPO) or die(mysqli_error());
			$rowPO = mysqli_fetch_row($resultadoPO);

			echo "<BR><center><B><font size='+1'>$rowPO[1]</font></B><BR><BR>";
			echo "<BR><center>Solo se permite estar postulado para un proyecto, por lo tanto debe eliminar la postulacion actual si desea inscribir al ciudadano en otra convocatoria<BR><BR>";

			echo "<HR><a href='convocatorias_ficha0.php?cedula=$cedula&convocatoria=$rowCO[0]'><input type='submit' name='Volver' id='Volver' value='Imprimir Ficha de Postulacion' class='btn btn-success btn-block'/></a>";
			$aux = 0;
		}
		//================================


		//VERIFICA QUE NO SEA BENEFICIARIO DE UNA POSTULACION PREVIA
		$sqlCO1 = "SELECT * FROM convocatorias_ciudadanos WHERE ((cedula = '$cedula') && (estado = '0') && (resultado = '1'))";
		$resultadoCO1 = mysqli_query($sle, $sqlCO1) or die(mysqli_error());
		$bandera = 0;
		if (mysqli_num_rows($resultadoCO1) > 0) {
			$rowCO1 = mysqli_fetch_row($resultadoCO1);
			echo "<BR><center><B><font size='+2' color='red'><blink>ATENCION!!!<BR>Beneficiario de convocatoria</blink></font></B><BR>";

			$sqlPO1 = "SELECT * FROM convocatorias WHERE (id_proyecto = '$rowCO1[0]')";
			$resultadoPO1 = mysqli_query($sle, $sqlPO1) or die(mysqli_error());
			$rowPO1 = mysqli_fetch_row($resultadoPO1);

			echo "<center><B><font size='+1'>$rowPO1[1]</font></B><BR><BR>";
			$bandera = 1;
		}
		//================================


		//CONSULTA SI ESTA EN ALGUN NUCLEO FAMILIAR
		$sqlFAM = "SELECT * FROM ciudadanos WHERE ((doc_fami1 = '$cedula') || (doc_fami2 = '$cedula') || (doc_fami3 = '$cedula') || (doc_fami4 = '$cedula') || (doc_fami5 = '$cedula') || (doc_fami6 = '$cedula') || (doc_fami7 = '$cedula') || (doc_fami8 = '$cedula') || (doc_fami9 = '$cedula') || (doc_fami10 = '$cedula'))";
		$resultadoFAM = mysqli_query($sle, $sqlFAM) or die(mysqli_error());
		while ($rowFAM = mysqli_fetch_row($resultadoFAM)) {
			echo "<CENTER><BR><HR><B>MIEMBRO DEL GRUPO FAMILIAR DEL TITULAR...</B><BR>";
			echo "" . $rowFAM[0] . " - " . $rowFAM[3] . " " . $rowFAM[4] . " " . $rowFAM[5] . " " . $rowFAM[6] . "</CENTER>";
			$aux = 0;
		}
		//================================


		if ($aux > 0) {
			echo "<center>Registrado en el sistema para...<BR><BR>";

			if ($mr == 1) {
				echo "<B>MEJORAMIENTO RURAL</B></B><HR>";
				if ($bandera == 0) echo "<a href='convocatorias_inscribir2.php?cedula=" . $cedula . "&base=2'><input type='submit' id='MR' value='Ver convocatorias disponibles' class='btn btn-success btn-block'/></a><BR>";
				else echo "NO SE PUEDE POSTULAR A NUEVOS SUBSIDIOS<BR>";
			}

			if ($mu == 1) {
				echo "<B>MEJORAMIENTO URBANO</B><HR>";
				if ($bandera == 0) echo "<a href='convocatorias_inscribir2.php?cedula=" . $cedula . "&base=1'><input type='submit' id='MU' value='Ver convocatorias disponibles' class='btn btn-success btn-block'/></a><BR>";
				else echo "NO SE PUEDE POSTULAR A NUEVOS SUBSIDIOS<BR>";
			}


			if ($pr == 1) {
				echo "<B>REUBICACION</B><HR>";
				if ($bandera == 0) echo "<a href='convocatorias_inscribir2.php?cedula=" . $cedula . "&base=0'><input type='submit' id='PR' value='Ver convocatorias disponibles' class='btn btn-success btn-block'/></a><BR>";
				else echo "NO SE PUEDE POSTULAR A NUEVOS SUBSIDIOS<BR>";
			}


			if ($vip == 1) {
				echo "<B>VIVIENDA PRIORITARIA - VIP</B><HR>";
				if ($bandera == 0) echo "<a href='convocatorias_inscribir2.php?cedula=" . $cedula . "&base=4'><input type='submit' id='VIP' value='Ver convocatorias disponibles' class='btn btn-success btn-block'/></a><BR>";
				else echo "NO SE PUEDE POSTULAR A NUEVOS SUBSIDIOS<BR>";
			}


			if ($vis == 1) {
				echo "<B>VIVENDA DE INTERES SOCIAL - VIS</B><HR>";
				if ($bandera == 0) echo "<a href='convocatorias_inscribir2.php?cedula=" . $cedula . "&base=3'><input type='submit' id='VIS' value='Ver convocatorias disponibles' class='btn btn-success btn-block'/></a><BR>";
				else echo "NO SE PUEDE POSTULAR A NUEVOS SUBSIDIOS<BR>";
			}


			if ($des == 1) {
				echo "<B>POBLACION DESPLAZADA</B><HR>";
				if ($bandera == 0) echo "<a href='convocatorias_inscribir2.php?cedula=" . $cedula . "&base=5'><input type='submit' id='DES' value='Ver convocatorias disponibles' class='btn btn-success btn-block'/></a><BR>";
				else echo "NO SE PUEDE POSTULAR A NUEVOS SUBSIDIOS<BR>";
			}


			if ($sip == 1) {
				echo "<B>CONTRUCCION EN SITIO PROPIO</B><HR>";
				if ($bandera == 0) echo "<a href='convocatorias_inscribir2.php?cedula=" . $cedula . "&base=6'><input type='submit' id='SIP' value='Ver convocatorias disponibles' class='btn btn-success btn-block'/></a><BR>";
				else echo "NO SE PUEDE POSTULAR A NUEVOS SUBSIDIOS<BR>";
			}


			if ($reubicado == 1) echo "<B>*** REUBICADO ***</B><BR>";

		}

		echo "<HR><a href='convocatorias.php'><input type='submit' name='Volver' id='Volver' value='Volver a la ventana anterior...' class='btn btn-success btn-block'/></a>";
		?>


	</aside>

	<aside class="col-sm-3"></aside>
</div>

<?php include("includes/footer.php"); ?>