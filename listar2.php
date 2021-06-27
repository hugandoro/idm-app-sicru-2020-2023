<?php include("includes/header.php"); ?>
<?php include("includes/title.php"); ?>
<?php include("includes/login_valid_session.php"); ?>

<div class="row">
	<aside class="col-sm-12">

		<TABLE class="table">
			<TR>
				<TD align="center">
					<?php
					$base = $_POST['base'];

					//Asigna El nombre al la variable temporal BASET
					$baseT = "ciudadanos";

					//Inicializa el FILTRO
					$filtro = " WHERE ";

					//Complementa el FILTRO
					if ($_POST["caja"] == 0)
						$filtro = $filtro . "(" . $baseT . ".cedula NOT IN (SELECT cruce_caja.identificacion FROM cruce_caja WHERE identificacion = " . $baseT . ".cedula))";

					if ($_POST["caja"] == 1)
						$filtro = $filtro . "(" . $baseT . ".cedula IN (SELECT cruce_caja.identificacion FROM cruce_caja WHERE identificacion = " . $baseT . ".cedula))";

					if ($_POST["caja"] == 2)
						$filtro = $filtro . "(" . $baseT . ".cedula IN (SELECT " . $baseT . ".cedula FROM " . $baseT . "))";
					//***********************	

					if ($_POST["subsidio_vivienda"] == 0)
						$filtro = $filtro . " AND (" . $baseT . ".cedula NOT IN (SELECT cruce_subsidio_vivienda.identificacion FROM cruce_subsidio_vivienda WHERE identificacion = " . $baseT . ".cedula))";

					if ($_POST["subsidio_vivienda"] == 1)
						$filtro = $filtro . " AND (" . $baseT . ".cedula IN (SELECT cruce_subsidio_vivienda.identificacion FROM cruce_subsidio_vivienda WHERE identificacion = " . $baseT . ".cedula))";

					if ($_POST["subsidio_vivienda"] == 2)
						$filtro = $filtro . " AND (" . $baseT . ".cedula IN (SELECT " . $baseT . ".cedula FROM " . $baseT . "))";
					//***********************	

					if ($_POST["subsidio_vivienda_otros"] == 0)
						$filtro = $filtro . " AND (" . $baseT . ".cedula NOT IN (SELECT cruce_subsidio_vivienda_otros.identificacion FROM cruce_subsidio_vivienda_otros WHERE identificacion = " . $baseT . ".cedula))";

					if ($_POST["subsidio_vivienda_otros"] == 1)
						$filtro = $filtro . " AND (" . $baseT . ".cedula IN (SELECT cruce_subsidio_vivienda_otros.identificacion FROM cruce_subsidio_vivienda_otros WHERE identificacion = " . $baseT . ".cedula))";

					if ($_POST["subsidio_vivienda_otros"] == 2)
						$filtro = $filtro . " AND (" . $baseT . ".cedula IN (SELECT " . $baseT . ".cedula FROM " . $baseT . "))";
					//***********************	

					if ($_POST["catastro"] == 0)
						$filtro = $filtro . " AND (" . $baseT . ".cedula NOT IN (SELECT cruce_catastro.identificacion FROM cruce_catastro WHERE identificacion = " . $baseT . ".cedula))";

					if ($_POST["catastro"] == 1)
						$filtro = $filtro . " AND (" . $baseT . ".cedula IN (SELECT cruce_catastro.identificacion FROM cruce_catastro WHERE identificacion = " . $baseT . ".cedula))";

					if ($_POST["catastro"] == 2)
						$filtro = $filtro . " AND (" . $baseT . ".cedula IN (SELECT " . $baseT . ".cedula FROM " . $baseT . "))";

					if ($_POST["catastro"] == 3)
						$filtro = $filtro . " AND (" . $baseT . ".cedula NOT IN (SELECT cruce_catastro.identificacion FROM cruce_catastro WHERE identificacion = " . $baseT . ".cedula) 
													OR (" . $baseT . ".cedula IN (SELECT cruce_catastro.identificacion FROM cruce_catastro WHERE cruce_catastro.municipio LIKE 'DOSQUEBRADAS') 
														AND ((SELECT count(1) FROM cruce_catastro WHERE cruce_catastro.identificacion = " . $baseT . ".cedula) = '1')
													)
												)";

					if ($_POST["catastro"] == 4)
						$filtro = $filtro . " AND (" . $baseT . ".cedula IN (SELECT cruce_catastro.identificacion FROM cruce_catastro WHERE cruce_catastro.municipio LIKE 'DOSQUEBRADAS') 
														AND ((SELECT count(1) FROM cruce_catastro WHERE cruce_catastro.identificacion = " . $baseT . ".cedula) = '1')
												)";
					//***********************	

					if ($_POST["nuevo_hogar"] == 0)
						$filtro = $filtro . " AND (" . $baseT . ".cedula NOT IN (SELECT cruce_nuevo_hogar.identificacion FROM cruce_nuevo_hogar WHERE identificacion = " . $baseT . ".cedula))";

					if ($_POST["nuevo_hogar"] == 1)
						$filtro = $filtro . " AND (" . $baseT . ".cedula IN (SELECT cruce_nuevo_hogar.identificacion FROM cruce_nuevo_hogar WHERE identificacion = " . $baseT . ".cedula))";

					if ($_POST["nuevo_hogar"] == 2)
						$filtro = $filtro . " AND (" . $baseT . ".cedula IN (SELECT " . $baseT . ".cedula FROM " . $baseT . "))";
					//***********************	

					if ($_POST["sisben"] == 0)
						$filtro = $filtro . " AND (" . $baseT . ".cedula NOT IN (SELECT cruce_sisben.identificacion FROM cruce_sisben WHERE identificacion = " . $baseT . ".cedula))";

					if ($_POST["sisben"] == 1)
						$filtro = $filtro . " AND (" . $baseT . ".cedula IN (SELECT cruce_sisben.identificacion FROM cruce_sisben WHERE identificacion = " . $baseT . ".cedula))";

					if ($_POST["sisben"] == 2)
						$filtro = $filtro . " AND (" . $baseT . ".cedula IN (SELECT " . $baseT . ".cedula FROM " . $baseT . "))";
					//***********************	

					if ($_POST["unidos"] == 0)
						$filtro = $filtro . " AND (" . $baseT . ".cedula NOT IN (SELECT cruce_unidos.identificacion FROM cruce_unidos WHERE identificacion = " . $baseT . ".cedula))";

					if ($_POST["unidos"] == 1)
						$filtro = $filtro . " AND (" . $baseT . ".cedula IN (SELECT cruce_unidos.identificacion FROM cruce_unidos WHERE identificacion = " . $baseT . ".cedula))";

					if ($_POST["unidos"] == 2)
						$filtro = $filtro . " AND (" . $baseT . ".cedula IN (SELECT " . $baseT . ".cedula FROM " . $baseT . "))";
					//***********************	

					if ($_POST["reunidos"] == 0)
						$filtro = $filtro . " AND (" . $baseT . ".cedula NOT IN (SELECT cruce_reunidos.documento FROM cruce_reunidos WHERE documento = " . $baseT . ".cedula))";

					if ($_POST["reunidos"] == 1)
						$filtro = $filtro . " AND (" . $baseT . ".cedula IN (SELECT cruce_reunidos.documento FROM cruce_reunidos WHERE documento = " . $baseT . ".cedula))";

					if ($_POST["reunidos"] == 2)
						$filtro = $filtro . " AND (" . $baseT . ".cedula IN (SELECT " . $baseT . ".cedula FROM " . $baseT . "))";
					//***********************	

					//if ($_POST["cruce"] == 0)
					//	$filtro = $filtro . " AND (" . $baseT . ".cedula NOT IN (SELECT cruce_comfamiliar.cedula FROM cruce_comfamiliar))";

					//if ($_POST["cruce"] == 1)
					//	$filtro = $filtro . " AND (" . $baseT . ".cedula IN (SELECT cruce_comfamiliar.cedula FROM cruce_comfamiliar))";

					//if ($_POST["cruce"] == 2)
					//	$filtro = $filtro . " AND (" . $baseT . ".cedula IN (SELECT " . $baseT . ".cedula FROM " . $baseT . "))";
					//***********************	


					//Si no hay Filtro lo Deja limpio 	
					if ($filtro == " WHERE ")
						$filtro = $filtro . " (id_base = $base) ORDER BY id_ciudadano ASC";
					else
						$filtro = $filtro . " AND (id_base = $base) ORDER BY id_ciudadano ASC";

					mysqli_select_db($sle, $database_sle);
					mysqli_query($sle, "SET NAMES 'utf8'");

					$paso = 0;
					if (($base == 0) && ($_SESSION["REU"] >= "1")) {
						$sql = "SELECT * FROM ciudadanos" . $filtro;
						$resultado = mysqli_query($sle, $sql) or die(mysqli_error());
						$numero = mysqli_num_rows($resultado);
						echo "<font size='+2'>BASE DE DATOS - Por Reubicar</font><BR>" . $numero . " Registros encontrados<HR>";
						$paso = 1;
					}
					if (($base == 1) && ($_SESSION["MU"] >= "1")) {
						$sql = "SELECT * FROM ciudadanos" . $filtro;
						$resultado = mysqli_query($sle, $sql) or die(mysqli_error());
						$numero = mysqli_num_rows($resultado);
						echo "<font size='+2'>BASE DE DATOS - Mejora Vivienda Urbana</font><BR>" . $numero . " Registros encontrados<HR>";
						$paso = 1;
					}
					if (($base == 2) && ($_SESSION["MR"] >= "1")) {
						$sql = "SELECT * FROM ciudadanos" . $filtro;
						$resultado = mysqli_query($sle, $sql) or die(mysqli_error());
						$numero = mysqli_num_rows($resultado);
						echo "<font size='+2'>BASE DE DATOS - Mejora Vivienda Rural</font><BR>" . $numero . " Registros encontrados<HR>";
						$paso = 1;
					}
					if (($base == 3) && ($_SESSION["VIS"] >= "1")) {
						$sql = "SELECT * FROM ciudadanos" . $filtro;
						$resultado = mysqli_query($sle, $sql) or die(mysqli_error());
						$numero = mysqli_num_rows($resultado);
						echo "<font size='+2'>BASE DE DATOS - Vivienda Nueva</font><BR>" . $numero . " Registros encontrados<HR>";
						$paso = 1;
					}
					if (($base == 4) && ($_SESSION["VIP"] >= "1")) {
						$sql = "SELECT * FROM ciudadanos" . $filtro;
						$resultado = mysqli_query($sle, $sql) or die(mysqli_error());
						$numero = mysqli_num_rows($resultado);
						echo "<font size='+2'>BASE DE DATOS - Vivienda Interes Prioritario (VIP)</font><BR>" . $numero . " Registros encontrados<HR>";
						$paso = 1;
					}
					if (($base == 5) && ($_SESSION["DES"] >= "1")) {
						$sql = "SELECT * FROM ciudadanos" . $filtro;
						$resultado = mysqli_query($sle, $sql) or die(mysqli_error());
						$numero = mysqli_num_rows($resultado);
						echo "<font size='+2'>BASE DE DATOS - Poblacion en Condicion de Desplazamiento</font><BR>" . $numero . " Registros encontrados<HR>";
						$paso = 1;
					}
					if (($base == 6) && ($_SESSION["SP"] >= "1")) {
						$sql = "SELECT * FROM ciudadanos" . $filtro;
						$resultado = mysqli_query($sle, $sql) or die(mysqli_error());
						$numero = mysqli_num_rows($resultado);
						echo "<font size='+2'>BASE DE DATOS - Construccion en Sitio Propio</font><BR>" . $numero . " Registros encontrados<HR>";
						$paso = 1;
					}
					if (($base == 7) && ($_SESSION["MEJORAMIENTO"] >= "1")) {
						$sql = "SELECT * FROM ciudadanos" . $filtro;
						$resultado = mysqli_query($sle, $sql) or die(mysqli_error());
						$numero = mysqli_num_rows($resultado);
						echo "<font size='+2'>BASE DE DATOS - Mejoramiento</font><BR>" . $numero . " Registros encontrados<HR>";
						$paso = 1;
					}

					if ($paso == 0) {
						echo "<CENTER><BR><BR>";
						echo "NO TIENE PERMISOS PARA ACCEDER A ESTA BASE DE DATOS<BR>";
						echo "<a href='menu.php'><input type='submit' name='Volver2' id='Volver2' value='Volver' /></a>";
						echo "</CENTER>";
						return;
					} else {
						$_SESSION["sql"] = $sql;
					}
					?>
				</TD>
			</TR>

			<TR>
				<TD>
					<table class="table table-bordered">
						<tr>
							<td bgcolor="#FFCCCC">Orden</td>
							<td bgcolor="#FFCCCC">Puntaje x Antiguedad</td>
							<td bgcolor="#FFCCCC">ID Unico</td>
							<td bgcolor="#FFCCCC">Cedula</td>
							<td bgcolor="#FFCCCC">1er Nombre</td>
							<td bgcolor="#FFCCCC">2do Nombre</td>
							<td bgcolor="#FFCCCC">1er Apellido</td>
							<td bgcolor="#FFCCCC">2do Apellido</td>
						</tr>

						<?php $orden = 0; ?>
						<?php while ($row = mysqli_fetch_row($resultado)) { ?>
							<?php $orden++ ?>
							<tr>

								<td><?php echo $orden ?></td>
								<td>
									<?php 
										$puntajeAntiguedad = 5 - ( 5 / $_SESSION["NUMERO_MAGICO"]) * ( $row[80] - 1);
										echo round($puntajeAntiguedad,5);
									?>
								</td>
								<td><?php echo $row[80] ?></td>
								<td><?php echo "<a target='_blank' href='consulta0a.php?cedula=" . $row[0] . "&base=" . $base . "'>" . $row[0] . "</a>"; ?></td>
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
											<td>PIN DE SEGURIDAD</td>
											<td><input class="form-control" type="password" name="pin" id="pin" /></td>
											<td><input class="btn btn-success" name='Exportar' type='submit' id='Exportar' value='Exportar a Excel' />
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
											<td>PIN DE SEGURIDAD</td>
											<td><input class="form-control" type="password" name="pin" id="pin" /></td>
											<td><input class="btn btn-success" name='Exportar' type='submit' id='Exportar' value='Exportar a Excel TODO' />
											</td>
										</tr>
									</table>
								</form>
							</td>
						</tr>
					</table>

				</TD>
			</TR>
		</TABLE>

	</aside>

	<aside class="col-sm-12">
		<a href='menu.php'>
			<input name='Volver' type='submit' class="btn btn-success btn-block" id='Volver' value='Volver a la ventana anterior...' />
		</a>
	</aside>

</div>

<?php include("includes/footer.php"); ?>