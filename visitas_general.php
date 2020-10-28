<?php require_once('Connections/sle.php'); 
$currentPage = $_SERVER["PHP_SELF"];
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml"> 
<script language="JavaScript"> 
function pregunta(){ 
    if (confirm('Confirmar cambios en evidencia fotografica')){ 
       document.tuformulario.submit() 
    } 
} 
</script> 

<head profile="http://gmpg.org/xfn/11"> 
	<title>SICRU Ver 1.0</title> 
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
	<link rel="STYLESHEET" type="text/css" href="estilo.css">
    <script type="text/javascript">
	//ACEPTAR SOLO NUMEROS
	var nav4 = window.Event ? true : false;
    function acceptNum(evt)
    {
        var key = nav4 ? evt.which : evt.keyCode;
        return (key <= 13 || (key >= 48 && key <= 57));
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

  $codigo = $_GET['codigo'];
	mysqli_select_db($sle,$database_sle);
	mysqli_query($sle,"SET NAMES 'utf8'");
	
  $sql="SELECT * FROM visitas WHERE (codigo = '$codigo')";
	$resultado=mysqli_query($sle,$sql)or die (mysqli_error()); 
  $row = mysqli_fetch_row($resultado);	
	
	$sql1="SELECT * FROM ciudadanos WHERE (cedula = '$row[1]')";
	$resultado1=mysqli_query($sle,$sql1)or die (mysqli_error()); 
	$row1 = mysqli_fetch_row($resultado1);
  ?>


<BR><BR>

<table width="700" border="0">
  <tr>
    <td colspan="2" class="TituloFICHAS">INFORMACION BASICA</td>
    </tr>
  <tr>
    <td class="Microtitulos">Titular</td>
    <td><input name="titular" id="titular" size="50" readonly="readonly" value="<?php echo "$row1[3] $row1[4] $row1[5] $row1[6]";?>"/>
    </td>
    </tr>
  <tr>
    <td class="Microtitulos">Direccion</td>
    <td><input name="direccion" id="direccion" size="50" readonly="readonly" value="<?php echo "$row1[8]";?>"/></td>
  </tr>
  <tr>
    <td colspan="2" class="TituloFICHAS">DATOS GENERALES</td>
  </tr>
  <tr>
    <td class="Microtitulos">Fecha de la visita</td>
    <td><input name="fecha" id="fecha" readonly="readonly" value="<?php echo "$row[2]";?>"/></td>
    </tr>
  <tr>
    <td class="Microtitulos">Area lote m2 frente</td>
    <td><input name="frente" id="frente" readonly="readonly" value="<?php echo "$row[3]";?>"/>m2</td>
    </tr>
  <tr>
    <td class="Microtitulos">Area lote m2 fondo</td>
    <td><input name="fondo" id="fondo" readonly="readonly" value="<?php echo "$row[4]";?>"/>m2</td>
    </tr>
  <tr>
    <td class="Microtitulos">Estado de la propiedad</td>
    <td><input name="estado" id="estado" readonly="readonly" value="<?php 
	if ($row[5]=='4') echo "MUY BUENO";
	if ($row[5]=='3') echo "BUENO";
	if ($row[5]=='2') echo "REGULAR";
	if ($row[5]=='1') echo "MALO";
	if ($row[5]=='0') echo "NA";
	?>"/></td>
    </tr>
  <tr>
    <td class="Microtitulos">Documento de Propiedad</td>
    <td><input name="documentopro" type="text" id="documentopro" readonly="readonly" value="<?php echo "$row[101]";?>"/> N° <input name="documentopronum" type="text" id="documentopronum" readonly="readonly" value="<?php echo "$row[102]";?>"/></td>
    </tr>
  <tr>
    <td class="Microtitulos">Coordenada GPS</td>
    <td>N
      <input name="gpsNgrado" type="text" id="gpsNgrado" size="3" maxlength="3" readonly="readonly" value="<?php echo "$row[6]";?>"/>
      °
        <input name="gpsNminuto" type="text" id="gpsNminuto" size="3" maxlength="3" readonly="readonly" value="<?php echo "$row[7]";?>"/>
        '
      <input name="gpsNsegundo" type="text" id="gpsNsegundo" size="3" maxlength="3" readonly="readonly" value="<?php echo "$row[8]";?>"/>
      ''
      ---- W 
      <input name="gpsWgrado" type="text" id="gpsWgrado" size="3" maxlength="3" readonly="readonly" value="<?php echo "$row[9]";?>"/>
      °
      <input name="gpsWminuto" type="text" id="cedula8" size="3" maxlength="3" readonly="readonly" value="<?php echo "$row[10]";?>"/>
      '
      <input name="gpsWsegundo" type="text" id="cedula9" size="3" maxlength="3" readonly="readonly" value="<?php echo "$row[11]";?>"/>
      '' </td>
  </tr>
  <tr>
    <td class="Microtitulos">Evidencia Grafica</td> 
    <td>
      <img src="anexos/<?php echo "$row[112]";?>" width="300" alt="Imagen - Fotografia"/>
      <form name="form1" method="post" action="visitas_general2.php" enctype="multipart/form-data" onclick="pregunta()">
        <hr><input name="anexo" type="file" id="anexo" class='form-control'/> 
        <input type="hidden" name="codigo" <?php echo "value = $codigo";?>>
        <hr><input name="button" type="submit" class="Botones" id="button" value="Actualizar imagen" />
      </form>
  </td>
  </tr>
  <tr>
    <td></td> 
    <td></td>
  </tr>
  </table>
<HR>
<table width="700" border="0">
  <tr>
    <td colspan="3" class="TituloFICHAS">0. ALGUNO DE LOS MIEMBROS DEL HOGAR PRESENTA LA CONDICION...</td>
    </tr>
  <tr>
    <td class="Microtitulos">Niños menores de 8 años</td>
    <td><input name="condicion1" id="condicion1" readonly="readonly" value="<?php echo "$row[92]";?>"/></td>
  </tr>
  <tr>
    <td class="Microtitulos">Adultos mayores de 65 años</td>
    <td><input name="condicion2" id="condicion2" readonly="readonly" value="<?php echo "$row[93]";?>"/></td>
  </tr>
  <tr>
    <td class="Microtitulos">Discapacidad Fisica</td>
    <td><input name="condicion3" id="condicion3" readonly="readonly" value="<?php echo "$row[94]";?>"/></td>
  </tr>
  <tr>
    <td class="Microtitulos">Red Unidos</td>
    <td><input name="condicion4" id="condicion4" readonly="readonly" value="<?php echo "$row[95]";?>"/></td>
  </tr>
  <tr>
    <td class="Microtitulos">Desplazados</td>
    <td><input name="condicion5" id="condicion5" readonly="readonly" value="<?php echo "$row[96]";?>"/></td>
  </tr>
  <tr>
    <td class="Microtitulos">Madre o Padre sin pareja</td>
    <td><input name="condicion6" id="condicion6" readonly="readonly" value="<?php echo "$row[97]";?>"/></td>
  </tr>
</table><HR> 
<table width="700" border="0">
  <tr>
    <td colspan="3" class="TituloFICHAS">TABLA DE PUNTAJE</td>
  </tr>
  <tr>
    <td class="Microtitulos">Puntaje Cocina</td>
    <td><input name="cocina" id="cocina" size="20" readonly="readonly" value="<?php echo "$row[107]";?> "/></td>
    <td></td>
  </tr>
  <tr>
    <td class="Microtitulos">Puntaje Baño-Lavadero</td>
    <td><input name="cocina" id="cocina" size="20" readonly="readonly" value="<?php echo "$row[108]";?> "/></td>
    <td></td>
  </tr>
  <tr>
    <td class="Microtitulos">Puntaje Muros</td>
    <td><input name="cocina" id="cocina" size="20" readonly="readonly" value="<?php echo "$row[109]";?> "/></td>
    <td></td>
  </tr>
  <tr>
    <td class="Microtitulos">Puntaje Pisos</td>
    <td><input name="cocina" id="cocina" size="20" readonly="readonly" value="<?php echo "$row[110]";?> "/></td>
    <td></td>
  </tr>
  <tr>
    <td class="Microtitulos">Puntaje Cubierta</td>
    <td><input name="cocina" id="cocina" size="20" readonly="readonly" value="<?php echo "$row[111]";?> "/></td>
    <td></td>
  </tr>

  <tr>
    <td colspan="3" class="TituloFICHAS">1. SANEAMIENTO BASICO - COCINA</td>
    </tr>
  <tr>
    <td class="Microtitulos">Cocina</td>
    <td><input name="cocina1" id="cocina1" readonly="readonly" value="<?php echo "$row[12]";?>"/></td>
    <td><input name="cocina1e" id="cocina1e" readonly="readonly" value="<?php 
	if ($row[13]=='3') echo "BUENO";
	if ($row[13]=='2') echo "REGULAR";
	if ($row[13]=='1') echo "MALO";
	if ($row[13]=='0') echo "NA";
	?>"/></td>    
  </tr>
  <tr>
    <td class="Microtitulos">Lavaplato</td>
    <td><input name="cocina2" id="cocina2" readonly="readonly" value="<?php echo "$row[14]";?>"/></td>
    <td><input name="cocina2e" id="cocina2e" readonly="readonly" value="<?php 
	if ($row[15]=='3') echo "BUENO";
	if ($row[15]=='2') echo "REGULAR";
	if ($row[15]=='1') echo "MALO";
	if ($row[15]=='0') echo "NA";
	?>"/></td> 
  </tr>
  <tr>
    <td class="Microtitulos">Meson material</td>
    <td><input name="cocina3" id="cocina3" readonly="readonly" value="<?php echo "$row[16]";?>"/></td>
    <td><input name="cocina3e" id="cocina3e" readonly="readonly" value="<?php 
	if ($row[17]=='3') echo "BUENO";
	if ($row[17]=='2') echo "REGULAR";
	if ($row[17]=='1') echo "MALO";
	if ($row[17]=='0') echo "NA";
	?>"/></td> 
  </tr>
  <tr>
    <td class="Microtitulos">Revoque</td>
    <td><input name="cocina4" id="cocina4" readonly="readonly" value="<?php echo "$row[18]";?>"/></td>
    <td><input name="cocina4e" id="cocina4e" readonly="readonly" value="<?php 
	if ($row[19]=='3') echo "BUENO";
	if ($row[19]=='2') echo "REGULAR";
	if ($row[19]=='1') echo "MALO";
	if ($row[19]=='0') echo "NA";
	?>"/></td> 
  </tr>
  <tr>
    <td class="Microtitulos">Enchape</td>
    <td><input name="cocina5" id="cocina5" readonly="readonly" value="<?php echo "$row[20]";?>"/></td>
    <td><input name="cocina5e" id="cocina5e" readonly="readonly" value="<?php 
	if ($row[21]=='3') echo "BUENO";
	if ($row[21]=='2') echo "REGULAR";
	if ($row[21]=='1') echo "MALO";
	if ($row[21]=='0') echo "NA";
	?>"/></td> 
  </tr>
  <tr>
    <td class="Microtitulos">Piso mortero</td>
    <td><input name="cocina6" id="cocina6" readonly="readonly" value="<?php echo "$row[22]";?>"/></td>
    <td><input name="cocina6e" id="cocina6e" readonly="readonly" value="<?php 
	if ($row[23]=='3') echo "BUENO";
	if ($row[23]=='2') echo "REGULAR";
	if ($row[23]=='1') echo "MALO";
	if ($row[23]=='0') echo "NA";
	?>"/></td> 
  </tr>
  <tr>
    <td class="Microtitulos">Instalaciones hidraulicas</td>
    <td><input name="cocina7" id="cocina7" readonly="readonly" value="<?php echo "$row[24]";?>"/></td>
    <td><input name="cocina7e" id="cocina7e" readonly="readonly" value="<?php 
	if ($row[25]=='3') echo "BUENO";
	if ($row[25]=='2') echo "REGULAR";
	if ($row[25]=='1') echo "MALO";
	if ($row[25]=='0') echo "NA";
	?>"/></td> 
  </tr>
  <tr>
    <td class="Microtitulos">Instalaciones sanitarias</td>
    <td><input name="cocina8" id="cocina8" readonly="readonly" value="<?php echo "$row[26]";?>"/></td>
    <td><input name="cocina8e" id="cocina8e" readonly="readonly" value="<?php 
	if ($row[27]=='3') echo "BUENO";
	if ($row[27]=='2') echo "REGULAR";
	if ($row[27]=='1') echo "MALO";
	if ($row[27]=='0') echo "NA";
	?>"/></td> 
  </tr>
  <tr>
    <td class="Microtitulos">Instalaciones electricas</td>
    <td><input name="cocina9" id="cocina9" readonly="readonly" value="<?php echo "$row[28]";?>"/></td>
    <td><input name="cocina9e" id="cocina9e" readonly="readonly" value="<?php 
	if ($row[29]=='3') echo "BUENO";
	if ($row[29]=='2') echo "REGULAR";
	if ($row[29]=='1') echo "MALO";
	if ($row[29]=='0') echo "NA";
	?>"/></td> 
  </tr>
  <tr>
    <td class="Microtitulos">Espacio para cocina sin humo</td>
    <td><input name="cocina10" id="cocina10" readonly="readonly" value="<?php echo "$row[30]";?>"/></td>
    <td><input name="cocina10e" id="cocina10e" readonly="readonly" value="<?php 
	if ($row[31]=='3') echo "BUENO";
	if ($row[31]=='2') echo "REGULAR";
	if ($row[31]=='1') echo "MALO";
	if ($row[31]=='0') echo "NA";
	?>"/></td> 
  </tr>
</table><HR>
<table width="700" border="0">
  <tr>
    <td colspan="3" class="TituloFICHAS">2. SANEAMIENTO BASICO - BAÑOS Y LAVADERO</td>
    </tr>
  <tr>
    <td class="Microtitulos">Baño</td>
   <td><input name="bano1" id="bano1" readonly="readonly" value="<?php echo "$row[32]";?>"/></td>
    <td><input name="bano1e" id="bano1e" readonly="readonly" value="<?php 
	if ($row[33]=='3') echo "BUENO";
	if ($row[33]=='2') echo "REGULAR";
	if ($row[33]=='1') echo "MALO";
	if ($row[33]=='0') echo "NA";
	?>"/></td> 
  </tr>
  <tr>
    <td class="Microtitulos">Sanitario</td>
   <td><input name="bano2" id="bano2" readonly="readonly" value="<?php echo "$row[34]";?>"/></td>
    <td><input name="bano2e" id="bano2e" readonly="readonly" value="<?php 
	if ($row[35]=='3') echo "BUENO";
	if ($row[35]=='2') echo "REGULAR";
	if ($row[35]=='1') echo "MALO";
	if ($row[35]=='0') echo "NA";
	?>"/></td> 
  </tr>
  <tr>
    <td class="Microtitulos">Lavamanos</td>
   <td><input name="bano3" id="bano3" readonly="readonly" value="<?php echo "$row[36]";?>"/></td>
    <td><input name="bano3e" id="bano3e" readonly="readonly" value="<?php 
	if ($row[37]=='3') echo "BUENO";
	if ($row[37]=='2') echo "REGULAR";
	if ($row[37]=='1') echo "MALO";
	if ($row[37]=='0') echo "NA";
	?>"/></td> 
  </tr>
  <tr>
    <td class="Microtitulos">Ducha</td>
   <td><input name="bano4" id="bano4" readonly="readonly" value="<?php echo "$row[38]";?>"/></td>
    <td><input name="bano4e" id="bano4e" readonly="readonly" value="<?php 
	if ($row[39]=='3') echo "BUENO";
	if ($row[39]=='2') echo "REGULAR";
	if ($row[39]=='1') echo "MALO";
	if ($row[39]=='0') echo "NA";
	?>"/></td> 
  </tr>
  <tr>
    <td class="Microtitulos">Revoque</td>
   <td><input name="bano5" id="bano5" readonly="readonly" value="<?php echo "$row[40]";?>"/></td>
    <td><input name="bano5e" id="bano5e" readonly="readonly" value="<?php 
	if ($row[41]=='3') echo "BUENO";
	if ($row[41]=='2') echo "REGULAR";
	if ($row[41]=='1') echo "MALO";
	if ($row[41]=='0') echo "NA";
	?>"/></td> 
  </tr>
  <tr>
    <td class="Microtitulos">Enchape</td>
   <td><input name="bano6" id="bano6" readonly="readonly" value="<?php echo "$row[42]";?>"/></td>
    <td><input name="bano6e" id="bano6e" readonly="readonly" value="<?php 
	if ($row[43]=='3') echo "BUENO";
	if ($row[43]=='2') echo "REGULAR";
	if ($row[43]=='1') echo "MALO";
	if ($row[43]=='0') echo "NA";
	?>"/></td> 
  </tr>
  <tr>
    <td class="Microtitulos">Instalaciones hidraulicas</td>
   <td><input name="bano7" id="bano7" readonly="readonly" value="<?php echo "$row[44]";?>"/></td>
    <td><input name="bano7e" id="bano7e" readonly="readonly" value="<?php 
	if ($row[45]=='3') echo "BUENO";
	if ($row[45]=='2') echo "REGULAR";
	if ($row[45]=='1') echo "MALO";
	if ($row[45]=='0') echo "NA";
	?>"/></td> 
  </tr>
  <tr>
    <td class="Microtitulos">Instalaciones sanitarias</td>
   <td><input name="bano8" id="bano8" readonly="readonly" value="<?php echo "$row[46]";?>"/></td>
    <td><input name="bano8e" id="bano8e" readonly="readonly" value="<?php 
	if ($row[47]=='3') echo "BUENO";
	if ($row[47]=='2') echo "REGULAR";
	if ($row[47]=='1') echo "MALO";
	if ($row[47]=='0') echo "NA";
	?>"/></td> 
  </tr>
  <tr>
    <td class="Microtitulos">Instalaciones electricas</td>
   <td><input name="bano9" id="bano9" readonly="readonly" value="<?php echo "$row[48]";?>"/></td>
    <td><input name="bano9e" id="bano9e" readonly="readonly" value="<?php 
	if ($row[49]=='3') echo "BUENO";
	if ($row[49]=='2') echo "REGULAR";
	if ($row[49]=='1') echo "MALO";
	if ($row[49]=='0') echo "NA";
	?>"/></td>
  </tr>
  <tr>
    <td class="Microtitulos">Sistema septico</td>
   <td><input name="bano10" id="bano10" readonly="readonly" value="<?php echo "$row[50]";?>"/></td>
    <td><input name="bano10e" id="bano10e" readonly="readonly" value="<?php 
	if ($row[51]=='3') echo "BUENO";
	if ($row[51]=='2') echo "REGULAR";
	if ($row[51]=='1') echo "MALO";
	if ($row[51]=='0') echo "NA";
	?>"/></td>
  </tr>
  <tr>
    <td class="Microtitulos">Lavadero</td>
   <td><input name="bano11" id="bano11" readonly="readonly" value="<?php echo "$row[52]";?>"/></td>
    <td><input name="bano11e" id="bano11e" readonly="readonly" value="<?php 
	if ($row[53]=='3') echo "BUENO";
	if ($row[53]=='2') echo "REGULAR";
	if ($row[53]=='1') echo "MALO";
	if ($row[53]=='0') echo "NA";
	?>"/></td>
  </tr>
</table><HR>
<table width="700" border="0">
  <tr>
    <td colspan="3" class="TituloFICHAS">3. SANEAMIENTO BASICO - pisos</td>
    </tr>
  <tr>
    <td class="Microtitulos">Tierra</td>
   <td><input name="piso1" id="piso1" readonly="readonly" value="<?php echo "$row[54]";?>"/></td>
    <td><input name="piso1e" id="piso1e" readonly="readonly" value="<?php 
	if ($row[55]=='3') echo "BUENO";
	if ($row[55]=='2') echo "REGULAR";
	if ($row[55]=='1') echo "MALO";
	if ($row[55]=='0') echo "NA";
	?>"/></td>
  </tr>
  <tr>
    <td class="Microtitulos">Esterilla</td>
   <td><input name="piso2" id="piso2" readonly="readonly" value="<?php echo "$row[56]";?>"/></td>
    <td><input name="piso2e" id="piso2e" readonly="readonly" value="<?php 
	if ($row[57]=='3') echo "BUENO";
	if ($row[57]=='2') echo "REGULAR";
	if ($row[57]=='1') echo "MALO";
	if ($row[57]=='0') echo "NA";
	?>"/></td>
  </tr>
  <tr>
    <td class="Microtitulos">Madera</td>
   <td><input name="piso3" id="piso3" readonly="readonly" value="<?php echo "$row[58]";?>"/></td>
    <td><input name="piso3e" id="piso3e" readonly="readonly" value="<?php 
	if ($row[59]=='3') echo "BUENO";
	if ($row[59]=='2') echo "REGULAR";
	if ($row[59]=='1') echo "MALO";
	if ($row[59]=='0') echo "NA";
	?>"/></td>
  </tr>
  <tr>
    <td class="Microtitulos">Mortero</td>
   <td><input name="piso4" id="piso4" readonly="readonly" value="<?php echo "$row[60]";?>"/></td>
    <td><input name="piso4e" id="piso4e" readonly="readonly" value="<?php 
	if ($row[61]=='3') echo "BUENO";
	if ($row[61]=='2') echo "REGULAR";
	if ($row[61]=='1') echo "MALO";
	if ($row[61]=='0') echo "NA";
	?>"/></td>
  </tr>
  <tr>
    <td class="Microtitulos">Baldosa</td>
   <td><input name="piso5" id="piso5" readonly="readonly" value="<?php echo "$row[62]";?>"/></td>
    <td><input name="piso5e" id="piso5e" readonly="readonly" value="<?php 
	if ($row[63]=='3') echo "BUENO";
	if ($row[63]=='2') echo "REGULAR";
	if ($row[63]=='1') echo "MALO";
	if ($row[63]=='0') echo "NA";
	?>"/></td>
  </tr>
  </table><HR>
<table width="700" border="0">
  <tr>
    <td colspan="3" class="TituloFICHAS">4. SANEAMIENTO BASICO - cubierta</td>
    </tr>
  <tr>
    <td class="Microtitulos">Cubierta</td>
   <td><input name="cubierta1" id="cubierta1" readonly="readonly" value="<?php echo "$row[64]";?>"/></td>
    <td><input name="cubierta1e" id="cubierta1e" readonly="readonly" value="<?php 
	if ($row[65]=='3') echo "BUENO";
	if ($row[65]=='2') echo "REGULAR";
	if ($row[65]=='1') echo "MALO";
	if ($row[65]=='0') echo "NA";
	?>"/></td>
  </tr>
  <tr>
    <td class="Microtitulos">Teja carton</td>
   <td><input name="cubierta2" id="cubierta2" readonly="readonly" value="<?php echo "$row[66]";?>"/></td>
    <td><input name="cubierta2e" id="cubierta2e" readonly="readonly" value="<?php 
	if ($row[67]=='3') echo "BUENO";
	if ($row[67]=='2') echo "REGULAR";
	if ($row[67]=='1') echo "MALO";
	if ($row[67]=='0') echo "NA";
	?>"/></td>
  </tr>
  <tr>
    <td class="Microtitulos">Teja barro</td>
   <td><input name="cubierta3" id="cubierta3" readonly="readonly" value="<?php echo "$row[68]";?>"/></td>
    <td><input name="cubierta3e" id="cubierta3e" readonly="readonly" value="<?php 
	if ($row[69]=='3') echo "BUENO";
	if ($row[69]=='2') echo "REGULAR";
	if ($row[69]=='1') echo "MALO";
	if ($row[69]=='0') echo "NA";
	?>"/></td>
  </tr>
  <tr>
    <td class="Microtitulos">Teja eternit</td>
   <td><input name="cubierta4" id="cubierta4" readonly="readonly" value="<?php echo "$row[70]";?>"/></td>
    <td><input name="cubierta4e" id="cubierta4e" readonly="readonly" value="<?php 
	if ($row[71]=='3') echo "BUENO";
	if ($row[71]=='2') echo "REGULAR";
	if ($row[71]=='1') echo "MALO";
	if ($row[71]=='0') echo "NA";
	?>"/></td>
  </tr>
  <tr>
    <td class="Microtitulos">Estructura en madera</td>
   <td><input name="cubierta5" id="cubierta5" readonly="readonly" value="<?php echo "$row[72]";?>"/></td>
    <td><input name="cubierta5e" id="cubierta5e" readonly="readonly" value="<?php 
	if ($row[73]=='3') echo "BUENO";
	if ($row[73]=='2') echo "REGULAR";
	if ($row[73]=='1') echo "MALO";
	if ($row[73]=='0') echo "NA";
	?>"/></td>
  </tr>
  <tr>
    <td class="Microtitulos">Estructura metalica</td>
   <td><input name="cubierta6" id="cubierta6" readonly="readonly" value="<?php echo "$row[74]";?>"/></td>
    <td><input name="cubierta6e" id="cubierta6e" readonly="readonly" value="<?php 
	if ($row[75]=='3') echo "BUENO";
	if ($row[75]=='2') echo "REGULAR";
	if ($row[75]=='1') echo "MALO";
	if ($row[75]=='0') echo "NA";
	?>"/></td>
  </tr>
  <tr>
    <td class="Microtitulos">Teja zinc</td>
   <td><input name="cubierta7" id="cubierta7" readonly="readonly" value="<?php echo "$row[76]";?>"/></td>
    <td><input name="cubierta7e" id="cubierta7e" readonly="readonly" value="<?php 
	if ($row[77]=='3') echo "BUENO";
	if ($row[77]=='2') echo "REGULAR";
	if ($row[77]=='1') echo "MALO";
	if ($row[77]=='0') echo "NA";
	?>"/></td>
  </tr>
  <tr>
    <td class="Microtitulos">Placa concreto</td>
   <td><input name="cubierta8" id="cubierta8" readonly="readonly" value="<?php echo "$row[78]";?>"/></td>
    <td><input name="cubierta8e" id="cubierta8e" readonly="readonly" value="<?php 
	if ($row[79]=='3') echo "BUENO";
	if ($row[79]=='2') echo "REGULAR";
	if ($row[79]=='1') echo "MALO";
	if ($row[79]=='0') echo "NA";
	?>"/></td>
  </tr>
  </table><HR>
<table width="700" border="0">
  <tr>
    <td colspan="3" class="TituloFICHAS">5. SANEAMIENTO BASICO - estructura y muros</td>
    </tr>
  <tr>
    <td class="Microtitulos">Paredes esterilla</td>
   <td><input name="muros1" id="muros1" readonly="readonly" value="<?php echo "$row[80]";?>"/></td>
    <td><input name="muros1e" id="muros1e" readonly="readonly" value="<?php 
	if ($row[81]=='3') echo "BUENO";
	if ($row[81]=='2') echo "REGULAR";
	if ($row[81]=='1') echo "MALO";
	if ($row[81]=='0') echo "NA";
	?>"/></td>
  </tr>
  <tr>
    <td class="Microtitulos">Paredes bahareque</td>
   <td><input name="muros2" id="muros2" readonly="readonly" value="<?php echo "$row[82]";?>"/></td>
    <td><input name="muros2e" id="muros2e" readonly="readonly" value="<?php 
	if ($row[83]=='3') echo "BUENO";
	if ($row[83]=='2') echo "REGULAR";
	if ($row[83]=='1') echo "MALO";
	if ($row[83]=='0') echo "NA";
	?>"/></td>
  </tr>
  <tr>
    <td class="Microtitulos">Muros ladrillo no confinados</td>
   <td><input name="muros3" id="muros3" readonly="readonly" value="<?php echo "$row[84]";?>"/></td>
    <td><input name="muros3e" id="muros3e" readonly="readonly" value="<?php 
	if ($row[85]=='3') echo "BUENO";
	if ($row[85]=='2') echo "REGULAR";
	if ($row[85]=='1') echo "MALO";
	if ($row[85]=='0') echo "NA";
	?>"/></td>
  </tr>
  <tr>
    <td class="Microtitulos">Muros en ladrillo confinados</td>
   <td><input name="muros4" id="muros4" readonly="readonly" value="<?php echo "$row[86]";?>"/></td>
    <td><input name="muros4e" id="muros4e" readonly="readonly" value="<?php 
	if ($row[87]=='3') echo "BUENO";
	if ($row[87]=='2') echo "REGULAR";
	if ($row[87]=='1') echo "MALO";
	if ($row[87]=='0') echo "NA";
	?>"/></td>
  </tr>
  <tr>
    <td class="Microtitulos">Porticos</td>
   <td><input name="muros5" id="muros5" readonly="readonly" value="<?php echo "$row[88]";?>"/></td>
    <td><input name="muros5e" id="muros5e" readonly="readonly" value="<?php 
	if ($row[89]=='3') echo "BUENO";
	if ($row[89]=='2') echo "REGULAR";
	if ($row[89]=='1') echo "MALO";
	if ($row[89]=='0') echo "NA";
	?>"/></td>
  </tr>
  <tr>
    <td class="Microtitulos">Otros</td>
   <td><input name="muros6" id="muros6" readonly="readonly" value="<?php echo "$row[90]";?>"/></td>
    <td><input name="muros6e" id="muros6e" readonly="readonly" value="<?php 
	if ($row[91]=='3') echo "BUENO";
	if ($row[91]=='2') echo "REGULAR";
	if ($row[91]=='1') echo "MALO";
	if ($row[91]=='0') echo "NA";
	?>"/></td>
  </tr>

  <tr>
    <td colspan="2"><HR></td>
    </tr>

  <tr>
    <td class="Microtitulos">Realizo la Visita</td>
   <td><input name="nombrevisito" id="nombrevisito" readonly="readonly" value="<?php echo "$row[103]";?>"/></td>
    </tr>
  <tr>
    <td class="Microtitulos">Identificacion</td>
   <td><input name="documentovisito" id="documentovisito" readonly="readonly" value="<?php echo "$row[104]";?>"/></td>
    </tr>

  <tr>
    <td colspan="2"><HR></td>
    </tr>

  <tr>
    <td class="Microtitulos">Atendio la Visita</td>
   <td><input name="nombreatendio" id="nombreatendio" readonly="readonly" value="<?php echo "$row[105]";?>"/></td>
    </tr>
  <tr>
    <td class="Microtitulos">Identificacion</td>
   <td><input name="documentoatendio" id="documentoatendio" readonly="readonly" value="<?php echo "$row[106]";?>"/></td>
    </tr>
  </table><HR>
<table width="700" border="0">
  <tr>
    <td class="TituloFICHAS">observaciones</td>
    </tr>
  <tr>
    <td><textarea name="observaciones" id="observaciones" cols="90" rows="5" readonly="readonly""><?php echo "$row[98]";?></textarea></td>
    </tr>
  <tr>
   <td></td>
     </tr>
</table><HR>


</TD></TR>
</TABLE>

<HR><img src="imagenes/logotipo_pie.png" /><br><HR>
</center>
</body>
<?php mysqli_close($sle); ?></html>