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
//VERIFICAR ESPACIOS EN BLANCO
	function noespacios() {
		var er = new RegExp(/\s/);
		var web = document.getElementById('nombre1').value;
		if(er.test(web)){
			alert('No se permiten espacios en campo PRIMER NOMBRE');
			return false;
		}
		var web = document.getElementById('nombre2').value;
		if(er.test(web)){
			alert('No se permiten espacios en campo SEGUNDO NOMBRE');
			return false;
		}
		var web = document.getElementById('apellido1').value;
		if(er.test(web)){
			alert('No se permiten espacios en campo PRIMER APELLIDO');
			return false;
		}
		var web = document.getElementById('apellido2').value;
		if(er.test(web)){
			alert('No se permiten espacios en campo SEGUNDO APELLIDO');
			return false;
		}
		
		//VERIFICA CAMPOS VACIOS
		if(document.getElementById('nombre1').value==''){
               alert('Debe ingresar por lo menos un nombre');
               return false;
        }  
		if(document.getElementById('apellido1').value==''){
               alert('Debe ingresar por lo menos un apellido');
               return false;
        }    
		if(document.getElementById('direccion').value==''){
               alert('Debe ingresar una direccion valida');
               return false;
        }   
		if((document.getElementById('fijo').value=='')&&(document.getElementById('celular').value=='')){
               alert('Debe ingresar un Telefono o Celular');
               return false;
        }    
			
		return true;
	}
	
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
<TR>
  <TD align="center"><?php
    $cedula = $_GET['cedula'];
    $base = $_GET['base'];
	mysqli_select_db($sle,$database_sle);
	mysqli_query($sle,"SET NAMES 'utf8'");
		
	$paso=0;	
    if (($base==0) && ($_SESSION["REU"] >= "2")) 
	{
		echo "<BR><font size='+2'>BASE DE DATOS - Por Reubicar</font><HR>";
		$sql="SELECT * FROM ciudadanos WHERE (cedula = '$cedula')";
		$resultado=mysqli_query($sle,$sql)or die (mysqli_error()); 
		if (mysqli_num_rows($resultado) > 0) $paso=1;
	}		
    if (($base==1) && ($_SESSION["MU"] >= "2"))  
	{
		echo "<BR><font size='+2'>BASE DE DATOS - Mejora Vivienda Urbana</font><HR>";
		$sql="SELECT * FROM ciudadanos WHERE (cedula = '$cedula')";
		$resultado=mysqli_query($sle,$sql)or die (mysqli_error()); 
		if (mysqli_num_rows($resultado) > 0) $paso=1;
	}		
    if (($base==2) && ($_SESSION["MR"] >= "2")) 
	{
		echo "<BR><font size='+2'>BASE DE DATOS - Mejora Vivienda Rural</font><HR>";
		$sql="SELECT * FROM ciudadanos WHERE (cedula = '$cedula')";
		$resultado=mysqli_query($sle,$sql)or die (mysqli_error()); 
		if (mysqli_num_rows($resultado) > 0) $paso=1;
	}
    if (($base==3) && ($_SESSION["VIS"] >= "2")) 
	{
		echo "<BR><font size='+2'>BASE DE DATOS - Vivienda Nueva</font><HR>";	
		$sql="SELECT * FROM ciudadanos WHERE (cedula = '$cedula')";
		$resultado=mysqli_query($sle,$sql)or die (mysqli_error()); 
		if (mysqli_num_rows($resultado) > 0) $paso=1;
	}		
    if (($base==4) && ($_SESSION["VIP"] >= "2")) 
	{
		echo "<BR><font size='+2'>BASE DE DATOS - Vivienda Interes Prioritario (VIP)</font><HR>";
		$sql="SELECT * FROM ciudadanos WHERE (cedula = '$cedula')";
		$resultado=mysqli_query($sle,$sql)or die (mysqli_error()); 
		if (mysqli_num_rows($resultado) > 0) $paso=1;
	}
    if (($base==5) && ($_SESSION["DES"] >= "2")) 
	{
		echo "<BR><font size='+2'>BASE DE DATOS - Poblacion en Condicion de Desplazamiento</font><HR>";	
		$sql="SELECT * FROM ciudadanos WHERE (cedula = '$cedula')";
		$resultado=mysqli_query($sle,$sql)or die (mysqli_error()); 
		if (mysqli_num_rows($resultado) > 0) $paso=1;
	}
    if (($base==6) && ($_SESSION["SP"] >= "2")) 
	{
		echo "<BR><font size='+2'>BASE DE DATOS - Construccion en Sitio Propio</font><HR>";	
		$sql="SELECT * FROM ciudadanos WHERE (cedula = '$cedula')";
		$resultado=mysqli_query($sle,$sql)or die (mysqli_error()); 
		if (mysqli_num_rows($resultado) > 0) $paso=1;
	}	
	
	if ($paso==1) 
	{
		$row = mysqli_fetch_row($resultado);	
	}
	else
	{
		echo "<CENTER><BR><BR>";
		echo "<BR>NO TIENE PERMISOS PARA ACCEDER A ESTA BASE DE DATOS<BR>";
		echo "<a href='menu.php'><input type='submit' class='Botones' name='Volver2' id='Volver2' value='Volver' /></a>";
		echo "</CENTER>";
		return;
	}
	
  ?></TD>
