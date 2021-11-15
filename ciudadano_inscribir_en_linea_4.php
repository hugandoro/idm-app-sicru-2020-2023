<?php include("includes/header.php"); ?>
<?php include("includes/title.php"); ?>

<div class="row">
	<aside class="col-sm-3"></aside>

	<aside class="col-sm-6">

		<p>
			<?php
			$base =	$_POST['base']; //BASE MADRE
			$sub_base =	$_POST['sub_base']; //Sub base acorde a la BASE MADRE


			//Asignacion de subcategoria acorde a SUB_BASE
			$MEU = $MER = $DES = $SIP = $REU = $VIP = "NO";
			switch ($sub_base) {
				case 'MEU':
					$MEU = "SI"; // Mejoramiento Urbano
					break;
				case 'MER':
					$MER = "SI"; // Mejoramiento Rural
					break;
				case 'DES':
					$DES = "SI"; // Desplazado
					break;
				case 'SIP':
					$SIP = "SI"; // Sitio Propio
					break;
				case 'REU':
					$REU = "SI"; // Reubicado
					break;
				case 'VIP':
					$VIP = "SI"; // Vivienda de interes prioritaria
					break;					
				default:
					break;
			}
			// Fin asignacion ********************************


			$cedula = $_POST['cedula'];
			$situacion = $_POST['situacion'];
			$laboral = $_POST['laboral']; //***
			$parentesco = $_POST['parentesco'];
			$nombre1 = $_POST['nombre1'];
			$nombre2 = $_POST['nombre2'];
			$apellido1 = $_POST['apellido1'];
			$apellido2 = $_POST['apellido2'];
			$edad = $_POST['edad']; //***
			$direccion = $_POST['direccion'];
			$barrio = $_POST['barrio'];
			$comuna = $_POST['comuna'];
			$zona = $_POST['zona'];
			$fijo = $_POST['fijo'];
			$celular = $_POST['celular'];
			$observaciones = $_POST['observaciones'];
			$fecha = $_POST['fecha'];
			$fecha_actualizacion  = $_POST['fecha_actualizacion']; //***
			$familiar1 = $_POST['familiar1'];
			$edad1 = $_POST['edad1']; //***
			$familiar2 = $_POST['familiar2'];
			$edad2 = $_POST['edad2']; //***
			$familiar3 = $_POST['familiar3'];
			$edad3 = $_POST['edad3']; //***
			$familiar4 = $_POST['familiar4'];
			$edad4 = $_POST['edad4']; //***
			$familiar5 = $_POST['familiar5'];
			$edad5 = $_POST['edad5']; //***
			$familiar6 = $_POST['familiar6'];
			$edad6 = $_POST['edad6']; //***
			$familiar7 = $_POST['familiar7'];
			$edad7 = $_POST['edad7']; //***
			$familiar8 = $_POST['familiar8'];
			$edad8 = $_POST['edad8']; //***
			$familiar9 = $_POST['familiar9'];
			$edad9 = $_POST['edad9']; //***
			$familiar10 = $_POST['familiar10'];
			$edad10 = $_POST['edad10']; //***
			$email = $_POST['email'];
			$inmueble_actual = $_POST['inmueble_actual'];
			$inmueble_titulo = $_POST['inmueble_titulo'];
			$inmueble_matricula = $_POST['inmueble_matricula']; //***
			$inmueble_catastral = $_POST['inmueble_catastral']; //***
			$inmueble_escritura = $_POST['inmueble_escritura']; //***
			$inmueble_tiempo = $_POST['inmueble_tiempo'];
			$inmueble_material = $_POST['inmueble_material'];
			$inmueble_servicios = $_POST['inmueble_servicios']; //***
			$zona_riesgo = $_POST['zona_riesgo'];
			$cantidad_gf = $_POST['cantidad_gf'];
			$madre_ch = $_POST['madre_ch'];
			$poblacion_depe = $_POST['poblacion_depe'];
			$grupo_etnico = $_POST['grupo_etnico'];
			$encuestado_tel = $_POST['encuestado_tel'];
			$encuestado_per = $_POST['encuestado_per'];
			$visitado = $_POST['visitado'];
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

			if (isset($_POST['tipoevento'])) $tipoevento = $_POST['tipoevento']; //
			if (isset($_POST['valorahorrado'])) $valorahorrado = $_POST['valorahorrado']; //
			if (isset($_POST['entidad'])) $entidad = $_POST['entidad']; //
			if (isset($_POST['numcuenta'])) $numcuenta = $_POST['numcuenta']; //
			if (isset($_POST['retiro'])) $retiro = $_POST['retiro'];
			if (isset($_POST['preaprobadoentidad'])) $preaprobadoentidad = $_POST['preaprobadoentidad']; //
			if (isset($_POST['preaprobadovalor'])) $preaprobadovalor = $_POST['preaprobadovalor']; //
			if (isset($_POST['cesantiasentidad'])) $cesantiasentidad = $_POST['cesantiasentidad']; //
			if (isset($_POST['cesantiasvalor'])) $cesantiasvalor =  $_POST['cesantiasvalor']; //
			if (isset($_POST['radicado'])) $radicado = $_POST['radicado']; //
			if (isset($_POST['ente_remite'])) $ente_remite = $_POST['ente_remite']; //

			mysqli_select_db($sle, $database_sle);
			mysqli_query($sle, "SET NAMES 'utf8'");

			//PROCEDEMOS A INGRESAR EL NUEVO REGISTRO SEGUN LA BASE SELECCIONADA
			$sql = "INSERT INTO ciudadanos (cedula, situacion_actual, situacion_laboral, parentesco, nombre1, nombre2, apellido1, apellido2, 
					edad, direccion, barrio, comuna, zona, fijo, celular, observaciones, fecha, fecha_actualizacion, tipo_evento, familiar1, 
					edad1, familiar2, edad2, familiar3, edad3, familiar4, edad4, familiar5, edad5, familiar6, edad6, familiar7, edad7, 
					familiar8, edad8, familiar9, edad9, familiar10, edad10, email, inmueble_actual, inmueble_titulo, inmueble_tiempo, 
					inmueble_material, zona_riesgo, cantidad_gf, madre_ch, poblacion_depe, grupo_etnico, encuestado_tel, encuestado_per, 
					visitado, matricula_inmobiliaria, ficha_catastro, numero_escritura, servicios_publicos, radicado, ente_radicado, doc_fami1, 
					doc_fami2, doc_fami3, doc_fami4, doc_fami5, doc_fami6, doc_fami7, doc_fami8, doc_fami9, doc_fami10, id_base, preaprobado, 
					preaprobado_entidad, cesantias, cesantias_entidad, valor_ahorrado, entidad, num_cuenta, tipo_mejoramiento, 
					por_reubicar, mejora_urbana, mejora_rural, vivienda_prioritaria, condicion_desplazado, tiene_sitio_propio, tipo_inscripcion) 
					VALUES ('$cedula', '$situacion', '$laboral', '$parentesco', '$nombre1', '$nombre2', '$apellido1', '$apellido2', 
					'$edad', '$direccion', '$barrio', '$comuna', '$zona', '$fijo', '$celular', '$observaciones', '$fecha', '$fecha_actualizacion', '$tipoevento', '$familiar1', 
					'$edad1', '$familiar2', '$edad2', '$familiar3', '$edad3', '$familiar4', '$edad4', '$familiar5', '$edad5', '$familiar6', '$edad6', '$familiar7', '$edad7', 
					'$familiar8', '$edad8', '$familiar9', '$edad9', '$familiar10', '$edad10', '$email', '$inmueble_actual', '$inmueble_titulo', '$inmueble_tiempo', 
					'$inmueble_material', '$zona_riesgo', '$cantidad_gf', '$madre_ch', '$poblacion_depe', '$grupo_etnico', '$encuestado_tel', '$encuestado_per', 
					'$visitado', '$inmueble_matricula', '$inmueble_catastral', '$inmueble_escritura', '$inmueble_servicios', '$radicado', '$ente_remite', '$docu1', 
					'$docu2', '$docu3', '$docu4', '$docu5', '$docu6', '$docu7', '$docu8', '$docu9', '$docu10', '$base', '$preaprobadovalor', 
					'$preaprobadoentidad', '$cesantiasvalor', '$cesantiasentidad', '$valorahorrado', '$entidad', '$numcuenta', '$inmueble_solicitud', 
					'$REU', '$MEU', '$MER', '$VIP', '$DES', '$SIP', 'WEB')";

			mysqli_query($sle, $sql) or die(mysqli_error($sle));

			echo "<div class='alert alert-success'><center>Estimado <B>$nombre1 $nombre2 $apellido1 $apellido2</B> su proceso de registro ha culminado exitosamente</center></div><br>";


			//Registra el EVENTO EN EL LOG
			$sql = "INSERT INTO log_eventos (fecha, hora, usuario, registro, evento) VALUES (now(), now(), '123456789', '$cedula', 'INSERT WEB')";
			mysqli_query($sle, $sql) or die(mysqli_error($sle));
			//****************************
			?>
		</p>
		<p>
			<br><br><a href='index.php'><input type='submit' name='Volver' id='Volver' value='Terminar' class='btn btn-success btn-block'/></a>
			<?php echo "<BR><center>Estimado usuario le invitamos a evaluar nuestro servicio diligenciando una breve encuesta<a target='_blank' href='https://docs.google.com/forms/d/e/1FAIpQLScsyG_Dl_vMe8o1iRphTtO5cmscLaKowD3OUn8IBsBJ0VvHRA/viewform'> | Califica el servicio recibido |</center></a>"; ?>

		</TD>
		</TR>
	</aside>

	<aside class="col-sm-3"></aside>
</div>

<?php include("includes/footer.php"); ?>