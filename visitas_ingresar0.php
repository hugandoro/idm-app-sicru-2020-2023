<?php include("includes/header.php"); ?>
<?php include("includes/title.php"); ?>
<?php include("includes/login_valid_session.php"); ?>

<div class="row">
	<aside class="col-sm-3"></aside>

	<aside class="col-sm-6">
		<form name="form1" method="post" onSubmit="return revisar(form1);" action="visitas_ingresar1.php">
			<div class="form-group">
				<label>Digite N° de Cedula</label>
				<input type="number" class="form-control" name="cedula" id="cedula" onkeypress="return acceptNum(event)" />
			</div>
          	<div class="form-group">
				<input type="submit" class="btn btn-success btn-block" value=" Consultar" /></p>
			</div>
		</form>
	</aside>

	<aside class="col-sm-3"></aside>
</div>

<?php include("includes/footer.php"); ?>