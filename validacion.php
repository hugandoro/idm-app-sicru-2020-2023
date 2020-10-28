<?php require_once('Connections/sle.php'); ?>
<?php
//VERIFICA SI EL USUARIO Y LA CONTRASEÑA SON VALIDOS
//1 - CONSULTA
//2 - CONSULTA - EDICION
//3 - CONSULTA - EDICION - INGRESO
//4 - CONSULTA - EDICION - INGRESO - BORRAR
//
//0 - ESTADO INACTIVO
//1 - ESTADO ACTIVO
//
//BASE 0 - REU
//BASE 1 - MU
//BASE 2 - MR
//BASE 3 - VIS
//BASE 4 - VIP
//BASE 5 - DES
//BASE 6 - SP

$usuario = $_GET['usuario'];
$contrasena = $_GET['password'];

mysqli_select_db($sle,$database_sle);
$sql="SELECT * FROM usuarios WHERE  (cedula like '$usuario') AND (password like '$contrasena')"; 
$resultado=mysqli_query($sle,$sql)or die (mysqli_error()); 
if (mysqli_num_rows($resultado) == 0) {
    echo "<center>USUARIO O CONTRASENA INCORRECTOS - Acceso Denegado</center>";
    exit;
}
$row = mysqli_fetch_row($resultado);
if ($row[7] == 0) { //USUARIO EXISTE PERO ESTA INACTIVO EN EL SISTEMA
    echo "<center>USUARIO INACTIVO EN EL SISTEMA - Acceso Denegado</center>";
    exit;
}

$currentPage = $_SERVER["PHP_SELF"];
session_start();

$_SESSION["nivel"] = $row[7];
$_SESSION["dependencia"] = $row[6]; 
$_SESSION["cedula"] = $row[0]; 
$_SESSION["usuario"] = $row[1]." ".$row[2]." ".$row[3]." ".$row[4];
$_SESSION["nivel_descripcion"] = "Usuario Activo";

$_SESSION["MR"] = $row[8];
$_SESSION["MU"] = $row[9];
$_SESSION["REU"] = $row[10];
$_SESSION["VIP"] = $row[11];
$_SESSION["VIS"] = $row[12];
$_SESSION["DES"] = $row[13];
$_SESSION["SP"] = $row[14];
$_SESSION["NOVEDADES"] = $row[15];
$_SESSION["POSTULACION"] = $row[16];
$_SESSION["VISITA"] = $row[17];

//****************************************************
?>
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
  <TR>
    <TD align="left"></TD>
  </TR>
  <TR>
    <TD align="center"><p>&nbsp;</p>
      <CENTER>
        <B>VALIDACION CORRECTA</B>
      </CENTER>
      <HR>
      <p>
        <CENTER>
        <a href="menu.php">
        <input type="submit" class="Botones" value="Cargar plataforma SICRU" />
        </a></p>
      </CENTER>
      <p>&nbsp;</p></TD>
  </TR>
</TABLE>


<HR><img src="imagenes/logotipo_pie.png" /><br><HR>
</center>
</body>
<?php mysqli_close($sle); ?></html>
