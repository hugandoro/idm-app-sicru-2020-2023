<?php include("includes/header.php"); ?>
<?php include("includes/title.php"); ?>
<?php include("includes/login_valid_session.php"); ?>

<div class="row">
	<aside class="col-sm-12">

		<?php
		//MODIFICA EL ESTADO DEL REGISTRO SELECCIONADO Y VUELVE A CARGAR EL LISTADO ACTUALIZADO
		if (isset($_GET['cedula'])) {
			$cedula = $_GET['cedula'];
			$convocatoria = $_GET['convocatoria'];
			$bandera = $_GET['b'];

			mysqli_select_db($sle, $database_sle);
			mysqli_query($sle, "SET NAMES 'utf8'");

			if ($_SESSION["POSTULACION"] == "4") {
				if ($bandera == "0") {
					$sqlPO = "UPDATE convocatorias_ciudadanos SET resultado='1', motivo='' WHERE (cedula = '$cedula') AND (id_proyecto = '$convocatoria')";
					$resultPO = mysqli_query($sle, $sqlPO);
					//Registra el EVENTO EN EL LOG
					$sql = "INSERT INTO log_eventos (fecha, hora, usuario, registro, evento) VALUES (now(), now(), " . $_SESSION["cedula"] . ", '$cedula', 'APROBADO')";
					mysqli_query($sle, $sql) or die(mysqli_error());
					//****************************
				}
				if ($bandera == "1") {
					$motivo = $_GET['motivo'];
					$sqlPO = "UPDATE convocatorias_ciudadanos SET resultado='0', motivo='$motivo' WHERE (cedula = '$cedula') AND (id_proyecto = '$convocatoria')";
					$resultPO = mysqli_query($sle, $sqlPO);
					//Registra el EVENTO EN EL LOG
					$sql = "INSERT INTO log_eventos (fecha, hora, usuario, registro, evento) VALUES (now(), now(), " . $_SESSION["cedula"] . ", '$cedula', 'RECHAZADO')";
					mysqli_query($sle, $sql) or die(mysqli_error());
					//****************************
				}
			} else {
				echo "<CENTER><BR><BR>";
				echo "NO TIENE PERMISOS PARA MODIFICAR ESTADO DE POSTULACIONES<BR>";
				echo "</CENTER>";
			}
		}
		?>


		<script type="text/javascript">
			//VALIDA ANTES DE ELIMINAR
			function confirmar(texto) {
				if (confirm(texto)) return true;
				else return false;
			}

			function validar_motivo() {
				if (document.getElementById('motivo').value == '') {
					alert('Debe seleccionar un motivo de negacion');
					return false;
				}
				return true;
			}
		</script>


		<?php
		mysqli_select_db($sle, $database_sle);
		mysqli_query($sle, "SET NAMES 'utf8'");

		if (isset($_GET['convocatoria']))
			$convocatoria = $_GET['convocatoria'];
		else
			$convocatoria = $_POST['convocatoria'];

		$sqlC = "SELECT * FROM convocatorias WHERE id_proyecto = '$convocatoria'";
		$resultC = mysqli_query($sle, $sqlC);
		$rowC = mysqli_fetch_row($resultC);
		echo "<BR>Postulados al Proyecto : <B>" . $rowC[1] . "</B><BR><BR>";

		$sqlCC = "SELECT * FROM convocatorias_ciudadanos WHERE id_proyecto = '$convocatoria' ORDER BY cedula ASC";
		$resultCC = mysqli_query($sle, $sqlCC);
		$cantidad = mysqli_num_rows($resultCC);
		echo "$cantidad Registros<BR><BR>";

		echo "<table class='table'>";
		echo "<thead class='thead-dark'>";
		echo "<TR>";
		echo "<TH width='5%'><B>Estado</B></TH>";
		echo "<TH width='30%'><B>Motivo</B></TH>";
		echo "<TH width='5%'><B>Cedula</B></TH>";
		echo "<TH width='10%'><B>Nombre 1</B></TH>";
		echo "<TH width='10%'><B>Nombre 2</B></TH>";
		echo "<TH width='10%'><B>Apellido 1</B></TH>";
		echo "<TH width='10%'><B>Apellido 2</B></TH>";
		echo "<TH width='15%'><B>Barrio</B></TH>";
		echo "</TR>";
		echo "</thead>";

		echo "<tbody>";

		while ($rowCC = mysqli_fetch_row($resultCC)) {
			$sqlCI = "SELECT * FROM ciudadanos WHERE cedula = '$rowCC[1]'";
			$resultCI = mysqli_query($sle, $sqlCI);
			$rowCI = mysqli_fetch_row($resultCI);
			
			echo "<TR>";

			// APROBAR o NEGAR
			if ($_SESSION["POSTULACION"] == "4") {
				if ($rowCC[5] == "0") {
		?>
					<TD><a href='convocatorias_ver_cerradas1.php?convocatoria=<?php echo $convocatoria; ?>&cedula=<?php echo $rowCI[0]; ?>&b=0' onclick='return confirmar("APROBAR beneficio, ESTA SEGURO DE LA ACCION ?")'><button type="button" class="btn btn-danger">Negado</button></a></TD>
				<?php
				}

				if ($rowCC[5] == "1") {
				?>
				    <form name="form1" method="get" onsubmit="return validar_motivo()" action="convocatorias_ver_cerradas1.php">
						<input class="form-control" name="convocatoria" id="convocatoria" hidden <?php echo "value=" . $convocatoria ?>></td>
						<input class="form-control" name="cedula" id="cedula" hidden <?php echo "value=" . $rowCI[0] ?>></td>
						<input class="form-control" name="b" id="b" hidden value="1"></td>

						<TD><input type="submit" class="btn btn-success" value="Aprobado"></TD>
				<?php
				}
			} else
				echo "<TD></TD>";
			// Fin aprobar o negar ***


			// MOTIVO DE APROBACION o NEGACION
			if ($_SESSION["POSTULACION"] == "4") {
				if ($rowCC[5] == "0") {
					echo "<TD>$rowCC[6]</TD>";
				}

				if ($rowCC[5] == "1") {
				?>
					<TD>
						<select class="form-control" name="motivo" id="motivo">
							<option value="Sin información">Sin información</option>
							<option value="No cumple visita técnica">No cumple visita técnica</option>
							<option value="No cumple revisión juridica">No cumple revisión juridica</option>
							<option value="Se encuentra en zona de riesgo">Se encuentra en zona de riesgo</option>
							<option value="No alcanzo cupo">No alcanzo cupo</option>
							<option value="Desestimiento voluntario">Desestimiento voluntario</option>
						</select>
					</TD>
					</form>

		<?php
				}
			} else
				echo "<TD></TD>";
			// Fin motivo ***


			echo "<TD>$rowCI[0]</TD>";
			echo "<TD>$rowCI[3]</TD>";
			echo "<TD>$rowCI[4]</TD>";
			echo "<TD>$rowCI[5]</TD>";
			echo "<TD>$rowCI[6]</TD>";
			echo "<TD>$rowCI[9]</TD>";
			echo "</TR>";
		}
		echo "</tbody>";
		echo "</table>";

		?>

		<?php
		if ($_SESSION["POSTULACION_ADMIN"] == "4") {
		?>

			<a href='convocatorias_ver_cerradas0.php?convocatoriaReabrir=<?php echo $convocatoria; ?>' onclick="return confirmar('Reabrir - ESTA SEGURO DE LA ACCION ?')">
				<input name='reabrir' type='submit' class="btn btn-warning btn-block" id='reabrir' value='*** RE ABRIR CONVOCATORIA ***' />
			</a>

			<hr>

			<a href='convocatorias_ver_cerradas0.php?convocatoria=<?php echo $convocatoria; ?>' onclick="return confirmar('ALERTA !!! ¿Si archiva esta convocatoria no se podra modificar el estado de los postulados, ESTA SEGURO DE LA ACCION ?')">
				<input name='Archivar' type='submit' class="btn btn-danger btn-block" id='Archivar' value='*** ARCHIVAR CONVOCATORIA ***' />
			</a>

		<?php
		}
		echo "<HR><a href='convocatorias.php'><input type='submit' name='Volver' id='Volver' value='Volver a la ventana anterior...' class='btn btn-success btn-block'/></a>";
		?>

	</aside>

</div>

<?php include("includes/footer.php"); ?>