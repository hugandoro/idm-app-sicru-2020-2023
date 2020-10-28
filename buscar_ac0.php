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
    <TD align="center"><CENTER>
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
	$vis = 0;
	$des = 0;
	$sip = 0;
	$reubicado = 0;
	$comfamiliar = 0;
	$familiar = 0;

    mysqli_select_db($sle,$database_sle);
	mysqli_query($sle,"SET NAMES 'utf8'");
	
	$sql="SELECT * FROM ciudadanos WHERE (cedula = '$cedula')";
	$resultado=mysqli_query($sle,$sql)or die (mysqli_error()); 
	while ($row = mysqli_fetch_row($resultado))
	{
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
	

	$sql="SELECT * FROM cruce_comfamiliar WHERE ((afiliado!='') || (beneficiario!='') || (otras_ciudades!='')) && (cedula = '$cedula')";
	$resultado=mysqli_query($sle,$sql)or die (mysqli_error()); 
	if (mysqli_num_rows($resultado) > 0) {	
	  $comfamiliar=1;
	  $row = mysqli_fetch_row($resultado);
	  $afiliado=$row[1];
	  $beneficiario=$row[2];
	  $otras_ciudades=$row[3];
	}
	
	$aux = $mr + $mu + $pr + $vip + $vis + $des + $sip + $reubicado + $comfamiliar;
	
	if ($aux > 0) {
   		echo "<BR><BR><center><B>EL CIUDADANO SE ENCUENTRA REGISTRADO EN...</B><BR><BR>";
		if ($mr==1) echo "<a href='consulta0.php?cedula=".$cedula."&base=2'><input type='submit' name='Mejoramiento Rural' id='MR' value='Mejoramiento Rural' class='Botones'/></a><BR><BR>";
		if ($mu==1) echo "<a href='consulta0.php?cedula=".$cedula."&base=1'><input type='submit' name='Mejoramiento Urbano' id='MU' value='Mejoramiento Urbano' class='Botones'/></a><BR><BR>";
		if ($pr==1) echo "<a href='consulta0.php?cedula=".$cedula."&base=0'><input type='submit' name='Por Reubicar' id='PR' value='Por Reubicar' class='Botones'/></a><BR><BR>";
		if ($vip==1) echo "<a href='consulta0.php?cedula=".$cedula."&base=4'><input type='submit' name='Vivienda VIP' id='VIP' value='Vivienda VIP' class='Botones'/></a><BR><BR>";
		if ($vis==1) echo "<a href='consulta0.php?cedula=".$cedula."&base=3'><input type='submit' name='Vivienda Nueva' id='VIS' value='Vivienda Nueva' class='Botones'/></a><BR><BR>";
		if ($des==1) echo "<a href='consulta0.php?cedula=".$cedula."&base=5'><input type='submit' name='Desplazado' id='DES' value='Desplazado' class='Botones'/></a><BR><BR>";
		if ($sip==1) echo "<a href='consulta0.php?cedula=".$cedula."&base=6'><input type='submit' name='Sitio Propio' id='SIP' value='Sitio Propio' class='Botones'/></a><BR><BR>";
		
		
//***********************************************************************
//HISTORICO DE POSTULACIONES Y BENEFICIOS *******************************		
	echo "<HR><B>HISTORIO DE POSTULACIONES Y BENEFICIOS</B><BR><BR>";
	echo "<TABLE border='1'>";
	$sqlCO1="SELECT * FROM convocatorias_ciudadanos WHERE cedula = '$cedula' ORDER BY resultado ASC";
	$resultadoCO1=mysqli_query($sle,$sqlCO1)or die (mysqli_error()); 
	echo "<TR>";
	echo "<TD class='TituloTABLAS'>Proyecto</TD>";	
	echo "<TD class='TituloTABLAS'>Estado de la postulacion</TD>";	
	echo "</TR>";  
	while ($rowCO1 = mysqli_fetch_row($resultadoCO1))
	{
	  $sqlPO1="SELECT * FROM convocatorias WHERE (id_proyecto = '$rowCO1[0]')"; 
	  $resultadoPO1=mysqli_query($sle,$sqlPO1)or die (mysqli_error());
	  $rowPO1 = mysqli_fetch_row($resultadoPO1);
	  
	  echo "<TR>";
	  echo "<TD>$rowPO1[1]</TD>";
	
	  if (($rowCO1[5] == 0) && ($rowCO1[3] == 1)) echo "<TD bgcolor='#0099FF'>POSTULADO</TD>";
	  if (($rowCO1[5] == 0) && ($rowCO1[3] == 0)) echo "<TD bgcolor='#990000'>NEGADO</TD>";
	  if (($rowCO1[5] == 1) && ($rowCO1[3] == 0)) echo "<TD bgcolor='#669933'>ASIGNADO</TD>";	
	
	  echo "</TR>";  
	}
	echo "</TABLE>";

//***********************************************************************		
//HISTORICO DE VISITAS TECNICAS******************************************		
	echo "<HR><B>VISITAS TECNICAS REALIZADAS</B><BR><BR>";
	echo "<TABLE border='1'>";
	$sqlVI1="SELECT * FROM visitas WHERE cedula = '$cedula' ORDER BY fecha ASC";
	$resultadoVI1=mysqli_query($sle,$sqlVI1)or die (mysqli_error()); 
	echo "<TR>";
	echo "<TD class='TituloTABLAS'>Codigo</TD>";	
	echo "<TD class='TituloTABLAS'>Fecha de la Visita</TD>";	
	echo "</TR>";  
	while ($rowVI1 = mysqli_fetch_row($resultadoVI1))
	{ 
	  echo "<TR>";
	  echo "<TD>$rowVI1[0]</TD>";	
	  echo "<TD>$rowVI1[2]</TD>";	
	  echo "</TR>";  
	}
	echo "</TABLE>";
	
//***********************************************************************		
//VERIFICA SI ES REUBICADO **********************************************
		if ($reubicado==1) echo "<B>*** REUBICADO ***</B><BR><BR>";
		if ($comfamiliar==1) 
		{
			echo "<HR><B>CRUCE COMFAMILIAR</B><BR><BR>";
			echo "<a href='vernovedad0.php?cedula=".$cedula."'><input type='submit' name='Novedad Comfamiliar' id='COMFAMILIAR' value='Ver novedad de Comfamiliar' class='Botones'/></a><BR><BR>";
		}
		
	}
	
//***********************************************************************	
//CONSULTA SI ESTA EN ALGUN NUCLEO FAMILIAR******************************
	$sqlFAM="SELECT * FROM ciudadanos WHERE ((doc_fami1 = '$cedula') || (doc_fami2 = '$cedula') || (doc_fami3 = '$cedula') || (doc_fami4 = '$cedula') || (doc_fami5 = '$cedula') || (doc_fami6 = '$cedula') || (doc_fami7 = '$cedula') || (doc_fami8 = '$cedula') || (doc_fami9 = '$cedula') || (doc_fami10 = '$cedula'))";
	$resultadoFAM=mysqli_query($sle,$sqlFAM)or die (mysqli_error()); 	
	while ($rowFAM = mysqli_fetch_row($resultadoFAM))
	{
		echo "<HR><span class='Estilo7'><font size='+2' color='red'>ATENCION - Miembro del grupo familiar del titular...</font></span><BR>";
		echo "<span class='Estilo7'><font size='+1' color='black'>".$rowFAM[0]." - ".$rowFAM[3]." ".$rowFAM[4]." ".$rowFAM[5]." ".$rowFAM[6]."</font></span><BR>";
	}
	
	echo "<HR><a href='menu.php'><input type='submit' name='Volver' id='Volver' value='Volver' class='Botones'/></a>";
  ?>
        </CENTER></TD>
    </TR>
  </TABLE>

<HR><img src="imagenes/logotipo_pie.png" /><br><HR>
</center>
</body>
<?php mysqli_close($sle); ?></html>