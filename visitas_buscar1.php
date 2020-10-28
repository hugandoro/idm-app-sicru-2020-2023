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
    if (isset($_POST['filtro_cedula0']))
	{
	    $cedula = $_POST['filtro_cedula0'];
		$sql = "SELECT * FROM visitas WHERE cedula = '$cedula' ORDER BY fecha ASC";
	}
	else
	{		
	    if (isset($_POST['filtro_general']))
		{
		    $valor_general = $_POST['valor_general'];
			$filtro_general = $_POST['filtro_general'];
			$sql = "SELECT * FROM visitas WHERE (puntaje_COCINA + puntaje_BANOLAVADERO + puntaje_PISOS + puntaje_CUBIERTA + puntaje_MUROS) ".$filtro_general." '$valor_general' ORDER BY fecha ASC";
		}
		else
		{
			$valor_cocina = $_POST['valor_cocina'];
			$filtro_cocina = $_POST['filtro_cocina'];
			$valor_lavadero = $_POST['valor_lavadero'];
			$filtro_lavadero = $_POST['filtro_lavadero'];
			$valor_pisos = $_POST['valor_pisos'];
			$filtro_pisos = $_POST['filtro_pisos'];
			$valor_cubierta = $_POST['valor_cubierta'];
			$filtro_cubierta = $_POST['filtro_cubierta'];
			$valor_muros = $_POST['valor_muros'];
			$filtro_muros = $_POST['filtro_muros'];
			$sql = "SELECT * FROM visitas WHERE (puntaje_COCINA ".$filtro_cocina." '$valor_cocina') AND (puntaje_BANOLAVADERO ".$filtro_lavadero." '$valor_lavadero') AND (puntaje_PISOS ".$filtro_pisos." '$valor_pisos') AND (puntaje_CUBIERTA ".$filtro_cubierta." '$valor_cubierta') AND (puntaje_MUROS ".$filtro_muros." '$valor_muros') ORDER BY fecha ASC";
		}
	}
	

    mysqli_select_db($sle,$database_sle);
	mysqli_query($sle,"SET NAMES 'utf8'");
	$resultado = mysqli_query($sle,$sql)or die (mysqli_error()); 
		
//***********************************************************************		
//HISTORICO DE VISITAS TECNICAS******************************************		
	echo "<HR><B>VISITAS TECNICAS REALIZADAS</B><BR><BR>";
	echo "<TABLE border='1'>";
	echo "<TR>";
	echo "<TD class='TituloTABLAS'>Codigo</TD>";	
	echo "<TD class='TituloTABLAS'>Cedula</TD>";	
	echo "<TD class='TituloTABLAS'>Fecha de la Visita</TD>";	
	echo "<TD class='TituloTABLAS'>Cocina</TD>";	
	echo "<TD class='TituloTABLAS'>Baños</TD>";	
	echo "<TD class='TituloTABLAS'>Muros</TD>";	
	echo "<TD class='TituloTABLAS'>Pisos</TD>";	
	echo "<TD class='TituloTABLAS'>Cubierta</TD>";	
	echo "<TD class='TituloTABLAS'>Observaciones</TD>";	
	echo "</TR>";  
	while ($row = mysqli_fetch_row($resultado))
	{ 
	  echo "<TR>";
	  echo "<TD><a target='_blank' href='visitas_general.php?codigo=$row[0]'>$row[0]</a></TD>";	
	  echo "<TD><a target='_blank' href='consulta_general.php?cedula=$row[1]'>$row[1]</a></TD>";	
	  echo "<TD>$row[2]</TD>";	
	  echo "<TD>$row[107]</TD>";	
	  echo "<TD>$row[108]</TD>";	
	  echo "<TD>$row[109]</TD>";	
	  echo "<TD>$row[110]</TD>";	
	  echo "<TD>$row[111]</TD>";	
	  echo "<TD>$row[98]</TD>";	
	  echo "</TR>";  
	}
	echo "</TABLE>";	
	
	echo "<HR><a href='menu.php'><input type='submit' name='Volver' id='Volver' value='Volver' class='Botones'/></a>";
  ?>
        </CENTER></TD>
    </TR>    
  </TABLE>

<HR><img src="imagenes/logotipo_pie.png" /><br><HR>
</center>
</body>
<?php mysqli_close($sle); ?></html>