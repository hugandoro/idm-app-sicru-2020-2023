<?php include("includes/header.php"); ?>
<?php include("includes/title.php"); ?>
<?php include("includes/login_valid_session.php"); ?>


<div class="row">
  <div class="col-md-2"></div>

  <div class="col-md-8">

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
	if (($base==7) && ($_SESSION["MEJORAMIENTO"] == "4")) $paso=1;		
	
    if ($paso==1)
	{
		if ($base==0)
		  echo "<center><BR><H4>BASE DE DATOS - Por Reubicar</H4></center><HR>"; 
		if ($base==1)
		  echo "<center><BR><H4>BASE DE DATOS - Mejora Vivienda Urbana</H4></center><HR>"; 
		if ($base==2)
		  echo "<center><BR><H4>BASE DE DATOS - Mejora Vivienda Rural</H4></center><HR>"; 
		if ($base==3)
		  echo "<center><BR><H4>BASE DE DATOS - Vivienda nueva</H4></center><HR>"; 
		if ($base==4)
		  echo "<center><BR><H4>BASE DE DATOS - VIP</H4></center><HR>"; 
		if ($base==5)
		  echo "<center><BR><H4>BASE DE DATOS - Desplazados</H4></center><HR>"; 
		if ($base==6)
		  echo "<center><BR><H4>BASE DE DATOS - Sitio Propio</H4></center><HR>"; 
		if ($base==7)
		  echo "<center><BR><H4>BASE DE DATOS - Mejoramiento</H4></center><HR>"; 
		  
		$sql="DELETE FROM ciudadanos WHERE (cedula = '$cedula')";
		$resultado=mysqli_query($sle,$sql)or die (mysqli_error()); 

		echo "<br>";
		echo "<div class='alert alert-warning' style='align-content: center;'>";
		echo "<center>Registro eliminado correctamente</center>";
		echo "</div>";
		echo "<br>";

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
		echo "<center>NO TIENE PERMISOS PARA ACCEDER A ESTA BASE DE DATOS</center><BR>";
		echo "<center><a href='menu.php'><input type='submit' name='Volver2' id='Volver2' value='Volver a la ventana anterior...' class='btn btn-success'/></a></center>";
		return;
	}
	
  ?>


	<div class="form-group">
      <center><a href="menu.php"><button type="submit" name='Volver' id='Volver' value='Volver' class="btn btn-success">Volver a la ventana anterior...</button></a></center>
    </div>
    <br>
  </div>

  <div class="col-md-2"></div>
</div>


<?php include("includes/footer.php"); ?>