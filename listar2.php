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
  <TD align="center">
  <?php
    $base = $_POST['base'];
	
	//Asigna El nombre al la variable temporal BASET
	$baseT = "ciudadanos";
	
	//Inicializa el FILTRO
	$filtro = " WHERE ";
	
	//Complementa el FILTRO
	if($_POST["afiliacion"]==0)
	    $filtro = $filtro."(".$baseT.".cedula NOT IN (SELECT cruce_comfamiliar.cedula FROM cruce_comfamiliar WHERE afiliado != ''))";
	
	if($_POST["afiliacion"]==1)
	    $filtro = $filtro."(".$baseT.".cedula IN (SELECT cruce_comfamiliar.cedula FROM cruce_comfamiliar WHERE afiliado != ''))";

	if($_POST["afiliacion"]==2)
	    $filtro = $filtro."(".$baseT.".cedula IN (SELECT ".$baseT.".cedula FROM ".$baseT."))";
	//***********************	
	if($_POST["beneficiarios"]==0)
	    $filtro = $filtro." AND (".$baseT.".cedula NOT IN (SELECT cruce_comfamiliar.cedula FROM cruce_comfamiliar WHERE beneficiario != ''))";
	
	if($_POST["beneficiarios"]==1)
	    $filtro = $filtro." AND (".$baseT.".cedula IN (SELECT cruce_comfamiliar.cedula FROM cruce_comfamiliar WHERE beneficiario != ''))";
			
	if($_POST["beneficiarios"]==2)
	    $filtro = $filtro." AND (".$baseT.".cedula IN (SELECT ".$baseT.".cedula FROM ".$baseT."))";
	//***********************		
	if($_POST["otros"]==0)
	    $filtro = $filtro." AND (".$baseT.".cedula NOT IN (SELECT cruce_comfamiliar.cedula FROM cruce_comfamiliar WHERE otras_ciudades != ''))";
	
	if($_POST["otros"]==1)
	    $filtro = $filtro." AND (".$baseT.".cedula IN (SELECT cruce_comfamiliar.cedula FROM cruce_comfamiliar WHERE otras_ciudades != ''))";	
		
	if($_POST["otros"]==2)
	    $filtro = $filtro." AND (".$baseT.".cedula IN (SELECT ".$baseT.".cedula FROM ".$baseT."))";
    //***********************	
	if($_POST["cruce"]==0)
	    $filtro = $filtro." AND (".$baseT.".cedula NOT IN (SELECT cruce_comfamiliar.cedula FROM cruce_comfamiliar))";
	
	if($_POST["cruce"]==1)
	    $filtro = $filtro." AND (".$baseT.".cedula IN (SELECT cruce_comfamiliar.cedula FROM cruce_comfamiliar))";	
		
	if($_POST["cruce"]==2)
	    $filtro = $filtro." AND (".$baseT.".cedula IN (SELECT ".$baseT.".cedula FROM ".$baseT."))";
    //***********************	
	
	
	//Si no hay Filtro lo Deja limpio 	
    if ($filtro == " WHERE ")
	    $filtro = $filtro." (id_base = $base)";
	else
	    $filtro = $filtro." AND (id_base = $base)";
	
	mysqli_select_db($sle,$database_sle);
	mysqli_query($sle,"SET NAMES 'utf8'");
		
	$paso=0;	
    if (($base==0) && ($_SESSION["REU"] >= "1")) 
	{
		$sql="SELECT * FROM ciudadanos".$filtro;
		$resultado=mysqli_query($sle,$sql)or die (mysqli_error()); 
		$numero = mysqli_num_rows($resultado);		
		echo "<font size='+2'>BASE DE DATOS - Por Reubicar</font><BR>".$numero." Registros encontrados<HR>";
		$paso=1;
	}
    if (($base==1) && ($_SESSION["MU"] >= "1")) 
	{
		$sql="SELECT * FROM ciudadanos".$filtro;
		$resultado=mysqli_query($sle,$sql)or die (mysqli_error()); 
		$numero = mysqli_num_rows($resultado);		
		echo "<font size='+2'>BASE DE DATOS - Mejora Vivienda Urbana</font><BR>".$numero." Registros encontrados<HR>";
		$paso=1;
	}
    if (($base==2) && ($_SESSION["MR"] >= "1")) 
	{
		$sql="SELECT * FROM ciudadanos".$filtro;
		$resultado=mysqli_query($sle,$sql)or die (mysqli_error()); 
		$numero = mysqli_num_rows($resultado);
		echo "<font size='+2'>BASE DE DATOS - Mejora Vivienda Rural</font><BR>".$numero." Registros encontrados<HR>";
		$paso=1;
	}
    if (($base==3) && ($_SESSION["VIS"] >= "1")) 
	{
		$sql="SELECT * FROM ciudadanos".$filtro;
		$resultado=mysqli_query($sle,$sql)or die (mysqli_error());		
		$numero = mysqli_num_rows($resultado);		
		echo "<font size='+2'>BASE DE DATOS - Vivienda Nueva</font><BR>".$numero." Registros encontrados<HR>";
		$paso=1;
	}	
    if (($base==4) && ($_SESSION["VIP"] >= "1")) 
	{
		$sql="SELECT * FROM ciudadanos".$filtro;
		$resultado=mysqli_query($sle,$sql)or die (mysqli_error()); 
		$numero = mysqli_num_rows($resultado);		
		echo "<font size='+2'>BASE DE DATOS - Vivienda Interes Prioritario (VIP)</font><BR>".$numero." Registros encontrados<HR>";
		$paso=1;
	}
    if (($base==5) && ($_SESSION["DES"] >= "1")) 
	{
		$sql="SELECT * FROM ciudadanos".$filtro;
		$resultado=mysqli_query($sle,$sql)or die (mysqli_error());		
		$numero = mysqli_num_rows($resultado);		
		echo "<font size='+2'>BASE DE DATOS - Poblacion en Condicion de Desplazamiento</font><BR>".$numero." Registros encontrados<HR>";
		$paso=1;
	}	
    if (($base==6) && ($_SESSION["SP"] >= "1")) 
	{
		$sql="SELECT * FROM ciudadanos".$filtro;
		$resultado=mysqli_query($sle,$sql)or die (mysqli_error());		
		$numero = mysqli_num_rows($resultado);		
		echo "<font size='+2'>BASE DE DATOS - Construccion en Sitio Propio</font><BR>".$numero." Registros encontrados<HR>";
		$paso=1;
	}	
    if (($base==7) && ($_SESSION["MEJORAMIENTO"] >= "1")) 
	{
		$sql="SELECT * FROM ciudadanos".$filtro;
		$resultado=mysqli_query($sle,$sql)or die (mysqli_error());		
		$numero = mysqli_num_rows($resultado);		
		echo "<font size='+2'>BASE DE DATOS - Mejoramiento</font><BR>".$numero." Registros encontrados<HR>";
		$paso=1;
	}	
	
	if ($paso==0) 
	{
		echo "<CENTER><BR><BR>";
		echo "NO TIENE PERMISOS PARA ACCEDER A ESTA BASE DE DATOS<BR>";
		echo "<a href='menu.php'><input type='submit' name='Volver2' id='Volver2' value='Volver' /></a>";
		echo "</CENTER>";
		return;
	}
	else
	{
		$_SESSION["sql"] = $sql;
	}
  ?>
  </TD>
