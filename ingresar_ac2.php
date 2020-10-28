<?php require_once('Connections/sle.php'); 
$currentPage = $_SERVER["PHP_SELF"];
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml"> 
 
<head profile="http://gmpg.org/xfn/11"> 
	<title>SICRU Ver 1.0</title> 
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
	<link rel="STYLESHEET" type="text/css" href="estilo.css">
</head> 
<body>

<center>
  <?php
  //Verifica que exista una sesion creada
  if (isset($_SESSION['nivel'])){
	//Verifica que nivel de acceso tiene  
	if ($_SESSION['nivel'] == "0"){
	   echo "USUARIO INACTIVO EN EL SISTEMA";
	   return;  
	}
  }
  else
  {
	  echo "SU SESION A EXPIRADO POR TIEMPO O NO SE HA REGISTRADO EN NUESTRO SISTEMA";
  	  return;
  }
?>

<TABLE>
<TR><TD align="center"><p class="name"><img src="imagenes/header.png" width="100%" height="100%" /></p></TD></TR>
</TABLE>

<TABLE>
<TR><TD align="center">
  <p>
    <?php		
	$base =	$_POST['base'];  
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
		
	if (isset($_POST['tipoevento'])) $tipoevento = $_POST['tipoevento'];//
	if (isset($_POST['valorahorrado'])) $valorahorrado = $_POST['valorahorrado'];//
	if (isset($_POST['entidad']))$entidad = $_POST['entidad'];//
	if (isset($_POST['numcuenta']))$numcuenta = $_POST['numcuenta'];//
	if (isset($_POST['retiro']))$retiro = $_POST['retiro']; 
	if (isset($_POST['preaprobadoentidad']))$preaprobadoentidad = $_POST['preaprobadoentidad'];//
	if (isset($_POST['preaprobadovalor']))$preaprobadovalor = $_POST['preaprobadovalor'];//
	if (isset($_POST['cesantiasentidad']))$cesantiasentidad = $_POST['cesantiasentidad'];//
	if (isset($_POST['cesantiasvalor']))$cesantiasvalor =  $_POST['cesantiasvalor'];//
	if (isset($_POST['radicado']))$radicado = $_POST['radicado'];//
	if (isset($_POST['ente_remite']))$ente_remite = $_POST['ente_remite'];//
		  
	mysqli_select_db($sle,$database_sle);
	mysqli_query($sle,"SET NAMES 'utf8'");
		  
    //PROCEDEMOS A INGRESAR EL NUEVO REGISTRO SEGUN LA BASE SELECCIONADA
   $sql="INSERT INTO ciudadanos (cedula, situacion_actual, situacion_laboral, parentesco, nombre1, nombre2, apellido1, apellido2, edad, direccion, barrio, comuna, zona, fijo, celular, observaciones, fecha, fecha_actualizacion, tipo_evento, familiar1, edad1, familiar2, edad2, familiar3, edad3, familiar4, edad4, familiar5, edad5, familiar6, edad6, familiar7, edad7, familiar8, edad8, familiar9, edad9, familiar10, edad10, email, inmueble_actual, inmueble_titulo, inmueble_tiempo, inmueble_material, zona_riesgo, cantidad_gf, madre_ch, poblacion_depe, grupo_etnico, encuestado_tel, encuestado_per, visitado, matricula_inmobiliaria, ficha_catastro, numero_escritura, servicios_publicos, radicado, ente_radicado, doc_fami1, doc_fami2, doc_fami3, doc_fami4, doc_fami5, doc_fami6, doc_fami7, doc_fami8, doc_fami9, doc_fami10, id_base, preaprobado, preaprobado_entidad, cesantias, cesantias_entidad, valor_ahorrado, entidad, num_cuenta, tipo_mejoramiento) VALUES ('$cedula', '$situacion', '$laboral', '$parentesco', '$nombre1', '$nombre2', '$apellido1', '$apellido2', '$edad', '$direccion', '$barrio', '$comuna', '$zona', '$fijo', '$celular', '$observaciones', '$fecha', '$fecha_actualizacion', '$tipoevento', '$familiar1', '$edad1', '$familiar2', '$edad2', '$familiar3', '$edad3', '$familiar4', '$edad4', '$familiar5', '$edad5', '$familiar6', '$edad6', '$familiar7', '$edad7', '$familiar8', '$edad8', '$familiar9', '$edad9', '$familiar10', '$edad10', '$email', '$inmueble_actual', '$inmueble_titulo', '$inmueble_tiempo', '$inmueble_material', '$zona_riesgo', '$cantidad_gf', '$madre_ch', '$poblacion_depe', '$grupo_etnico', '$encuestado_tel', '$encuestado_per', '$visitado', '$inmueble_matricula', '$inmueble_catastral', '$inmueble_escritura', '$inmueble_servicios', '$radicado', '$ente_remite', '$docu1', '$docu2', '$docu3', '$docu4', '$docu5', '$docu6', '$docu7', '$docu8', '$docu9', '$docu10', '$base', '$preaprobadovalor', '$preaprobadoentidad', '$cesantiasvalor', '$cesantiasentidad', '$valorahorrado', '$entidad', '$numcuenta', '$inmueble_solicitud')";
	
	 mysqli_query($sle,$sql)or die (mysqli_error());	
	 echo "<span class='Estilo7'><font size='+2' color='red'><BR><B>$nombre1 $nombre2 $apellido1 $apellido2</B><BR>Registrado Exitosamente</font></span></div>";
	 
	 //Registra el EVENTO EN EL LOG
	 $sql = "INSERT INTO log_eventos (fecha, hora, usuario, registro, evento) VALUES (now(), now(), ".$_SESSION["cedula"].", '$cedula', 'INSERT')";
	 mysqli_query($sle,$sql)or die (mysqli_error());
	 //****************************
?>	
  </p>
  <p>
    <a href="menu.php"><input name="Volver" type="submit" class="Botones" id="Volver" value="Volver" /></a>  </p></TD></TR>
</TABLE>

<HR><img src="imagenes/logotipo_pie.png" /><br><HR>
</center>
</body>
<?php mysqli_close($sle); ?></html>