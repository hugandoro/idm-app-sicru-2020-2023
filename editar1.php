<?php include("includes/header.php"); ?>
<?php include("includes/title.php"); ?>
<?php include("includes/login_valid_session.php"); ?>

<div class="row">
	<aside class="col-sm-3"></aside>

	<aside class="col-sm-6">

		<p>
			<?php
			$base =	$_POST['base'];

			$paso = 0;
			if (($base == 0) && ($_SESSION["REU"] >= "2")) $paso = 1;
			if (($base == 1) && ($_SESSION["MU"] >= "2")) $paso = 1;
			if (($base == 2) && ($_SESSION["MR"] >= "2")) $paso = 1;
			if (($base == 3) && ($_SESSION["VIS"] >= "2")) $paso = 1;
			if (($base == 4) && ($_SESSION["VIP"] >= "2")) $paso = 1;
			if (($base == 5) && ($_SESSION["DES"] >= "2")) $paso = 1;
			if (($base == 6) && ($_SESSION["SP"] >= "2")) $paso = 1;
			if (($base == 7) && ($_SESSION["MEJORAMIENTO"] >= "2")) $paso = 1;
			if ($paso == 0) {
				echo "<CENTER><BR><BR>";
				echo "NO TIENE PERMISOS PARA ACCEDER A ESTA BASE DE DATOS<BR>";
				echo "<a href='menu.php'><input name='Volver' type='submit' class='Botones' id='Volver' value='Volver' /></a>";
				echo "</CENTER>";
				return;
			}

			$cedula = $_POST['cedula'];
			$situacion = $_POST['situacion'];
			$parentesco = $_POST['parentesco'];
			$nombre1 = $_POST['nombre1'];
			$nombre2 = $_POST['nombre2'];
			$apellido1 = $_POST['apellido1'];
			$apellido2 = $_POST['apellido2'];
			$edad = $_POST['edad'];
			$direccion = $_POST['direccion'];
			$barrio = $_POST['barrio'];
			$comuna = $_POST['comuna'];
			$zona = $_POST['zona'];
			$fijo = $_POST['fijo'];
			$celular = $_POST['celular'];
			$observaciones = $_POST['observaciones'];
			$fecha = $_POST['fecha'];
			$familiar1 = $_POST['familiar1'];
			$familiar2 = $_POST['familiar2'];
			$familiar3 = $_POST['familiar3'];
			$familiar4 = $_POST['familiar4'];
			$familiar5 = $_POST['familiar5'];
			$familiar6 = $_POST['familiar6'];
			$familiar7 = $_POST['familiar7'];
			$familiar8 = $_POST['familiar8'];
			$familiar9 = $_POST['familiar9'];
			$familiar10 = $_POST['familiar10'];
			$email = $_POST['email'];
			$inmueble_actual = $_POST['inmueble_actual'];
			$inmueble_titulo = $_POST['inmueble_titulo'];
			$inmueble_tiempo = $_POST['inmueble_tiempo'];
			$inmueble_material = $_POST['inmueble_material'];
			$zona_riesgo = $_POST['zona_riesgo'];
			$cantidad_gf = $_POST['cantidad_gf'];
			$madre_ch = $_POST['madre_ch'];
			$poblacion_depe = $_POST['poblacion_depe'];
			$grupo_etnico = $_POST['grupo_etnico'];
			$encuestado_tel = $_POST['encuestado_tel'];
			$encuestado_per = $_POST['encuestado_per'];
			$visitado = $_POST['visitado'];

			$laboral = $_POST['laboral'];
			$edad1 = $_POST['edad1'];
			$edad2 = $_POST['edad2'];
			$edad3 = $_POST['edad3'];
			$edad4 = $_POST['edad4'];
			$edad5 = $_POST['edad5'];
			$edad6 = $_POST['edad6'];
			$edad7 = $_POST['edad7'];
			$edad8 = $_POST['edad8'];
			$edad9 = $_POST['edad9'];
			$edad10 = $_POST['edad10'];
			$fecha_actualizacion = $_POST['fecha_actualizacion'];
			$inmueble_matricula = $_POST['inmueble_matricula'];
			$inmueble_catastral = $_POST['inmueble_catastral'];
			$inmueble_escritura = $_POST['inmueble_escritura'];
			$inmueble_servicios  = $_POST['inmueble_servicios'];
			$docu1 = $_POST['docu1'];
			$docu2 = $_POST['docu2'];
			$docu3 = $_POST['docu3'];
			$docu4 = $_POST['docu4'];
			$docu5 = $_POST['docu5'];
			$docu6 = $_POST['docu6'];
			$docu7 = $_POST['docu7'];
			$docu8 = $_POST['docu8'];
			$docu9 = $_POST['docu9'];
			$docu10 = $_POST['docu10'];

			$inmueble_solicitud = $_POST['inmueble_solicitud'];

			$tipoevento = "";
			$valorahorrado = "";
			$entidad = "";
			$numcuenta = "";
			$retiro = "";
			$preaprobadoentidad = "";
			$preaprobadovalor = "";
			$cesantiasentidad = "";
			$cesantiasvalor = "";
			$radicado = "";
			$ente_remite = "";

			if (isset($_POST['tipoevento'])) $tipoevento = $_POST['tipoevento'];
			if (isset($_POST['valorahorrado'])) $valorahorrado = $_POST['valorahorrado'];
			if (isset($_POST['entidad'])) $entidad = $_POST['entidad'];
			if (isset($_POST['numcuenta'])) $numcuenta = $_POST['numcuenta'];
			if (isset($_POST['retiro'])) $retiro = $_POST['retiro'];
			if (isset($_POST['preaprobadoentidad'])) $preaprobadoentidad = $_POST['preaprobadoentidad'];
			if (isset($_POST['preaprobadovalor'])) $preaprobadovalor = $_POST['preaprobadovalor'];
			if (isset($_POST['cesantiasentidad'])) $cesantiasentidad = $_POST['cesantiasentidad'];
			if (isset($_POST['cesantiasvalor'])) $cesantiasvalor =  $_POST['cesantiasvalor'];
			if (isset($_POST['radicado'])) $radicado = $_POST['radicado'];
			if (isset($_POST['ente_remite'])) $ente_remite = $_POST['ente_remite'];

			mysqli_select_db($sle, $database_sle);
			mysqli_query($sle, "SET NAMES 'utf8'");

			//PROCEDEMOS A INGRESAR EL NUEVO REGISTRO SEGUN LA BASE SELECCIONADA
			$sql = "UPDATE ciudadanos SET situacion_actual='$situacion', parentesco='$parentesco', nombre1='$nombre1', nombre2='$nombre2', apellido1='$apellido1', apellido2='$apellido2', edad='$edad', direccion='$direccion', barrio='$barrio', comuna='$comuna', zona='$zona', fijo='$fijo', celular='$celular', observaciones='$observaciones', fecha='$fecha', tipo_evento='$tipoevento', familiar1='$familiar1', familiar2='$familiar2', familiar3='$familiar3', familiar4='$familiar4', familiar5='$familiar5', familiar6='$familiar6', familiar7='$familiar7', familiar8='$familiar8', familiar9='$familiar9', familiar10='$familiar10', email='$email', inmueble_actual='$inmueble_actual', inmueble_titulo='$inmueble_titulo', inmueble_tiempo='$inmueble_tiempo', inmueble_material='$inmueble_material', zona_riesgo='$zona_riesgo', cantidad_gf='$cantidad_gf', madre_ch='$madre_ch', poblacion_depe='$poblacion_depe', grupo_etnico='$grupo_etnico', encuestado_tel='$encuestado_tel', encuestado_per='$encuestado_per', visitado='$visitado', situacion_laboral='$laboral', fecha_actualizacion='$fecha_actualizacion', edad1='$edad1', edad2='$edad2', edad3='$edad3', edad4='$edad4', edad5='$edad5', edad6='$edad6', edad7='$edad7', edad8='$edad8', edad9='$edad9', edad10='$edad10', matricula_inmobiliaria='$inmueble_matricula', ficha_catastro='$inmueble_catastral', numero_escritura='$inmueble_escritura', servicios_publicos='$inmueble_servicios', radicado='$radicado', ente_radicado='$ente_remite', doc_fami1='$docu1', doc_fami2='$docu2', doc_fami3='$docu3', doc_fami4='$docu4', doc_fami5='$docu5', doc_fami6='$docu6', doc_fami7='$docu7', doc_fami8='$docu8', doc_fami9='$docu9', doc_fami10='$docu10', preaprobado='$preaprobadovalor', preaprobado_entidad='$preaprobadoentidad', cesantias='$cesantiasvalor', cesantias_entidad='$cesantiasentidad', valor_ahorrado='$valorahorrado', entidad='$entidad', num_cuenta='$numcuenta', fecha_retiro='$retiro', tipo_mejoramiento='$inmueble_solicitud' WHERE cedula = '$cedula'";

			mysqli_query($sle, $sql) or die("Problemas al insertar" . mysqli_error($sle));
			echo "<div class='alert alert-success'><center>Registro del ciudadano actualizado exitosamente</center></div><br>";

			//Registra el EVENTO EN EL LOG
			$sql = "INSERT INTO log_eventos (fecha, hora, usuario, registro, evento) VALUES (now(), now(), " . $_SESSION["cedula"] . ", '$cedula', 'UPDATE')";
			mysqli_query($sle, $sql) or die(mysqli_error());
			//****************************	  
			?>
		</p>
		<p>
			<a href="menu.php"><input name="Volver" type="submit" class="btn btn-success btn-block" id="Volver" value="Volver a la ventana anterior..." /></a> </p>
	</aside>

	<aside class="col-sm-3"></aside>
</div>

<?php include("includes/footer.php"); ?>