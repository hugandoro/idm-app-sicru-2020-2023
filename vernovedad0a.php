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
<TABLE width="460">
<TR><TD width="347" align="center">
  <table width="442" border="0" align="center">
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
	mysqli_select_db($sle,$database_sle);
	mysqli_query($sle,"SET NAMES 'utf8'");
	$paso=0;
		
    if ($_SESSION["NOVEDADES"] >= "1")
	{
		echo "<font size='+2'>NOVEDADES - Cruce Comfamiliar</font><HR>";
		$sql="SELECT * FROM cruce_comfamiliar WHERE cedula = '$cedula'";
	    $resultado=mysqli_query($sle,$sql)or die (mysqli_error()); 
		$row = mysqli_fetch_row($resultado);	
		$afiliado=$row[1];
	    $beneficiario=$row[2];
	    $otras_ciudades=$row[3];
		$direccion=$row[4];
	    $departamento=$row[5];
	    $municipio=$row[6];
		$sisben=$row[7];
	}
	else
	{
		echo "<CENTER><BR><BR>";
		echo "NO TIENE PERMISOS PARA ACCEDER A ESTA BASE DE DATOS<BR>";
		echo "<a href='convocatorias_inscribir1.php?cedula=".$cedula."'><input type='submit' name='Volver2' class='Botones' id='Volver2' value='Volver' /></a>";
		echo "</CENTER>";
		return;
	}
  ?>
  </TD>
</TR>

<TR><TD align="center">
    <table width="671" border="0" cellspacing="2">
      <tr>
        <td align="left" bgcolor="#CCCCCC" class="MicrotitulosFUERTE">CEDULA CON NOVEDAD</td>
        <td width="197" bgcolor="#CCCCCC"><?php echo $cedula;?></td>
        <td width="191" bgcolor="#CCCCCC"></td>
        <td bgcolor="#CCCCCC"></td>
      </tr>
      <tr>
        <td width="206" align="left" bgcolor="#FFCC99" class="MicrotitulosFUERTE">Caja de compensacion</td>
        <td colspan="2" bgcolor="#FFCC99"><?php echo $afiliado;?></td>
        <td width="59" bgcolor="#FFCC99"></td>
      </tr>
      <tr>
        <td align="left" bgcolor="#CCCCCC" class="MicrotitulosFUERTE">Beneficiarios Subsidios</td>
        <td colspan="2" bgcolor="#CCCCCC"><?php echo $beneficiario;?></td>
        <td bgcolor="#CCCCCC"></td>
      </tr>
      <tr>
        <td align="left" bgcolor="#FFFF99" class="MicrotitulosFUERTE">Otras propiedades</td>
        <td colspan="2" bgcolor="#FFFF99"><?php echo $otras_ciudades;?></td>
        <td bgcolor="#FFFF99"></td>
      </tr>
      <tr>
        <td align="left" bgcolor="#FFFF99" class="Microtitulos">Direccion</td>
        <td colspan="2" bgcolor="#FFFF99"><?php echo $direccion;?></td>
        <td bgcolor="#FFFF99"></td>
      </tr>
      <tr>
        <td align="left" bgcolor="#FFFF99" class="Microtitulos">Departamento</td>
        <td colspan="2" bgcolor="#FFFF99"><?php echo $departamento;?></td>
        <td bgcolor="#FFFF99"></td>
      </tr>
      <tr>
        <td align="left" bgcolor="#FFFF99" class="Microtitulos">Municipio</td>
        <td colspan="2" bgcolor="#FFFF99"><?php echo $municipio;?></td>
        <td bgcolor="#FFFF99"></td>
      </tr>
      <tr>
        <td align="left" bgcolor="#FFFF99" class="Microtitulos">PUNTAJE SISBEN</td>
        <td colspan="2" bgcolor="#FFFF99"><?php echo $sisben;?></td>
        <td bgcolor="#FFFF99"></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><form id="form1" name="form1" method="post" action="convocatorias_inscribir1.php">
          <input name='Volver2' type='submit' class="Botones" id='Volver2' value='          Volver          ' />
          <input type="hidden" name="cedula" id="cedula" value='<?php echo $cedula?>' />
        </form></td>
        <td>        <?php if ($_SESSION["NOVEDADES"] == "4") {?>
        <a href='eliminarnovedad0a.php?cedula=<?php echo $cedula?>' onclick="return confirmar('ALERTA !!! ¿Estas seguro de eliminar del CRUCE COMFAMILIAR ?')"><input name='Volver3' type='submit' class="Botones" id='Volver3' value='ELIMINAR de CRUCE' />
        </a>
        <?php }?></td>
        <td></td>
      </tr>
      <tr>
        <td align="center">&nbsp;</td>
        <td align="left">
        </td>
        <td align="center"></td>
        <td align="center">&nbsp;</td>
      </tr>
    </table>
  <p>&nbsp;</p></TD></TR>

<TR><TD align="center">
  <HR>
  <p class="submit">
    <label>Derechos Reservados SITIO INGENIERIA 2013<br>
      <a href="http://www.sitioingenieria.com" title="SITIO INGENIERIA" target="_new">www.sitioingenieria.com</a></label>
  </p></TD></TR>

</TABLE>

</center>

</body>
<?php mysqli_close($sle); ?></html>