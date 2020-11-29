<?php include("includes/header.php"); ?>
<?php include("includes/title.php"); ?>
<?php include("includes/login_valid_session.php"); ?>


<div class="row">
  <div class="col-md-2"></div>

  <div class="col-md-8">

    <?php
    $cedula = $_GET['cedula'];
    mysqli_select_db($sle, $database_sle);
    mysqli_query($sle, "SET NAMES 'utf8'");
    $paso = 0;

    if ($_SESSION["NOVEDADES"] >= "1") {
      echo "<center><H4>NOVEDADES - Cruce Comfamiliar</H4></center><BR><BR>";
      $sql = "SELECT * FROM cruce_comfamiliar WHERE cedula = '$cedula'";
      $resultado = mysqli_query($sle, $sql) or die(mysqli_error());
      $row = mysqli_fetch_row($resultado);
      $afiliado = $row[1];
      $beneficiario = $row[2];
      $otras_ciudades = $row[3];
      $direccion = $row[4];
      $departamento = $row[5];
      $municipio = $row[6];
      $sisben = $row[7];
    } else {
      echo "<center>NO TIENE PERMISOS PARA ACCEDER A ESTA BASE DE DATOS</center><BR>";
      echo "<center><a href='menu.php'><input type='submit' name='Volver2' id='Volver2' value='Volver a la ventana anterior...' class='btn btn-success'/></a></center>";
      return;
    }
    ?>

    <table class="table">
      <tr>
        <th>CEDULA CON NOVEDAD</th>
        <td colspan="2"><?php echo $cedula; ?></td>
        <td></td>
      </tr>
      <tr>
        <th>Caja de compensacion</th>
        <td colspan="2"><?php echo $afiliado; ?></td>
        <td></td>
      </tr>
      <tr>
        <th>Beneficiarios Subsidios</th>
        <td colspan="2"><?php echo $beneficiario; ?></td>
        <td></td>
      </tr>
      <tr>
        <th>Otras propiedades</th>
        <td colspan="2"><?php echo $otras_ciudades; ?></td>
        <td></td>
      </tr>
      <tr>
        <th>Direccion</th>
        <td colspan="2"><?php echo $direccion; ?></td>
        <td></td>
      </tr>
      <tr>
        <th>Departamento</th>
        <td colspan="2"><?php echo $departamento; ?></td>
        <td></td>
      </tr>
      <tr>
        <th>Municipio</th>
        <td colspan="2"><?php echo $municipio; ?></td>
        <td></td>
      </tr>
      <tr>
        <th>PUNTAJE SISBEN</th>
        <td colspan="2"><?php echo $sisben; ?></td>
        <td></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>
          <form id="form1" name="form1" method="post" action="buscar_ac0.php">
            <input name='Volver2' type='submit' class="btn btn-success" id='Volver2' value='Volver a la ventana anterior...' />
            <input type="hidden" name="cedula" id="cedula" value='<?php echo $cedula ?>' />
          </form>
        </td>
        <td> <?php if ($_SESSION["NOVEDADES"] == "4") { ?>
            <a href='eliminarnovedad0.php?cedula=<?php echo $cedula ?>' onclick="return confirmar('ALERTA !!! ¿Estas seguro de eliminar del CRUCE COMFAMILIAR ?')"><input name='Volver3' type='submit' class="btn btn-danger" id='Volver3' value='Eliminar novedad de CRUCE' />
            </a>
          <?php } ?></td>
        <td></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td></td>
        <td></td>
        <td>&nbsp;</td>
      </tr>
    </table>

  </div>

  <div class="col-md-2"></div>

</div>

<?php include("includes/footer.php"); ?>