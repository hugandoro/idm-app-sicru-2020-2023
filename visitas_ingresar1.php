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
    $cedula = $_POST['cedula'];
	$bandera = 0;
	
    mysqli_select_db($sle,$database_sle);
	mysqli_query($sle,"SET NAMES 'utf8'");
	
	$sql="SELECT * FROM ciudadanos WHERE (cedula = '$cedula')";
	$resultado=mysqli_query($sle,$sql)or die (mysqli_error()); 
	while ($row = mysqli_fetch_row($resultado))
	{
		$bandera = 1;
		$titular = $row[6]." ".$row[5]." ".$row[4]." ".$row[3];
		$direccion = $row[8]." - Barrio ".$row[9];
	}
  ?>


<BR><BR>

<?php if ($bandera==1) {?>
<form name="form1" method="post" action="visitas_ingresar2.php" enctype="multipart/form-data">
<table width="700" border="0">
  <tr>
    <td colspan="2" class="TituloFICHAS">INFORMACION BASICA</td>
    </tr>
  <tr>
    <td class="Microtitulos">Titular</td>
    <td><input name="titular" id="titular" size="50" readonly="readonly" value="<?php echo "$titular";?>"/>
    <input type="hidden" name="cedula" id="cedula" <?php echo "value=". $cedula ?>>
    </td>
    </tr>
  <tr>
    <td class="Microtitulos">Direccion</td>
    <td><input name="direccion" type="text" id="direccion" onkeypress="return acceptNum(event)" size="50" readonly="readonly" value="<?php echo "$direccion";?>"/></td>
  </tr>
  <tr>
    <td colspan="2" class="TituloFICHAS">DATOS GENERALES</td>
  </tr>
  <tr>
    <td class="Microtitulos">Fecha de la visita</td>
    <td><input name="fecha" type="date" id="fecha"/></td>
    </tr>
  <tr>
    <td class="Microtitulos">Area lote m2 frente</td>
    <td><input name="frente" type="text" id="frente" onkeypress="return acceptNum(event)" maxlength="5"/>
      m2</td>
    </tr>
  <tr>
    <td class="Microtitulos">Area lote m2 fondo</td>
    <td><input name="fondo" type="text" id="fondo" onkeypress="return acceptNum(event)" maxlength="5"/>
      m2</td>
    </tr>
  <tr>
    <td class="Microtitulos">Estado de la propiedad</td>
    <td><select name="estado" id="estado">
      <option value="4">MUY BUENO</option>
      <option value="3">BUENO</option>
      <option value="2">REGULAR</option>
      <option value="1">MALO</option>
      <option value="0" selected="selected">NA</option>
    </select></td>
    </tr>
  <tr>
    <td class="Microtitulos">Documento de Propiedad</td>
    <td><input name="documentopro" type="text" id="documentopro"/> N° <input name="documentopronum" type="text" id="documentopronum"/></td>
    </tr>
  <tr>
    <td class="Microtitulos">Coordenada GPS</td>
    <td>N
      <input name="gpsNgrado" type="text" id="gpsNgrado" onkeypress="return acceptNum(event)" size="4" maxlength="4"/>
      °
        <input name="gpsNminuto" type="text" id="gpsNminuto" onkeypress="return acceptNum(event)" size="4" maxlength="4"/>
        '
      <input name="gpsNsegundo" type="text" id="gpsNsegundo" onkeypress="return acceptNum(event)" size="4" maxlength="4"/>
      ''
      ---- W 
      <input name="gpsWgrado" type="text" id="gpsWgrado" onkeypress="return acceptNum(event)" size="4" maxlength="4"/>
      °
      <input name="gpsWminuto" type="text" id="cedula8" onkeypress="return acceptNum(event)" size="4" maxlength="4"/>
      '
      <input name="gpsWsegundo" type="text" id="cedula9" onkeypress="return acceptNum(event)" size="4" maxlength="4"/>
      ''</td>
  </tr>
  <tr>
    <td class="Microtitulos">Anexar Evidencia Grafica</td> 
    <td class="Titulos"><input name="anexo1" type="file" id="anexo" /></td>
  </tr>
  <tr>
    <td></td> 
    <td class="Titulos">El anexo  debe ser formato JPG no superior a 500k</td>
  </tr>
  </table>
<HR>
<table width="700" border="0">
  <tr>
    <td colspan="3" class="TituloFICHAS">0. ALGUNO DE LOS MIEMBROS DEL HOGAR PRESENTA LA CONDICION...</td>
    </tr>
  <tr>
    <td class="Microtitulos">Niños menores de 8 años</td>
    <td><select name="condicion1" id="condicion1">
      <option value="SI">SI</option>
      <option value="NO">NO</option>
      <option value="NA" selected="selected">NA</option>
    </select></td>
  </tr>
  <tr>
    <td class="Microtitulos">Adultos mayores de 65 años</td>
    <td><select name="condicion2" id="condicion2">
      <option value="SI">SI</option>
      <option value="NO">NO</option>
      <option value="NA" selected="selected">NA</option>
    </select></td>
  </tr>
  <tr>
    <td class="Microtitulos">Discapacidad Fisica</td>
    <td><select name="condicion3" id="condicion3">
      <option value="SI">SI</option>
      <option value="NO">NO</option>
      <option value="NA" selected="selected">NA</option>
    </select></td>
  </tr>
  <tr>
    <td class="Microtitulos">Red Unidos</td>
    <td><select name="condicion4" id="condicion4">
      <option value="SI">SI</option>
      <option value="NO">NO</option>
      <option value="NA" selected="selected">NA</option>
    </select></td>
  </tr>
  <tr>
    <td class="Microtitulos">Desplazados</td>
    <td><select name="condicion5" id="condicion5">
      <option value="SI">SI</option>
      <option value="NO">NO</option>
      <option value="NA" selected="selected">NA</option>
    </select></td>
  </tr>
  <tr>
    <td class="Microtitulos">Madre o Padre sin pareja</td>
    <td><select name="condicion6" id="condicion6">
      <option value="SI">SI</option>
      <option value="NO">NO</option>
      <option value="NA" selected="selected">NA</option>
    </select></td>
  </tr>
</table><HR> 
<table width="700" border="0">
  <tr>
    <td colspan="3" class="TituloFICHAS">1. SANEAMIENTO BASICO - COCINA</td>
    </tr>
  <tr>
    <td class="Microtitulos">Cocina</td>
    <td><select name="cocina1" id="cocina1">
      <option value="SI">SI</option>
      <option value="NO">NO</option>
      <option value="NA" selected="selected">NA</option>
    </select></td>
    <td><select name="cocina1e" id="cocina1e">
      <option value="3">BUENO</option>
      <option value="2">REGULAR</option>
      <option value="1">MALO</option>
      <option value="0" selected="selected">NA</option>
    </select></td>
  </tr>
  <tr>
    <td class="Microtitulos">Lavaplato</td>
    <td><select name="cocina2" id="cocina2">
      <option value="SI">SI</option>
      <option value="NO">NO</option>
      <option value="NA" selected="selected">NA</option>
    </select></td>
    <td><select name="cocina2e" id="cocina2e">
      <option value="3">BUENO</option>
      <option value="2">REGULAR</option>
      <option value="1">MALO</option>
      <option value="0" selected="selected">NA</option>
    </select></td>
  </tr>
  <tr>
    <td class="Microtitulos">Meson material</td>
    <td><select name="cocina3" id="cocina3">
      <option value="SI">SI</option>
      <option value="NO">NO</option>
      <option value="NA" selected="selected">NA</option>
    </select></td>
    <td><select name="cocina3e" id="cocina3e">
      <option value="3">BUENO</option>
      <option value="2">REGULAR</option>
      <option value="1">MALO</option>
      <option value="0" selected="selected">NA</option>
    </select></td>
  </tr>
  <tr>
    <td class="Microtitulos">Revoque</td>
    <td><select name="cocina4" id="cocina4">
      <option value="SI">SI</option>
      <option value="NO">NO</option>
      <option value="NA" selected="selected">NA</option>
    </select></td>
    <td><select name="cocina4e" id="cocina4e">
      <option value="3">BUENO</option>
      <option value="2">REGULAR</option>
      <option value="1">MALO</option>
      <option value="0" selected="selected">NA</option>
    </select></td>
  </tr>
  <tr>
    <td class="Microtitulos">Enchape</td>
    <td><select name="cocina5" id="cocina5">
      <option value="SI">SI</option>
      <option value="NO">NO</option>
      <option value="NA" selected="selected">NA</option>
    </select></td>
    <td><select name="cocina5e" id="cocina5e">
      <option value="3">BUENO</option>
      <option value="2">REGULAR</option>
      <option value="1">MALO</option>
      <option value="0" selected="selected">NA</option>
    </select></td>
  </tr>
  <tr>
    <td class="Microtitulos">Piso mortero</td>
    <td><select name="cocina6" id="cocina6">
      <option value="SI">SI</option>
      <option value="NO">NO</option>
      <option value="NA" selected="selected">NA</option>
    </select></td>
    <td><select name="cocina6e" id="cocina6e">
      <option value="3">BUENO</option>
      <option value="2">REGULAR</option>
      <option value="1">MALO</option>
      <option value="0" selected="selected">NA</option>
    </select></td>
  </tr>
  <tr>
    <td class="Microtitulos">Instalaciones hidraulicas</td>
    <td><select name="cocina7" id="cocina7">
      <option value="SI">SI</option>
      <option value="NO">NO</option>
      <option value="NA" selected="selected">NA</option>
    </select></td>
    <td><select name="cocina7e" id="cocina7e">
      <option value="3">BUENO</option>
      <option value="2">REGULAR</option>
      <option value="1">MALO</option>
      <option value="0" selected="selected">NA</option>
    </select></td>
  </tr>
  <tr>
    <td class="Microtitulos">Instalaciones sanitarias</td>
    <td><select name="cocina8" id="cocina8">
      <option value="SI">SI</option>
      <option value="NO">NO</option>
      <option value="NA" selected="selected">NA</option>
    </select></td>
    <td><select name="cocina8e" id="cocina8e">
      <option value="3">BUENO</option>
      <option value="2">REGULAR</option>
      <option value="1">MALO</option>
      <option value="0" selected="selected">NA</option>
    </select></td>
  </tr>
  <tr>
    <td class="Microtitulos">Instalaciones electricas</td>
    <td><select name="cocina9" id="cocina9">
      <option value="SI">SI</option>
      <option value="NO">NO</option>
      <option value="NA" selected="selected">NA</option>
    </select></td>
    <td><select name="cocina9e" id="cocina9e">
      <option value="3">BUENO</option>
      <option value="2">REGULAR</option>
      <option value="1">MALO</option>
      <option value="0" selected="selected">NA</option>
    </select></td>
  </tr>
  <tr>
    <td class="Microtitulos">Espacio para cocina sin humo</td>
    <td><select name="cocina10" id="cocina10">
      <option value="SI">SI</option>
      <option value="NO">NO</option>
      <option value="NA" selected="selected">NA</option>
    </select></td>
    <td><select name="cocina10e" id="cocina10e">
      <option value="3">BUENO</option>
      <option value="2">REGULAR</option>
      <option value="1">MALO</option>
      <option value="0" selected="selected">NA</option>
    </select></td>
  </tr>
</table><HR>
<table width="700" border="0">
  <tr>
    <td colspan="3" class="TituloFICHAS">2. SANEAMIENTO BASICO - BAÑOS Y LAVADERO</td>
    </tr>
  <tr>
    <td class="Microtitulos">Baño</td>
    <td><select name="bano1" id="bano1">
      <option value="SI">SI</option>
      <option value="NO">NO</option>
      <option value="NA" selected="selected">NA</option>
    </select></td>
    <td><select name="bano1e" id="bano1e">
      <option value="3">BUENO</option>
      <option value="2">REGULAR</option>
      <option value="1">MALO</option>
      <option value="0" selected="selected">NA</option>
    </select></td>
  </tr>
  <tr>
    <td class="Microtitulos">Sanitario</td>
    <td><select name="bano2" id="bano2">
      <option value="SI">SI</option>
      <option value="NO">NO</option>
      <option value="NA" selected="selected">NA</option>
    </select></td>
    <td><select name="bano2e" id="bano2e">
      <option value="3">BUENO</option>
      <option value="2">REGULAR</option>
      <option value="1">MALO</option>
      <option value="0" selected="selected">NA</option>
    </select></td>
  </tr>
  <tr>
    <td class="Microtitulos">Lavamanos</td>
    <td><select name="bano3" id="bano3">
      <option value="SI">SI</option>
      <option value="NO">NO</option>
      <option value="NA" selected="selected">NA</option>
    </select></td>
    <td><select name="bano3e" id="bano3e">
      <option value="3">BUENO</option>
      <option value="2">REGULAR</option>
      <option value="1">MALO</option>
      <option value="0" selected="selected">NA</option>
    </select></td>
  </tr>
  <tr>
    <td class="Microtitulos">Ducha</td>
    <td><select name="bano4" id="bano4">
      <option value="SI">SI</option>
      <option value="NO">NO</option>
      <option value="NA" selected="selected">NA</option>
    </select></td>
    <td><select name="bano4e" id="bano4e">
      <option value="3">BUENO</option>
      <option value="2">REGULAR</option>
      <option value="1">MALO</option>
      <option value="0" selected="selected">NA</option>
    </select></td>
  </tr>
  <tr>
    <td class="Microtitulos">Revoque</td>
    <td><select name="bano5" id="bano5">
      <option value="SI">SI</option>
      <option value="NO">NO</option>
      <option value="NA" selected="selected">NA</option>
    </select></td>
    <td><select name="bano5e" id="bano5e">
      <option value="3">BUENO</option>
      <option value="2">REGULAR</option>
      <option value="1">MALO</option>
      <option value="0" selected="selected">NA</option>
    </select></td>
  </tr>
  <tr>
    <td class="Microtitulos">Enchape</td>
    <td><select name="bano6" id="bano6">
      <option value="SI">SI</option>
      <option value="NO">NO</option>
      <option value="NA" selected="selected">NA</option>
    </select></td>
    <td><select name="bano6e" id="bano6e">
      <option value="3">BUENO</option>
      <option value="2">REGULAR</option>
      <option value="1">MALO</option>
      <option value="0" selected="selected">NA</option>
    </select></td>
  </tr>
  <tr>
    <td class="Microtitulos">Instalaciones hidraulicas</td>
    <td><select name="bano7" id="bano7">
      <option value="SI">SI</option>
      <option value="NO">NO</option>
      <option value="NA" selected="selected">NA</option>
    </select></td>
    <td><select name="bano7e" id="bano7e">
      <option value="3">BUENO</option>
      <option value="2">REGULAR</option>
      <option value="1">MALO</option>
      <option value="0" selected="selected">NA</option>
    </select></td>
  </tr>
  <tr>
    <td class="Microtitulos">Instalaciones sanitarias</td>
    <td><select name="bano8" id="bano8">
      <option value="SI">SI</option>
      <option value="NO">NO</option>
      <option value="NA" selected="selected">NA</option>
    </select></td>
    <td><select name="bano8e" id="bano8e">
      <option value="3">BUENO</option>
      <option value="2">REGULAR</option>
      <option value="1">MALO</option>
      <option value="0" selected="selected">NA</option>
    </select></td>
  </tr>
  <tr>
    <td class="Microtitulos">Instalaciones electricas</td>
    <td><select name="bano9" id="bano9">
      <option value="SI">SI</option>
      <option value="NO">NO</option>
      <option value="NA" selected="selected">NA</option>
    </select></td>
    <td><select name="bano9e" id="bano9e">
      <option value="3">BUENO</option>
      <option value="2">REGULAR</option>
      <option value="1">MALO</option>
      <option value="0" selected="selected">NA</option>
    </select></td>
  </tr>
  <tr>
    <td class="Microtitulos">Sistema septico</td>
    <td><select name="bano10" id="bano10">
      <option value="SI">SI</option>
      <option value="NO">NO</option>
      <option value="NA" selected="selected">NA</option>
    </select></td>
    <td><select name="bano10e" id="bano10e">
      <option value="3">BUENO</option>
      <option value="2">REGULAR</option>
      <option value="1">MALO</option>
      <option value="0" selected="selected">NA</option>
    </select></td>
  </tr>
  <tr>
    <td class="Microtitulos">Lavadero</td>
    <td><select name="bano11" id="bano11">
      <option value="SI">SI</option>
      <option value="NO">NO</option>
      <option value="NA" selected="selected">NA</option>
    </select></td>
    <td><select name="bano11e" id="bano11e">
      <option value="3">BUENO</option>
      <option value="2">REGULAR</option>
      <option value="1">MALO</option>
      <option value="0" selected="selected">NA</option>
    </select></td>
  </tr>
</table><HR>
<table width="700" border="0">
  <tr>
    <td colspan="3" class="TituloFICHAS">3. SANEAMIENTO BASICO - pisos</td>
    </tr>
  <tr>
    <td class="Microtitulos">Tierra</td>
    <td><select name="piso1" id="piso1">
      <option value="SI">SI</option>
      <option value="NO">NO</option>
      <option value="NA" selected="selected">NA</option>
    </select></td>
    <td><select name="piso1e" id="piso1e">
      <option value="3">BUENO</option>
      <option value="2">REGULAR</option>
      <option value="1">MALO</option>
      <option value="0" selected="selected">NA</option>
    </select></td>
  </tr>
  <tr>
    <td class="Microtitulos">Esterilla</td>
    <td><select name="piso2" id="piso2">
      <option value="SI">SI</option>
      <option value="NO">NO</option>
      <option value="NA" selected="selected">NA</option>
    </select></td>
    <td><select name="piso2e" id="piso2e">
      <option value="3">BUENO</option>
      <option value="2">REGULAR</option>
      <option value="1">MALO</option>
      <option value="0" selected="selected">NA</option>
    </select></td>
  </tr>
  <tr>
    <td class="Microtitulos">Madera</td>
    <td><select name="piso3" id="piso3">
      <option value="SI">SI</option>
      <option value="NO">NO</option>
      <option value="NA" selected="selected">NA</option>
    </select></td>
    <td><select name="piso3e" id="piso3e">
      <option value="3">BUENO</option>
      <option value="2">REGULAR</option>
      <option value="1">MALO</option>
      <option value="0" selected="selected">NA</option>
    </select></td>
  </tr>
  <tr>
    <td class="Microtitulos">Mortero</td>
    <td><select name="piso4" id="piso4">
      <option value="SI">SI</option>
      <option value="NO">NO</option>
      <option value="NA" selected="selected">NA</option>
    </select></td>
    <td><select name="piso4e" id="piso4e">
      <option value="3">BUENO</option>
      <option value="2">REGULAR</option>
      <option value="1">MALO</option>
      <option value="0" selected="selected">NA</option>
    </select></td>
  </tr>
  <tr>
    <td class="Microtitulos">Baldosa</td>
    <td><select name="piso5" id="piso5">
      <option value="SI">SI</option>
      <option value="NO">NO</option>
      <option value="NA" selected="selected">NA</option>
    </select></td>
    <td><select name="piso5e" id="piso5e">
      <option value="3">BUENO</option>
      <option value="2">REGULAR</option>
      <option value="1">MALO</option>
      <option value="0" selected="selected">NA</option>
    </select></td>
  </tr>
  </table><HR>
<table width="700" border="0">
  <tr>
    <td colspan="3" class="TituloFICHAS">4. SANEAMIENTO BASICO - cubierta</td>
    </tr>
  <tr>
    <td class="Microtitulos">Cubierta</td>
    <td><select name="cubierta1" id="cubierta1">
      <option value="SI">SI</option>
      <option value="NO">NO</option>
      <option value="NA" selected="selected">NA</option>
    </select></td>
    <td><select name="cubierta1e" id="cubierta1e">
      <option value="3">BUENO</option>
      <option value="2">REGULAR</option>
      <option value="1">MALO</option>
      <option value="0" selected="selected">NA</option>
    </select></td>
  </tr>
  <tr>
    <td class="Microtitulos">Teja carton</td>
    <td><select name="cubierta2" id="cubierta2">
      <option value="SI">SI</option>
      <option value="NO">NO</option>
      <option value="NA" selected="selected">NA</option>
    </select></td>
    <td><select name="cubierta2e" id="cubierta2e">
      <option value="3">BUENO</option>
      <option value="2">REGULAR</option>
      <option value="1">MALO</option>
      <option value="0" selected="selected">NA</option>
    </select></td>
  </tr>
  <tr>
    <td class="Microtitulos">Teja barro</td>
    <td><select name="cubierta3" id="cubierta3">
      <option value="SI">SI</option>
      <option value="NO">NO</option>
      <option value="NA" selected="selected">NA</option>
    </select></td>
    <td><select name="cubierta3e" id="cubierta3e">
      <option value="3">BUENO</option>
      <option value="2">REGULAR</option>
      <option value="1">MALO</option>
      <option value="0" selected="selected">NA</option>
    </select></td>
  </tr>
  <tr>
    <td class="Microtitulos">Teja eternit</td>
    <td><select name="cubierta4" id="cubierta4">
      <option value="SI">SI</option>
      <option value="NO">NO</option>
      <option value="NA" selected="selected">NA</option>
    </select></td>
    <td><select name="cubierta4e" id="cubierta4e">
      <option value="3">BUENO</option>
      <option value="2">REGULAR</option>
      <option value="1">MALO</option>
      <option value="0" selected="selected">NA</option>
    </select></td>
  </tr>
  <tr>
    <td class="Microtitulos">Estructura en madera</td>
    <td><select name="cubierta5" id="cubierta5">
      <option value="SI">SI</option>
      <option value="NO">NO</option>
      <option value="NA" selected="selected">NA</option>
    </select></td>
    <td><select name="cubierta5e" id="cubierta5e">
      <option value="3">BUENO</option>
      <option value="2">REGULAR</option>
      <option value="1">MALO</option>
      <option value="0" selected="selected">NA</option>
    </select></td>
  </tr>
  <tr>
    <td class="Microtitulos">Estructura metalica</td>
    <td><select name="cubierta6" id="cubierta6">
      <option value="SI">SI</option>
      <option value="NO">NO</option>
      <option value="NA" selected="selected">NA</option>
    </select></td>
    <td><select name="cubierta6e" id="cubierta6e">
      <option value="3">BUENO</option>
      <option value="2">REGULAR</option>
      <option value="1">MALO</option>
      <option value="0" selected="selected">NA</option>
    </select></td>
  </tr>
  <tr>
    <td class="Microtitulos">Teja zinc</td>
    <td><select name="cubierta7" id="cubierta7">
      <option value="SI">SI</option>
      <option value="NO">NO</option>
      <option value="NA" selected="selected">NA</option>
    </select></td>
    <td><select name="cubierta7e" id="cubierta7e">
      <option value="3">BUENO</option>
      <option value="2">REGULAR</option>
      <option value="1">MALO</option>
      <option value="0" selected="selected">NA</option>
    </select></td>
  </tr>
  <tr>
    <td class="Microtitulos">Placa concreto</td>
    <td><select name="cubierta8" id="cubierta8">
      <option value="SI">SI</option>
      <option value="NO">NO</option>
      <option value="NA" selected="selected">NA</option>
    </select></td>
    <td><select name="cubierta8e" id="cubierta8e">
      <option value="3">BUENO</option>
      <option value="2">REGULAR</option>
      <option value="1">MALO</option>
      <option value="0" selected="selected">NA</option>
    </select></td>
  </tr>
  </table><HR>
<table width="700" border="0">
  <tr>
    <td colspan="3" class="TituloFICHAS">5. SANEAMIENTO BASICO - estructura y muros</td>
    </tr>
  <tr>
    <td class="Microtitulos">Paredes esterilla</td>
    <td><select name="muros1" id="muros1">
      <option value="SI">SI</option>
      <option value="NO">NO</option>
      <option value="NA" selected="selected">NA</option>
    </select></td>
    <td><select name="muros1e" id="muros1e">
      <option value="3">BUENO</option>
      <option value="2">REGULAR</option>
      <option value="1">MALO</option>
      <option value="0" selected="selected">NA</option>
    </select></td>
  </tr>
  <tr>
    <td class="Microtitulos">Paredes bahareque</td>
    <td><select name="muros2" id="muros2">
      <option value="SI">SI</option>
      <option value="NO">NO</option>
      <option value="NA" selected="selected">NA</option>
    </select></td>
    <td><select name="muros2e" id="muros2e">
      <option value="3">BUENO</option>
      <option value="2">REGULAR</option>
      <option value="1">MALO</option>
      <option value="0" selected="selected">NA</option>
    </select></td>
  </tr>
  <tr>
    <td class="Microtitulos">Muros ladriñño no confinados</td>
    <td><select name="muros3" id="muros3">
      <option value="SI">SI</option>
      <option value="NO">NO</option>
      <option value="NA" selected="selected">NA</option>
    </select></td>
    <td><select name="muros3e" id="muros3e">
      <option value="3">BUENO</option>
      <option value="2">REGULAR</option>
      <option value="1">MALO</option>
      <option value="0" selected="selected">NA</option>
    </select></td>
  </tr>
  <tr>
    <td class="Microtitulos">Muros en ladrillo confinados</td>
    <td><select name="muros4" id="muros4">
      <option value="SI">SI</option>
      <option value="NO">NO</option>
      <option value="NA" selected="selected">NA</option>
    </select></td>
    <td><select name="muros4e" id="muros4e">
      <option value="3">BUENO</option>
      <option value="2">REGULAR</option>
      <option value="1">MALO</option>
      <option value="0" selected="selected">NA</option>
    </select></td>
  </tr>
  <tr>
    <td class="Microtitulos">Porticos</td>
    <td><select name="muros5" id="muros5">
      <option value="SI">SI</option>
      <option value="NO">NO</option>
      <option value="NA" selected="selected">NA</option>
    </select></td>
    <td><select name="muros5e" id="muros5e">
      <option value="3">BUENO</option>
      <option value="2">REGULAR</option>
      <option value="1">MALO</option>
      <option value="0" selected="selected">NA</option>
    </select></td>
  </tr>
  <tr>
    <td class="Microtitulos">Otros</td>
    <td><select name="muros6" id="muros6">
      <option value="SI">SI</option>
      <option value="NO">NO</option>
      <option value="NA" selected="selected">NA</option>
    </select></td>
    <td><select name="muros6e" id="muros6e">
      <option value="3">BUENO</option>
      <option value="2">REGULAR</option>
      <option value="1">MALO</option>
      <option value="0" selected="selected">NA</option>
    </select></td>
  </tr>

  <tr>
    <td colspan="2"><HR></td>
    </tr>

  <tr>
    <td class="Microtitulos">Realizo la Visita</td>
    <td><input name="nombrevisito" type="text" id="nombrevisito"/></td>
    </tr>
  <tr>
    <td class="Microtitulos">Identificacion</td>
    <td><input name="documentovisito" type="text" id="documentovisito" onkeypress="return acceptNum(event)"/></td>
    </tr>

  <tr>
    <td colspan="2"><HR></td>
    </tr>

  <tr>
    <td class="Microtitulos">Atendio la Visita</td>
    <td><input name="nombreatendio" type="text" id="nombreatendio"/></td>
    </tr>
  <tr>
    <td class="Microtitulos">Identificacion</td>
    <td><input name="documentoatendio" type="text" id="documentoatendio" onkeypress="return acceptNum(event)"/></td>
    </tr>
  </table><HR>
<table width="700" border="0">
  <tr>
    <td class="TituloFICHAS">observaciones</td>
    </tr>
  <tr>
    <td><textarea name="observaciones" id="observaciones" cols="90" rows="5" onkeyup="this.value=this.value.toUpperCase()"></textarea></td>
    </tr>
  <tr>
   <td><input name="button" type="submit" class="Botones" id="button" value="Registrar Visita" /></td>
     </tr>
</table><HR>
</form>

<?php }
else
{
	echo "FICHA NO REGISRADA EN EL SISTEMA";
}
?>

</TD></TR>
</TABLE>

<HR><img src="imagenes/logotipo_pie.png" /><br><HR>
</center>
</body>
<?php mysqli_close($sle); ?></html>