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
        <TR>
          <TD width="600"align="center"><CENTER>
             <BR><BR><font size="+2">MODOS DE CONSULTA - Visitas Tecnicas</font><BR><BR>
            </CENTER></TD>
        </TR>

        <TR>
          <TD width="600"align="center"><CENTER>
              <form name="form1" method="post" onSubmit="return revisar(form1);" action="visitas_buscar1.php">
                  <HR>
                  <p><B><span class="Titulo">Consultar por N° de Cedula</span></B><BR>
                    <input type="text" name="filtro_cedula0" id="filtro_cedula0" onkeypress="return acceptNum(event)"/><BR>
                    <input type="submit" class="Botones" value="Buscar" />
                  </p>
            </form>
            </CENTER></TD>
        </TR>

        <TR>
          <TD width="600"align="center"><CENTER>
              <form name="form1" method="post" onSubmit="return revisar(form1);" action="visitas_buscar1.php">
                  <HR>
                  <p><B><span class="Titulo">Consultar por Puntuacion General</span></B><BR>
                    <select name="filtro_general" id="filtro_general">
                      <option value="&gt;=" selected="selected">MAYOR QUE</option>
                      <option value="&lt;=">MENOR QUE</option>
                      <option value="=">IGUAL A</option>
                    </select>
                    <input type="text" name="valor_general" id="valor_general" onkeypress="return acceptNum(event)"/><BR>
                    <input type="submit" class="Botones" value="Buscar" />
                  </p>
            </form>
            </CENTER></TD>
        </TR>

        <TR>
          <TD width="600"align="center"><CENTER>
              <form name="form1" method="post" onSubmit="return revisar(form1);" action="visitas_buscar1.php">
                  <HR>
                  <p><B class="Titulo">Consultar por Combinacion de filtros</B></p>
                  <p class="MiniTitulo"><BR>
                    <span class="MiniTitulo">Puntaje Cocina</span><BR>
                    <select name="filtro_cocina" id="filtro_cocina">
                      <option value="&gt;=" selected="selected">MAYOR QUE</option>
                      <option value="&lt;=">MENOR QUE</option>
                      <option value="=">IGUAL A</option>
                    </select>
                    <input name="valor_cocina" type="text" id="valor_cocina" onkeypress="return acceptNum(event)" value="0"/><BR>
                    
                    <span class="MiniTitulo">Puntaje Baños y Lavadero</span><BR>
                    <select name="filtro_lavadero" id="filtro_lavadero">
                      <option value="&gt;=" selected="selected">MAYOR QUE</option>
                      <option value="&lt;=">MENOR QUE</option>
                      <option value="=">IGUAL A</option>
                    </select>
                    <input name="valor_lavadero" type="text" id="valor_lavadero" onkeypress="return acceptNum(event)" value="0"/><BR>
                    <span class="MiniTitulo">Puntaje Pisos</span><BR>
                    <select name="filtro_pisos" id="filtro_pisos">
                      <option value="&gt;=" selected="selected">MAYOR QUE</option>
                      <option value="&lt;=">MENOR QUE</option>
                      <option value="=">IGUAL A</option>
                    </select>
                    <input name="valor_pisos" type="text" id="valor_pisos" onkeypress="return acceptNum(event)" value="0"/><BR>                  
                    
                    <span class="MiniTitulo">Puntaje Cubierta</span><BR>
                    <select name="filtro_cubierta" id="filtro_cubierta">
                      <option value="&gt;=" selected="selected">MAYOR QUE</option>
                      <option value="&lt;=">MENOR QUE</option>
                      <option value="=">IGUAL A</option>
                    </select>
                    <input name="valor_cubierta" type="text" id="valor_cubierta" onkeypress="return acceptNum(event)" value="0"/><BR>
                    
                    <span class="MiniTitulo">Puntaje Estructura y muros</span><BR>
                    <select name="filtro_muros" id="filtro_muros">
                      <option value="&gt;=" selected="selected">MAYOR QUE</option>
                      <option value="&lt;=">MENOR QUE</option>
                      <option value="=">IGUAL A</option>
                    </select>
                    <input name="valor_muros" type="text" id="valor_muros" onkeypress="return acceptNum(event)" value="0"/><BR>
                    
                    
                    <input type="submit" class="Botones" value="Buscar" />
                </p>
                  <p><BR>
                  </p>
            </form>
            </CENTER></TD>
        </TR>
      </TABLE>

<HR><img src="imagenes/logotipo_pie.png" /><br><HR>
</center>
</body>
<?php mysqli_close($sle); ?></html>