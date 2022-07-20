<?php include("includes/header.php"); ?>
<?php include("includes/title.php"); ?>
<?php include("includes/login_valid_session.php"); ?>

<div class="row">
  <aside class="col-sm-3"></aside>

  <aside class="col-sm-6">

    <?php if ($_SESSION["VISITA"] >= "3") { ?>
      <p><a href="visitas_ingresar0.php">
          <input type="submit" class="btn btn-info btn-block" value="Registrar visita tecnica" />
        </a></p>
    <?php } ?>

    <HR>

    <?php if ($_SESSION["VISITA"] >= "1") { ?>
      <p><a href="visitas_buscar0.php">
          <input type="submit" class="btn btn-info btn-block" value="Consultar Fichas Visitas Tecnicas" />
        </a></p>
    <?php } ?>

    <?php
    echo "<HR><a href='menu.php'><input type='submit' name='Volver' id='Volver' value='Volver a la ventana anterior...' class='btn btn-info btn-block'/></a>";
    ?>

  </aside>

  <aside class="col-sm-3"></aside>
</div>

<?php include("includes/footer.php"); ?>