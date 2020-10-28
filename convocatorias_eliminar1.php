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
  <?php
    $cedula = $_POST['cedula'];

    mysqli_select_db($sle,$database_sle);
	mysqli_query($sle,"SET NAMES 'utf8'");
	
	if ($_SESSION["POSTULACION"] == "4") {
	  $sql="SELECT * FROM ciudadanos WHERE (cedula = '$cedula')";
	  $resultado=mysqli_query($sle,$sql)or die (mysqli_error()); 
	  $nombre = '';
	  while ($row = mysqli_fetch_row($resultado))
	  {
		$nombre = $row[3]." ".$row[4]." ".$row[5]." ".$row[6];
	  }
	
	  if ($nombre != '')
	  {
	    echo "<BR><center><B><font size='+2'>$nombre</font></B><BR>";
	    echo "<center><font size='-1'>Registrado con Documento <B>$cedula</B></font><BR><BR>";
	  }
	
	  //VERIFICA QUE NO TENGA POSTULACION ACTIVA PARA ALGUNO OTRO PROYECTO
	  $paso=0;
	  $sqlCO="SELECT * FROM convocatorias_ciudadanos WHERE ((cedula = '$cedula') && (estado = '1'))";
	  $resultadoCO=mysqli_query($sle,$sqlCO)or die (mysqli_error()); 
	  if (mysqli_num_rows($resultadoCO) > 0)
	  {
	    $rowCO = mysqli_fetch_row($resultadoCO);
	    echo "<BR><center><B><font size='+1'>Ciudadano FUE RETIRADO de Postulacion al proyecto</font></B><BR><BR>";
	  
	    $sqlPO="SELECT * FROM convocatorias WHERE (id_proyecto = '$rowCO[0]')"; 
	    $resultadoPO=mysqli_query($sle,$sqlPO)or die (mysqli_error());
	    $rowPO = mysqli_fetch_row($resultadoPO);
	  
	    echo "<BR><center><B><font size='+1'>$rowPO[1]</font></B><BR><BR>"; 
	  
	    $sql="DELETE FROM convocatorias_ciudadanos WHERE ((cedula = '$cedula') AND (id_proyecto = '$rowCO[0]'))";
	    $resultado=mysqli_query($sle,$sql)or die (mysqli_error()); 
	    $paso=1;
	  
	    echo "<BR><center>RETIRO EXITOSO<BR><BR>"; 
	  }
	  else
	  {
	    echo "<BR><center><B><font size='+1'>NO PRESENTA POSTULACION EN NINGUNA CONVOCATORIA ACTIVA</font></B><BR><BR>"; 
	  }
	  //================================
	
	  if ($paso==1)
	  {
	    //Registra el EVENTO EN EL LOG
	    $sql = "INSERT INTO log_eventos (fecha, hora, usuario, registro, evento) VALUES (now(), now(), ".$_SESSION["cedula"].", '$cedula', 'DESPOSTULACION')";
	    mysqli_query($sle,$sql)or die (mysqli_error());
	    //****************************
	  }		
	}
	else
	{
		echo "<CENTER><BR><BR>";
		echo "NO TIENE PERMISOS PARA ELIMINAR POSTULACIONES<BR>";
		echo "</CENTER>";
	}
	
	echo "<HR><a href='convocatorias.php'><input type='submit' name='Volver' id='Volver' value='Volver' class='Botones'/></a>";
  ?>

</TD></TR>
</TABLE>

<HR><img src="imagenes/logotipo_pie.png" /><br><HR>
</center>
</body>
<?php mysqli_close($sle); ?></html>