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
<TR><TD align="center">
  <p>
    <?php		
	$cedula = $_POST['cedula'];  
	$titular = $_POST['titular'];  
	$direccion = $_POST['direccion'];  
	$fecha = $_POST['fecha'];  
	$frente = $_POST['frente'];  
	$fondo = $_POST['fondo'];  
	$estado = $_POST['estado'];  
	$documentopro = $_POST['documentopro'];  
	$documentopronum = $_POST['documentopronum'];  

	$gpsNgrado = $_POST['gpsNgrado'];  
	$gpsNminuto = $_POST['gpsNminuto'];  
	$gpsNsegundo = $_POST['gpsNsegundo'];  
	$gpsWgrado = $_POST['gpsWgrado'];  
	$gpsWminuto = $_POST['gpsWminuto'];  
	$gpsWsegundo = $_POST['gpsWsegundo'];  
	$observaciones = $_POST['observaciones'];  
	
	$puntaje_COCINA = 0;
	$puntaje_BANOLAVADERO = 0;
	$puntaje_MUROS = 0;
	$puntaje_PISOS = 0;
	$puntaje_CUBIERTA = 0;

	$condicion1 = $_POST['condicion1']; 
	$condicion2 = $_POST['condicion2']; 
	$condicion3 = $_POST['condicion3']; 
	$condicion4 = $_POST['condicion4']; 
	$condicion5 = $_POST['condicion5']; 
	$condicion6 = $_POST['condicion6'];

	$cocina1 = $_POST['cocina1']; 
	$cocina2 = $_POST['cocina2']; 
	$cocina3 = $_POST['cocina3']; 
	$cocina4 = $_POST['cocina4']; 
	$cocina5 = $_POST['cocina5']; 
	$cocina6 = $_POST['cocina6']; 
	$cocina7 = $_POST['cocina7']; 
	$cocina8 = $_POST['cocina8']; 
	$cocina9 = $_POST['cocina9']; 
	$cocina10 = $_POST['cocina10'];

	$cocina1e = $_POST['cocina1e'];
	$puntaje_COCINA = $puntaje_COCINA + $cocina1e; 
	$cocina2e = $_POST['cocina2e']; 
	$puntaje_COCINA = $puntaje_COCINA + $cocina2e; 
	$cocina3e = $_POST['cocina3e']; 
	$puntaje_COCINA = $puntaje_COCINA + $cocina3e; 
	$cocina4e = $_POST['cocina4e']; 
	$puntaje_COCINA = $puntaje_COCINA + $cocina4e; 
	$cocina5e = $_POST['cocina5e']; 
	$puntaje_COCINA = $puntaje_COCINA + $cocina5e; 
	$cocina6e = $_POST['cocina6e']; 
	$puntaje_COCINA = $puntaje_COCINA + $cocina6e; 
	$cocina7e = $_POST['cocina7e']; 
	$puntaje_COCINA = $puntaje_COCINA + $cocina7e; 
	$cocina8e = $_POST['cocina8e']; 
	$puntaje_COCINA = $puntaje_COCINA + $cocina8e; 
	$cocina9e = $_POST['cocina9e']; 
	$puntaje_COCINA = $puntaje_COCINA + $cocina9e; 
	$cocina10e = $_POST['cocina10e'];
	$puntaje_COCINA = $puntaje_COCINA + $cocina10e;  
	
	$bano1 = $_POST['bano1']; 	
	$bano2 = $_POST['bano2']; 	
	$bano3 = $_POST['bano3']; 	
	$bano4 = $_POST['bano4']; 	
	$bano5 = $_POST['bano5']; 	
	$bano6 = $_POST['bano6']; 	
	$bano7 = $_POST['bano7']; 	
	$bano8 = $_POST['bano8']; 	
	$bano9 = $_POST['bano9']; 	
	$bano10 = $_POST['bano10']; 	
	$bano11 = $_POST['bano11']; 

	$bano1e = $_POST['bano1e'];
	$puntaje_BANOLAVADERO = $puntaje_BANOLAVADERO + $bano1e;  	
	$bano2e = $_POST['bano2e']; 
	$puntaje_BANOLAVADERO = $puntaje_BANOLAVADERO + $bano2e;  	
	$bano3e = $_POST['bano3e']; 	
	$puntaje_BANOLAVADERO = $puntaje_BANOLAVADERO + $bano3e;  
	$bano4e = $_POST['bano4e']; 	
	$puntaje_BANOLAVADERO = $puntaje_BANOLAVADERO + $bano4e;  
	$bano5e = $_POST['bano5e']; 	
	$puntaje_BANOLAVADERO = $puntaje_BANOLAVADERO + $bano5e;  
	$bano6e = $_POST['bano6e']; 	
	$puntaje_BANOLAVADERO = $puntaje_BANOLAVADERO + $bano6e;  
	$bano7e = $_POST['bano7e']; 	
	$puntaje_BANOLAVADERO = $puntaje_BANOLAVADERO + $bano7e;  
	$bano8e = $_POST['bano8e']; 	
	$puntaje_BANOLAVADERO = $puntaje_BANOLAVADERO + $bano8e;  
	$bano9e = $_POST['bano9e']; 	
	$puntaje_BANOLAVADERO = $puntaje_BANOLAVADERO + $bano9e;  
	$bano10e = $_POST['bano10e'];
	$puntaje_BANOLAVADERO = $puntaje_BANOLAVADERO + $bano10e;  
	$bano11e = $_POST['bano11e'];
	$puntaje_BANOLAVADERO = $puntaje_BANOLAVADERO + $bano11e;  
	
	$piso1 = $_POST['piso1'];  
	$piso2 = $_POST['piso2']; 
	$piso3 = $_POST['piso3']; 
	$piso4 = $_POST['piso4']; 
	$piso5 = $_POST['piso5']; 	

	$piso1e = $_POST['piso1e'];  
	$puntaje_PISOS = $puntaje_PISOS + $piso1e;  
	$piso2e = $_POST['piso2e']; 
	$puntaje_PISOS = $puntaje_PISOS + $piso2e;  
	$piso3e = $_POST['piso3e']; 
	$puntaje_PISOS = $puntaje_PISOS + $piso3e;  
	$piso4e = $_POST['piso4e']; 
	$puntaje_PISOS = $puntaje_PISOS + $piso4e;  
	$piso5e = $_POST['piso5e']; 	
	$puntaje_PISOS = $puntaje_PISOS + $piso5e;  
	
	$cubierta1 = $_POST['cubierta1'];  
	$cubierta2 = $_POST['cubierta2'];  
	$cubierta3 = $_POST['cubierta3'];  
	$cubierta4 = $_POST['cubierta4'];  
	$cubierta5 = $_POST['cubierta5'];  
	$cubierta6 = $_POST['cubierta6'];  
	$cubierta7 = $_POST['cubierta7'];  
	$cubierta8 = $_POST['cubierta8'];

	$cubierta1e = $_POST['cubierta1e'];  
	$puntaje_CUBIERTA = $puntaje_CUBIERTA + $cubierta1e;  
	$cubierta2e = $_POST['cubierta2e'];  
	$puntaje_CUBIERTA = $puntaje_CUBIERTA + $cubierta2e; 
	$cubierta3e = $_POST['cubierta3e'];
	$puntaje_CUBIERTA = $puntaje_CUBIERTA + $cubierta3e;   
	$cubierta4e = $_POST['cubierta4e'];
	$puntaje_CUBIERTA = $puntaje_CUBIERTA + $cubierta4e;   
	$cubierta5e = $_POST['cubierta5e'];
	$puntaje_CUBIERTA = $puntaje_CUBIERTA + $cubierta5e;   
	$cubierta6e = $_POST['cubierta6e'];
	$puntaje_CUBIERTA = $puntaje_CUBIERTA + $cubierta6e;   
	$cubierta7e = $_POST['cubierta7e'];
	$puntaje_CUBIERTA = $puntaje_CUBIERTA + $cubierta7e;   
	$cubierta8e = $_POST['cubierta8e'];
	$puntaje_CUBIERTA = $puntaje_CUBIERTA + $cubierta8e;   
	
	$muros1 = $_POST['muros1'];  
	$muros2 = $_POST['muros2'];  
	$muros3 = $_POST['muros3'];  
	$muros4 = $_POST['muros4'];  
	$muros5 = $_POST['muros5'];  	
	$muros6 = $_POST['muros6'];  	

	$muros1e = $_POST['muros1e'];  
	$puntaje_MUROS = $puntaje_MUROS + $muros1e; 
	$muros2e = $_POST['muros2e'];  
	$puntaje_MUROS = $puntaje_MUROS + $muros2e; 
	$muros3e = $_POST['muros3e'];  
	$puntaje_MUROS = $puntaje_MUROS + $muros3e; 
	$muros4e = $_POST['muros4e'];  
	$puntaje_MUROS = $puntaje_MUROS + $muros4e; 
	$muros5e = $_POST['muros5e'];  	
	$puntaje_MUROS = $puntaje_MUROS + $muros5e; 
	$muros6e = $_POST['muros6e'];  	
	$puntaje_MUROS = $puntaje_MUROS + $muros6e; 			

	$nombrevisito = $_POST['nombrevisito'];  	
	$documentovisito = $_POST['documentovisito'];  			
	$nombreatendio = $_POST['nombreatendio'];  	
	$documentoatendio = $_POST['documentoatendio']; 	
		  
	mysqli_select_db($sle,$database_sle);
	mysqli_query($sle,"SET NAMES 'utf8'");
		  
     //PROCEDEMOS A INGRESAR EL NUEVO REGISTRO SEGUN LA BASE SELECCIONADA
     $sql="INSERT INTO visitas (cedula, fecha, frente, fondo, estado, doc_propiedad, num_doc_propiedad, GPSNgrado, GPSNminuto, GPSNsegundo, GPSWgrado, GPSWminuto, GPSWsegundo, 
     	cocina1, cocina1e, cocina2, cocina2e, cocina3, cocina3e, cocina4, cocina4e, cocina5, cocina5e, cocina6, cocina6e, cocina7, cocina7e, cocina8, cocina8e, cocina9, cocina9e, cocina10, cocina10e, 
     	banos1, banos1e, banos2, banos2e, banos3, banos3e, banos4, banos4e, banos5, banos5e, banos6, banos6e, banos7, banos7e, banos8, banos8e, banos9, banos9e, banos10, banos10e, banos11, banos11e, 
     	pisos1, pisos1e, pisos2, pisos2e, pisos3, pisos3e, pisos4, pisos4e, pisos5, pisos5e, 
     	cubierta1, cubierta1e, cubierta2, cubierta2e, cubierta3, cubierta3e, cubierta4, cubierta4e, cubierta5, cubierta5e, cubierta6, cubierta6e, cubierta7, cubierta7e, cubierta8, cubierta8e, 
     	muros1, muros1e, muros2, muros2e, muros3, muros3e, muros4, muros4e, muros5, muros5e, muros6, muros6e, 
     	condicion1, condicion2, condicion3, condicion4, condicion5, condicion6, 
     	observaciones, digitador, nombre_visitador, doc_visitador, nombre_atendio, doc_atendio, 
     	puntaje_COCINA, puntaje_BANOLAVADERO, puntaje_MUROS, puntaje_PISOS, puntaje_CUBIERTA) 
		VALUES ('$cedula', '$fecha', '$frente', '$fondo', '$estado', '$documentopro', '$documentopronum', '$gpsNgrado', '$gpsNminuto', '$gpsNsegundo', '$gpsWgrado', '$gpsWminuto', '$gpsWsegundo', 
		'$cocina1', '$cocina1e', '$cocina2', '$cocina2e', '$cocina3', '$cocina3e', '$cocina4', '$cocina4e', '$cocina5', '$cocina5e', '$cocina6', '$cocina6e', '$cocina7', '$cocina7e', '$cocina8', '$cocina8e', '$cocina9', '$cocina9e', '$cocina10', '$cocina10e', 
		'$bano1', '$bano1e', '$bano2', '$bano2e', '$bano3', '$bano3e', '$bano4', '$bano4e', '$bano5', '$bano5e', '$bano6', '$bano6e', '$bano7', '$bano7e', '$bano8', '$bano8e', '$bano9', '$bano9e', '$bano10', '$bano10e', '$bano11', '$bano11e', 
		'$piso1', '$piso1e', '$piso2', '$piso2e', '$piso3', '$piso3e', '$piso4', '$piso4e', '$piso5', '$piso5e', 
		'$cubierta1', '$cubierta1e', '$cubierta2', '$cubierta2e', '$cubierta3', '$cubierta3e', '$cubierta4', '$cubierta4e', '$cubierta5', '$cubierta5e', '$cubierta6', '$cubierta6e', '$cubierta7', '$cubierta7e', '$cubierta8', '$cubierta8e', 
		'$muros1', '$muros1e', '$muros2', '$muros2e', '$muros3', '$muros3e', '$muros4', '$muros4e', '$muros5', '$muros5e', '$muros6', '$muros6e', 
		'$condicion1', '$condicion2', '$condicion3', '$condicion4', '$condicion5', '$condicion6', 
		'$observaciones', ".$_SESSION["cedula"].", '$nombrevisito', '$documentovisito', '$nombreatendio', '$documentoatendio', 
		'$puntaje_COCINA', '$puntaje_BANOLAVADERO', '$puntaje_MUROS', '$puntaje_PISOS', '$puntaje_CUBIERTA')";
	 mysqli_query($sle,$sql)or die (mysqli_error());	


    //ARCHIVO ANEXO
    $sql = "SELECT * FROM visitas ORDER BY codigo DESC LIMIT 1";
    $result = mysqli_query($sle,$sql)or die (mysqli_error());
    $p = mysqli_fetch_row($result);
    $paso = '';
    if (($_FILES["anexo1"]["type"] == "image/jpeg") && ($_FILES["anexo1"]["size"] < 1500000)) 
    {
      if ($_FILES["anexo1"]["error"] > 0) 
        echo "<span class='Estilo5'>".$_FILES["anexo1"]["error"] . "<BR></span>";
	  else 
	  {
        if (file_exists("anexos/" . $_FILES["anexo1"]["name"])) 
          echo "<span class='Estilo5'>".$_FILES["anexo1"]["name"] . " ya esta cargado en el sistema<BR></span>";
	    else 
	    {
		  $paso = $p[0].".jpg";
		  move_uploaded_file($_FILES["anexo1"]["tmp_name"],"anexos/" . $paso);
          echo "<span class='Estilo5'>Evidencia cargada correctamente<BR></span>";
        }
      }
    } 
    else 
      echo "<span class='Estilo5'>*** NO se cargaron evidencias, recuerde que solo se aceptan JPG no mayores a 500k ***<BR></span>";		  	
 
    $sql="UPDATE visitas SET foto = '$paso' WHERE codigo = '$p[0]'";		
    mysqli_query($sle,$sql)or die (mysqli_error());
    //*************************************

	 echo "<span class='Estilo7'><font size='+2' color='red'><BR>Visita registrada correctamente<BR>
	 PUNTAJE COCINA <B>". $puntaje_COCINA ."</B> <BR>
	 PUNTAJE BANO Y LAVADERO <B>". $puntaje_BANOLAVADERO ."</B> <BR>
	 PUNTAJE MUROS <B>". $puntaje_MUROS ."</B> <BR>
	 PUNTAJE PISO <B>". $puntaje_PISOS ."</B> <BR>
	 PUNTAJE CUBIERTA <B>". $puntaje_CUBIERTA ."</B></font></span>";
	 
	 //Registra el EVENTO EN EL LOG
	 $sql = "INSERT INTO log_eventos (fecha, hora, usuario, registro, evento) VALUES (now(), now(), ".$_SESSION["cedula"].", '$cedula', 'NUEVA VISITA')";
	 mysqli_query($sle,$sql)or die (mysqli_error());
	 //****************************
?>	
  </p>
  <p>
    <a href="menu.php"><input name="Volver" type="submit" class="Botones" id="Volver" value="Volver" /></a>  </p></TD></TR>
</TABLE>

<HR><img src="imagenes/logotipo_pie.png" /><br><HR>
</center>
</body>
<?php mysqli_close($sle); ?></html>