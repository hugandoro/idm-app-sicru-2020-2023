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
    $cedula = $_POST['cedula'];
	$base = $_POST['base'];
    $proyecto = $_POST['convocatoria'];
		  
	mysqli_select_db($sle,$database_sle);
	mysqli_query($sle,"SET NAMES 'utf8'");
		 
	$paso=0;
	if ($_SESSION["POSTULACION"] >= "3") $paso = 1;
	
	if ($paso == 1)
	{	 
    //PROCEDEMOS A INGRESAR EL NUEVO REGISTRO SEGUN LA BASE SELECCIONADA
     $sql="INSERT INTO convocatorias_ciudadanos (id_proyecto, cedula, fecha, estado) VALUES ($proyecto, '$cedula', now(), '1')";

	 mysqli_query($sle,$sql)or die (mysqli_error());	
	 $sql="SELECT * FROM ciudadanos WHERE (cedula = '$cedula')";
	 $resultadoCI=mysqli_query($sle,$sql)or die (mysqli_error()); 
	 $rowCI = mysqli_fetch_row($resultadoCI);
	 $nombre = $rowCI[3]." ".$rowCI[4]." ".$rowCI[5]." ".$rowCI[6];
	 $sqlPO="SELECT * FROM convocatorias WHERE (id_proyecto = '$proyecto')"; 
	 $resultadoPO=mysqli_query($sle,$sqlPO)or die (mysqli_error());
	 $rowPO = mysqli_fetch_row($resultadoPO);
	 $nombre_proyecto = $rowPO[1];
	 
	 echo "<span class='Estilo7'><font size='+2' color='red'><BR><B>$nombre</B><BR>Registrado Exitosamente</font></span>";
	 echo "<span class='Estilo7'><font size='+1' color='red'><BR><B>$nombre_proyecto</B></font></span>";
	 
	 //Registra el EVENTO EN EL LOG
	 $sql = "INSERT INTO log_eventos (fecha, hora, usuario, registro, evento) VALUES (now(), now(), ".$_SESSION["cedula"].", '$cedula', 'POSTULACION')";
	 mysqli_query($sle,$sql)or die (mysqli_error());
	 //**************************** 
	}
	else
	{
	  echo "<CENTER><BR><BR>";
	  echo "NO TIENE PERMISOS PARA POSTULAR<BR>";
	  echo "</CENTER>";
	}
?>	
  </p>
  <p>
    <a href="menu.php"><input type="submit" name="Volver" id="Volver" value="Volver" class="Botones"/></a>  </p></TD></TR>
</TABLE>

<HR><img src="imagenes/logotipo_pie.png" /><br><HR>
</center>
</body>
<?php mysqli_close($sle); ?></html>