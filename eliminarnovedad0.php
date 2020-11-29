<?php include("includes/header.php"); ?>
<?php include("includes/title.php"); ?>
<?php include("includes/login_valid_session.php"); ?>


<div class="row">
	<div class="col-md-2"></div>

	<div class="col-md-8">

		<TABLE class="table">
			<TR>
				<TD align="center">
					<?php
					$cedula = $_GET['cedula'];
					mysqli_select_db($sle, $database_sle);
					mysqli_query($sle, "SET NAMES 'utf8'");

					$paso = 0;

					if ($_SESSION["NOVEDADES"] == "4") {
						echo "<center><H4>NOVEDADES - Cruce Comfamiliar</center></H4><HR>";
						$sql = "DELETE FROM cruce_comfamiliar WHERE (cedula = '$cedula')";
						$resultado = mysqli_query($sle, $sql) or die(mysqli_error());
						echo "Registro Eliminado del cruce COMFAMILIAR";
						$paso = 1;
					}

					if ($paso == 1) {
						//Registra el EVENTO EN EL LOG
						$sql = "INSERT INTO log_eventos (fecha, hora, usuario, registro, evento) VALUES (now(), now(), " . $_SESSION["cedula"] . ", '$cedula', 'DELETE COMFAMILIAR')";
						mysqli_query($sle, $sql) or die(mysqli_error());
						//****************************
					} else {
						echo "<CENTER><BR><BR>";
						echo "NO TIENE PERMISOS PARA EJECUTAR ESTA ACCION EN ESTA BASE DE DATOS<BR>";
						echo "<a href='menu.php'><input type='submit' name='Volver2' class='btn btn-success' id='Volver2' value='Volver a la ventana anterior...' /></a>";
						echo "</CENTER>";
						return;
					}

					?>
				</TD>
			</TR>

			<TR>
				<TD align="center">
					<a href='buscar_ac0.php?cedula=<?php echo $cedula ?>'><input name='Volver' type='submit' class="btn btn-success" id='Volver' value='Volver a la ventana anterior...' /></a>
				</TD>
			</TR>

		</TABLE>

	</div>

	<div class="col-md-2"></div>
</div>

<?php include("includes/footer.php"); ?>