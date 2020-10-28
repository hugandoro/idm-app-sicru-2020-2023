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
<TR><TD align="center"><?php echo $Encabezado;?></TD></TR>  
</TABLE>
<TABLE width="800">
<TR><TD width="347" align="center">
  <CENTER>
  <table width="442" border="0">
    <tr>
      <td width="140"><img src="imagenes/Logotipo IDM.png" width="136" height="100" /></td>
      <td width="140" align="center"><span class="name"><font size="+3">SICRU</font><br />
        <br />
        Bienvenido al sistema de cruces SICRU 1.0</span></td>
      <td width="140" align="center"><img src="imagenes/OMPADE.jpg" width="79" height="100" /></td>
    </tr>
  </table></TD></TR>
<TR>
  <TD align="center">
  <?php
    $cedula = $_GET['cedula'];
    $base = $_GET['base'];
	mysqli_select_db($sle,$database_sle);
	mysqli_query($sle,"SET NAMES 'utf8'");
	$paso=0;
	
    if (($base==0) && ($_SESSION["REU"] >= "1")) 
	{
		echo "<BR><font size='+2'>BASE DE DATOS - Por Reubicar</font><HR>";
		$sql="SELECT * FROM ciudadanos WHERE (cedula = '$cedula')";
		$resultado=mysqli_query($sle,$sql)or die (mysqli_error()); 
		if (mysqli_num_rows($resultado) > 0) $paso=1;
	}		
    if (($base==1) && ($_SESSION["MU"] >= "1")) 
	{
		echo "<BR><font size='+2'>BASE DE DATOS - Mejora Vivienda Urbana</font><HR>";
		$sql="SELECT * FROM ciudadanos WHERE (cedula = '$cedula')";
		$resultado=mysqli_query($sle,$sql)or die (mysqli_error()); 
		if (mysqli_num_rows($resultado) > 0) $paso=1;
	}		
    if (($base==2) && ($_SESSION["MR"] >= "1")) 
	{
		echo "<BR><font size='+2'>BASE DE DATOS - Mejora Vivienda Rural</font><HR>";
		$sql="SELECT * FROM ciudadanos WHERE (cedula = '$cedula')";
		$resultado=mysqli_query($sle,$sql)or die (mysqli_error()); 
		if (mysqli_num_rows($resultado) > 0) $paso=1;
	}
    if (($base==3) && ($_SESSION["VIS"] >= "1")) 
	{
		echo "<BR><font size='+2'>BASE DE DATOS - Vivienda Nueva</font><HR>";	
		$sql="SELECT * FROM ciudadanos WHERE (cedula = '$cedula')";
		$resultado=mysqli_query($sle,$sql)or die (mysqli_error()); 
		if (mysqli_num_rows($resultado) > 0) $paso=1;
	}		
    if (($base==4) && ($_SESSION["VIP"] >= "1")) 
	{
		echo "<BR><font size='+2'>BASE DE DATOS - Vivienda Interes Prioritario (VIP)</font><HR>";
		$sql="SELECT * FROM ciudadanos WHERE (cedula = '$cedula')";
		$resultado=mysqli_query($sle,$sql)or die (mysqli_error()); 
		if (mysqli_num_rows($resultado) > 0) $paso=1;
	}
    if (($base==5) && ($_SESSION["DES"] >= "1")) 
	{
		echo "<BR><font size='+2'>BASE DE DATOS - Poblacion en Condicion de Desplazamiento</font><HR>";	
		$sql="SELECT * FROM ciudadanos WHERE (cedula = '$cedula')";
		$resultado=mysqli_query($sle,$sql)or die (mysqli_error()); 
		if (mysqli_num_rows($resultado) > 0) $paso=1;
	}
    if (($base==6) && ($_SESSION["SP"] >= "1")) 
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
		echo "NO TIENE PERMISOS PARA CONSULTAR ESTA BASE DE DATOS<BR><BR>";
		echo "<a href='menu.php'><input type='submit' name='Volver2' class='Botones' id='Volver2' value='Volver' /></a>";
		echo "</CENTER>";
		return;
	}
  ?>
  </TD>
</TR>

