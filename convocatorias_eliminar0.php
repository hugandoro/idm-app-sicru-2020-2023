<?php include("includes/header.php"); ?>
<?php include("includes/title.php"); ?>
<?php include("includes/login_valid_session.php"); ?>

<div class="row">
	<aside class="col-sm-3"></aside>

	<aside class="col-sm-6">

		<script type="text/javascript">
			//VALIDA ANTES DE ELIMINAR
			function confirmar(texto) {
				if (confirm(texto)) {
					return true;
				} else return false;
			}
		</script>


		<form name="form1" method="post" onSubmit="return confirmar('ALERTA !!! ¿Estas seguro de retirar el ciudadano de convocatoria vigente?');" action="convocatorias_eliminar1.php">
			<p>Digite N° de Cedula
				<input type="number" class="form-control" name="cedula" id="cedula" onkeypress="return acceptNum(event)" />
			</p>
			<p> <input type="submit" class="btn btn-success btn-block" value="Retirar de Convocatorias Vigentes &gt;&gt;" /></p>
		</form>

	</aside>

	<aside class="col-sm-3"></aside>
</div>

<?php include("includes/footer.php"); ?>