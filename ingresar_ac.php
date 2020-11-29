<?php include("includes/header.php"); ?>
<?php include("includes/title.php"); ?>
<?php include("includes/login_valid_session.php"); ?>

<div class="row">
	<aside class="col-sm-3"></aside>

	<aside class="col-sm-6">
		<div class="card">
			<article class="card-body">
				<h4 class="card-title mb-4 mt-1">Consultar las bases de datos...</h4>
				<form name="form1" method="post" onSubmit="return revisar(form1);" action="ingresar_ac0.php">
					<div class="form-group">
						<label>Digite N° de Cedula</label>
						<input class="form-control"  type="number" name="cedula" id="cedula" onkeypress="return acceptNum(event)" />
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-success btn-block">Validar... </button>
					</div>
				</form>
			</article>
		</div>
	</aside>

	<aside class="col-sm-3"></aside>
</div>

<?php include("includes/footer.php"); ?>