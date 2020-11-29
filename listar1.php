<?php include("includes/header.php"); ?>
<?php include("includes/title.php"); ?>
<?php include("includes/login_valid_session.php"); ?>

<script type="text/javascript">
  //VERIFICAR ESPACIOS EN BLANCO
  function noespacios() {
    var er = new RegExp(/\s/);
    var web = document.getElementById('nombre1').value;
    if (er.test(web)) {
      alert('No se permiten espacios en campo PRIMER NOMBRE');
      return false;
    }
    var web = document.getElementById('nombre2').value;
    if (er.test(web)) {
      alert('No se permiten espacios en campo SEGUNDO NOMBRE');
      return false;
    }
    var web = document.getElementById('apellido1').value;
    if (er.test(web)) {
      alert('No se permiten espacios en campo PRIMER APELLIDO');
      return false;
    }
    var web = document.getElementById('apellido2').value;
    if (er.test(web)) {
      alert('No se permiten espacios en campo SEGUNDO APELLIDO');
      return false;
    }

    //VERIFICA CAMPOS VACIOS
    if (document.getElementById('nombre1').value == '') {
      alert('Debe ingresar por lo menos un nombre');
      return false;
    }
    if (document.getElementById('apellido1').value == '') {
      alert('Debe ingresar por lo menos un apellido');
      return false;
    }
    if (document.getElementById('direccion').value == '') {
      alert('Debe ingresar una direccion valida');
      return false;
    }
    if ((document.getElementById('fijo').value == '') && (document.getElementById('celular').value == '')) {
      alert('Debe ingresar un Telefono o Celular');
      return false;
    }

    return true;
  }

  //ACEPTAR SOLO NUMEROS
  var nav4 = window.Event ? true : false;

  function acceptNum(evt) {
    var key = nav4 ? evt.which : evt.keyCode;
    return (key <= 13 || (key >= 48 && key <= 57));
  }
</script>


<div class="row">
  <aside class="col-sm-2"></aside>

  <aside class="col-sm-8">

    <?php
    $base = $_GET['base'];
    mysqli_select_db($sle, $database_sle);
    mysqli_query($sle, "SET NAMES 'utf8'");

    echo "<BR>";
    $paso = 0;
    if (($base == 0) && ($_SESSION["REU"] >= "1")) {
      $sql = "SELECT * FROM ciudadanos WHERE id_base = '0'";
      $resultado = mysqli_query($sle, $sql) or die(mysqli_error());
      $numero = mysqli_num_rows($resultado);
      echo "<center><font size='+2'>BASE DE DATOS - Por Reubicar</font><BR>" . $numero . " Registros encontrados </center>";
      $paso = 1;
    }
    if (($base == 1) && ($_SESSION["MU"] >= "1")) {
      $sql = "SELECT * FROM ciudadanos WHERE id_base = '1'";
      $resultado = mysqli_query($sle, $sql) or die(mysqli_error());
      $numero = mysqli_num_rows($resultado);
      echo "<center><font size='+2'>BASE DE DATOS - Mejora Vivienda Urbana</font><BR>" . $numero . " Registros encontrados </center>";
      $paso = 1;
    }
    if (($base == 2) && ($_SESSION["MR"] >= "1")) {
      $sql = "SELECT * FROM ciudadanos WHERE id_base = '2'";
      $resultado = mysqli_query($sle, $sql) or die(mysqli_error());
      $numero = mysqli_num_rows($resultado);
      echo "<center><font size='+2'>BASE DE DATOS - Mejora Vivienda Rural</font><BR>" . $numero . " Registros encontrados </center>";
      $paso = 1;
    }
    if (($base == 3) && ($_SESSION["VIS"] >= "1")) {
      $sql = "SELECT * FROM ciudadanos WHERE id_base = '3'";
      $resultado = mysqli_query($sle, $sql) or die(mysqli_error());
      $numero = mysqli_num_rows($resultado);
      echo "<center><font size='+2'>BASE DE DATOS - Vivienda Nueva</font><BR>" . $numero . " Registros encontrados </center>";
      $paso = 1;
    }
    if (($base == 4) && ($_SESSION["VIP"] >= "1")) {
      $sql = "SELECT * FROM ciudadanos WHERE id_base = '4'";
      $resultado = mysqli_query($sle, $sql) or die(mysqli_error());
      $numero = mysqli_num_rows($resultado);
      echo "<center><font size='+2'>BASE DE DATOS - Vivienda Interes Prioritario (VIP)</font><BR>" . $numero . " Registros encontrados </center>";
      $paso = 1;
    }
    if (($base == 5) && ($_SESSION["DES"] >= "1")) {
      $sql = "SELECT * FROM ciudadanos WHERE id_base = '5'";
      $resultado = mysqli_query($sle, $sql) or die(mysqli_error());
      $numero = mysqli_num_rows($resultado);
      echo "<center><font size='+2'>BASE DE DATOS - Poblacion en Condicion de Desplazamiento</font><BR>" . $numero . " Registros encontrados </center>";
      $paso = 1;
    }
    if (($base == 6) && ($_SESSION["SP"] >= "1")) {
      $sql = "SELECT * FROM ciudadanos WHERE id_base = '6'";
      $resultado = mysqli_query($sle, $sql) or die(mysqli_error());
      $numero = mysqli_num_rows($resultado);
      echo "<center><font size='+2'>BASE DE DATOS - Construccion en Sitio Propio</font><BR>" . $numero . " Registros encontrados </center>";
      $paso = 1;
    }

    if ($paso == 0) {
      echo "<CENTER><BR><BR>";
      echo "NO TIENE PERMISOS PARA ACCEDER A ESTA BASE DE DATOS<BR>";
      echo "<a href='menu.php'><input type='submit' name='Volver2' id='Volver2' value='Volver' /></a>";
      echo "</CENTER>";
      return;
    }
    ?>
  </aside>

  <aside class="col-sm-2"></aside>
