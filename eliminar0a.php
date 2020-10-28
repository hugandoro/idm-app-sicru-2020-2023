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
<TR><TD align="center"><p class="name"><img src="imagenes/header.png" width="100%" height="100%" /></p></TD></TR>
</TABLE>

<TABLE>
<TR>
  <TD align="center">
  <?php
    $cedula = $_GET['cedula'];
    $base = $_GET['base'];
	mysqli_select_db($sle,$database_sle);
	mysqli_query($sle,"SET NAMES 'utf8'");
	
	$paso=0;	
	if (($base==0) && ($_SESSION["REU"] == "4")) $paso=1;
    if (($base==1) && ($_SESSION["MU"] == "4")) $paso=1;	
    if (($base==2) && ($_SESSION["MR"] == "4")) $paso=1;
    if (($base==3) && ($_SESSION["VIS"] == "4")) $paso=1;		
    if (($base==4) && ($_SESSION["VIP"] == "4")) $paso=1;
    if (($base==5) && ($_SESSION["DES"] == "4")) $paso=1;
    if (($base==6) && ($_SESSION["SP"] == "4")) $paso=1;
	
     if ($paso==1)
	{
		if ($base==0)
		  echo "<BR><font size='+2'>BASE DE DATOS - Por Reubicar</font><HR>"; 
		if ($base==1)
		  echo "<BR><font size='+2'>BASE DE DATOS - Mejora Vivienda Urbana</font><HR>"; 
		if ($base==2)
		  echo "<BR><font size='+2'>BASE DE DATOS - Mejora Vivienda Rural</font><HR>"; 
		if ($base==3)
		  echo "<BR><font size='+2'>BASE DE DATOS - VIS</font><HR>"; 
		if ($base==4)
		  echo "<BR><font size='+2'>BASE DE DATOS - VIP</font><HR>"; 
		if ($base==5)
		  echo "<BR><font size='+2'>BASE DE DATOS - Desplazados</font><HR>"; 
		if ($base==6)
		  echo "<BR><font size='+2'>BASE DE DATOS - Sitio Propio</font><HR>"; 
		  
		$sql="DELETE FROM ciudadanos WHERE (cedula = '$cedula')";
		$resultado=mysqli_query($sle,$sql)or die (mysqli_error()); 
		echo "Registro Eliminado";
		$paso=1;
	}
	
	if ($paso==1)
	{
	    //Registra el EVENTO EN EL LOG
	   $sql = "INSERT INTO log_eventos (fecha, hora, usuario, registro, evento) VALUES (now(), now(), ".$_SESSION["cedula"].", '$cedula', 'DELETE')";
	   mysqli_query($sle,$sql)or die (mysqli_error());
	   //****************************
	}
	else
	{
		echo "NO TIENE PERMISOS PARA ACCEDER A ESTA BASE DE DATOS<BR>";
		echo "<a href='menu.php'><input type='submit' name='Volver2' id='Volver2' value='Volver' /></a>";
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
        <td align="center"><CENTER><a href='listar1.php?base=<?php echo $base ?>'><input name='Volver' type='submit' class="Botones" id='Volver' value='Volver' /></a></CENTER></td>
        </tr>
    </table>
  <p>&nbsp;</p></TD></TR>
</TABLE>

<HR><img src="imagenes/logotipo_pie.png" /><br><HR>
</center>
</body>
<?php mysqli_close($sle); ?></html>