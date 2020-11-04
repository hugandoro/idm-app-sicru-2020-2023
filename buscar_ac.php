<?php include("includes/header.php"); ?>
<?php include("includes/title.php"); ?>
<?php include("includes/login_valid_session.php"); ?>

<div class="row">
  <aside class="col-sm-3"></aside>

  <aside class="col-sm-6">
    <div class="card">
      <article class="card-body">
        <h4 class="card-title mb-4 mt-1">Consultar las bases de datos...</h4>
        <form id="form1" name="form1" method="POST" action="buscar_ac0.php">
          <div class="form-group">
            <label>Digite N° de Cedula</label>
            <input name="cedula" id="cedula" class="form-control" type="number">
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-success btn-block"> Consultar </button>
          </div>
        </form>
      </article>
    </div>
  </aside>

  <aside class="col-sm-3"></aside>
</div>

<?php include("includes/footer.php"); ?>