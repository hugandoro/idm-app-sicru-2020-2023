<?php include("includes/header.php"); ?>
<?php include("includes/title.php"); ?>
<?php include("includes/login_valid_session.php"); ?>

<div class="row">
  <aside class="col-sm-3"></aside>

  <aside class="col-sm-6">
    <div class="card">
      <article class="card-body">
        <h4 class="card-title mb-4 mt-1">Consultar las bases de datos...</h4>
        <form id="form1" name="form1" method="POST" action="buscar_ac_previo.php">
          <div class="form-group">
            <label>Digite N° de Cedula</label>
            <input name="cedula" id="cedula" class="form-control" type="number" placeholder="Consultar por numero de cedula...">
          </div>

          <div class="form-group">
            <br>
            <h5 class="card-title mb-4 mt-1">Filtro general de consulta...</h5>
            <hr>

            <label>Nombre completo a consultar</label>
            <input name="nombre_completo" id="nombre_completo" class="form-control" type="text" placeholder="Digite el nombre a consultar con palabras separadas por espacios...">


            <br>
            <h5 class="card-title mb-4 mt-1">Filtros adicionales de consulta...</h5>
            <hr>

            <label>Primer nombre</label>
            <input name="nombre_uno" id="nombre_uno" class="form-control" type="text" placeholder="Consultar por primer nombre...">
            <label>Segundo nombre</label>
            <input name="nombre_dos" id="nombre_dos" class="form-control" type="text" placeholder="Consultar por segundo nombre...">
            <label>Primer apellido</label>
            <input name="apellido_uno" id="apellido_uno" class="form-control" type="text" placeholder="Consultar por primer apellido...">
            <label>Primer apellido</label>
            <input name="apellido_dos" id="apellido_dos" class="form-control" type="text" placeholder="Consultar por segundo apellido...">
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