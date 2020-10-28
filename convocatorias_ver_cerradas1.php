<?php require_once('Connections/sle.php'); 
$currentPage = $_SERVER["PHP_SELF"];
session_start();
?>

<?php
//MODIFICA EL ESTADO DEL REGISTRO SELECCIONADO Y VUELVE A CARGAR EL LISTADO ACTUALIZADO
if (isset($_GET['cedula']))
{
	$cedula = $_GET['cedula'];
	$convocatoria = $_GET['convocatoria'];
	$bandera = $_GET['b'];

    mysqli_select_db($sle,$database_sle);
	mysqli_query($sle,"SET NAMES 'utf8'");
	
	if ($_SESSION["POSTULACION"] == "4") 
	{
	    if ($bandera == "0")
		{
			$sqlPO="UPDATE convocatorias_ciudadanos SET resultado='1' WHERE (cedula = '$cedula') AND (id_proyecto = '$convocatoria')";
			$resultPO = mysqli_query($sle,$sqlPO);
		 	//Registra el EVENTO EN EL LOG
	  		$sql = "INSERT INTO log_eventos (fecha, hora, usuario, registro, evento) VALUES (now(), now(), ".$_SESSION["cedula"].", '$cedula', 'APROBADO')";
	 		 mysqli_query($sle,$sql)or die (mysqli_error());
	  		//****************************
		}
	    if ($bandera == "1") 
		{
			$sqlPO="UPDATE convocatorias_ciudadanos SET resultado='0' WHERE (cedula = '$cedula') AND (id_proyecto = '$convocatoria')";
			$resultPO = mysqli_query($sle,$sqlPO);
		 	//Registra el EVENTO EN EL LOG
	  		$sql = "INSERT INTO log_eventos (fecha, hora, usuario, registro, evento) VALUES (now(), now(), ".$_SESSION["cedula"].", '$cedula', 'RECHAZADO')";
	 		 mysqli_query($sle,$sql)or die (mysqli_error());
	  		//****************************
		}
	}	
	else
	{
	  echo "<CENTER><BR><BR>";
	  echo "NO TIENE PERMISOS PARA MODIFICAR ESTADO DE POSTULACIONES<BR>";
	  echo "</CENTER>";
	}	
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://gmpg.org/xfn/11">
<title>SICRU Ver 1.0</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="STYLESHEET" type="text/css" href="estilo.css">
<script type="text/javascript">	
//VALIDA ANTES DE ELIMINAR
function confirmar(texto) 
{ 
  if (confirm(texto))  return true;  
  else return false; 
} 
</script>
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
    <TR>
      <TD align="center"><?php
    mysqli_select_db($sle,$database_sle);
	mysqli_query($sle,"SET NAMES 'utf8'");
	
	if (isset($_GET['convocatoria'])) 
	  $convocatoria = $_GET['convocatoria'];
	else
	  $convocatoria = $_POST['convocatoria'];
	
	$sqlC="SELECT * FROM convocatorias WHERE id_proyecto = '$convocatoria'";
    $resultC = mysqli_query($sle,$sqlC);
	$rowC = mysqli_fetch_row($resultC);
	echo "<BR>Postulados al Proyecto : <B>".$rowC[1]."</B><BR><BR>";
	
	$sqlCC="SELECT * FROM convocatorias_ciudadanos WHERE id_proyecto = '$convocatoria' ORDER BY cedula ASC";
    $resultCC = mysqli_query($sle,$sqlCC);
	$cantidad = mysqli_num_rows($resultCC);
	echo "$cantidad Registros<BR><BR>";
	
	echo "<table border='0' width='950'>";
	echo "<TR>";
	echo "<TD bgcolor='#FFFFFF' width='50'><B></B></TD>";
	echo "<TD bgcolor='#FFFFFF' width='150'><B>Cedula</B></TD>";
	echo "<TD bgcolor='#FFFFFF' width='200'><B>Primer Nombre</B></TD>";
	echo "<TD bgcolor='#FFFFFF' width='200'><B>Segundo Nombre</B></TD>";
	echo "<TD bgcolor='#FFFFFF' width='200'><B>Primer Apellido</B></TD>";
	echo "<TD bgcolor='#FFFFFF' width='200'><B>Segundo Apellido</B></TD>";
	echo "<TD bgcolor='#FFFFFF' width='200'><B>Barrio</B></TD>";	
        echo "<TD bgcolor='#FFFFFF' width='200'><B>Direccion</B></TD>";
	echo "</TR>";
	
	while ($rowCC = mysqli_fetch_row($resultCC))
	{
	  $sqlCI="SELECT * FROM ciudadanos WHERE cedula = '$rowCC[1]'";
      $resultCI = mysqli_query($sle,$sqlCI);
	  $rowCI = mysqli_fetch_row($resultCI);
	  echo "<TR>";
	  
	  if ($_SESSION["POSTULACION"] == "4")
	  { 
	    if ($rowCC[5]== "0") echo "<TD bgcolor='#FFFFFF'><a href='convocatorias_ver_cerradas1.php?convocatoria=$convocatoria&cedula=$rowCI[0]&b=0'><img src='imagenes/negado.png' width='20' height='20' alt='Modificar Postulacion' /></a></TD>";
	    if ($rowCC[5]== "1") echo "<TD bgcolor='#FFFFFF'><a href='convocatorias_ver_cerradas1.php?convocatoria=$convocatoria&cedula=$rowCI[0]&b=1'><img src='imagenes/aprobado.png' width='20' height='20' alt='Modificar Postulacion' /></a></TD>";
	  }
	  else
	    echo "<TD bgcolor='#FFFFFF'></TD>";	  
	  
	  echo "<TD bgcolor='#FFFFFF'>$rowCI[0]</TD>";
	  echo "<TD bgcolor='#FFFFFF'>$rowCI[3]</TD>";
	  echo "<TD bgcolor='#FFFFFF'>$rowCI[4]</TD>";
	  echo "<TD bgcolor='#FFFFFF'>$rowCI[5]</TD>";
	  echo "<TD bgcolor='#FFFFFF'>$rowCI[6]</TD>";
	  echo "<TD bgcolor='#FFFFFF'>$rowCI[9]</TD>";
	  echo "<TD bgcolor='#FFFFFF'>$rowCI[8]</TD>";
	  echo "</TR>";
	}
	echo "</table>";
	
  ?>

   <?php	
	echo "<HR><a href='convocatorias.php'><input type='submit' name='Volver' id='Volver' value='Volver' class='Botones'/></a>";
	if ($_SESSION["POSTULACION"] == "4") 
	{
  ?>
          <a href='convocatorias_ver_cerradas0.php?convocatoria=<?php echo $convocatoria; ?>' onclick="return confirmar('ALERTA !!! ¿Si archiva esta convocatoria no se podra modificar el estado de los postulados, ESTA SEGURO DE LA ACCION ?')"><input name='Archivar' type='submit' class="Botones" id='Archivar' value='*** ARCHIVAR CONVOCATORIA ***' />
        </a>
        
  <?php	      
	}
  ?>
  </TD>
    </TR>
  </TABLE>

<HR><img src="imagenes/logotipo_pie.png" /><br><HR>
</center>
</body>
<?php mysqli_close($sle); ?></html>