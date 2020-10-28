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
<BR><BR><BR>

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
	$grupo = 0;
	//$comfamiliar = 0;
	
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
	
	
	//$sql="SELECT * FROM cruce_comfamiliar WHERE ((afiliado!='') || (beneficiario!='') || (otras_ciudades!='')) && (cedula = '$cedula')";
	//$resultado=mysqli_query($sle,$sql)or die (mysqli_error()); 
	//if (mysqli_num_rows($resultado) > 0) {	
	//  $comfamiliar=1;
	//  $row = mysqli_fetch_row($resultado);
	//  $afiliado=$row[1];
	//  $beneficiario=$row[2];
	//  $otras_ciudades=$row[3];
	//}
	
	//CONSULTA SI ESTA EN ALGUN NUCLEO FAMILIAR
	$sqlFAM="SELECT * FROM ciudadanos WHERE ((doc_fami1 = '$cedula') || (doc_fami2 = '$cedula') || (doc_fami3 = '$cedula') || (doc_fami4 = '$cedula') || (doc_fami5 = '$cedula') || (doc_fami6 = '$cedula') || (doc_fami7 = '$cedula') || (doc_fami8 = '$cedula') || (doc_fami9 = '$cedula') || (doc_fami10 = '$cedula'))";
	 $resultadoFAM=mysqli_query($sle,$sqlFAM)or die (mysqli_error()); 	
	 while ($rowFAM = mysqli_fetch_row($resultadoFAM))
	 {
	   $grupo = 1;
	 }
	//*********************************************		
	
	$aux = $mr + $mu + $pr + $vip + $vis + $des + $sip + $reubicado + $grupo;// + $comfamiliar;
	
	if ($aux > 0) {
   		echo "<center>NOVEDADES ENCONTRADAS EN EL DOCUMENTO DIGITADO<BR><BR>";
		if ($mr==1) echo "<B>Mejoramiento Rural</B><HR></center>";
		if ($mu==1) echo "<B>Mejoramiento Urbano</B><HR></center>";
		if ($pr==1) echo "<B>Por Reubicar</B><HR></center>";
		if ($vip==1) echo "<B>Vivienda de Interes Prioritario VIP</B><HR></center>";
		if ($vis==1) echo "<B>Vivienda Nueva</B><HR></center>";
		if ($des==1) echo "<B>Condicion de Desplazamiento</B><HR></center>";
		if ($sip==1) echo "<B>Construccion en Sitio Propio</B><HR></center>";
		if ($reubicado==1) echo "<B>*** REUBICADO ***</B><HR></center>";
		
	    //CONSULTA SI ESTA EN ALGUN NUCLEO FAMILIAR
	    $sqlFAM="SELECT * FROM ciudadanos WHERE ((doc_fami1 = '$cedula') || (doc_fami2 = '$cedula') || (doc_fami3 = '$cedula') || (doc_fami4 = '$cedula') || (doc_fami5 = '$cedula') || (doc_fami6 = '$cedula') || (doc_fami7 = '$cedula') || (doc_fami8 = '$cedula') || (doc_fami9 = '$cedula') || (doc_fami10 = '$cedula'))";
	    $resultadoFAM=mysqli_query($sle,$sqlFAM)or die (mysqli_error()); 	
	    while ($rowFAM = mysqli_fetch_row($resultadoFAM))
	    {
		  echo "<HR><B>MIEMBRO DEL GRUPO FAMILIAR DEL TITULAR...</B><BR>";
		  echo "".$rowFAM[0]." - ".$rowFAM[3]." ".$rowFAM[4]." ".$rowFAM[5]." ".$rowFAM[6]."<HR>";
	    }
		//*********************************************		
		
		//if ($comfamiliar==1) echo "<B>CRUCE COMFAMILIAR</B><BR>$afiliado - $beneficiario - $otras_ciudades<HR></center>";
		
		echo "<CENTER><a href='menu.php'><input type='submit' class='Botones' name='Volver' id='Volver' value='Volver' /></a></CENTER>";
   		exit;
	}
  ?>

  <form name="form1" method="post" onSubmit="return revisar(form1);" action="ingresar_ac1.php">
    <label for="base">Base de datos</label>
    <select name="base" id="base">
    <?php
      if ($_SESSION["REU"] >= "3") echo "<option value='0'>Por Reubicar</option>";
      if ($_SESSION["MU"] >= "3") echo "<option value='1'>Mejora de Vivienda Urbana</option>";
      if ($_SESSION["MR"] >= "3") echo "<option value='2'>Mejora de Vivienda Rural</option>";
      if ($_SESSION["VIS"] >= "3") echo "<option value='3'>Vivienda Nueva</option>";		
      //if ($_SESSION["VIP"] >= "3") echo "<option value='4'>Vivienda de Interes Prioritario</option>";
      if ($_SESSION["DES"] >= "3") echo "<option value='5'>Desplazados</option>";
      if ($_SESSION["SP"] >= "3") echo "<option value='6'>Construccion en Sitio Propio</option>";
	?>   
    </select>
    <input type="hidden" name="cedula" id="cedula" <?php echo "value=".$cedula ?>>
    <p>    <input type="submit" class="Botones" value="Siguiente Paso >>" /></p>
</form>
</TD></TR>
</TABLE>

<HR><img src="imagenes/logotipo_pie.png" /><br><HR>
</center>
</body>
<?php mysqli_close($sle); ?></html>