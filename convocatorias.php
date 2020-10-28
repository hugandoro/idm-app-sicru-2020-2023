<?php require_once('Connections/sle.php'); 
$currentPage = $_SERVER["PHP_SELF"];
session_start();
//CONVOCATORIAS
//Estado 0 - Archivada
//Estado 1 - Abierta
//Estado 2 - Cerrada ( Pendiente por definir estado de todos los postulados )

//CONVOCATORIAS - CIUDADANOS
//Estado 0 - Archivado
//Estado 1 - Postulado

//CONVOCATORIAS - CIUDADANOS
//Resultado 0 - Negado
//Resultado 1 - Asignado

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

  <?php if ($_SESSION["POSTULACION"] >= "3") {?>
  <p><a href="convocatorias_inscribir0.php">
    <input type="submit" class="Botones" value="Inscribir a Convocatoria" />
  </a></p>
  <?php }?>
  
<HR>

  <?php if ($_SESSION["POSTULACION"] >= "1") {?>
  <p><a href="convocatorias_buscar0.php">
    <input type="submit" class="Botones" value="Buscar Postulacion" />
  </a></p>
  <?php }?>

<HR>

  <?php if ($_SESSION["POSTULACION"] >= "1") {?>
  <p><a href="convocatorias_ver0.php">
    <input type="submit" class="Botones" value="Convocatorias ABIERTAS" />
  </a></p>
  <?php }?>
  
  <?php if ($_SESSION["POSTULACION"] >= "1") {?>
  <p><a href="convocatorias_ver_cerradas0.php">
    <input type="submit" class="Botones" value="Convocatorias CERRADAS" />
  </a></p>
  <?php }?>
  
  <?php if ($_SESSION["POSTULACION"] >= "1") {?>
  <p><a href="convocatorias_ver_archivadas0.php">
    <input type="submit" class="Botones" value="Convocatorias ARCHIVADAS" />
  </a></p>
  <?php }?>
  
<HR>  
  
  <?php if ($_SESSION["POSTULACION"] == "4") {?>
  <p><a href="convocatorias_eliminar0.php">
    <input type="submit" class="Botones" value="Retirar de una Convocatoria" />
  </a></p>
  <?php }?>


  <?php	
	echo "<HR><a href='menu.php'><input type='submit' name='Volver' id='Volver' value='Volver' class='Botones'/></a>";
  ?>

</CENTER>
</TD></TR>
</TABLE>

<HR><img src="imagenes/logotipo_pie.png" /><br><HR>
</center>
</body>
<?php mysqli_close($sle); ?></html>