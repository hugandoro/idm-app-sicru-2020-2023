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
	
	//REALIZA CRUCES CON OTRAS BASES
	$mr = 0;
	$mu = 0;
	$pr = 0;
	$vip = 0;
	$vis = 0;
	$des = 0;
	$sip = 0;
	$reubicado = 0;
	$comfamiliar = 0;

    mysqli_select_db($sle,$database_sle);
	mysqli_query($sle,"SET NAMES 'utf8'");
	
	$sql="SELECT * FROM ciudadanos WHERE (cedula = '$cedula')";
	$resultado=mysqli_query($sle,$sql)or die (mysqli_error()); 
	$nombre = '';
	while ($row = mysqli_fetch_row($resultado))
	{
		$nombre = $row[3]." ".$row[4]." ".$row[5]." ".$row[6];
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
	}
	
    //Busca Novedades en COMFAMILIAR
	$sql="SELECT * FROM cruce_comfamiliar WHERE ((afiliado!='') || (beneficiario!='') || (otras_ciudades!='')) && (cedula = '$cedula')";
	$resultado=mysqli_query($sle,$sql)or die (mysqli_error()); 
	if (mysqli_num_rows($resultado) > 0) {	
	  $comfamiliar=1;
	  $row = mysqli_fetch_row($resultado);
	  $afiliado=$row[1];
	  $beneficiario=$row[2];
	  $otras_ciudades=$row[3];
	}
	//===============================
	
	$aux = $mr + $mu + $pr + $vip + $vis + $des + $sip + $reubicado + $comfamiliar;
	
	if ($nombre != '')
	{
	  echo "<BR><center><B><font size='+2'>$nombre</font></B><BR>";
	  echo "<center><font size='-1'>Registrado con Documento <B>$cedula</B></font><BR><BR>";
	}
	
	//VERIFICA QUE NO TENGA POSTULACION ACTIVA PARA ALGUNO OTRO PROYECTO
	$sqlCO="SELECT * FROM convocatorias_ciudadanos WHERE ((cedula = '$cedula') && (estado = '1'))";
	$resultadoCO=mysqli_query($sle,$sqlCO)or die (mysqli_error()); 
	if (mysqli_num_rows($resultadoCO) > 0)
	{
	  $rowCO = mysqli_fetch_row($resultadoCO);
	  echo "<BR><center><B><font size='+1'>Ciudadano con Postulacion Vigente en el proyecto</font></B><BR><BR>";
	  
	  $sqlPO="SELECT * FROM convocatorias WHERE (id_proyecto = '$rowCO[0]')"; 
	  $resultadoPO=mysqli_query($sle,$sqlPO)or die (mysqli_error());
	  $rowPO = mysqli_fetch_row($resultadoPO);
	  
	  echo "<BR><center><B><font size='+1'>$rowPO[1]</font></B><BR><BR>"; 
	  echo "<BR><center>Solo se permite estar postulado para un proyecto, por lo tanto debe eliminar la postulacion actual si desea inscribir al ciudadano en otra convocatoria<BR><BR>"; 
	  
	  echo "<HR><a href='convocatorias_ficha0.php?cedula=$cedula&convocatoria=$rowCO[0]'><input type='submit' name='Volver' id='Volver' value='Imprimir Ficha de Postulacion' class='Botones'/></a>";
	}
	else
	{
		echo "<BR><center>Actualmente NO se encuentra postulado a ninguna convocatoria activa o en proceso";
	}
	//================================
	
	
	echo "<HR><a href='convocatorias.php'><input type='submit' name='Volver' id='Volver' value='Volver' class='Botones'/></a>";
  ?>

</TD></TR>
</TABLE>

<HR><img src="imagenes/logotipo_pie.png" /><br><HR>
</center>
</body>
<?php mysqli_close($sle); ?></html>