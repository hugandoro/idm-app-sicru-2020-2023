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
    <TR>
      <TD align="center"><?php
    mysqli_select_db($sle,$database_sle);
	mysqli_query($sle,"SET NAMES 'utf8'");
	
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
	  
	  if ($rowCC[5]== "0") 
	    echo "<TD bgcolor='#FFFFFF'><img src='imagenes/negado.png' width='20' height='20' alt='Modificar Postulacion' /></TD>";
	  if ($rowCC[5]== "1") 
	    echo "<TD bgcolor='#FFFFFF'><img src='imagenes/aprobado.png' width='20' height='20' alt='Modificar Postulacion' /></TD>"; 
	  
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
  ?>
  </TD>
    </TR>
  </TABLE>

<HR><img src="imagenes/logotipo_pie.png" /><br><HR>
</center>
</body>
<?php mysqli_close($sle); ?></html>