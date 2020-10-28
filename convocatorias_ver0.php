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
      <TD align="center"><?php
    mysqli_select_db($sle,$database_sle);
	mysqli_query($sle,"SET NAMES 'utf8'");
	
	$convocatoria = "NA";
	if (isset($_GET['convocatoria'])) 
	  $convocatoria = $_GET['convocatoria'];
    if ($convocatoria != "NA")
	{
	  $sqlAA="UPDATE convocatorias SET estado ='2' WHERE id_proyecto = '$convocatoria'";
	  $resultAA = mysqli_query($sle,$sqlAA);
	}
	
   	echo "<center>LISTADO DE CONVOCATORIAS<BR><BR>";
  ?>
        <form name="form1" method="post" onSubmit="return revisar(form1);" action="convocatorias_ver1.php">
          <label for="base">Vigentes</label>
          <?php
	$sqlC="SELECT * FROM convocatorias";
      $resultC = mysqli_query($sle,$sqlC);
	  echo "<select name='convocatoria' id='convocatoria'>";
	  while ($rowC = mysqli_fetch_row($resultC)){
		  if ($rowC[3] == 1)
		    echo "<option value='$rowC[0]'>$rowC[1] ($rowC[2])</option>";
	  }
	  echo "</select>";
    ?>
          <p>
            <input type="submit" class="Botones" value="Listar Postulados &gt;&gt;" />
          </p>
        </form>
        <?php	
	echo "<HR><a href='convocatorias.php'><input type='submit' name='Volver' id='Volver' value='Volver' class='Botones'/></a>";
  ?></TD>
    </TR>
  </TABLE>

<HR><img src="imagenes/logotipo_pie.png" /><br><HR>
</center>
</body>
<?php mysqli_close($sle); ?></html>