<TR><TD align="center">
    <table width="800" border="0" cellspacing="2">
      <tr>
        <td colspan="4" class="TituloFICHAS">DATOS BASICOS</td>
        </tr>        
    
      <tr>
        <td width="150" bgcolor="#FFFFFF" class="Microtitulos">Cedula</td>
        <td width="350"><label for="cedula"><?php echo $row[0] ?></label></td>
        <td bgcolor="#FFFFFF" class="Microtitulos">Fecha de Registro</td>
        <td width="150"><?php echo $row[15] ?></td>
      </tr>
      <tr>
        <td bgcolor="#FFFFFF" class="Microtitulos">Situacion Actual</td>
        <td><label for="situacion"><?php echo $row[1] ?></label></td>
        <td bgcolor="#FFFFFF" class="Microtitulos">Situacion Laboral</td>
        <td><?php echo $row[53] ?></td>
      </tr>
	  <tr>
	    <td bgcolor="#FFFFFF" class="Microtitulos">Parentesco</td>
	    <td><label for="parentesco"><?php echo $row[2] ?></label></td>
        <td bgcolor="#FFFFFF" class="Microtitulos">Fecha ultima actualizacion</td>
	    <td><?php echo $row[55] ?></td>
	    </tr>
      <tr>
        <td bgcolor="#FFFFFF" class="Microtitulos">1er Nombre</td>
        <td><label for="nombre1"><?php echo $row[3] ?></label></td>
        <td bgcolor="#FFFFFF" class="Microtitulos">2do Nombre</td>
        <td><?php echo $row[4] ?></td>
      </tr>
      <tr>
        <td bgcolor="#FFFFFF" class="Microtitulos">1er Apellido</td>
        <td><label for="apellido1"><?php echo $row[5] ?></label></td>
        <td bgcolor="#FFFFFF" class="Microtitulos">2do Apellido</td>
        <td><?php echo $row[6] ?></td>
      </tr>
      <tr>
        <td bgcolor="#FFFFFF" class="Microtitulos">Fecha Nacimiento</td>
        <td><?php echo $row[7] ?></td>
        <td bgcolor="#FFFFFF" class="Microtitulos">Email</td>
        <td><?php echo $row[30] ?></td>
      </tr>
      <tr>
        <td bgcolor="#FFFFFF" class="Microtitulos">Direccion</td>
        <td><label for="direccion"><?php echo $row[8] ?></label></td>
        <td bgcolor="#FFFFFF" class="Microtitulos">Barrio</td>
        <td><?php echo $row[9] ?></td>
      </tr>
      <tr>
        <td bgcolor="#FFFFFF" class="Microtitulos">Comuna</td>
        <td><label for="comuna"><?php echo $row[10] ?></label></td>
        <td bgcolor="#FFFFFF" class="Microtitulos">Zona</td>
        <td><?php echo $row[11] ?></td>
      </tr>
      <tr>
        <td bgcolor="#FFFFFF" class="Microtitulos">Telefono Fijo</td>
        <td><label for="fijo"><?php echo $row[12] ?></label></td>
        <td bgcolor="#FFFFFF" class="Microtitulos">Telefono Celular</td>
        <td><?php echo $row[13] ?></td>
      </tr>
      <tr>
        <td bgcolor="#FFFFFF" class="Microtitulos">Observaciones</td>
        <td colspan="3"><label for="observaciones"><?php echo $row[14] ?></label></td>
      </tr>
      <tr>
        <td bgcolor="#FFFFFF" class="Microtitulos">Personas del Grupo Familiar N°</td>
        <td><?php echo $row[36] ?></td>
        <td class="Microtitulos">Documento</td>
        <td class="Microtitulos">Fecha Nac.</td>
      </tr>
      <tr>
        <td bgcolor="#FFFFFF" class="Microtitulos">Familiar 1</td>
        <td><label for="f1"><?php echo $row[17] ?></label></td>
        <td><?php echo $row[62] ?></td>
        <td><?php echo $row[43] ?></td>
      </tr>
      <tr>
        <td bgcolor="#FFFFFF" class="Microtitulos">Familiar 2</td>
        <td><label for="f2"><?php echo $row[18] ?></label></td>
        <td><?php echo $row[63] ?></td>
        <td><?php echo $row[44] ?></td>
      </tr>
      <tr>
        <td bgcolor="#FFFFFF" class="Microtitulos">Familiar 3</td>
        <td><label for="f3"><?php echo $row[19] ?></label></td>
        <td><?php echo $row[64] ?></td>
        <td><?php echo $row[45] ?></td>
      </tr>
      <tr>
        <td bgcolor="#FFFFFF" class="Microtitulos">Familiar 4</td>
        <td><label for="f4"><?php echo $row[20] ?></label></td>
        <td><?php echo $row[65] ?></td>
        <td><?php echo $row[46] ?></td>
      </tr>
      <tr>
        <td bgcolor="#FFFFFF" class="Microtitulos">Familiar 5</td>
        <td><label for="f5"><?php echo $row[21] ?></label></td>
        <td><?php echo $row[66] ?></td>
        <td><?php echo $row[47] ?></td>
      </tr>
      <tr>
        <td bgcolor="#FFFFFF" class="Microtitulos">Familiar 6</td>
        <td><label for="f6"><?php echo $row[22] ?></label></td>
        <td><?php echo $row[67] ?></td>
        <td><?php echo $row[48] ?></td>
      </tr>
      <tr>
        <td bgcolor="#FFFFFF" class="Microtitulos">Familiar 7</td>
        <td><label for="f7"><?php echo $row[23] ?></label></td>
        <td><?php echo $row[68] ?></td>
        <td><?php echo $row[49] ?></td>
      </tr>
      <tr>
        <td bgcolor="#FFFFFF" class="Microtitulos">Familiar 8</td>
        <td><label for="f8"><?php echo $row[24] ?></label></td>
        <td><?php echo $row[69] ?></td>
        <td><?php echo $row[50] ?></td>
      </tr>
      <tr>
        <td bgcolor="#FFFFFF" class="Microtitulos">Familiar 9</td>
        <td><label for="f9"><?php echo $row[25] ?></label></td>
        <td><?php echo $row[70] ?></td>
        <td><?php echo $row[51] ?></td>
      </tr>
      <tr>
        <td bgcolor="#FFFFFF" class="Microtitulos">Familiar 10</td>
        <td><label for="f10"><?php echo $row[26] ?></label></td>
        <td><?php echo $row[71] ?></td>
        <td><?php echo $row[52] ?></td>
      </tr>
      
      <tr>
        <td bgcolor="#FFFFFF" class="Microtitulos">Madre Cabeza de Hogar</td>
        <td><label for="ch"><?php echo $row[37] ?></label></td>
        <td bgcolor="#FFFFFF" class="Microtitulos">Poblacion Dependiente</td>
        <td><?php echo $row[38] ?></td>
      </tr>
      <tr>
        <td bgcolor="#FFFFFF" class="Microtitulos">Grupo Etnico</td>
        <td><label for="ge"><?php echo $row[39] ?></label></td>
        <td bgcolor="#FFFFFF" class="Microtitulos">Encuesta Telefonica</td>
        <td><?php echo $row[40] ?></td>
      </tr>
      <tr>
        <td bgcolor="#FFFFFF" class="Microtitulos">Encuesta Personalizada</td>
        <td><label for="ep"><?php echo $row[41] ?></label></td>
        <td bgcolor="#FFFFFF" class="Microtitulos">Visitado en Sitio</td>
        <td><?php echo $row[42] ?></td>
      </tr>
      <tr>
        <td colspan="4" class="TituloFICHAS">INFORMACION FINANCIERA</td>
      </tr>      
      
	  <tr>
	    <td class="MicrotitulosFINANCIERO">Valor Ahorrado</td>
	    <td><label for='va'><?php echo $row[27] ?></label></td>
	    <td class="MicrotitulosFINANCIERO">Entidad</td>
	    <td><?php echo $row[28] ?></td>
	    </tr>
	  <tr>
	    <td class="MicrotitulosFINANCIERO">N° de Cuenta</td>
	    <td><label for='nc'><?php echo $row[29] ?></label></td>
	    <td class="MicrotitulosFINANCIERO">Fecha de Retiro Postulante</td>
	    <td><?php echo $row[54] ?></td>
	    </tr>
      <tr>
        <td class="MicrotitulosFINANCIERO">Preaprobado Entidad</td>
        <td><label for='ent'><?php echo $row[74] ?></label></td>
        <td class="MicrotitulosFINANCIERO">Preaprobado Valor</td>
        <td><?php echo $row[72] ?></td>
      </tr>          
	  <tr>
	    <td class="MicrotitulosFINANCIERO">Cesantias Entidad</td>
	    <td><label for='ent'><?php echo $row[76] ?></label></td>
	    <td class="MicrotitulosFINANCIERO">Cesantias Valor</td>
	    <td><?php echo $row[75] ?></td>
	    </tr>          
	  <tr>
	    <td colspan="4" class="TituloFICHAS">INFORMACION DE RIESGO</td>
	    </tr>   
         
     <tr>
       <td bgcolor="#FFFFFF" class="MicrotitulosRIESGO">N° de Radicado</td>
       <td><label for="radicado"><?php echo $row[60] ?></label></td>
       <td bgcolor="#FFFFFF" class="MicrotitulosRIESGO">Entidad Remitente</td>
       <td><?php echo $row[61] ?></td>
     </tr>
      <tr>
        <td class="MicrotitulosRIESGO">Tipo de evento</td>
        <td><label for="tipo"><?php echo $row[16] ?></label></td>
        <td bgcolor="#FFFFFF" class="MicrotitulosRIESGO">Ubicado en Zona de Riesgo</td>
        <td><?php echo $row[35] ?></td>
      </tr>  
      <tr>
        <td colspan="4" class="TituloFICHAS">INFORMACION DE LA VIVIENDA</td>
      </tr>                     
      	
      <tr>
        <td bgcolor="#FFFFFF" class="MicrotitulosHOGAR">Inmueble Reside Actualmente</td>
        <td><label for="imres"><?php echo $row[31] ?></label></td>
        <td bgcolor="#FFFFFF" class="MicrotitulosHOGAR">Inmueble Titulo de Propiedad</td>
        <td><?php echo $row[32] ?></td>
      </tr>
      <tr>
        <td bgcolor="#FFFFFF" class="MicrotitulosHOGAR">Inmueble Matricula Inmobiliaria</td>
        <td><?php echo $row[56] ?></td>
        <td bgcolor="#FFFFFF" class="MicrotitulosHOGAR">Inmueble Ficha Catastral</td>
        <td><?php echo $row[57] ?></td>
      </tr>
      <tr>
        <td bgcolor="#FFFFFF" class="MicrotitulosHOGAR">Inmueble N° Escritura</td>
        <td><?php echo $row[58] ?></td>
        <td bgcolor="#FFFFFF" class="MicrotitulosHOGAR">Inmueble Tiempo Habitado</td>
        <td><?php echo $row[33] ?></td>
      </tr>
      <tr>
        <td bgcolor="#FFFFFF" class="MicrotitulosHOGAR">Inmueble tipo de Material</td>
        <td><label for="imtipo"><?php echo $row[34] ?></label></td>
        <td bgcolor="#FFFFFF" class="MicrotitulosHOGAR">Inmueble Servicios Publicos</td>
        <td><?php echo $row[59] ?></td>
      </tr>
      <tr>
        <td bgcolor="#FFFFFF" class="MicrotitulosHOGAR">Tipo de solicitud de mejoramiento</td>
        <td><label for="imtipo"><?php echo $row[77] ?></label></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>
