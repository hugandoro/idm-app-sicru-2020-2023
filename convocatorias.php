<?php include("includes/header.php"); ?>
<?php include("includes/title.php"); ?>
<?php include("includes/login_valid_session.php"); ?>


<div class="row">
  <aside class="col-sm-3"></aside>

  <aside class="col-sm-6">

    <?php if ($_SESSION["POSTULACION"] >= "1") { ?>
      <p><a href="convocatorias_buscar0.php">
          <input type="submit" class="btn btn-info btn-block" value="Buscar Postulacion" />
        </a></p>
    <?php } ?>

    <?php if ($_SESSION["POSTULACION"] >= "3") { ?>
      <p><a href="convocatorias_inscribir0.php">
          <input type="submit" class="btn btn-info btn-block" value="Inscribir a Convocatoria" />
        </a></p>
    <?php } ?>

    <?php if ($_SESSION["POSTULACION"] == "4") { ?>
      <p><a href="convocatorias_eliminar0.php">
          <input type="submit" class="btn btn-info btn-block" value="Retirar de una Convocatoria" />
        </a></p>
    <?php } ?>
    
    <hr><hr>

    <?php if ($_SESSION["POSTULACION"] >= "1") { ?>
      <p><a href="convocatorias_ver0.php">
          <input type="submit" class="btn btn-info btn-block" value="Convocatorias ABIERTAS" />
        </a></p>
    <?php } ?>

    <?php if ($_SESSION["POSTULACION"] >= "1") { ?>
      <p><a href="convocatorias_ver_cerradas0.php">
          <input type="submit" class="btn btn-info btn-block" value="Convocatorias CERRADAS" />
        </a></p>
    <?php } ?>

    <?php if ($_SESSION["POSTULACION"] >= "1") { ?>
      <p><a href="convocatorias_ver_archivadas0.php">
          <input type="submit" class="btn btn-info btn-block" value="Convocatorias ARCHIVADAS" />
        </a></p>
    <?php } ?>


    <?php
    echo "<HR><hr><a href='menu.php'><input type='submit' name='Volver' id='Volver' value='Volver a la ventana anterior...' class='btn btn-info btn-block'/></a>";
    ?>

  </aside>

  <aside class="col-sm-3"></aside>
</div>

<?php include("includes/footer.php"); ?>