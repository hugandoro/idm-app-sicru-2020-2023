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
	  $aux = 0;
	}
	//================================
	
	//VERIFICA QUE NO SEA BENEFICIARIO DE UNA POSTULACION PREVIA
	$sqlCO1="SELECT * FROM convocatorias_ciudadanos WHERE ((cedula = '$cedula') && (estado = '0') && (resultado = '1'))";
	$resultadoCO1=mysqli_query($sle,$sqlCO1)or die (mysqli_error()); 
	$bandera = 0;
	if (mysqli_num_rows($resultadoCO1) > 0)
	{
	  $rowCO1 = mysqli_fetch_row($resultadoCO1);
	  echo "<BR><center><B><font size='+2' color='red'><blink>ATENCION!!!<BR>Beneficiario de convocatoria</blink></font></B><BR>";
	  
	  $sqlPO1="SELECT * FROM convocatorias WHERE (id_proyecto = '$rowCO1[0]')"; 
	  $resultadoPO1=mysqli_query($sle,$sqlPO1)or die (mysqli_error());
	  $rowPO1 = mysqli_fetch_row($resultadoPO1);
	  
	  echo "<center><B><font size='+1'>$rowPO1[1]</font></B><BR><BR>"; 
	  $bandera = 1;
	}
	//================================
	
    //CONSULTA SI ESTA EN ALGUN NUCLEO FAMILIAR
	$sqlFAM="SELECT * FROM ciudadanos WHERE ((doc_fami1 = '$cedula') || (doc_fami2 = '$cedula') || (doc_fami3 = '$cedula') || (doc_fami4 = '$cedula') || (doc_fami5 = '$cedula') || (doc_fami6 = '$cedula') || (doc_fami7 = '$cedula') || (doc_fami8 = '$cedula') || (doc_fami9 = '$cedula') || (doc_fami10 = '$cedula'))";
	$resultadoFAM=mysqli_query($sle,$sqlFAM)or die (mysqli_error()); 	
	while ($rowFAM = mysqli_fetch_row($resultadoFAM))
	{
      echo "<CENTER><BR><HR><B>MIEMBRO DEL GRUPO FAMILIAR DEL TITULAR...</B><BR>";
	  echo "".$rowFAM[0]." - ".$rowFAM[3]." ".$rowFAM[4]." ".$rowFAM[5]." ".$rowFAM[6]."</CENTER>";
	  $aux = 0;
	}
	//================================
	
	if ($aux > 0) {
   		echo "<center>EL CIUDADANO SE ENCUENTRA REGISTRADO EN EL SISTEMA PARA<BR><BR>";
		
		if ($mr==1) 
		{
			echo "<B>MEJORAMIENTO RURAL</B></B><HR>";
			if ($bandera == 0) echo "<a href='convocatorias_inscribir2.php?cedula=".$cedula."&base=2'><input type='submit' name='Convocatorias para Mejoramiento Rural' id='MR' value='Convocatorias para Mejoramiento Rural' class='Botones'/></a><BR>";
			else echo "NO SE PUEDE POSTULAR A NUEVOS SUBSIDIOS<BR>";
			
		}			
	
		if ($mu==1) {
			echo "<B>MEJORAMIENTO URBANO</B><HR>";
			if ($bandera == 0) echo "<a href='convocatorias_inscribir2.php?cedula=".$cedula."&base=1'><input type='submit' name='Convocatorias para Mejoramiento Urbano' id='MU' value='Convocatorias para Mejoramiento Urbano' class='Botones'/></a><BR>";
			else echo "NO SE PUEDE POSTULAR A NUEVOS SUBSIDIOS<BR>";
		}
		
		
		if ($pr==1) {
			echo "<B>REUBICACION</B><HR>";
			if ($bandera == 0) echo "<a href='convocatorias_inscribir2.php?cedula=".$cedula."&base=0'><input type='submit' name='Convocatorias para Reubicacion' id='PR' value='Convocatorias para Reubicacion' class='Botones'/></a><BR>";
			else echo "NO SE PUEDE POSTULAR A NUEVOS SUBSIDIOS<BR>";
		}		
		
		
		if ($vip==1) {
			echo "<B>VIVIENDA VIP</B><HR>";
			if ($bandera == 0) echo "<a href='convocatorias_inscribir2.php?cedula=".$cedula."&base=4'><input type='submit' name='Convocatorias para VIP' id='VIP' value='Convocatorias para VIP' class='Botones'/></a><BR>";
			else echo "NO SE PUEDE POSTULAR A NUEVOS SUBSIDIOS<BR>";
		}	
			
		
		if ($vis==1) {
			echo "<B>VIVENDA NUEVA</B><HR>";
			if ($bandera == 0) echo "<a href='convocatorias_inscribir2.php?cedula=".$cedula."&base=3'><input type='submit' name='Convocatorias para Vivienda Nueva' id='VIS' value='Convocatorias para Vivienda Nueva' class='Botones'/></a><BR>";
			else echo "NO SE PUEDE POSTULAR A NUEVOS SUBSIDIOS<BR>";
		}		
		
		
		if ($des==1) {
			echo "<B>POBLACION DESPLAZADA</B><HR>";
			if ($bandera == 0) echo "<a href='convocatorias_inscribir2.php?cedula=".$cedula."&base=5'><input type='submit' name='Convocatorias para Desplazados' id='DES' value='Convocatorias para Desplazados' class='Botones'/></a><BR>";
			else echo "NO SE PUEDE POSTULAR A NUEVOS SUBSIDIOS<BR>";
		}		
		
		
		if ($sip==1) {
			echo "<B>CONTRUCCION EN SITIO PROPIO</B><HR>";
			if ($bandera == 0) echo "<a href='convocatorias_inscribir2.php?cedula=".$cedula."&base=6'><input type='submit' name='Convocatorias para Construccion Sitio Propio' id='SIP' value='Convocatorias para Construccion Sitio Propio' class='Botones'/></a><BR>";
			else echo "NO SE PUEDE POSTULAR A NUEVOS SUBSIDIOS<BR>";
		}		
		
		
		if ($reubicado==1) echo "<B>*** REUBICADO ***</B><BR>";
		
		if ($comfamiliar==1) 
		{
			echo "<HR><B>*** Con anotacion de novedad en CRUCE COMFAMILIAR ***</B><BR>";
			echo "<a href='vernovedad0a.php?cedula=".$cedula."'><input type='submit' name='Novedad Comfamiliar' id='COMFAMILIAR' value='Ver novedad de Comfamiliar' class='Botones'/></a><BR>";
		}
		
	}	
	
	echo "<HR><a href='convocatorias.php'><input type='submit' name='Volver' id='Volver' value='Volver' class='Botones'/></a>";
  ?>

</TD></TR>
</TABLE>

<HR><img src="imagenes/logotipo_pie.png" /><br><HR>
</center>
</body>
<?php mysqli_close($sle); ?></html>