<!-- BOTON PARA EDITAR -->        
        <?php if (($base==0) && ($_SESSION["REU"] >= "2"))  {?>
        <a href='editar0.php?base=<?php echo $base?>&cedula=<?php echo $cedula?>'><input name='Volver' type='submit' class="Botones" id='Volver' value='EDITAR ficha' /></a>
        <?php }?>   
        <?php if (($base==1) && ($_SESSION["MU"] >= "2"))  {?>
        <a href='editar0.php?base=<?php echo $base?>&cedula=<?php echo $cedula?>'><input name='Volver' type='submit' class="Botones" id='Volver' value='EDITAR ficha' /></a>
        <?php }?>  
        <?php if (($base==2) && ($_SESSION["MR"] >= "2"))  {?>
        <a href='editar0.php?base=<?php echo $base?>&cedula=<?php echo $cedula?>'><input name='Volver' type='submit' class="Botones" id='Volver' value='EDITAR ficha' /></a>
        <?php }?>          
        <?php if (($base==3) && ($_SESSION["VIS"] >= "2"))  {?>
        <a href='editar0.php?base=<?php echo $base?>&cedula=<?php echo $cedula?>'><input name='Volver' type='submit' class="Botones" id='Volver' value='EDITAR ficha' /></a>
        <?php }?>   
        <?php if (($base==4) && ($_SESSION["VIP"] >= "2"))  {?>
        <a href='editar0.php?base=<?php echo $base?>&cedula=<?php echo $cedula?>'><input name='Volver' type='submit' class="Botones" id='Volver' value='EDITAR ficha' /></a>
        <?php }?>  
        <?php if (($base==5) && ($_SESSION["DES"] >= "2"))  {?>
        <a href='editar0.php?base=<?php echo $base?>&cedula=<?php echo $cedula?>'><input name='Volver' type='submit' class="Botones" id='Volver' value='EDITAR ficha' /></a>
        <?php }?>       
        <?php if (($base==6) && ($_SESSION["SP"] >= "2"))  {?>
        <a href='editar0.php?base=<?php echo $base?>&cedula=<?php echo $cedula?>'><input name='Volver' type='submit' class="Botones" id='Volver' value='EDITAR ficha' /></a>
        <?php }?>    
                
