<?php include("includes/header.php"); ?>
<?php include("includes/title.php"); ?>

<div class="row">
  <aside class="col-sm-3"></aside>

  <aside class="col-sm-6">
    <div class="card">
      <article class="card-body">
        <h4 class="card-title mb-4 mt-1">Realiza tu inscripcion en linea</h4>
        <form id="form1" name="form1" method="POST" action="ciudadano_inscribir_en_linea_1.php">
          <div class="form-group">
            <label>Digite tu N° de Cedula</label>
            <input name="cedula" id="cedula" class="form-control" type="number" required>
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-success btn-block"> Continuar | Paso N° 1... </button>
          </div>
        </form>
      </article>
    </div>
  </aside>

  <aside class="col-sm-3"></aside>
</div>

<?php include("includes/footer.php"); ?>