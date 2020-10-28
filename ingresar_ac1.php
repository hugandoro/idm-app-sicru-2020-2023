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
	function noespacios(B) {
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
		//REUBICADOS *********************************************
		//********************************************************
		if (B=='0') 
		{
		  if(document.getElementById('parentesco').value==''){
               alert('REUBICADOS - Requiere *** PARENTESCO ***');
               return false;
          } 
		  if(document.getElementById('nombre1').value==''){
               alert('REUBICADOS - Requiere *** NOMBRE 1 ***');
               return false;
          }  
		  if(document.getElementById('apellido1').value==''){
               alert('REUBICADOS - Requiere *** APELLIDO 1 ***');
               return false;
          }     
		  if(document.getElementById('direccion').value==''){
               alert('REUBICADOS - Requiere *** DIRECCION ***');
               return false;
          }  
		  if(document.getElementById('barrio').value==''){
               alert('REUBICADOS - Requiere *** BARRIO ***');
               return false;
          }   
		  if(document.getElementById('zona').value==''){
               alert('REUBICADOS - Requiere *** ZONA ***');
               return false;
          } 
		  if((document.getElementById('fijo').value=='')&&(document.getElementById('celular').value=='')){
               alert('REUBICADOS - Requiere *** FIJO O CELULAR ***');
               return false;
          } 
		  if(document.getElementById('radicado').value==''){
               alert('REUBICADOS - Requiere *** RADICADO ***');
               return false;
          } 
		  if(document.getElementById('ente_remite').value==''){
               alert('REUBICADOS - Requiere *** ENTE QUE REMITE ***');
               return false;
          } 
		  if(document.getElementById('tipoevento').value==''){
               alert('REUBICADOS - Requiere *** TIPO DE EVENTO ***');
               return false;
          } 
		  if(document.getElementById('zona_riesgo').value==''){
               alert('REUBICADOS - Requiere *** ZONA DE RIESGO ***');
               return false;
          } 
		  if(document.getElementById('inmueble_actual').value==''){
               alert('REUBICADOS - Requiere *** INMUEBLE ACTUAL ***');
               return false;
          } 
		  if(document.getElementById('inmueble_titulo').value==''){
               alert('REUBICADOS - Requiere *** INMUEBLE TITULO ***');
               return false;
          } 
		  if(document.getElementById('inmueble_tiempo').value==''){
               alert('REUBICADOS - Requiere *** INMUEBLE TIEMPO ***');
               return false;
          } 
		  if(document.getElementById('inmueble_material').value==''){
               alert('REUBICADOS - Requiere *** INMUEBLE MATERIAL ***');
               return false;
          } 
		  if(document.getElementById('inmueble_servicios').value==''){
               alert('REUBICADOS - Requiere *** INMUEBLE SERVICIOS ***');
               return false;
          } 
		}
		//*****************************************************************
		//*****************************************************************
		
		//VERIFICA CAMPOS VACIOS
		//MEJORAMIENTO URBANO*************************************
		//********************************************************
		if (B=='1') 
		{
		  if(document.getElementById('parentesco').value==''){
               alert('MEJ. URBANO - Requiere *** PARENTESCO ***');
               return false;
          } 
		  if(document.getElementById('nombre1').value==''){
               alert('MEJ. URBANO - Requiere *** NOMBRE 1 ***');
               return false;
          }  
		  if(document.getElementById('apellido1').value==''){
               alert('MEJ. URBANO - Requiere *** APELLIDO 1 ***');
               return false;
          }     
		  if(document.getElementById('direccion').value==''){
               alert('MEJ. URBANO - Requiere *** DIRECCION ***');
               return false;
          }  
		  if(document.getElementById('barrio').value==''){
               alert('MEJ. URBANO - Requiere *** BARRIO ***');
               return false;
          }   
		  if(document.getElementById('zona').value==''){
               alert('MEJ. URBANO - Requiere *** ZONA ***');
               return false;
          } 
		  if((document.getElementById('fijo').value=='')&&(document.getElementById('celular').value=='')){
               alert('MEJ. URBANO - Requiere *** FIJO O CELULAR ***');
               return false;
          } 
		  if(document.getElementById('inmueble_actual').value==''){
               alert('MEJ. URBANO - Requiere *** INMUEBLE ACTUAL ***');
               return false;
          } 
		  if(document.getElementById('inmueble_titulo').value==''){
               alert('MEJ. URBANO - Requiere *** INMUEBLE TITULO ***');
               return false;
          } 
		  if(document.getElementById('inmueble_escritura').value==''){
               alert('MEJ. URBANO - Requiere *** INMUEBLE ESCRITURA ***');
               return false;
          } 
		  if(document.getElementById('inmueble_servicios').value==''){
               alert('MEJ. URBANO - Requiere *** INMUEBLE SERVICIOS ***');
               return false;
          } 
		  if(document.getElementById('inmueble_solicitud').value==''){
               alert('MEJ. URBANO - Requiere *** INMUEBLE TIPO SOLICITUD ***');
               return false;
          } 
		}
		//*****************************************************************
		//*****************************************************************

		//VERIFICA CAMPOS VACIOS
		//MEJORAMIENTO RURAL *************************************
		//********************************************************
		if (B=='2') 
		{
		  if(document.getElementById('parentesco').value==''){
               alert('MEJ. RURAL - Requiere *** PARENTESCO ***');
               return false;
          } 
		  if(document.getElementById('nombre1').value==''){
               alert('MEJ. RURAL - Requiere *** NOMBRE 1 ***');
               return false;
          }  
		  if(document.getElementById('apellido1').value==''){
               alert('MEJ. RURAL - Requiere *** APELLIDO 1 ***');
               return false;
          }     
		  if(document.getElementById('direccion').value==''){
               alert('MEJ. RURAL - Requiere *** DIRECCION ***');
               return false;
          }  
		  if(document.getElementById('barrio').value==''){
               alert('MEJ. RURAL - Requiere *** BARRIO ***');
               return false;
          }   
		  if(document.getElementById('zona').value==''){
               alert('MEJ. RURAL - Requiere *** ZONA ***');
               return false;
          } 
		  if((document.getElementById('fijo').value=='')&&(document.getElementById('celular').value=='')){
               alert('MEJ. RURAL - Requiere *** FIJO O CELULAR ***');
               return false;
          } 
		  if(document.getElementById('inmueble_actual').value==''){
               alert('MEJ. RURAL - Requiere *** INMUEBLE ACTUAL ***');
               return false;
          } 
		  if(document.getElementById('inmueble_titulo').value==''){
               alert('MEJ. RURAL - Requiere *** INMUEBLE TITULO ***');
               return false;
          } 
		  if(document.getElementById('inmueble_servicios').value==''){
               alert('MEJ. RURAL - Requiere *** INMUEBLE SERVICIOS ***');
               return false;
          } 
		  if(document.getElementById('inmueble_solicitud').value==''){
               alert('MEJ. RURAL - Requiere *** INMUEBLE TIPO SOLICITUD ***');
               return false;
          } 
		}
		//*****************************************************************
		//*****************************************************************
   		
		//VERIFICA CAMPOS VACIOS
		//VIVIENDA VIS *******************************************
		//********************************************************
		if (B=='3') 
		{
		  if(document.getElementById('parentesco').value==''){
               alert('VIVIENDA NUEVA - Requiere *** PARENTESCO ***');
               return false;
          } 
		  if(document.getElementById('nombre1').value==''){
               alert('VIVIENDA NUEVA - Requiere *** NOMBRE 1 ***');
               return false;
          }  
		  if(document.getElementById('apellido1').value==''){
               alert('VIVIENDA NUEVA - Requiere *** APELLIDO 1 ***');
               return false;
          }     
		  if(document.getElementById('direccion').value==''){
               alert('VIVIENDA NUEVA - Requiere *** DIRECCION ***');
               return false;
          }  
		  if(document.getElementById('barrio').value==''){
               alert('VIVIENDA NUEVA - Requiere *** BARRIO ***');
               return false;
          }   
		  if(document.getElementById('zona').value==''){
               alert('VIVIENDA NUEVA - Requiere *** ZONA ***');
               return false;
          } 
		  if((document.getElementById('fijo').value=='')&&(document.getElementById('celular').value=='')){
               alert('VIVIENDA NUEVA - Requiere *** FIJO O CELULAR ***');
               return false;
          } 
		  if(document.getElementById('valorahorrado').value==''){
               alert('VIVIENDA NUEVA - Requiere *** VALOER AHORRADO ***');
               return false;
          } 
		  if(document.getElementById('entidad').value==''){
               alert('VIVIENDA NUEVA - Requiere *** ENTIDAD ***');
               return false;
          } 
		  if(document.getElementById('numcuenta').value==''){
               alert('VIVIENDA NUEVA - Requiere *** NUMERO DE CUENTA ***');
               return false;
          } 
		  if(document.getElementById('preaprobadoentidad').value==''){
               alert('VIVIENDA NUEVA - Requiere *** PREAPROBADO ENTIDAD ***');
               return false;
          } 
		  if(document.getElementById('preaprobadovalor').value==''){
               alert('VIVIENDA NUEVA - Requiere *** PREAPROBADO VALOR ***');
               return false;
          } 
		}
		//*****************************************************************
		//*****************************************************************
		
		//VERIFICA CAMPOS VACIOS
		//VIVIENDA VIP *******************************************
		//********************************************************
		if (B=='4') 
		{
		  if(document.getElementById('parentesco').value==''){
               alert('VIVIENDA VIP - Requiere *** PARENTESCO ***');
               return false;
          } 
		  if(document.getElementById('nombre1').value==''){
               alert('VIVIENDA VIP - Requiere *** NOMBRE 1 ***');
               return false;
          }  
		  if(document.getElementById('apellido1').value==''){
               alert('VIVIENDA VIP - Requiere *** APELLIDO 1 ***');
               return false;
          }     
		  if(document.getElementById('direccion').value==''){
               alert('VIVIENDA VIP - Requiere *** DIRECCION ***');
               return false;
          }  
		  if(document.getElementById('barrio').value==''){
               alert('VIVIENDA VIP - Requiere *** BARRIO ***');
               return false;
          }   
		  if(document.getElementById('zona').value==''){
               alert('VIVIENDA VIP - Requiere *** ZONA ***');
               return false;
          } 
		  if((document.getElementById('fijo').value=='')&&(document.getElementById('celular').value=='')){
               alert('VIVIENDA VIP - Requiere *** FIJO O CELULAR ***');
               return false;
          } 
		  if(document.getElementById('valorahorrado').value==''){
               alert('VIVIENDA VIP - Requiere *** VALOER AHORRADO ***');
               return false;
          } 
		  if(document.getElementById('entidad').value==''){
               alert('VIVIENDA VIP - Requiere *** ENTIDAD ***');
               return false;
          } 
		  if(document.getElementById('numcuenta').value==''){
               alert('VIVIENDA VIP - Requiere *** NUMERO DE CUENTA ***');
               return false;
          } 
		  if(document.getElementById('preaprobadoentidad').value==''){
               alert('VIVIENDA VIP - Requiere *** PREAPROBADO ENTIDAD ***');
               return false;
          } 
		  if(document.getElementById('preaprobadovalor').value==''){
               alert('VIVIENDA VIP - Requiere *** PREAPROBADO VALOR ***');
               return false;
          } 
		}
		//*****************************************************************
		//*****************************************************************
		
		//VERIFICA CAMPOS VACIOS
		//DESPLAZADOS ********************************************
		//********************************************************
		if (B=='5') 
		{
		  if(document.getElementById('parentesco').value==''){
               alert('DESPLAZADOS - Requiere *** PARENTESCO ***');
               return false;
          } 
		  if(document.getElementById('nombre1').value==''){
               alert('DESPLAZADOS - Requiere *** NOMBRE 1 ***');
               return false;
          }  
		  if(document.getElementById('apellido1').value==''){
               alert('DESPLAZADOS - Requiere *** APELLIDO 1 ***');
               return false;
          }     
		  if(document.getElementById('direccion').value==''){
               alert('DESPLAZADOS - Requiere *** DIRECCION ***');
               return false;
          }  
		  if(document.getElementById('barrio').value==''){
               alert('DESPLAZADOS - Requiere *** BARRIO ***');
               return false;
          }   
		  if(document.getElementById('zona').value==''){
               alert('DESPLAZADOS - Requiere *** ZONA ***');
               return false;
          } 
		  if((document.getElementById('fijo').value=='')&&(document.getElementById('celular').value=='')){
               alert('DESPLAZADOS - Requiere *** FIJO O CELULAR ***');
               return false;
          } 
		}
		//*****************************************************************
		//*****************************************************************

		//VERIFICA CAMPOS VACIOS
		//MEJORAMIENTO RURAL *************************************
		//********************************************************
		if (B=='6') 
		{
		  if(document.getElementById('parentesco').value==''){
               alert('SITIO PROPIO - Requiere *** PARENTESCO ***');
               return false;
          } 
		  if(document.getElementById('nombre1').value==''){
               alert('SITIO PROPIO - Requiere *** NOMBRE 1 ***');
               return false;
          }  
		  if(document.getElementById('apellido1').value==''){
               alert('SITIO PROPIO - Requiere *** APELLIDO 1 ***');
               return false;
          }     
		  if(document.getElementById('direccion').value==''){
               alert('SITIO PROPIO - Requiere *** DIRECCION ***');
               return false;
          }  
		  if(document.getElementById('barrio').value==''){
               alert('SITIO PROPIO - Requiere *** BARRIO ***');
               return false;
          }   
		  if(document.getElementById('zona').value==''){
               alert('SITIO PROPIO - Requiere *** ZONA ***');
               return false;
          } 
		  if((document.getElementById('fijo').value=='')&&(document.getElementById('celular').value=='')){
               alert('SITIO PROPIO - Requiere *** FIJO O CELULAR ***');
               return false;
          } 
		  if(document.getElementById('inmueble_actual').value==''){
               alert('SITIO PROPIO - Requiere *** INMUEBLE ACTUAL ***');
               return false;
          } 
		  if(document.getElementById('inmueble_titulo').value==''){
               alert('SITIO PROPIO - Requiere *** INMUEBLE TITULO ***');
               return false;
          } 
		  if(document.getElementById('inmueble_tiempo').value==''){
               alert('SITIO PROPIO - Requiere *** INMUEBLE TIEMPO ***');
               return false;
          } 
		  if(document.getElementById('inmueble_material').value==''){
               alert('SITIO PROPIO - Requiere *** INMUEBLE MATERIAL ***');
               return false;
          } 
		}
		//*****************************************************************
		//*****************************************************************
			
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
  <TD align="center">
  <?php
    $base = "NA";
  	if (isset($_POST['cedula'])) $cedula = $_POST['cedula'];
	if (isset($_POST['base'])) $base = $_POST['base'];
	
	if ($base=="NA") 
	{
		echo "<CENTER>";
		echo "<BR><BR>NO HAY UNA BASE DE DATOS SELECCIONADA<BR><BR>";
		echo "<a href='menu.php'><input type='submit' class='Botones' name='Volver2' id='Volver2' value='Volver' /></a>";
		echo "</CENTER>";
		return;
	}	
	
	$c1="";$c2="";$c3="";$c4="";$c5="";$c6="";$c7="";$c8="";$c9="";$c10="";
	$c11="";$c12="";$c13="";$c14="";$c15="";$c16="";$c17="";$c18="";$c19="";$c20="";
	$c21="";$c22="";$c23="";$c24="";$c25="";$c26="";$c27="";$c28="";$c29="";$c30="";
	$c31="";$c32="";$c33="";$c34="";$c35="";$c36="";$c37="";$c38="";$c39="";$c40="";
	$c41="";$c42="";$c43="";$c44="";$c45="";$c46="";$c47="";$c48="";$c49="";$c50="";
	$c51="";$c52="";$c53="";$c54="";$c55="";$c56="";$c57="";$c58="";$c59="";$c60="";
	$c61="";$c62="";$c63="";$c64="";$c65="";$c66="";$c67="";
	
	if ($base==0) //REUBICADOS
	{
	  $c4 = "#B3090D";$c5=$c4;$c7=$c4;$c10=$c4;$c11=$c4;$c13=$c4;$c14=$c4;$c15=$c4;$c55=$c4;$c56=$c4;$c57=$c4;$c58=$c4;$c59=$c4;$c60=$c4;$c64=$c4;$c65=$c4;$c66=$c4;
	}
	if ($base==1) //MEJORAMIENTO URBANO
	{
	  $c4 = "#B3090D";$c5=$c4;$c7=$c4;$c10=$c4;$c11=$c4;$c13=$c4;$c14=$c4;$c15=$c4;$c59=$c4;$c60=$c4;$c63=$c4;$c66=$c4;$c67=$c4;
	}
	if ($base==2) //MEJORAMIENTO RURAL
	{
	  $c4 = "#B3090D";$c5=$c4;$c7=$c4;$c10=$c4;$c11=$c4;$c13=$c4;$c14=$c4;$c15=$c4;$c59=$c4;$c60=$c4;$c66=$c4;$c67=$c4;
	}
	if ($base==3) //VIS
	{
	  $c4 = "#B3090D";$c5=$c4;$c7=$c4;$c10=$c4;$c11=$c4;$c13=$c4;$c14=$c4;$c15=$c4;$c47=$c4;$c48=$c4;$c49=$c4;$c51=$c4;$c52=$c4;
	}
	if ($base==4) //VIP
	{
	  $c4 = "#B3090D";$c5=$c4;$c7=$c4;$c10=$c4;$c11=$c4;$c13=$c4;$c14=$c4;$c15=$c4;$c47=$c4;$c48=$c4;$c49=$c4;$c51=$c4;$c52=$c4;
	}
	if ($base==5) //DESPLAZADOS
	{
	  $c4 = "#B3090D";$c5=$c4;$c7=$c4;$c10=$c4;$c11=$c4;$c13=$c4;$c14=$c4;$c15=$c4;
	}
	if ($base==6) //SITIO PROPIO
	{
	  $c4 = "#B3090D";$c5=$c4;$c7=$c4;$c10=$c4;$c11=$c4;$c13=$c4;$c14=$c4;$c15=$c4;$c59=$c4;$c60=$c4;$c64=$c4;$c65=$c4;
	}
	
	
	
	$paso=0;
    if (($base==0) && ($_SESSION["REU"] >= "3")) {
	  echo "<BR><font size='+3'>BASE DE DATOS - Por Reubicar</font><BR>";//BASE = 0 - Por Reubicar
	  $paso=1;
	}
    if (($base==1) && ($_SESSION["MU"] >= "3")) {
	  echo "<BR><font size='+3'>BASE DE DATOS - Mejora Vivienda Urbana</font><BR>";//BASE = 1 - Mejora Vivienda Urbana
	  $paso=1;
	}
    if (($base==2) && ($_SESSION["MR"] >= "3")) {
	  echo "<BR><font size='+3'>BASE DE DATOS - Mejora Vivienda Rural</font><BR>";//BASE = 2 - Mejora Vivienda Rural
	  $paso=1;
	}
    if (($base==3) && ($_SESSION["VIS"] >= "3")) {
	  echo "<BR><font size='+3'>BASE DE DATOS - Vivienda Nueva</font><BR>";//BASE = 3 - VIS
	  $paso=1;
	}
    if (($base==4) && ($_SESSION["VIP"] >= "3")) {
	  echo "<BR><font size='+3'>BASE DE DATOS - Vivienda Interes Prioritario (VIP)</font><BR>";//BASE = 4 - VIP	
	  $paso=1;
	}
    if (($base==5) && ($_SESSION["DES"] >= "3")) {
	  echo "<BR><font size='+3'>BASE DE DATOS - Desplazados</font><BR>";//BASE = 5 - Desplazados
	  $paso=1;
	}
    if (($base==6) && ($_SESSION["SP"] >= "3")) {
	  echo "<BR><font size='+3'>BASE DE DATOS - Construccion en Sitio Propio</font><BR>";//BASE = 6 - Construccion en Sitio Propio	
	  $paso=1;	  
	}
	
	if ($paso==0) 
	{
		echo "<CENTER>";
		echo "<BR><BR>NO TIENE PERMISOS PARA ACCEDER A ESTA BASE DE DATOS<BR><BR>";
		echo "<a href='menu.php'><input type='submit' class='Botones' name='Volver2' id='Volver2' value='Volver' /></a>";
		echo "</CENTER>";
		return;
	}
  ?>
  </TD>
</TR>

<TR><TD align="center">
  <form name="form1" method="post" onsubmit="return noespacios(<?php echo $base;?>)" action="ingresar_ac2.php">
    <table width="750" border="0" cellspacing="2">
      <tr>
        <td colspan="4" class="TituloFICHAS">DATOS BASICOS</td>
        </tr>
      <tr>
        <td width="102" class="Microtitulos">Cedula</td>
        <td width="350" bgcolor="<?php echo $c1?>"><label for="cedula"></label>
          <input name="cedula" type="text" id="cedula" onkeypress="return acceptNum(event)" readonly="readonly" <?php echo "value=". $cedula ?>></td>
        <td width="168">&nbsp;</td>
        <td width="104">&nbsp;</td>
      </tr>
      <tr>
        <td class="Microtitulos">Situacion Actual</td>
        <td bgcolor="<?php echo $c2?>"><label for="situacion"></label>
          <select name="situacion" id="situacion">
            <option value="NO APLICA" selected="selected">NO APLICA</option>
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
        <td bgcolor="<?php echo $c3?>"><select name="laboral" id="laboral">
          <option value="NO APLICA" selected="selected">NO APLICA</option>
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
        <td bgcolor="<?php echo $c4?>"><select name="parentesco" id="parentesco">
          <option value="REPRESENTANTE" selected="selected">REPRESENTANTE</option>
          <option value="JEFE">JEFE</option>
        </select></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td class="Microtitulos">1er Nombre</td>
        <td bgcolor="<?php echo $c5?>"><input type="text" name="nombre1" id="nombre1" onkeyup="this.value=this.value.toUpperCase()"/></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td class="Microtitulos">2do Nombre</td>
        <td bgcolor="<?php echo $c6?>"><input type="text" name="nombre2" id="nombre2" onkeyup="this.value=this.value.toUpperCase()"/></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td class="Microtitulos">1er Apellido</td>
        <td bgcolor="<?php echo $c7?>"><input type="text" name="apellido1" id="apellido1" onkeyup="this.value=this.value.toUpperCase()"/></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td class="Microtitulos">2do Apellido</td>
        <td bgcolor="<?php echo $c8?>"><input type="text" name="apellido2" id="apellido2" onkeyup="this.value=this.value.toUpperCase()"/></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td class="Microtitulos">Fecha de Nacimiento</td>
        <td bgcolor="<?php echo $c9?>"><input name="edad" type="date" id="edad"/></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td class="Microtitulos">Direccion</td>
        <td bgcolor="<?php echo $c10?>"><input name="direccion" type="text" id="direccion" size="50" onkeyup="this.value=this.value.toUpperCase()"/></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td class="Microtitulos">Barrio</td>
        <td bgcolor="<?php echo $c11?>"><input name="barrio" type="text" id="barrio" size="40" onkeyup="this.value=this.value.toUpperCase()"/></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td class="Microtitulos">Comuna</td>
        <td bgcolor="<?php echo $c12?>"><input type="text" name="comuna" id="comuna" onkeyup="this.value=this.value.toUpperCase()"/></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td class="Microtitulos">Zona</td>
        <td bgcolor="<?php echo $c13?>"><select name="zona" id="zona">
          <option value="URBANA" selected="selected">URBANA</option>
          <option value="RURAL">RURAL</option>
        </select></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td class="Microtitulos">Telefono Fijo</td>
        <td bgcolor="<?php echo $c14?>"><input name="fijo" type="text" id="fijo" size="24" maxlength="7"  onkeypress="return acceptNum(event)"/></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td class="Microtitulos">Telefono Celular</td>
        <td bgcolor="<?php echo $c15?>"><input name="celular" type="text" id="celular" maxlength="10"  onkeypress="return acceptNum(event)"/></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
     
      <tr>
        <td class="Microtitulos">Email</td>
        <td bgcolor="<?php echo $c16?>"><input name="email" type="text" id="email" size="20" onkeyup="this.value=this.value.toUpperCase()"/></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>      
      
      <tr>
        <td class="Microtitulos">Observaciones</td>
        <td bgcolor="<?php echo $c17?>"><label for="observaciones"></label>
          <textarea name="observaciones" id="observaciones" cols="45" rows="5" onkeyup="this.value=this.value.toUpperCase()"></textarea></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td class="Microtitulos">Fecha de Registro</td>
        <td bgcolor="<?php echo $c18?>"><input name="fecha" type="date" id="fecha" <?php echo "value=". date('Y-m-d') ?> readonly="readonly" /></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>

      <tr>
        <td class="Microtitulos">Fecha ultima actualizacion</td>
        <td bgcolor="<?php echo $c19?>"><input name="fecha_actualizacion" type="date" id="fecha_actualizacion" <?php echo "value=". date('Y-m-d') ?> readonly="readonly" /></td>
        <td class="Microtitulos">Documento</td>
        <td class="Microtitulos">Fecha Nac.</td>
      </tr>
      <tr>
        <td class="Microtitulos">Familiar 1</td>
        <td bgcolor="<?php echo $c20?>"><input name="familiar1" type="text" id="familiar1" size="50" onkeyup="this.value=this.value.toUpperCase()"/> </td>
        <td bgcolor="<?php echo $c21?>"><input name="docu1" type="text" id="docu1" onkeypress="return acceptNum(event)"/></td>
        <td><input name="edad1" type="date" id="edad1"/></td>
      </tr>
      <tr>
        <td class="Microtitulos">Familiar 2</td>
        <td bgcolor="<?php echo $c22?>"><input name="familiar2" type="text" id="familiar2" size="50" onkeyup="this.value=this.value.toUpperCase()"/></td>
        <td bgcolor="<?php echo $c23?>"><input name="docu2" type="text" id="docu2" onkeypress="return acceptNum(event)"/></td>
        <td><input name="edad2" type="date" id="edad2"/></td>
      </tr>
      <tr>
        <td class="Microtitulos">Familiar 3</td>
        <td bgcolor="<?php echo $c24?>"><input name="familiar3" type="text" id="familiar3" size="50" onkeyup="this.value=this.value.toUpperCase()"/></td>
        <td bgcolor="<?php echo $c25?>"><input name="docu3" type="text" id="docu3" onkeypress="return acceptNum(event)"/></td>
        <td><input name="edad3" type="date" id="edad3"/></td>
      </tr>
      <tr>
        <td class="Microtitulos">Familiar 4</td>
        <td bgcolor="<?php echo $c26?>"><input name="familiar4" type="text" id="familiar4" size="50" onkeyup="this.value=this.value.toUpperCase()"/></td>
        <td bgcolor="<?php echo $c27?>"><input name="docu4" type="text" id="docu4" onkeypress="return acceptNum(event)"/></td>
        <td><input name="edad4" type="date" id="edad4"/></td>
      </tr>
      <tr>
        <td class="Microtitulos">Familiar 5</td>
        <td bgcolor="<?php echo $c28?>"><input name="familiar5" type="text" id="familiar5" size="50" onkeyup="this.value=this.value.toUpperCase()"/></td>
        <td bgcolor="<?php echo $c29?>"><input name="docu5" type="text" id="docu5" onkeypress="return acceptNum(event)"/></td>
        <td><input name="edad5" type="date" id="edad5"/></td>
      </tr>
      <tr>
        <td class="Microtitulos">Familiar 6</td>
        <td bgcolor="<?php echo $c30?>"><input name="familiar6" type="text" id="familiar6" size="50" onkeyup="this.value=this.value.toUpperCase()"/></td>
        <td bgcolor="<?php echo $c31?>"><input name="docu6" type="text" id="docu6" onkeypress="return acceptNum(event)"/></td>
        <td><input name="edad6" type="date" id="edad6"/></td>
      </tr>
      <tr>
        <td class="Microtitulos">Familiar 7</td>
        <td bgcolor="<?php echo $c32?>"><input name="familiar7" type="text" id="familiar7" size="50" onkeyup="this.value=this.value.toUpperCase()"/></td>
        <td bgcolor="<?php echo $c33?>"><input name="docu7" type="text" id="docu7" onkeypress="return acceptNum(event)"/></td>
        <td><input name="edad7" type="date" id="edad7"/></td>
      </tr>
      <tr>
        <td class="Microtitulos">Familiar 8</td>
        <td bgcolor="<?php echo $c34?>"><input name="familiar8" type="text" id="familiar8" size="50" onkeyup="this.value=this.value.toUpperCase()"/></td>
        <td bgcolor="<?php echo $c35?>"><input name="docu8" type="text" id="docu8" onkeypress="return acceptNum(event)"/></td>
        <td><input name="edad8" type="date" id="edad8"/></td>
      </tr>
      <tr>
        <td class="Microtitulos">Familiar 9</td>
        <td bgcolor="<?php echo $c36?>"><input name="familiar9" type="text" id="familiar9" size="50" onkeyup="this.value=this.value.toUpperCase()"/></td>
        <td bgcolor="<?php echo $c37?>"><input name="docu9" type="text" id="docu9" onkeypress="return acceptNum(event)"/></td>
        <td><input name="edad9" type="date" id="edad9"/></td>
      </tr>
      <tr>
        <td class="Microtitulos">Familiar 10</td>
        <td bgcolor="<?php echo $c38?>"><input name="familiar10" type="text" id="familiar10" size="50" onkeyup="this.value=this.value.toUpperCase()"/></td>
        <td bgcolor="<?php echo $c39?>"><input name="docu10" type="text" id="docu10" onkeypress="return acceptNum(event)"/></td>
        <td><input name="edad10" type="date" id="edad10"/></td>
      </tr>
      
     <tr>
        <td class="Microtitulos">Personas del Grupo Familiar N°</td>
        <td bgcolor="<?php echo $c40?>"><input name="cantidad_gf" type="text" id="cantidad_gf" size="5" onkeypress="return acceptNum(event)"/></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td class="Microtitulos">Madre Cabeza de Hogar</td>
        <td bgcolor="<?php echo $c41?>"><select name="madre_ch" id="madre_ch">
          <option value="NO" selected="selected">NO</option>
          <option value="SI">SI</option>
        </select></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td class="Microtitulos">Poblacion Dependiente</td>
        <td bgcolor="<?php echo $c42?>"><select name="poblacion_depe" id="poblacion_depe">
          <option value="NO" selected="selected">NO</option>
          <option value="SI">SI</option>
        </select></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td class="Microtitulos">Grupo Etnico</td>
        <td bgcolor="<?php echo $c43?>"><select name="grupo_etnico" id="grupo_etnico">
          <option value="NO APLICA" selected="selected">NO APLICA</option>
          <option value="RAIZAL">RAIZAL</option>
          <option value="PALENQUE">PALENQUE</option>
          <option value="AFRODESCENDIENTE">AFRODESCENDIENTE</option>
        </select></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td class="Microtitulos">Encuesta Telefonica</td>
        <td bgcolor="<?php echo $c44?>"><select name="encuestado_tel" id="encuestado_tel">
          <option value="NO" selected="selected">NO</option>
          <option value="SI">SI</option>
        </select></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td class="Microtitulos">Encuesta Personalizada</td>
        <td bgcolor="<?php echo $c45?>"><select name="encuestado_per" id="encuestado_per">
          <option value="NO" selected="selected">NO</option>
          <option value="SI">SI</option>
        </select></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td class="Microtitulos">Visitado en Sitio</td>
        <td bgcolor="<?php echo $c46?>"><select name="visitado" id="visitado">
          <option value="NO" selected="selected">NO</option>
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
           <td bgcolor="<?php echo $c47?>"><input name="valorahorrado" type="text" id="valorahorrado"  onkeypress="return acceptNum(event)" size="30" maxlength="30"/></td>
           </tr>
	       <tr>
           <td class="MicrotitulosFINANCIERO">Entidad</td>
           <td bgcolor="<?php echo $c48?>"><input name="entidad" type="text" id="entidad" size="30" onkeyup="this.value=this.value.toUpperCase()"/></td>
           </tr> 
           <tr>
           <td class="MicrotitulosFINANCIERO">N° de Cuenta</td>
           <td bgcolor="<?php echo $c49?>"><input name="numcuenta" type="text" id="numcuenta" size="30" maxlength="50"/></td>
           </tr>		
		   <tr>
           <td class="MicrotitulosFINANCIERO">Fecha de Retiro</td>
           <td bgcolor="<?php echo $c50?>"><input name="retiro" type="date" id="retiro"/></td>
           </tr>	  
		  
	       <tr>
           <td class="MicrotitulosFINANCIERO">Preaprobado Entidad</td>
           <td bgcolor="<?php echo $c51?>"><input name="preaprobadoentidad" type="text" id="preaprobadoentidad" size="30" onkeyup="this.value=this.value.toUpperCase()"/></td>
           </tr> 
           <tr>
           <td class="MicrotitulosFINANCIERO">Preaprobado Valor</td>
           <td bgcolor="<?php echo $c52?>"><input name="preaprobadovalor" type="text" id="preaprobadovalor" onkeypress="return acceptNum(event)" size="30" maxlength="50"/></td>
           </tr>	

	       <tr>
           <td class="MicrotitulosFINANCIERO">Cesantias Entidad</td>
           <td bgcolor="<?php echo $c53?>"><input name="cesantiasentidad" type="text" id="cesantiasentidad" size="30" onkeyup="this.value=this.value.toUpperCase()"/></td>
           </tr> 
           <tr>
           <td class="MicrotitulosFINANCIERO">Cesantias Valor</td>
           <td bgcolor="<?php echo $c54?>"><input name="cesantiasvalor" type="text" id="cesantiasvalor" onkeypress="return acceptNum(event)" size="30" maxlength="50"/></td>
           </tr>	 
                 <tr>
        <td colspan="4" class="TituloFICHAS">INFORMACION DE RIESGO</td>
        </tr>
		   <tr>
           <td class="MicrotitulosRIESGO">N° Radicado</td>
           <td bgcolor="<?php echo $c55?>"><input name="radicado" type="text" id="radicado" maxlength="30"  onkeyup="this.value=this.value.toUpperCase()"/></td>
           </tr>
	       <tr>
           <td class="MicrotitulosRIESGO">Entidad Remitente</td>
           <td bgcolor="<?php echo $c56?>"><select name="ente_remite" id="ente_remite">
           <option value="OTROS" selected="selected">OTROS</option>
		   <option value="OMPADE">OMPADE</option>
           <option value="GOBIERNO">GOBIERNO</option>
           </select></td>
           </tr>   

	       <tr>
           <td class="MicrotitulosRIESGO">Tipo de evento</td>
           <td bgcolor="<?php echo $c57?>"><select name="tipoevento" id="tipoevento">
		   <option value="NO APLICA">NO APLICA</option>
           <option value="HIDROLOGICO">HIDROLOGICO</option>
           <option value="GEOLOGICO">GEOLOGICO</option>
		   <option value="CONSTRUCTIVO">CONSTRUCTIVO</option>
		   <option value="HIDROLOGICO - GEOLOGICO">HIDROLOGICO - GEOLOGICO</option>
           </select></td>
           </tr>  

      <tr>
        <td class="MicrotitulosRIESGO">Ubicado en Zona de Riesgo</td>
        <td bgcolor="<?php echo $c58?>"><select name="zona_riesgo" id="zona_riesgo">
          <option value="NO" selected="selected">NO</option>
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
        <td bgcolor="<?php echo $c59?>"><select name="inmueble_actual" id="inmueble_actual">
          <option value="FAMILIAR" selected="selected">FAMILIAR</option>
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
        <td bgcolor="<?php echo $c60?>"><input name="inmueble_titulo" type="text" id="inmueble_titulo" size="30" onkeyup="this.value=this.value.toUpperCase()"/></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td class="MicrotitulosHOGAR">Inmueble Matricula Inmob.</td>
        <td bgcolor="<?php echo $c61?>"><input name="inmueble_matricula" type="text" id="inmueble_matricula" size="30" onkeyup="this.value=this.value.toUpperCase()"/></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td class="MicrotitulosHOGAR">Inmueble Ficha Catastral</td>
        <td bgcolor="<?php echo $c62?>"><input name="inmueble_catastral" type="text" id="inmueble_catastral" size="30" onkeyup="this.value=this.value.toUpperCase()"/></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td class="MicrotitulosHOGAR">Inmueble N° Escritura</td>
        <td bgcolor="<?php echo $c63?>"><input name="inmueble_escritura" type="text" id="inmueble_escritura" size="30" onkeyup="this.value=this.value.toUpperCase()"/></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td class="MicrotitulosHOGAR">Inmueble Tiempo Habitado</td>
        <td bgcolor="<?php echo $c64?>"><input name="inmueble_tiempo" type="text" id="inmueble_tiempo" size="30" onkeypress="return acceptNum(event)"/></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td class="MicrotitulosHOGAR">Inmueble tipo de Material</td>
        <td bgcolor="<?php echo $c65?>"><select name="inmueble_material" id="inmueble_material">
          <option value="MATERIAL" selected="selected">MATERIAL</option>
          <option value="MADERA">MADERA</option>
          <option value="LAMINA">LAMINA</option>
          <option value="CARTON">CARTON</option>
        </select></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td class="MicrotitulosHOGAR">Inmueble Servicios Publicos</td>
        <td bgcolor="<?php echo $c66?>"><select name="inmueble_servicios" id="inmueble_servicios">
          <option value="SI">SI</option>
          <option value="NO">NO</option>
        </select></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td class="MicrotitulosHOGAR">Tipo de solicitud de mejoramiento</td>
        <td bgcolor="<?php echo $c67?>"><select name="inmueble_solicitud" id="inmueble_solicitud">
          <option value="NA" selected="selected">NA</option>
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
        <td><input type="hidden" name="base" id="base" <?php echo "value=". $base ?>></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><input name="button" type="submit" class="Botones" id="button" value="Registrar Ciudadano" /></td>
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