</TR>

<TR><TD align="center">
    <table width="567" border="0" cellspacing="2">
      <tr>
        <td width="159" bgcolor="#FFCCCC" class="Microtitulos">Cedula</td>
        <td width="214" bgcolor="#FFCCCC" class="Microtitulos">1er Nombre</td>
        <td width="214" bgcolor="#FFCCCC" class="Microtitulos">2do Nombre</td>
        <td width="214" bgcolor="#FFCCCC" class="Microtitulos">1er Apellido</td>
        <td width="214" bgcolor="#FFCCCC" class="Microtitulos">2do Apellido</td>
        </tr>
      <?php while ($row = mysqli_fetch_row($resultado)){ ?> 
      <tr>
      
        <td class="Microtitulos"><?php echo "<a href='consulta0a.php?cedula=".$row[0]."&base=".$base."'>".$row[0]."</a>"; ?></td>
        <td><?php echo $row[3] ?></td>
        <td><?php echo $row[4] ?></td>
        <td><?php echo $row[5] ?></td>
        <td><?php echo $row[6] ?></td>
        </tr>
      <?php } 
	  ?>
      <tr>
        <td>&nbsp;</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        </tr>
      
      <tr>
      <td colspan="5">
        <form id="form1" name="form1" method="post" action="excel.php?base=<?php echo $base; ?>">
        <table>
        <tr>
        <td>PIN DE SEGURIDAD</td><td><label for="pin"></label>
          <input type="password" name="pin" id="pin" /></td>
        <td><input name='Exportar' type='submit' class="Botones" id='Exportar' value='Exportar a Excel' />
        </td>
        </tr>
        </table>
        </form>
      </td>  
      </tr>
      
      <tr>
      <td colspan="5">
        <form id="form1" name="form1" method="post" action="exceltodo.php?base=<?php echo $base; ?>">
        <table>
        <tr>
        <td>PIN DE SEGURIDAD</td><td><label for="pin"></label>
          <input type="password" name="pin" id="pin" /></td>
        <td><input name='Exportar' type='submit' class="Botones" id='Exportar' value='Exportar a Excel TODO' />
        </td>
        </tr>
        </table>
        </form>
      </td>  
      </tr>
        
      <tr>
        <td colspan="5">&nbsp;</td>
        </tr>
      <tr>
        <td colspan="5"><a href='menu.php'><input name='Volver' type='submit' class="Botones" id='Volver' value='Volver' />
        </a></td>
        </tr>
    </table>
  <p>&nbsp;</p></TD></TR>
</TABLE>

<HR><img src="imagenes/logotipo_pie.png" /><br><HR>
</center>
</body>
<?php mysqli_close($sle); ?></html>