<?php include("includes/header.php"); ?>
<?php include("includes/title.php"); ?>
<?php include("includes/login_valid_session.php"); ?>

<div class="row">
  <aside class="col-sm-2"></aside>

  <aside class="col-sm-8">

    <?php
    mysqli_select_db($sle, $database_sle);
    mysqli_query($sle, "SET NAMES 'utf8'");


    // En caso de recibir un requerimiento de CIERRE CONVOCATORIA
    if ($_SESSION["POSTULACION_ADMIN"] == "4") {
      $convocatoria = "NA";
      if (isset($_GET['convocatoria']))
        $convocatoria = $_GET['convocatoria'];
      if ($convocatoria != "NA") {
        $sqlAA = "UPDATE convocatorias SET estado ='2' WHERE id_proyecto = '$convocatoria'";
        $resultAA = mysqli_query($sle, $sqlAA);
      }
    }
    // Fin cierre convocatoria **********************************


    echo "<center>LISTADO DE CONVOCATORIAS<BR><BR>";
    ?>

    <form name="form1" method="post" onSubmit="return revisar(form1);" action="convocatorias_ver1.php">
      <label for="base">Vigentes</label>
      <?php
      $sqlC = "SELECT * FROM convocatorias";
      $resultC = mysqli_query($sle, $sqlC);
      echo "<select name='convocatoria' id='convocatoria' class='form-control'>";
      while ($rowC = mysqli_fetch_row($resultC)) {
        if ($rowC[3] == 1)
          echo "<option value='$rowC[0]'>$rowC[1] ($rowC[2])</option>";
      }
      echo "</select>";
      ?>
      <p>
        <br><input type="submit" class="btn btn-success btn-block" value="Listar Postulados &gt;&gt;" />
      </p>
    </form>
    <?php
    echo "<HR><a href='convocatorias.php'><input type='submit' name='Volver' id='Volver' value='Volver a la ventana anterior...' class='btn btn-success btn-block'/></a>";
    ?>

  </aside>

  <aside class="col-sm-2"></aside>
</div>

<?php include("includes/footer.php"); ?>