</TR>

<TR><TD align="center">
  <form name="form1" method="post" onsubmit="return noespacios()" action="editar1a.php">
   <table width="651" border="0" cellspacing="2">
   
      <tr>
        <td colspan="4" class="TituloFICHAS">DATOS BASICOS</td>
        </tr>   
      <tr>
        <td width="186" class="Microtitulos">Cedula</td>
        <td width="287"><label for="cedula"></label>
          <input name="cedula" type="text" id="cedula" onkeypress="return acceptNum(event)" readonly="readonly" <?php echo "value=". $cedula ?>></td>
        <td width="80">&nbsp;</td>
        <td width="80">&nbsp;</td>
      </tr>
      <tr>
        <td class="Microtitulos">Situacion Actual</td>
        <td><label for="situacion"></label>
          <select name="situacion" id="situacion">
            <option value="<?php echo $row['1']?>" selected="selected"><?php echo $row['1']?></option> 
            <option value="NO APLICA">NO APLICA</option>
            <option value="DESPLAZADOS">DESPLAZADOS</option>
            <option value="RED UNIDOS">RED UNIDOS</option>
            <option value="SISBEN">SISBEN</option>
            <option value="CABEZA DE HOGAR">CABEZA DE HOGAR</option>
            <option value="ZONA DE ALTO RIESGO">ZONA DE ALTO RIESGO</option>
            <option value="VICTIMA DE LA VIOLENCIA">VICTIMA DE LA VIOLENCIA</option>
          </select></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td class="Microtitulos">Situacion Laboral</td>
        <td><select name="laboral" id="laboral">
          <option value="<?php echo $row['53']?>" selected="selected"><?php echo $row['53']?></option> 
          <option value="NO APLICA">NO APLICA</option>
          <option value="EMPLEADO">EMPLEADO</option>
          <option value="INDEPENDIENTE">INDEPENDIENTE</option>
          <option value="PENSIONADO">PENSIONADO</option>
          <option value="DESEMPLEADO">DESEMPLEADO</option>
        </select></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td class="Microtitulos">Parentesco</td>
        <td><select name="parentesco" id="parentesco">
       	  <option value="<?php echo $row['2']?>" selected="selected"><?php echo $row['2']?></option> 
          <option value="REPRESENTANTE">REPRESENTANTE</option>
          <option value="JEFE">JEFE</option>
        </select></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td class="Microtitulos">1er Nombre</td>
        <td><input type="text" name="nombre1" id="nombre1" onkeyup="this.value=this.value.toUpperCase()" value="<?php echo $row[3] ?>"></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td class="Microtitulos">2do Nombre</td>
        <td><input type="text" name="nombre2" id="nombre2" onkeyup="this.value=this.value.toUpperCase()" value="<?php echo $row[4] ?>"></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td class="Microtitulos">1er Apellido</td>
        <td><input type="text" name="apellido1" id="apellido1" onkeyup="this.value=this.value.toUpperCase()" value="<?php echo $row[5] ?>"></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td class="Microtitulos">2do Apellido</td>
        <td><input type="text" name="apellido2" id="apellido2" onkeyup="this.value=this.value.toUpperCase()" value="<?php echo $row[6] ?>"></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td class="Microtitulos">Fecha de nacimiento</td>
        <td><input name="edad" type="date" id="edad" value="<?php echo $row[7] ?>" /></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td class="Microtitulos">Direccion</td>
        <td><input name="direccion" type="text" id="direccion" size="50" onkeyup="this.value=this.value.toUpperCase()" value="<?php echo $row[8] ?>"></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td class="Microtitulos">Barrio</td>
        <td><input name="barrio" type="text" id="barrio" size="40" onkeyup="this.value=this.value.toUpperCase()" value="<?php echo $row[9] ?>"></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td class="Microtitulos">Comuna</td>
        <td><input type="text" name="comuna" id="comuna" onkeyup="this.value=this.value.toUpperCase()" value="<?php echo $row[10] ?>"></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td class="Microtitulos">Zona</td>
        <td><select name="zona" id="zona">
          <option value="<?php echo $row['11']?>" selected="selected"><?php echo $row['11']?></option> 
          <option value="URBANA">URBANA</option>
          <option value="RURAL">RURAL</option>
        </select></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td class="Microtitulos">Telefono Fijo</td>
        <td><input name="fijo" type="text" id="fijo" size="24" maxlength="7"  onkeypress="return acceptNum(event)" value="<?php echo $row[12] ?>"></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td class="Microtitulos">Telefono Celular</td>
        <td><input name="celular" type="text" id="celular" maxlength="10"  onkeypress="return acceptNum(event)" value="<?php echo $row[13] ?>"></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      
       <tr>
        <td class="Microtitulos">Email</td>
        <td><input name="email" type="text" id="email" size="20" onkeyup="this.value=this.value.toUpperCase()" value="<?php echo $row[30] ?>"></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>     
      
      <tr>
        <td class="Microtitulos">Observaciones</td>
        <td><label for="observaciones"></label>
          <textarea name="observaciones" id="observaciones" cols="45" rows="5" onkeyup="this.value=this.value.toUpperCase()"><?php echo $row[14] ?></textarea></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td class="Microtitulos">Fecha de Registro</td>
        <td><input name="fecha" type="date" id="fecha" value="<?php echo $row[15] ?>" readonly="readonly" /></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td class="Microtitulos">Fecha ultima actualizacion</td>
        <td><input name="fecha_actualizacion" type="date" id="fecha_actualizacion" <?php echo "value=". date('Y-m-d') ?> readonly="readonly" /></td>
        <td class="Microtitulos">Documento</td>
        <td class="Microtitulos">Fecha Nac.</td>
      </tr>
      
      <tr>
        <td class="Microtitulos">Familiar 1</td>
        <td><input name="familiar1" type="text" id="familiar1" size="50" onkeyup="this.value=this.value.toUpperCase()" value="<?php echo $row[17] ?>"></td>
        <td><input name="docu1" type="text" id="docu1" onkeypress="return acceptNum(event)" value="<?php echo $row[62] ?>"/></td>
        <td><input name="edad1" type="date" id="edad1" value="<?php echo $row[43] ?>"></td>
      </tr>
      <tr>
        <td class="Microtitulos">Familiar 2</td>
        <td><input name="familiar2" type="text" id="familiar2" size="50" onkeyup="this.value=this.value.toUpperCase()" value="<?php echo $row[18] ?>"></td>
        <td><input name="docu2" type="text" id="docu2" onkeypress="return acceptNum(event)" value="<?php echo $row[63] ?>"/></td>
        <td><input name="edad2" type="date" id="edad2" value="<?php echo $row[44] ?>"></td>
      </tr>
      <tr>
        <td class="Microtitulos">Familiar 3</td>
        <td><input name="familiar3" type="text" id="familiar3" size="50" onkeyup="this.value=this.value.toUpperCase()" value="<?php echo $row[19] ?>"></td>
        <td><input name="docu3" type="text" id="docu3" onkeypress="return acceptNum(event)" value="<?php echo $row[64] ?>"/></td>
        <td><input name="edad3" type="date" id="edad3" value="<?php echo $row[45] ?>"></td>
      </tr>
      <tr>
        <td class="Microtitulos">Familiar 4</td>
        <td><input name="familiar4" type="text" id="familiar4" size="50" onkeyup="this.value=this.value.toUpperCase()" value="<?php echo $row[20] ?>"></td>
        <td><input name="docu4" type="text" id="docu4" onkeypress="return acceptNum(event)" value="<?php echo $row[65] ?>"/></td>
        <td><input name="edad4" type="date" id="edad4" value="<?php echo $row[46] ?>"></td>
      </tr>
      <tr>
        <td class="Microtitulos">Familiar 5</td>
        <td><input name="familiar5" type="text" id="familiar5" size="50" onkeyup="this.value=this.value.toUpperCase()" value="<?php echo $row[21] ?>"></td>
        <td><input name="docu5" type="text" id="docu5" onkeypress="return acceptNum(event)" value="<?php echo $row[66] ?>"/></td>
        <td><input name="edad5" type="date" id="edad5" value="<?php echo $row[47] ?>"></td>
      </tr>
      <tr>
        <td class="Microtitulos">Familiar 6</td>
        <td><input name="familiar6" type="text" id="familiar6" size="50" onkeyup="this.value=this.value.toUpperCase()" value="<?php echo $row[22] ?>"></td>
        <td><input name="docu6" type="text" id="docu6" onkeypress="return acceptNum(event)" value="<?php echo $row[67] ?>"/></td>
        <td><input name="edad6" type="date" id="edad6" value="<?php echo $row[48] ?>"></td>
      </tr>
      <tr>
        <td class="Microtitulos">Familiar 7</td>
        <td><input name="familiar7" type="text" id="familiar7" size="50" onkeyup="this.value=this.value.toUpperCase()" value="<?php echo $row[23] ?>"></td>
        <td><input name="docu7" type="text" id="docu7" onkeypress="return acceptNum(event)" value="<?php echo $row[68] ?>"/></td>
        <td><input name="edad7" type="date" id="edad7" value="<?php echo $row[49] ?>"></td>
      </tr>
      <tr>
        <td class="Microtitulos">Familiar 8</td>
        <td><input name="familiar8" type="text" id="familiar8" size="50" onkeyup="this.value=this.value.toUpperCase()" value="<?php echo $row[24] ?>"></td>
        <td><input name="docu8" type="text" id="docu8" onkeypress="return acceptNum(event)" value="<?php echo $row[69] ?>"/></td>
        <td><input name="edad8" type="date" id="edad8" value="<?php echo $row[50] ?>"></td>
      </tr>
      <tr>
        <td class="Microtitulos">Familiar 9</td>
        <td><input name="familiar9" type="text" id="familiar9" size="50" onkeyup="this.value=this.value.toUpperCase()" value="<?php echo $row[25] ?>"></td>
        <td><input name="docu9" type="text" id="docu9" onkeypress="return acceptNum(event)" value="<?php echo $row[70] ?>"/></td>
        <td><input name="edad9" type="date" id="edad9" value="<?php echo $row[51] ?>"></td>
      </tr>
      <tr>
        <td class="Microtitulos">Familiar 10</td>
        <td><input name="familiar10" type="text" id="familiar10" size="50" onkeyup="this.value=this.value.toUpperCase()" value="<?php echo $row[26] ?>"></td>
        <td><input name="docu10" type="text" id="docu10" onkeypress="return acceptNum(event)" value="<?php echo $row[71] ?>"/></td>
        <td><input name="edad10" type="date" id="edad10" value="<?php echo $row[52] ?>"></td>
      </tr>
   
       <tr>
        <td class="Microtitulos">Personas del Grupo Familiar N°</td>
        <td><input name="cantidad_gf" type="text" id="cantidad_gf" size="5" onkeypress="return acceptNum(event)" value="<?php echo $row[36] ?>"></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td class="Microtitulos">Madre Cabeza de Hogar</td>
        <td><select name="madre_ch" id="madre_ch">
          <option value="<?php echo $row[37]?>" selected="selected"><?php echo $row[37]?></option>
          <option value="NO">NO</option>
          <option value="SI">SI</option>
        </select></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td class="Microtitulos">Poblacion Dependiente</td>
        <td><select name="poblacion_depe" id="poblacion_depe">
          <option value="<?php echo $row[38]?>" selected="selected"><?php echo $row[38]?></option>
          <option value="NO">NO</option>
          <option value="SI">SI</option>
        </select></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td class="Microtitulos">Grupo Etnico</td>
        <td><select name="grupo_etnico" id="grupo_etnico">
          <option value="<?php echo $row[39]?>" selected="selected"><?php echo $row[39]?></option>
          <option value="NO APLICA">NO APLICA</option>
          <option value="RAIZAL">RAIZAL</option>
          <option value="PALENQUE">PALENQUE</option>
          <option value="AFRODESCENDIENTE">AFRODESCENDIENTE</option>
        </select></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td class="Microtitulos">Encuesta Telefonica</td>
        <td><select name="encuestado_tel" id="encuestado_tel">
          <option value="<?php echo $row[40]?>" selected="selected"><?php echo $row[40]?></option>
          <option value="NO">NO</option>
          <option value="SI">SI</option>
        </select></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td class="Microtitulos">Encuesta Personalizada</td>
        <td><select name="encuestado_per" id="encuestado_per">
          <option value="<?php echo $row[41]?>" selected="selected"><?php echo $row[41]?></option>
          <option value="NO">NO</option>
          <option value="SI">SI</option>
        </select></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td class="Microtitulos">Visitado en Sitio</td>
        <td><select name="visitado" id="visitado">
          <option value="<?php echo $row[42]?>" selected="selected"><?php echo $row[42]?></option>
          <option value="NO">NO</option>
          <option value="SI">SI</option>
        </select></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>  
      
      <tr>
        <td colspan="4" class="TituloFICHAS">INFORMACION FINANCIERA</td>
        </tr>     
      
		   <tr>
           <td class="MicrotitulosFINANCIERO">Valor Ahorrado</td>
           <td><input name="valorahorrado" type="text" id="valorahorrado" maxlength="30"  onkeypress="return acceptNum(event)" value="<?php echo $row[27] ?>"></td>
           </tr>
	       <tr>
           <td class="MicrotitulosFINANCIERO">Entidad</td>
           <td><input name="entidad" type="text" id="entidad" size="50" onkeyup="this.value=this.value.toUpperCase()" value="<?php echo $row[28] ?>"></td>
           </tr> 
           <tr>
           <td class="MicrotitulosFINANCIERO">N° de Cuenta</td>
           <td><input name="numcuenta" type="text" id="numcuenta" maxlength="50" value="<?php echo $row[29] ?>"></td>
           </tr>		
           <tr>
           <td class="MicrotitulosFINANCIERO">Fecha de Retiro Postulante</td>
           <td><input name="retiro" type="date" id="retiro" value="<?php echo $row[54] ?>"></td>
           </tr>	  
	       <tr>
           <td class="MicrotitulosFINANCIERO">Preaprobado Entidad</td>
           <td><input name="preaprobadoentidad" type="text" id="preaprobadoentidad" size="50" onkeyup="this.value=this.value.toUpperCase()" value="<?php echo $row[74] ?>"/></td>
           </tr> 
           <tr>
           <td class="MicrotitulosFINANCIERO">Preaprobado Valor</td>
           <td><input name="preaprobadovalor" type="text" id="preaprobadovalor" maxlength="50" onkeypress="return acceptNum(event) " value="<?php echo $row[72] ?>"/></td>
           </tr>	
	       <tr>
           <td class="MicrotitulosFINANCIERO">Cesantias Entidad</td>
           <td><input name="cesantiasentidad" type="text" id="cesantiasentidad" size="50" onkeyup="this.value=this.value.toUpperCase()" value="<?php echo $row[76] ?>"/></td>
           </tr> 
           <tr>
           <td class="MicrotitulosFINANCIERO">Cesantias Valor</td>
           <td><input name="cesantiasvalor" type="text" id="cesantiasvalor" maxlength="50" onkeypress="return acceptNum(event)" value="<?php echo $row[75] ?>"/></td>
           </tr>	
           
                 <tr>
        <td colspan="4" class="TituloFICHAS">INFORMACION DE RIESGO</td>
        </tr>           
            		  
		   <tr>
           <td class="MicrotitulosRIESGO">N° Radicado</td>
           <td><input name="radicado" type="text" id="radicado" maxlength="30" value="<?php echo $row[60] ?>" onkeyup="this.value=this.value.toUpperCase()"/></td>
           </tr>
	       <tr>
           <td class="MicrotitulosRIESGO">Entidad Remitente</td>
           <td><select name="ente_remite" id="ente_remite">
		   <option value="<?php echo $row[61] ?>" selected="selected"><?php echo $row[61] ?></option>
		   <option value="OTROS">OTROS</option>
           <option value="OMPADE">OMPADE</option>
           <option value="GOBIERNO">GOBIERNO</option>
           </select></td>
           </tr>   

	       <tr>
           <td class="MicrotitulosRIESGO">Tipo de evento</td>
           <td><select name="tipoevento" id="tipoevento">
		   <option value="<?php echo $row['16'] ?>" selected="selected"><?php echo $row['16']?></option> 
           <option value="NO APLICA">NO APLICA</option>
           <option value="HIDROLOGICO">HIDROLOGICO</option>
           <option value="GEOLOGICO">GEOLOGICO</option>
		   <option value="CONSTRUCTIVO">CONSTRUCTIVO</option>
		   <option value="HIDROLOGICO - GEOLOGICO">HIDROLOGICO - GEOLOGICO</option>
           </select></td>
           </tr>  

      <tr>
        <td class="MicrotitulosRIESGO">Ubicado en Zona de Riesgo</td>
        <td><select name="zona_riesgo" id="zona_riesgo">
          <option value="<?php echo $row[35]?>" selected="selected"><?php echo $row[35]?></option>
          <option value="NO">NO</option>
          <option value="SI">SI</option>
        </select></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>

            <tr>
        <td colspan="4" class="TituloFICHAS">INFORMACION DE LA VIVIENDA</td>
        </tr>

      <tr>
        <td class="MicrotitulosHOGAR">Inmueble Reside Actualmente</td>
        <td><select name="inmueble_actual" id="inmueble_actual">
          <option value="<?php echo $row[31]?>" selected="selected"><?php echo $row[31]?></option>
          <option value="PROPIETARIO">PROPIETARIO</option>
          <option value="ARRENDATARIO">ARRENDATARIO</option>
          <option value="POSECION">POSECION</option>
          <option value="INVASION">INVASION</option>
        </select></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td class="MicrotitulosHOGAR">Inmueble Titulo de Propiedad</td>
        <td><input name="inmueble_titulo" type="text" id="inmueble_titulo" size="20" onkeyup="this.value=this.value.toUpperCase()" value="<?php echo $row[32] ?>"></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td class="MicrotitulosHOGAR">Inmueble Matricula Inmob.</td>
        <td><input name="inmueble_matricula" type="text" id="inmueble_matricula" size="30" onkeyup="this.value=this.value.toUpperCase()" value="<?php echo $row[56] ?>"></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td class="MicrotitulosHOGAR">Inmueble Ficha Catastra</td>
        <td><input name="inmueble_catastral" type="text" id="inmueble_catastral" size="30" onkeyup="this.value=this.value.toUpperCase()" value="<?php echo $row[57] ?>"></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td class="MicrotitulosHOGAR">Inmueble N° Escritura</td>
        <td><input name="inmueble_escritura" type="text" id="inmueble_escritura" size="30" onkeyup="this.value=this.value.toUpperCase()" value="<?php echo $row[58] ?>"></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td class="MicrotitulosHOGAR">Inmueble Tiempo Habitado</td>
        <td><input name="inmueble_tiempo" type="text" id="inmueble_tiempo" size="20" onkeypress="return acceptNum(event)" value="<?php echo $row[33] ?>"></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td class="MicrotitulosHOGAR">Inmueble tipo de Material</td>
        <td><select name="inmueble_material" id="inmueble_material">
          <option value="<?php echo $row[34]?>" selected="selected"><?php echo $row[34]?></option>
          <option value="MATERIAL">MATERIAL</option>
          <option value="MADERA">MADERA</option>
          <option value="LAMINA">LAMINA</option>
          <option value="CARTON">CARTON</option>
        </select></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td class="MicrotitulosHOGAR">Inmueble Servicios Publicos</td>
        <td><select name="inmueble_servicios" id="inmueble_servicios">
          <option value="<?php echo $row[59]?>" selected="selected"><?php echo $row[59]?></option>
          <option value="SI">SI</option>
          <option value="NO">NO</option>
        </select></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td class="MicrotitulosHOGAR">Tipo de solicitud de mejoramiento</td>
        <td><select name="inmueble_solicitud" id="inmueble_solicitud">
          <option value="<?php echo $row[77]?>" selected="selected"><?php echo $row[77]?></option>
          <option value="NA">NA</option>
          <option value="BAÑO">BAÑO</option>
          <option value="COCINA">COCINA</option>
          <option value="LAVADERO">LAVADERO</option>
          <option value="ALCANTARILLADO">ALCANTARILLADO</option>
          <option value="MUROS">MUROS</option>
          <option value="REFUERZO ESTRUCTURAL">REFUERZO ESTRUCTURAL</option>
          <option value="TECHO O CUBIERTA">TECHO O CUBIERTA</option>
          <option value="PISO">PISO</option>
        </select></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><input type="hidden" name="base" id="base" <?php echo "value=". $base ?>/></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><input name="button" type="submit" class="Botones" id="button" value="Guardar Cambios" /></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    </table>
  </form>
  <p>&nbsp;</p></TD></TR>
</TABLE>

<HR><img src="imagenes/logotipo_pie.png" /><br><HR>
</center>
</body>
<?php mysqli_close($sle); ?></html>