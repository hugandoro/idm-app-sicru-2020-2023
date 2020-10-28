<?php
    header("Content-type: application/vnd.ms-excel; name='excel'");
    header("Content-Disposition: filename=ListadosIDM.xls");
    header("Pragma: no-cache");
    header("Expires: 0");
?>
<?php require_once('Connections/sle.php'); 
$currentPage = $_SERVER["PHP_SELF"];
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml"> 
 
<head profile="http://gmpg.org/xfn/11"> 
	<title>SICRU Ver 1.0</title> 
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<style type="text/css">
body {
	background-image: url(imagenes/fondo.png);
	background-repeat: repeat-x;
}
</style>
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

<TABLE width="3500">
<TR><TD width="347" align="center">
  <p class="name"><font size="+3">SICRU</font><BR><BR>
    Bienvenido al sistema de cruces SICRU 1.0</p></TD></TR>
<TR>
  <TD align="center">
  <?php
    $base = $_GET['base'];
    $pin = $_POST['pin'];
	$sql = $_SESSION["sql"];
	
	//Verifica PIN de seguridad
	if (($pin != "elkin2015") && ($pin != "paula2015")){
	   echo "PIN INVALIDO - Permiso denegado para exportar la base de datos";
	   return;  
	}
	//****************************
	
	mysqli_select_db($sle,$database_sle);
	mysqli_query($sle,"SET NAMES 'utf8'");
	
	//Registra el EVENTO EN EL LOG
	$sqlAUX = "INSERT INTO log_eventos (fecha, hora, usuario, registro, evento) VALUES (now(), now(), ".$_SESSION["cedula"].", 'TODOS', 'EXPORTAR LISTADO TODO')";
	mysqli_query($sle,$sqlAUX)or die (mysqli_error());
	//****************************
		
    if ($base==2) 
	{
		$resultado=mysqli_query($sle,$sql)or die (mysqli_error()); 
		$numero = mysqli_num_rows($resultado);
		echo "<font size='+2'>BASE DE DATOS - Mejora Vivienda Rural</font><BR>".$numero." Registros encontrados<HR>";
	}
    if ($base==1) 
	{
		$resultado=mysqli_query($sle,$sql)or die (mysqli_error()); 
		$numero = mysqli_num_rows($resultado);		
		echo "<font size='+2'>BASE DE DATOS - Mejora Vivienda Urbana</font><BR>".$numero." Registros encontrados<HR>";
	}
    if ($base==0) 
	{
		$resultado=mysqli_query($sle,$sql)or die (mysqli_error()); 
		$numero = mysqli_num_rows($resultado);		
		echo "<font size='+2'>BASE DE DATOS - Por Reubicar</font><BR>".$numero." Registros encontrados<HR>";
	}
    if ($base==4) 
	{
		$resultado=mysqli_query($sle,$sql)or die (mysqli_error()); 
		$numero = mysqli_num_rows($resultado);		
		echo "<font size='+2'>BASE DE DATOS - Vivienda Interes Prioritario (VIP)</font><BR>".$numero." Registros encontrados<HR>";
	}
    if ($base==3) 
	{
		$resultado=mysqli_query($sle,$sql)or die (mysqli_error());		
		$numero = mysqli_num_rows($resultado);		
		echo "<font size='+2'>BASE DE DATOS - Vivienda Interes Social (VIS)</font><BR>".$numero." Registros encontrados<HR>";
	}	
    if ($base==5) 
	{
		$resultado=mysqli_query($sle,$sql)or die (mysqli_error());		
		$numero = mysqli_num_rows($resultado);		
		echo "<font size='+2'>BASE DE DATOS - Poblacion en Condicion de Desplazamiento</font><BR>".$numero." Registros encontrados<HR>";
	}	
    if ($base==6) 
	{
		$resultado=mysqli_query($sle,$sql)or die (mysqli_error());		
		$numero = mysqli_num_rows($resultado);		
		echo "<font size='+2'>BASE DE DATOS - Construccion en Sitio Propio</font><BR>".$numero." Registros encontrados<HR>";
	}	
	
  ?>
  </TD>
