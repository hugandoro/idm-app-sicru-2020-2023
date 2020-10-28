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
    
<script type="text/javascript">
	//VALIDA ANTES DE ELIMINAR
	function confirmar(texto) 
	{ 
		if (confirm(texto)) 
		{ 
			return true; 
		} 
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
<TR><TD align="center">
  <?php
    $cedula = $_GET['cedula'];
	$base = $_GET['base'];
		
    mysqli_select_db($sle,$database_sle);
	mysqli_query($sle,"SET NAMES 'utf8'");
	

   	echo "<center>CONVOCATORIAS VIGENTES QUE APLICAN PARA<BR><BR>";
	if ($base==0) echo "<B>Por Reubicar</B><HR></center>";
	if ($base==1) echo "<B>Mejoramiento Urbano</B><HR></center>";
	if ($base==2) echo "<B>Mejoramiento Rural</B><HR></center>";
	if ($base==3) echo "<B>Vivienda de Interes Social VIS</B><HR></center>";
	if ($base==4) echo "<B>Vivienda de Interes Prioritario VIP</B><HR></center>";
	if ($base==5) echo "<B>Condicion de Desplazamiento</B><HR></center>";
	if ($base==6) echo "<B>Construccion en Sitio Propio</B><HR></center>";


  ?>

  <form name="form1" method="post" onSubmit="return confirmar('ATENCION !!! ¿Estas seguro de postular? El ciudadano no podra postularse a ningun otro proyecto');" action="convocatorias_inscribir3.php">
    <label for="base">Convocatorias Abiertas</label>
    <?php
	$sqlC="SELECT * FROM convocatorias";
      $resultC = mysqli_query($sle,$sqlC);
	  echo "<select name='convocatoria' id='convocatoria'>";
	  while ($rowC = mysqli_fetch_row($resultC)){
		  if ($rowC[3] == 1)
		  { 
		    if (($base==0) && ($rowC[4]==1))
		      echo "<option value='$rowC[0]'>$rowC[1] ($rowC[2])</option>";
		    if (($base==1) && ($rowC[5]==1))
		      echo "<option value='$rowC[0]'>$rowC[1] ($rowC[2])</option>";
		    if (($base==2) && ($rowC[6]==1))
		      echo "<option value='$rowC[0]'>$rowC[1] ($rowC[2])</option>";
		    if (($base==3) && ($rowC[7]==1))
		      echo "<option value='$rowC[0]'>$rowC[1] ($rowC[2])</option>";
		    if (($base==4) && ($rowC[8]==1))
		      echo "<option value='$rowC[0]'>$rowC[1] ($rowC[2])</option>";
		    if (($base==5) && ($rowC[9]==1))
		      echo "<option value='$rowC[0]'>$rowC[1] ($rowC[2])</option>";
		    if (($base==6) && ($rowC[10]==1))
		      echo "<option value='$rowC[0]'>$rowC[1] ($rowC[2])</option>";
		  }
	  }
	  echo "</select>";
    ?>
	<input type="hidden" name="cedula" id="cedula" <?php echo "value=".$cedula ?>>
    <input type="hidden" name="base" id="base" <?php echo "value=".$base ?>>
    <p>    <input type="submit" class="Botones" value="Postular >>" /></p>
</form>

  <?php	
	echo "<HR><a href='convocatorias.php'><input type='submit' name='Volver' id='Volver' value='Volver' class='Botones'/></a>";
  ?>
</TD></TR>
</TABLE>

<HR><img src="imagenes/logotipo_pie.png" /><br><HR>
</center>
</body>
<?php mysqli_close($sle); ?></html>