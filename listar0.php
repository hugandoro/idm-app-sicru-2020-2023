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
<CENTER>
  <?php	
    if ($_SESSION["REU"] >= "1")
	  echo "<a href='listar1.php?base=0'><input type='submit' name='Por Reubicar' id='PR' value='Por Reubicar' class='Botones'/></a><HR>";
    if ($_SESSION["MU"] >= "1")
	  echo "<a href='listar1.php?base=1'><input type='submit' name='Mejoramiento Urbano' id='MU' value='Mejoramiento Urbano' class='Botones'/></a><HR>";
    if ($_SESSION["MR"] >= "1")
	  echo "<a href='listar1.php?base=2'><input type='submit' name='Mejoramiento Rural' id='MR' value='Mejoramiento Rural' class='Botones'/></a><HR>";
    if ($_SESSION["VIS"] >= "1")
	  echo "<a href='listar1.php?base=3'><input type='submit' name='Vivienda Nueva' id='VIS' value='Vivienda Nueva' class='Botones'/></a><HR>";
    if ($_SESSION["VIP"] >= "1")
	  echo "<a href='listar1.php?base=4'><input type='submit' name='Vivienda VIP' id='VIP' value='Vivienda VIP' class='Botones'/></a><HR>";
    if ($_SESSION["DES"] >= "1")
	  echo "<a href='listar1.php?base=5'><input type='submit' name='Desplazados' id='DES' value='Desplazados' class='Botones'/></a><HR>";
    if ($_SESSION["SP"] >= "1")
	  echo "<a href='listar1.php?base=6'><input type='submit' name='Sitio Propio' id='SIP' value='Sitio Propio' class='Botones'/></a><HR>";
	
	echo "<HR><a href='menu.php'><input type='submit' name='Volver' id='Volver' value='Volver' class='Botones'/></a>";
  ?>
</CENTER>
</TD></TR>
</TABLE>

<HR><img src="imagenes/logotipo_pie.png" /><br><HR>
</center>
</body>
<?php mysqli_close($sle); ?></html>