</div>



<div class="row">
  <aside class="col-sm-12">
    <form id="form1" name="form1" method="post" action="listar2.php">
      <center><br>FILTROS DE LISTADO CON CRUCE COMFAMILIAR <input type="hidden" name="base" value="<?php echo $base; ?>" id="base" /></center><hr>
  </aside>
</div>

<div class="row">
  <aside class="col-sm-3">
    <label>Filtros AFILIACION</label>
    <br />
    <label><input name="afiliacion" type="radio" id="afiliacion_0" value="1" />Reporten alguna afiliacion</label>
    <br />
    <label><input name="afiliacion" type="radio" id="afiliacion_1" value="0" />No reporten afiliacion</label>
    <br />
    <label><input name="afiliacion" type="radio" id="afiliacion_2" value="2" checked="checked" />Cualquiera</label>
  </aside>

  <aside class="col-sm-3">
    <label>Filtros BENEFICIARIOS</label>
    <br />
    <label><input type="radio" name="beneficiarios" value="1" id="beneficiarios_0" />Reportan algun beneficio</label>
    <br />
    <label><input name="beneficiarios" type="radio" id="beneficiarios_1" value="0" />No reportan beneficios</label>
    <br />
    <label><input name="beneficiarios" type="radio" id="beneficiarios_2" value="2" checked="checked" />Cualquiera</label>
  </aside>

  <aside class="col-sm-3">
    <label>Filtros OTRAS CIUDADES</label>
    <br />
    <label><input type="radio" name="otros" value="1" id="otros_0" />Reportes de otras ciudades</label>
    <br />
    <label><input name="otros" type="radio" id="otros_1" value="0" />No reportan de otras ciudades</label>
    <br />
    <label><input name="otros" type="radio" id="otros_2" value="2" checked="checked" />Cualquiera</label>
  </aside>

  <aside class="col-sm-3">
    <label>Filtro ESTADO CRUCES</label>
    <br />
    <label><input name="cruce" type="radio" id="cruce_0" value="1" />Ya cruzados Comfamiliar</label>
    <br />
    <label><input name="cruce" type="radio" id="cruce_1" value="0" />Por cruzar</label>
    <br />
    <label><input name="cruce" type="radio" id="cruce_2" value="2" checked="checked" />Cualquiera</label>
  </aside>

  <aside class="col-sm-12">
    <hr><input name='Listar' type='submit' class="btn btn-info btn-block" id='Listar' value='Listar segun filtros seleccionados' /><hr>
  </aside>

  <aside class="col-sm-12">
    <a href='menu.php'>
      <input name='Volver' type='submit' class="btn btn-success btn-block" id='Volver' value='Volver a la ventana anterior...' />
    </a>
  </aside>

  </form>
</div>

<?php include("includes/footer.php"); ?>