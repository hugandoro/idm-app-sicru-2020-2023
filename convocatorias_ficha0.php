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
	
	$cedula = $_GET['cedula'];
	$convocatoria = $_GET['convocatoria'];
	
	$sqlC="SELECT * FROM convocatorias WHERE id_proyecto = '$convocatoria'";
    $resultC = mysqli_query($sle,$sqlC);
	$rowC = mysqli_fetch_row($resultC);
	
	$sqlCC="SELECT * FROM convocatorias_ciudadanos WHERE ((id_proyecto = '$convocatoria') AND (cedula = '$cedula'))";
    $resultCC = mysqli_query($sle,$sqlCC);
	$rowCC = mysqli_fetch_row($resultCC);
	
	$sqlCI="SELECT * FROM ciudadanos WHERE cedula = '$cedula'";
    $resultCI = mysqli_query($sle,$sqlCI);
	$rowCI = mysqli_fetch_row($resultCI);

    $Pproyecto = $rowC[1]." - ".$rowC[2];
    $Pfecha = $rowCC[2];
	$Pcedula = $rowCI[0];
	$Pnombre = $rowCI[3]." ".$rowCI[4]." ".$rowCI[5]." ".$rowCI[6];
	$Pdireccion = $rowCI[8]." - ".$rowCI[9];
	$Ptelefono = $rowCI[12]." // ".$rowCI[13];
	
	$Pfam1 = $rowCI[17];
	$Pfam1_ced = $rowCI[62];
	$Pfam2 = $rowCI[18];
	$Pfam2_ced = $rowCI[63];
	$Pfam3 = $rowCI[19];
	$Pfam3_ced = $rowCI[64];
	$Pfam4 = $rowCI[20];
	$Pfam4_ced = $rowCI[65];
	$Pfam5 = $rowCI[21];
	$Pfam5_ced = $rowCI[66];
	$Pfam6 = $rowCI[22];
	$Pfam6_ced = $rowCI[67];
	$Pfam7 = $rowCI[23];
	$Pfam7_ced = $rowCI[68];
	$Pfam8 = $rowCI[24];
	$Pfam8_ced = $rowCI[69];	
	$Pfam9 = $rowCI[25];
	$Pfam9_ced = $rowCI[70];
	$Pfam10 = $rowCI[26];
	$Pfam10_ced = $rowCI[71];
	
	if ($Pfam1 == '')
	  $Pfam1 = $Pfam1_ced = 'NA';
	if ($Pfam2 == '')
	  $Pfam2 = $Pfam2_ced = 'NA';
	if ($Pfam3 == '')
	  $Pfam3 = $Pfam3_ced = 'NA';
	if ($Pfam4 == '')
	  $Pfam4 = $Pfam4_ced = 'NA';
	if ($Pfam5 == '')
	  $Pfam5 = $Pfam5_ced = 'NA';
	if ($Pfam6 == '')
	  $Pfam6 = $Pfam6_ced = 'NA';
	if ($Pfam7 == '')
	  $Pfam7 = $Pfam7_ced = 'NA';
	if ($Pfam8 == '')
	  $Pfam8 = $Pfam8_ced = 'NA';
	if ($Pfam9 == '')
	  $Pfam9 = $Pfam9_ced = 'NA';
	if ($Pfam10 == '')
	  $Pfam10 = $Pfam10_ced = 'NA';
	  
	$Pcodigopin = $rowCC[0].'-'.$rowCC[1];
	  	
  ?>
    <BR><BR>
        <table width="792" border="0">
          <tr>
            <td colspan="5" bgcolor="#6699FF" class="TituloFICHAS">FORMULARIO DE POSTULACION</td>
            <td bgcolor="#333333" class="TituloFICHAS"><?php echo $Pcodigopin;?></td>
          </tr>
          <tr>
            <td colspan="6"><?php echo $Pproyecto;?></td>
          </tr>
          <tr>
            <td colspan="6" bgcolor="#6699FF" class="TituloFICHAS">DATOS BASICOS</td>
          </tr>
          <tr>
            <td width="167" class="MiniTitulo">Fecha</td>
            <td width="182"><?php echo $Pfecha;?></td>
            <td width="60">&nbsp;</td>
            <td width="110">&nbsp;</td>
            <td width="89" class="MiniTitulo">Radicado</td>
            <td width="144">&nbsp;</td>
          </tr>
          <tr>
            <td class="MiniTitulo">Nombre</td>
            <td colspan="3"><?php echo $Pnombre;?></td>
            <td class="MiniTitulo">Cedula</td>
            <td><?php echo $Pcedula;?></td>
          </tr>
          <tr>
            <td class="MiniTitulo">Direccion</td>
            <td colspan="3"><?php echo $Pdireccion;?></td>
            <td class="MiniTitulo">Telefono</td>
            <td><?php echo $Ptelefono;?></td>
          </tr>
          <tr>
            <td colspan="6" bgcolor="#6699FF" class="TituloFICHAS">GRUPO FAMILIAR</td>
          </tr>
          <tr>
            <td class="MiniTitulo">Nombre</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td class="MiniTitulo">Cedula</td>
          </tr>
          <tr>
            <td colspan="5"><?php echo $Pfam1;?></td>
            <td><?php echo $Pfam1_ced;?></td>
          </tr>
          <tr>
            <td colspan="5"><?php echo $Pfam2;?></td>
            <td><?php echo $Pfam2_ced;?></td>
          </tr>
          <tr>
            <td colspan="5"><?php echo $Pfam3;?></td>
            <td><?php echo $Pfam3_ced;?></td>
          </tr>
          <tr>
            <td colspan="5"><?php echo $Pfam4;?></td>
            <td><?php echo $Pfam4_ced;?></td>
          </tr>
          <tr>
            <td colspan="5"><?php echo $Pfam5;?></td>
            <td><?php echo $Pfam5_ced;?></td>
          </tr>
          <tr>
            <td colspan="5"><?php echo $Pfam6;?></td>
            <td><?php echo $Pfam6_ced;?></td>
          </tr>
          <tr>
            <td colspan="5"><?php echo $Pfam7;?></td>
            <td><?php echo $Pfam7_ced;?></td>
          </tr>
          <tr>
            <td colspan="5"><?php echo $Pfam8;?></td>
            <td><?php echo $Pfam8_ced;?></td>
          </tr>
          <tr>
            <td colspan="5"><?php echo $Pfam9;?></td>
            <td><?php echo $Pfam9_ced;?></td>
          </tr>
          <tr>
            <td colspan="5"><?php echo $Pfam10;?></td>
            <td><?php echo $Pfam10_ced;?></td>
          </tr>
          <tr>
            <td colspan="6" bgcolor="#6699FF" class="TituloFICHAS">ANEXOS</td>
          </tr>
          <tr>
            <td colspan="4">______________________________________________________________</td>
            <td class="MiniTitulo">N° de Folios</td>
            <td>_____</td>
          </tr>
          <tr>
            <td colspan="4">______________________________________________________________</td>
            <td class="MiniTitulo">N° de Folios</td>
            <td>_____</td>
          </tr>
          <tr>
            <td colspan="4">______________________________________________________________</td>
            <td class="MiniTitulo">N° de Folios</td>
            <td>_____</td>
          </tr>
          <tr>
            <td colspan="4">______________________________________________________________</td>
            <td class="MiniTitulo">N° de Folios</td>
            <td>_____</td>
          </tr>
          <tr>
            <td colspan="4">______________________________________________________________</td>
            <td class="MiniTitulo">N° de Folios</td>
            <td>_____</td>
          </tr>
          <tr>
            <td colspan="4">______________________________________________________________</td>
            <td class="MiniTitulo">N° de Folios</td>
            <td>_____</td>
          </tr>
          <tr>
            <td colspan="6" bgcolor="#6699FF" class="TituloFICHAS">NOMBRE Y FIRMA DEL POSTULANTE</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td colspan="2">_____________________________________</td>
            <td>CC</td>
            <td>_____________</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td colspan="6"><hr /></td>
          </tr>
          <tr>
            <td colspan="6"><p>Se certifica que el señor (a)  <B><?php echo $Pnombre;?></B>, identificada con documento de identificacion N° <B><?php echo $Pcedula;?></B>, ha presentado documentos en ( __ ) folios para postularse dentro del programa <B><?php echo $Pproyecto;?> . </B>Formulario de Postulacion N° <B><?php echo $Pcodigopin;?></B>. En constancia se firma en Dosquebradas el <?php echo date('Y-m-d');?>. *** La presente postulacion no garantiza la otorgacion de vivienda, cupo, subidio o mejoramiento, asi como tampoco compromete al IDM con la adjudicacion del mismo a la persona aqui postulante ***</p>
<p>Firma __________________________________</p></td>
          </tr>
        </table>
     
<?php	
	echo "<HR><input type='button' name='Imprimir' id='Imprimir' value='Imprimir' onclick='window.print();' class='Botones'/><a href='convocatorias.php'><input type='submit' name='Volver' id='Volver' value='Volver' class='Botones'/></a>";
  ?></TD>
    </TR>
  </TABLE>

<HR><img src="imagenes/logotipo_pie.png" /><br><HR>  
</center>
</body>
<?php mysqli_close($sle); ?></html>