</TR>

<TR><TD align="center">
    <table width="5540" border="0" cellspacing="2">
      <tr>
        <td width="159" bgcolor="#FFCCCC">Cedula</td>
        <td width="214" bgcolor="#FFCCCC">Situacion Actual</td>
        <td width="214" bgcolor="#FFCCCC">Parentesco</td>
        <td width="214" bgcolor="#FFCCCC">Nombre 1</td>
        <td width="214" bgcolor="#FFCCCC">Nombre 2</td>
        <td width="214" bgcolor="#FFCCCC">Apellido 1</td>
        <td width="214" bgcolor="#FFCCCC">Apellido 2</td>
        <td width="214" bgcolor="#FFCCCC">Edad</td>
        <td width="214" bgcolor="#FFCCCC">Direccion</td>
        <td width="214" bgcolor="#FFCCCC">Barrio</td>
        <td width="214" bgcolor="#FFCCCC">Comuna</td>
        <td width="214" bgcolor="#FFCCCC">Zona</td>
        <td width="214" bgcolor="#FFCCCC">Fijo</td>
        <td width="214" bgcolor="#FFCCCC">Celular</td>
        <td width="214" bgcolor="#FFCCCC">Observaciones</td>
        <td width="214" bgcolor="#FFCCCC">Fecha de Registro</td>
        <td width="214" bgcolor="#FFCCCC">Tipo de Evento</td>
        <td width="214" bgcolor="#FFCCCC">Document 1</td>
        <td width="214" bgcolor="#FFCCCC">Familiar 1</td>
        <td width="214" bgcolor="#FFCCCC">Document 2</td>        
        <td width="214" bgcolor="#FFCCCC">Familiar 2</td>
        <td width="214" bgcolor="#FFCCCC">Document 3</td>        
        <td width="214" bgcolor="#FFCCCC">Familiar 3</td>
        <td width="214" bgcolor="#FFCCCC">Document 4</td>        
        <td width="214" bgcolor="#FFCCCC">Familiar 4</td>
        <td width="214" bgcolor="#FFCCCC">Document 5</td>        
        <td width="214" bgcolor="#FFCCCC">Familiar 5</td>
        <td width="214" bgcolor="#FFCCCC">Document 6</td>        
        <td width="214" bgcolor="#FFCCCC">Familiar 6</td>
        <td width="214" bgcolor="#FFCCCC">Document 7</td>        
        <td width="214" bgcolor="#FFCCCC">Familiar 7</td>
        <td width="214" bgcolor="#FFCCCC">Document 8</td>        
        <td width="214" bgcolor="#FFCCCC">Familiar 8</td>
        <td width="214" bgcolor="#FFCCCC">Document 9</td>        
        <td width="214" bgcolor="#FFCCCC">Familiar 9</td>
        <td width="214" bgcolor="#FFCCCC">Document 10</td>        
        <td width="214" bgcolor="#FFCCCC">Familiar 10</td>       
        <td width="214" bgcolor="#FFCCCC">Valor Ahorrado</td>
        <td width="214" bgcolor="#FFCCCC">Entidad</td>
        <td width="214" bgcolor="#FFCCCC">N° Cuenta</td>
        <td width="214" bgcolor="#FFCCCC">email</td>
        <td width="214" bgcolor="#FFCCCC">Inmueble Actual</td>
        <td width="214" bgcolor="#FFCCCC">Inmueble Titulo</td>
        <td width="214" bgcolor="#FFCCCC">Inmueble Tiempo</td>
        <td width="214" bgcolor="#FFCCCC">Inmueble Material</td>
        <td width="214" bgcolor="#FFCCCC">Zona de Riesgo</td>
        <td width="214" bgcolor="#FFCCCC">Cantidad Grupo Familiar</td>
        <td width="214" bgcolor="#FFCCCC">Madre Cabeza de Hogar</td>
        <td width="214" bgcolor="#FFCCCC">Poblacion Dependiente</td>
        <td width="214" bgcolor="#FFCCCC">Grupo Etnico</td>
        <td width="214" bgcolor="#FFCCCC">Encuestado Telefonicamente</td>
        <td width="214" bgcolor="#FFCCCC">Encuestado Personalmente</td>
        <td width="214" bgcolor="#FFCCCC">Visitado</td>
        <td width="214" bgcolor="#FFCCCC">Edad 1</td>
        <td width="214" bgcolor="#FFCCCC">Edad 2</td>
        <td width="214" bgcolor="#FFCCCC">Edad 3</td>
        <td width="214" bgcolor="#FFCCCC">Edad 4</td>
        <td width="214" bgcolor="#FFCCCC">Edad 5</td>
        <td width="214" bgcolor="#FFCCCC">Edad 6</td>
        <td width="214" bgcolor="#FFCCCC">Edad 7</td>
        <td width="214" bgcolor="#FFCCCC">Edad 8</td>
        <td width="214" bgcolor="#FFCCCC">Edad 9</td>
        <td width="214" bgcolor="#FFCCCC">Edad 10</td>
        <td width="214" bgcolor="#FFCCCC">Situacion Laboral</td>
        <td width="214" bgcolor="#FFCCCC">Fecha Retiro Ahorros</td>
        <td width="214" bgcolor="#FFCCCC">Fecha Actualizacion</td>
        <td width="214" bgcolor="#FFCCCC">Matricula Inmobiliaria</td>
        <td width="214" bgcolor="#FFCCCC">Ficha Catastro</td>
        <td width="214" bgcolor="#FFCCCC">N° de Escritura</td>
        <td width="214" bgcolor="#FFCCCC">Servicios Publicos</td>
        <td width="214" bgcolor="#FFCCCC">N° Radicado</td>
        <td width="214" bgcolor="#FFCCCC">Ente que emitio Radicado</td>
        <td width="214" bgcolor="#FFCCCC">Preaprobado</td>
        <td width="214" bgcolor="#FFCCCC">Preaprobado Entidad</td>
        <td width="214" bgcolor="#FFCCCC">Cesantias</td>
        <td width="214" bgcolor="#FFCCCC">Cesantias Entidad</td>
        <td width="214" bgcolor="#FFCCCC">Tipo de Solicitud Mejoramiento</td>

        <td width="214" bgcolor="#FFCC33">Afiliado</td>
        <td width="214" bgcolor="#FFCC33">Beneficiario</td>
        <td width="214" bgcolor="#FFCC33">Otras Ciudades</td>
        <td width="214" bgcolor="#FFCC33">Direccion</td>
        <td width="214" bgcolor="#FFCC33">Departamento</td>
        <td width="214" bgcolor="#FFCC33">Municipio</td>
        <td width="214" bgcolor="#FFCC33">Sisben</td>
        
        </tr>
      <?php while ($row = mysqli_fetch_row($resultado)){ ?> 
      <tr>
      
        <td><?php echo $row[0] ?></td>
        <td><?php echo $row[1] ?></td>
        <td><?php echo $row[2] ?></td>
        <td><?php echo $row[3] ?></td>
        <td><?php echo $row[4] ?></td>
        <td><?php echo $row[5] ?></td>
        <td><?php echo $row[6] ?></td>
        <td><?php echo $row[7] ?></td>
        <td><?php echo $row[8] ?></td>
        <td><?php echo $row[9] ?></td>
        <td><?php echo $row[10] ?></td>
        <td><?php echo $row[11] ?></td>
        <td><?php echo $row[12] ?></td>
        <td><?php echo $row[13] ?></td>
        <td><?php echo $row[14] ?></td>
        <td><?php echo $row[15] ?></td>
        <td><?php echo $row[16] ?></td>
        <td><?php echo $row[62] ?></td>
        <td><?php echo $row[17] ?></td>
        <td><?php echo $row[63] ?></td>
        <td><?php echo $row[18] ?></td>
        <td><?php echo $row[64] ?></td>        
        <td><?php echo $row[19] ?></td>
        <td><?php echo $row[65] ?></td>        
        <td><?php echo $row[20] ?></td>
        <td><?php echo $row[66] ?></td>        
        <td><?php echo $row[21] ?></td>
        <td><?php echo $row[67] ?></td>        
        <td><?php echo $row[22] ?></td>
        <td><?php echo $row[68] ?></td>        
        <td><?php echo $row[23] ?></td>
        <td><?php echo $row[69] ?></td>        
        <td><?php echo $row[24] ?></td>
        <td><?php echo $row[70] ?></td>        
        <td><?php echo $row[25] ?></td>
        <td><?php echo $row[71] ?></td>        
        <td><?php echo $row[26] ?></td>
        <td><?php echo $row[27] ?></td>        
        <td><?php echo $row[28] ?></td>
        <td><?php echo $row[29] ?></td>
        <td><?php echo $row[30] ?></td>
        <td><?php echo $row[31] ?></td>
        <td><?php echo $row[32] ?></td>
        <td><?php echo $row[33] ?></td>
        <td><?php echo $row[34] ?></td>
        <td><?php echo $row[35] ?></td>
        <td><?php echo $row[36] ?></td>
        <td><?php echo $row[37] ?></td>
        <td><?php echo $row[38] ?></td>
        <td><?php echo $row[39] ?></td>
        <td><?php echo $row[40] ?></td>
        <td><?php echo $row[41] ?></td>
        <td><?php echo $row[42] ?></td>
        <td><?php echo $row[43] ?></td>
        <td><?php echo $row[44] ?></td>
        <td><?php echo $row[45] ?></td>
        <td><?php echo $row[46] ?></td>
        <td><?php echo $row[47] ?></td>
        <td><?php echo $row[48] ?></td>
        <td><?php echo $row[49] ?></td>
        <td><?php echo $row[50] ?></td>
        <td><?php echo $row[51] ?></td>
        <td><?php echo $row[52] ?></td>
        <td><?php echo $row[53] ?></td>
        <td><?php echo $row[54] ?></td>
        <td><?php echo $row[55] ?></td>
        <td><?php echo $row[56] ?></td>
        <td><?php echo $row[57] ?></td>
        <td><?php echo $row[58] ?></td>
        <td><?php echo $row[59] ?></td>
        <td><?php echo $row[60] ?></td>
        <td><?php echo $row[61] ?></td>
        <td><?php echo $row[72] ?></td>
        <td><?php echo $row[74] ?></td>
        <td><?php echo $row[75] ?></td>
        <td><?php echo $row[76] ?></td>
        <td><?php echo $row[77] ?></td>
        
        <?php 
		$sqlC = "SELECT * FROM cruce_comfamiliar WHERE cedula = '$row[0]'"; 
        $resultadoC = mysqli_query($sle,$sqlC)or die (mysqli_error()); 
        $rowC = mysqli_fetch_row($resultadoC)
        ?>
        
		<td bgcolor="#FFCC33"><?php echo $rowC[1] ?></td>
        <td bgcolor="#FFCC33"><?php echo $rowC[2] ?></td>
        <td bgcolor="#FFCC33"><?php echo $rowC[3] ?></td>
        <td bgcolor="#FFCC33"><?php echo $rowC[4] ?></td>
        <td bgcolor="#FFCC33"><?php echo $rowC[5] ?></td>
        <td bgcolor="#FFCC33"><?php echo $rowC[6] ?></td>
        <td bgcolor="#FFCC33"><?php echo $rowC[7] ?></td>
        </tr>
      <?php } 
	  mysqli_close($sle);
	  ?>
      <tr>
        <td>&nbsp;</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        </tr>
      <tr>
        <td>&nbsp;</td>
        <td colspan="76" align="center">&nbsp;</td>
        </tr>
    </table>
  <p>&nbsp;</p></TD></TR>

<TR><TD align="center">
  <HR>
  <p class="submit">
    <label>Derechos Reservados SITIO INGENIERIA 2013<br>
      <a href="http://www.sitioingenieria.com" title="SITIO INGENIERIA" target="_new">www.sitioingenieria.com</a></label>
  </p></TD></TR>

</TABLE>

</center>

</body>
<?php mysqli_close($sle); ?></html>