<?php require_once('Connections/sle.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml"> 
 
<head profile="http://gmpg.org/xfn/11"> 
	<title>SICRU Ver 1.0</title> 
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
	<link rel="STYLESHEET" type="text/css" href="estilo.css">
</head> 
<body>

<center>

<TABLE>
<TR><TD align="center"><p class="name"><img src="imagenes/header.png" width="100%" height="100%" /></p></TD></TR>
</TABLE>

<TABLE>
<TR><TD align="center">
    <form id="form2" name="form2" method="GET" action="validacion.php">
    <p>&nbsp;</p>
    <table width="160" border="0">
    <tr>
    <td>Usuario</td>
    <td>
    <label for="usuario"></label>
    <input type="text" name="usuario" id="usuario" /></td></tr>
    <tr>
    <td>Contraseña</td>
    <td><input name="password" type="password" id="password" /></td></tr>
    <tr>
    <td colspan="2" align="center">
    <center><input name="button" type="submit" class="Botones" id="button" value="Iniciar Sesion" /></center></tr>
    </table>
    <p>&nbsp;</p>
    </form>
</TD></TR>
</TABLE>


<HR><img src="imagenes/logotipo_pie.png" /><br><HR>
</center>
</body>
<?php mysqli_close($sle); ?></html>

