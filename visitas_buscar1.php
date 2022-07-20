<?php include("includes/header.php"); ?>
<?php include("includes/title.php"); ?>
<?php include("includes/login_valid_session.php"); ?>


<div class="row">

	<aside class="col-sm-12">

		<CENTER>
			<?php
			if (isset($_POST['filtro_cedula0'])) {
				$cedula = $_POST['filtro_cedula0'];
				$sql = "SELECT * FROM visitas WHERE cedula = '$cedula' ORDER BY fecha ASC";
			} else {
				if (isset($_POST['filtro_general'])) {
					$valor_general = $_POST['valor_general'];
					$filtro_general = $_POST['filtro_general'];
					$sql = "SELECT * FROM visitas WHERE (puntaje_COCINA + puntaje_BANOLAVADERO + puntaje_PISOS + puntaje_CUBIERTA + puntaje_MUROS) " . $filtro_general . " '$valor_general' ORDER BY fecha ASC";
				} else {
					$valor_cocina = $_POST['valor_cocina'];
					$filtro_cocina = $_POST['filtro_cocina'];
					$valor_lavadero = $_POST['valor_lavadero'];
					$filtro_lavadero = $_POST['filtro_lavadero'];
					$valor_pisos = $_POST['valor_pisos'];
					$filtro_pisos = $_POST['filtro_pisos'];
					$valor_cubierta = $_POST['valor_cubierta'];
					$filtro_cubierta = $_POST['filtro_cubierta'];
					$valor_muros = $_POST['valor_muros'];
					$filtro_muros = $_POST['filtro_muros'];
					$sql = "SELECT * FROM visitas WHERE (puntaje_COCINA " . $filtro_cocina . " '$valor_cocina') AND (puntaje_BANOLAVADERO " . $filtro_lavadero . " '$valor_lavadero') AND (puntaje_PISOS " . $filtro_pisos . " '$valor_pisos') AND (puntaje_CUBIERTA " . $filtro_cubierta . " '$valor_cubierta') AND (puntaje_MUROS " . $filtro_muros . " '$valor_muros') ORDER BY fecha ASC";
				}
			}


			mysqli_select_db($sle, $database_sle);
			mysqli_query($sle, "SET NAMES 'utf8'");
			$resultado = mysqli_query($sle, $sql) or die(mysqli_error());

			//***********************************************************************		
			//HISTORICO DE VISITAS TECNICAS******************************************		
			echo "<B>VISITAS TECNICAS REALIZADAS</B><BR>";
			echo "<TABLE class='table table-bordered'>";
			echo "<TR>";
			echo "<TH>Codigo</TH>";
			echo "<TH>Cedula</TH>";
			echo "<TH>Fecha de la Visita</TH>";
			echo "<TH>Cocina</TH>";
			echo "<TH>Baños</TH>";
			echo "<TH>Muros</TH>";
			echo "<TH>Pisos</TH>";
			echo "<TH>Cubierta</TH>";
			echo "<TH>Observaciones</TH>";
			echo "</TR>";
			while ($row = mysqli_fetch_row($resultado)) {
				echo "<TR>";
				echo "<TD><a target='_blank' href='visitas_general.php?codigo=$row[0]'>$row[0]</a></TD>";
				echo "<TD><a target='_blank' href='consulta_general.php?cedula=$row[1]'>$row[1]</a></TD>";
				echo "<TD>$row[2]</TD>";
				echo "<TD>$row[107]</TD>";
				echo "<TD>$row[108]</TD>";
				echo "<TD>$row[109]</TD>";
				echo "<TD>$row[110]</TD>";
				echo "<TD>$row[111]</TD>";
				echo "<TD>$row[98]</TD>";
				echo "</TR>";
			}
			echo "</TABLE>";

			echo "<HR><a href='menu.php'><input type='submit' name='Volver' id='Volver' value='Volver' class='btn btn-success btn-block'/></a>";
			?>
		</CENTER>

	</aside>

</div>

<?php include("includes/footer.php"); ?>