<!-- BOTON PARA ELIMINAR -->
         <?php if (($base==0) && ($_SESSION["REU"] == "4"))  {?>       
        <a href='eliminar0.php?base=<?php echo $base?>&cedula=<?php echo $cedula?>' onclick="return confirmar('ALERTA !!! ¿Estas seguro de eliminar?')"><input name='Volver3' type='submit' class="Botones" id='Volver3' value='ELIMINAR ficha' />
        </a>
        <?php }?>
         <?php if (($base==1) && ($_SESSION["MU"] == "4"))  {?>       
        <a href='eliminar0.php?base=<?php echo $base?>&cedula=<?php echo $cedula?>' onclick="return confirmar('ALERTA !!! ¿Estas seguro de eliminar?')"><input name='Volver3' type='submit' class="Botones" id='Volver3' value='ELIMINAR ficha' />
        </a>
        <?php }?>  
         <?php if (($base==2) && ($_SESSION["MR"] == "4"))  {?>       
        <a href='eliminar0.php?base=<?php echo $base?>&cedula=<?php echo $cedula?>' onclick="return confirmar('ALERTA !!! ¿Estas seguro de eliminar?')"><input name='Volver3' type='submit' class="Botones" id='Volver3' value='ELIMINAR ficha' />
        </a>
        <?php }?>
         <?php if (($base==3) && ($_SESSION["VIS"] == "4"))  {?>       
        <a href='eliminar0.php?base=<?php echo $base?>&cedula=<?php echo $cedula?>' onclick="return confirmar('ALERTA !!! ¿Estas seguro de eliminar?')"><input name='Volver3' type='submit' class="Botones" id='Volver3' value='ELIMINAR ficha' />
        </a>
        <?php }?>  
         <?php if (($base==4) && ($_SESSION["VIP"] == "4"))  {?>       
        <a href='eliminar0.php?base=<?php echo $base?>&cedula=<?php echo $cedula?>' onclick="return confirmar('ALERTA !!! ¿Estas seguro de eliminar?')"><input name='Volver3' type='submit' class="Botones" id='Volver3' value='ELIMINAR ficha' />
        </a>
        <?php }?>
         <?php if (($base==5) && ($_SESSION["DES"] == "4"))  {?>       
        <a href='eliminar0.php?base=<?php echo $base?>&cedula=<?php echo $cedula?>' onclick="return confirmar('ALERTA !!! ¿Estas seguro de eliminar?')"><input name='Volver3' type='submit' class="Botones" id='Volver3' value='ELIMINAR ficha' />
        </a>
        <?php }?>       
         <?php if (($base==6) && ($_SESSION["SP"] == "4"))  {?>       
        <a href='eliminar0.php?base=<?php echo $base?>&cedula=<?php echo $cedula?>' onclick="return confirmar('ALERTA !!! ¿Estas seguro de eliminar?')"><input name='Volver3' type='submit' class="Botones" id='Volver3' value='ELIMINAR ficha' />
        </a>
        <?php }?>    
        
        </td>
        <td>&nbsp;</td>
        <td><a href='menu.php'>
          <input name='Volver2' type='submit' class="Botones" id='Volver2' value='Volver' />
        </a></td>
      </tr>
    </table>
 </TD></TR>

</TABLE>

</center>

</body>
<?php mysqli_close($sle); ?></html>