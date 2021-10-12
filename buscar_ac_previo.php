<?php include("includes/header.php"); ?>
<?php include("includes/title.php"); ?>
<?php include("includes/login_valid_session.php"); ?>

<?php
$cedulaTemporal = $_POST['cedula'];
$nombreUno = $_POST['nombre_uno'];
$nombreDos = $_POST['nombre_dos'];
$apellidoUno = $_POST['apellido_uno'];
$apellidoDos = $_POST['apellido_dos'];

mysqli_select_db($sle, $database_sle);
mysqli_query($sle, "SET NAMES 'utf8'");

$sql = "SELECT * FROM ciudadanos WHERE ";

if ($cedulaTemporal != "")
  $sql = $sql . "(cedula = '$cedulaTemporal') AND";
if ($nombreUno != "")
  $sql = $sql . "(nombre1 LIKE '%$nombreUno%') AND";
if ($nombreDos != "")
  $sql = $sql . "(nombre2 LIKE '%$nombreDos%') AND";
if ($apellidoUno != "")
  $sql = $sql . "(apellido1 LIKE '%$apellidoUno%') AND";
if ($apellidoDos != "")
  $sql = $sql . " (apellido2 LIKE '%$apellidoDos%') AND";

if ($sql == "SELECT * FROM ciudadanos WHERE ")
  $sql = $sql . "(cedula = '')";
else
  $sql = $sql . "(cedula != 0)";

$resultado = mysqli_query($sle, $sql) or die(mysqli_error());
?>

<div class="row">
  <aside class="col-sm-1"></aside>

  <aside class="col-sm-10">

    <h4 class="card-title mb-4 mt-1">Registros encontrados acorde a filtros de consulta...</h4>

      <table class="table table-bordered">
        <tr>
          <td bgcolor="#FFCCCC">Documento</td>
          <td bgcolor="#FFCCCC">Primer nombre</td>
          <td bgcolor="#FFCCCC">Segundo nombre</td>
          <td bgcolor="#FFCCCC">Primer apellido</td>
          <td bgcolor="#FFCCCC">Segundo apellido</td>
          <td bgcolor="#FFCCCC"></td>
        </tr>

        <?php while ($row = mysqli_fetch_row($resultado)) {

          echo "<form method='POST' action='buscar_ac0.php'>";
          echo "<input type='hidden' id='cedula' name='cedula' value=$row[0]>";

            echo "<tr>
              <td>$row[0]</td>
              <td>$row[3]</td>
              <td>$row[4]</td>
              <td>$row[5]</td>
              <td>$row[6]</td>
              <td><button type='submit' class='btn btn-success btn-block'> Consultar </button></td>
            </tr>";

          echo "</form>";
        }
        ?>

      </table>

  </aside>

  <aside class="col-sm-1"></aside>
</div>

<?php include("includes/footer.php"); ?>