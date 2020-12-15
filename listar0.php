<?php include("includes/header.php"); ?>
<?php include("includes/title.php"); ?>
<?php include("includes/login_valid_session.php"); ?>

<div class="row">
	<aside class="col-sm-3"></aside>

	<aside class="col-sm-6">

		<?php
		//if ($_SESSION["REU"] >= "1")
		//	echo "<a href='listar1.php?base=0'><input type='submit' name='Por Reubicar' id='PR' value='Por Reubicar' class='btn btn-info btn-block'/></a><HR>";
		//if ($_SESSION["MU"] >= "1")
		//	echo "<a href='listar1.php?base=1'><input type='submit' name='Mejoramiento Urbano' id='MU' value='Mejoramiento Urbano' class='btn btn-info btn-block'/></a><HR>";
		//if ($_SESSION["MR"] >= "1")
		//	echo "<a href='listar1.php?base=2'><input type='submit' name='Mejoramiento Rural' id='MR' value='Mejoramiento Rural' class='btn btn-info btn-block'/></a><HR>";
		if ($_SESSION["VIS"] >= "1")
			echo "<a href='listar1.php?base=3'><input type='submit' name='Vivienda Nueva' id='VIS' value='Vivienda Nueva' class='btn btn-info btn-block'/></a><HR>";
		//if ($_SESSION["VIP"] >= "1")
		//	echo "<a href='listar1.php?base=4'><input type='submit' name='Vivienda VIP' id='VIP' value='Vivienda VIP' class='btn btn-info btn-block'/></a><HR>";
		//if ($_SESSION["DES"] >= "1")
		//	echo "<a href='listar1.php?base=5'><input type='submit' name='Desplazados' id='DES' value='Desplazados' class='btn btn-info btn-block'/></a><HR>";
		//if ($_SESSION["SP"] >= "1")
		//	echo "<a href='listar1.php?base=6'><input type='submit' name='Sitio Propio' id='SIP' value='Sitio Propio' class='btn btn-info btn-block'/></a><HR>";
		if ($_SESSION["MEJORAMIENTO"] >= "1")
			echo "<a href='listar1.php?base=7'><input type='submit' name='Mejoramiento' id='MEJORA' value='Mejoramiento' class='btn btn-info btn-block'/></a><HR>";

		echo "<HR><a href='menu.php'><input type='submit' name='Volver' id='Volver' value='Volver a la ventana anterior...' class='btn btn-success btn-block'/></a>";
		?>
	</aside>

	<aside class="col-sm-3"></aside>
</div>

<?php include("includes/footer.php"); ?>