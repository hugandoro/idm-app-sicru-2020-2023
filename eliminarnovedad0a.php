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

    if ($_SESSION["NOVEDADES"] == "4")
	{
		echo "<font size='+2'>NOVEDADES - Cruce Comfamiliar</font><HR>";	
		$sql="DELETE FROM cruce_comfamiliar WHERE (cedula = '$cedula')";
		$resultado=mysqli_query($sle,$sql)or die (mysqli_error()); 
		echo "Registro Eliminado del cruce COMFAMILIAR";
		$paso=1;
	}
	
	if ($paso==1)
	{
	    //Registra el EVENTO EN EL LOG
	   $sql = "INSERT INTO log_eventos (fecha, hora, usuario, registro, evento) VALUES (now(), now(), ".$_SESSION["cedula"].", '$cedula', 'DELETE COMFAMILIAR')";
	   mysqli_query($sle,$sql)or die (mysqli_error());
	   //****************************
	}	
	else
	{
		echo "<CENTER><BR><BR>";
		echo "NO TIENE PERMISOS PARA EJECUTAR ESTA ACCION EN ESTA BASE DE DATOS<BR>";
		echo "<a href='menu.php'><input type='submit' name='Volver2' class='Botones' id='Volver2' value='Volver' /></a>";
		echo "</CENTER>";
		return;
	}
	
  ?>
  </TD>
</TR>

<TR><TD align="center">
    <table width="567" border="0" cellspacing="2">      
      <tr>
        <td>&nbsp;</td>
        </tr>
      <tr>
        <td align="center"><a href='convocatorias_inscribir1.php?cedula=<?php echo $cedula?>'><input name='Volver' type='submit' class="Botones" id='Volver' value='Volver' /></a></td>
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