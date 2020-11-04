<?php include("includes/header.php"); ?>
<?php include("includes/title.php"); ?>

<?php
$usuario = $_POST['usuario'];
$contrasena = $_POST['password'];

mysqli_select_db($sle, $database_sle);
$sql = "SELECT * FROM usuarios WHERE  (cedula like '$usuario') AND (password like '$contrasena')";

$resultado = mysqli_query($sle, $sql) or die(mysqli_error());
if (mysqli_num_rows($resultado) == 0) {
  echo "<div class='alert alert-info' style='align-content: center;'>
          <center>Credenciales de acceso INVALIDAS - Acceso Denegado</center>
        </div>";
  echo "<div class='form-group'>
          <a href='index.php'><button type='submit' class='btn btn-success btn-block'> Volver... </button></a>
        </div>";
  exit;
}

$row = mysqli_fetch_row($resultado);
if ($row[7] == 0) {
  echo "<div class='alert alert-info' style='align-content: center;'>
          <center>Usuario INACTIVO en el sistema - Acceso Denegado</center>
        </div>";
  echo "<div class='form-group'>
          <a href='index.php'><button type='submit' class='btn btn-success btn-block'> Volver... </button></a>
        </div>";
  exit;
}

$_SESSION["nivel"] = $row[7];
$_SESSION["dependencia"] = $row[6];
$_SESSION["cedula"] = $row[0];
$_SESSION["usuario"] = $row[1] . " " . $row[2] . " " . $row[3] . " " . $row[4];
$_SESSION["nivel_descripcion"] = "Usuario Activo";

$_SESSION["MR"] = $row[8];
$_SESSION["MU"] = $row[9];
$_SESSION["REU"] = $row[10];
$_SESSION["VIP"] = $row[11];
$_SESSION["VIS"] = $row[12];
$_SESSION["DES"] = $row[13];
$_SESSION["SP"] = $row[14];
$_SESSION["NOVEDADES"] = $row[15];
$_SESSION["POSTULACION"] = $row[16];
$_SESSION["VISITA"] = $row[17];
?>

<!-- Contenido -->
<div class="row">
  <div class="col-md-4"></div>
  <div class="col-md-4">
    <br>
    <div class="alert alert-info" style="align-content: center;">
      <strong>Bienvenido </strong> <?php echo $_SESSION["usuario"] ?>
    </div>
    <br>

    <div class="form-group">
      <a href="menu.php"><button type="submit" class="btn btn-success btn-block"> Cargar modulos SICRU </button></a>
    </div>
    <br>

  </div>
  <div class="col-md-4"></div>
</div>


<?php include("includes/footer.php"); ?>