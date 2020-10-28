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

<TABLE width="460">
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
	$sqlAUX = "INSERT INTO log_eventos (fecha, hora, usuario, registro, evento) VALUES (now(), now(), ".$_SESSION["cedula"].", 'TODOS', 'EXPORTAR LISTADO')";
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
    <table width="567" border="0" cellspacing="2">
      <tr>
        <td width="159" bgcolor="#FFCCCC">Cedula</td>
        <td width="214" bgcolor="#FFCCCC">1er Nombre</td>
        <td width="214" bgcolor="#FFCCCC">2do Nombre</td>
        <td width="214" bgcolor="#FFCCCC">1er Apellido</td>
        <td width="214" bgcolor="#FFCCCC">2do Apellido</td>
        <td width="214" bgcolor="#FFCCCC">Direccion</td>
        <td width="214" bgcolor="#FFCCCC">Barrio</td>
        <td width="214" bgcolor="#FFCCCC">Fijo</td>
        <td width="214" bgcolor="#FFCCCC">Celular</td>
        </tr>
      <?php while ($row = mysqli_fetch_row($resultado)){ ?> 
      <tr>
      
        <td><?php echo $row[0] ?></td>
        <td><?php echo $row[3] ?></td>
        <td><?php echo $row[4] ?></td>
        <td><?php echo $row[5] ?></td>
        <td><?php echo $row[6] ?></td>
        <td><?php echo $row[8] ?></td>
        <td><?php echo $row[9] ?></td>
        <td><?php echo $row[12] ?></td>
        <td><?php echo $row[13] ?></td>
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
        </tr>
      <tr>
        <td>&nbsp;</td>
        <td colspan="8" align="center">&nbsp;</td>
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