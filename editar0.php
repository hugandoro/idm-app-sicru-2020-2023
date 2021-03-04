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
  <aside class="col-sm-1"></aside>

  <aside class="col-sm-10">
    <?php
    $cedula = $_GET['cedula'];
    $base = $_GET['base'];
    mysqli_select_db($sle, $database_sle);
    mysqli_query($sle, "SET NAMES 'utf8'");

    $paso = 0;
    if (($base == 0) && ($_SESSION["REU"] >= "2")) {
      echo "<div style='text-align: center;'><H3>BASE DE DATOS - Por Reubicar</H3><HR></div>";
      $sql = "SELECT * FROM ciudadanos WHERE (cedula = '$cedula')";
      $resultado = mysqli_query($sle, $sql) or die(mysqli_error());
      if (mysqli_num_rows($resultado) > 0) $paso = 1;
    }
    if (($base == 1) && ($_SESSION["MU"] >= "2")) {
      echo "<div style='text-align: center;'><H3>BASE DE DATOS - Mejora Vivienda Urbana</H3><HR></div>";
      $sql = "SELECT * FROM ciudadanos WHERE (cedula = '$cedula')";
      $resultado = mysqli_query($sle, $sql) or die(mysqli_error());
      if (mysqli_num_rows($resultado) > 0) $paso = 1;
    }
    if (($base == 2) && ($_SESSION["MR"] >= "2")) {
      echo "<div style='text-align: center;'><H3>BASE DE DATOS - Mejora Vivienda Rural</H3><HR></div>";
      $sql = "SELECT * FROM ciudadanos WHERE (cedula = '$cedula')";
      $resultado = mysqli_query($sle, $sql) or die(mysqli_error());
      if (mysqli_num_rows($resultado) > 0) $paso = 1;
    }
    if (($base == 3) && ($_SESSION["VIS"] >= "2")) {
      echo "<div style='text-align: center;'><H3>BASE DE DATOS - Vivienda Nueva</H3><HR></div>";
      $sql = "SELECT * FROM ciudadanos WHERE (cedula = '$cedula')";
      $resultado = mysqli_query($sle, $sql) or die(mysqli_error());
      if (mysqli_num_rows($resultado) > 0) $paso = 1;
    }
    if (($base == 4) && ($_SESSION["VIP"] >= "2")) {
      echo "<div style='text-align: center;'><H3>BASE DE DATOS - Vivienda Interes Prioritario (VIP)</H3><HR></div>";
      $sql = "SELECT * FROM ciudadanos WHERE (cedula = '$cedula')";
      $resultado = mysqli_query($sle, $sql) or die(mysqli_error());
      if (mysqli_num_rows($resultado) > 0) $paso = 1;
    }
    if (($base == 5) && ($_SESSION["DES"] >= "2")) {
      echo "<div style='text-align: center;'><H3>BASE DE DATOS - Poblacion en Condicion de Desplazamiento</H3><HR></div>";
      $sql = "SELECT * FROM ciudadanos WHERE (cedula = '$cedula')";
      $resultado = mysqli_query($sle, $sql) or die(mysqli_error());
      if (mysqli_num_rows($resultado) > 0) $paso = 1;
    }
    if (($base == 6) && ($_SESSION["SP"] >= "2")) {
      echo "<div style='text-align: center;'><H3>BASE DE DATOS - Construccion en Sitio Propio</H3><HR></div>";
      $sql = "SELECT * FROM ciudadanos WHERE (cedula = '$cedula')";
      $resultado = mysqli_query($sle, $sql) or die(mysqli_error());
      if (mysqli_num_rows($resultado) > 0) $paso = 1;
    }
    if (($base == 7) && ($_SESSION["MEJORAMIENTO"] >= "2")) {
      echo "<div style='text-align: center;'><H3>BASE DE DATOS - Mejoramiento</H3><HR></div>";
      $sql = "SELECT * FROM ciudadanos WHERE (cedula = '$cedula')";
      $resultado = mysqli_query($sle, $sql) or die(mysqli_error());
      if (mysqli_num_rows($resultado) > 0) $paso = 1;
    }

    if ($paso == 1) {
      $row = mysqli_fetch_row($resultado);
    } else {
      echo "<CENTER><BR><BR>";
      echo "<BR>NO TIENE PERMISOS PARA ACCEDER A ESTA BASE DE DATOS<BR>";
      echo "<a href='menu.php'><input type='submit' name='Volver2' class='btn btn-success btn-block' id='Volver2' value='Volver a la ventana anterior...' /></a>";
      echo "</CENTER>";
      return;
    }

    ?>
  </aside>

  <aside class="col-sm-1"></aside>
</div>

<div class="row">
  <aside class="col-sm-12">

    <form name="form1" method="post" onsubmit="return noespacios()" action="editar1.php">
      <table class="table table-bordered">

        <tr>
          <td colspan="4">
            <div class='alert alert-secondary'>
              <H5>DATOS BASICOS</H5>
            </div>
          </td>
        </tr>

        <tr>
          <th width="15%">Cedula</th>
          <td width="35%"><input class="form-control" name="cedula" type="number" id="cedula" onkeypress="return acceptNum(event)" readonly="readonly" <?php echo "value=" . $cedula ?>></td>
          <td width="15%">&nbsp;</td>
          <td width="35%">&nbsp;</td>
        </tr>
        <tr>
          <th>Situacion Actual</th>
          <td>
            <select name="situacion" id="situacion" input class="form-control">
              <option value="<?php echo $row['1'] ?>" selected="selected"><?php echo $row['1'] ?></option>
              <option value="NO APLICA">NO APLICA</option>
              <option value="DESPLAZADOS">DESPLAZADOS</option>
              <option value="RED UNIDOS">RED UNIDOS</option>
              <option value="SISBEN">SISBEN</option>
              <option value="SITUACION DE DISCAPACIDAD">SITUACION DE DISCAPACIDAD</option>
              <option value="CABEZA DE HOGAR">CABEZA DE HOGAR</option>
              <option value="ZONA DE ALTO RIESGO">ZONA DE ALTO RIESGO</option>
              <option value="VICTIMA DE LA VIOLENCIA">VICTIMA DE LA VIOLENCIA</option>
            </select></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <th>Situacion Laboral</th>
          <td><select name="laboral" id="laboral" input class="form-control">
              <option value="<?php echo $row['53'] ?>" selected="selected"><?php echo $row['53'] ?></option>
              <option value="NO APLICA">NO APLICA</option>
              <option value="EMPLEADO">EMPLEADO</option>
              <option value="INDEPENDIENTE">INDEPENDIENTE</option>
              <option value="PENSIONADO">PENSIONADO</option>
              <option value="DESEMPLEADO">DESEMPLEADO</option>
            </select></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <th>Parentesco</th>
          <td><select name="parentesco" id="parentesco" input class="form-control">
              <option value="<?php echo $row['2'] ?>" selected="selected"><?php echo $row['2'] ?></option>
              <option value="REPRESENTANTE">REPRESENTANTE</option>
              <option value="JEFE">JEFE</option>
            </select></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <th>1er Nombre</th>
          <td><input class="form-control" type="text" name="nombre1" id="nombre1" onkeyup="this.value=this.value.toUpperCase()" value="<?php echo $row[3] ?>"></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <th>2do Nombre</th>
          <td><input class="form-control" type="text" name="nombre2" id="nombre2" onkeyup="this.value=this.value.toUpperCase()" value="<?php echo $row[4] ?>"></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <th>1er Apellido</th>
          <td><input class="form-control" type="text" name="apellido1" id="apellido1" onkeyup="this.value=this.value.toUpperCase()" value="<?php echo $row[5] ?>"></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <th>2do Apellido</th>
          <td><input class="form-control" type="text" name="apellido2" id="apellido2" onkeyup="this.value=this.value.toUpperCase()" value="<?php echo $row[6] ?>"></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <th>Fecha de nacimiento</th>
          <td><input class="form-control" name="edad" type="date" id="edad" value="<?php echo $row[7] ?>" /></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <th>Direccion</th>
          <td><input class="form-control" name="direccion" type="text" id="direccion" size="50" onkeyup="this.value=this.value.toUpperCase()" value="<?php echo $row[8] ?>"></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <th>Barrio</th>
          <td><input class="form-control" name="barrio" type="text" id="barrio" size="40" onkeyup="this.value=this.value.toUpperCase()" value="<?php echo $row[9] ?>"></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <th>Comuna</th>
          <td><input class="form-control" type="text" name="comuna" id="comuna" onkeyup="this.value=this.value.toUpperCase()" value="<?php echo $row[10] ?>"></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <th>Zona</th>
          <td><select name="zona" id="zona" input class="form-control">
              <option value="<?php echo $row['11'] ?>" selected="selected"><?php echo $row['11'] ?></option>
              <option value="URBANA">URBANA</option>
              <option value="RURAL">RURAL</option>
            </select></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <th>Telefono Fijo</th>
          <td><input class="form-control" name="fijo" type="text" id="fijo" size="24" maxlength="7" onkeypress="return acceptNum(event)" value="<?php echo $row[12] ?>"></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <th>Telefono Celular</th>
          <td><input class="form-control" name="celular" type="text" id="celular" maxlength="10" onkeypress="return acceptNum(event)" value="<?php echo $row[13] ?>"></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>

        <tr>
          <th>Email</th>
          <td><input class="form-control" name="email" type="text" id="email" size="20" onkeyup="this.value=this.value.toUpperCase()" value="<?php echo $row[30] ?>"></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>

        <tr>
          <th>Observaciones</th>
          <td><label for="observaciones"></label>
            <textarea name="observaciones" id="observaciones" cols="45" rows="5" onkeyup="this.value=this.value.toUpperCase()"><?php echo $row[14] ?></textarea></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <th>Fecha de Registro</th>
          <td><input class="form-control" name="fecha" type="date" id="fecha" value="<?php echo $row[15] ?>" readonly="readonly" /></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <th>Fecha ultima actualizacion</th>
          <td><input class="form-control" name="fecha_actualizacion" type="date" id="fecha_actualizacion" <?php echo "value=" . date('Y-m-d') ?> readonly="readonly" /></td>
          <th>Documento</td>
          <th>Fecha Nac.</td>
        </tr>

        <tr>
          <th>Familiar 1</th>
          <td><input class="form-control" name="familiar1" type="text" id="familiar1" size="50" onkeyup="this.value=this.value.toUpperCase()" value="<?php echo $row[17] ?>"></td>
          <td><input class="form-control" name="docu1" type="text" id="docu1" onkeypress="return acceptNum(event)" value="<?php echo $row[62] ?>" /></td>
          <td><input class="form-control" name="edad1" type="date" id="edad1" value="<?php echo $row[43] ?>"></td>
        </tr>
        <tr>
          <th>Familiar 2</th>
          <td><input class="form-control" name="familiar2" type="text" id="familiar2" size="50" onkeyup="this.value=this.value.toUpperCase()" value="<?php echo $row[18] ?>"></td>
          <td><input class="form-control" name="docu2" type="text" id="docu2" onkeypress="return acceptNum(event)" value="<?php echo $row[63] ?>" /></td>
          <td><input class="form-control" name="edad2" type="date" id="edad2" value="<?php echo $row[44] ?>"></td>
        </tr>
        <tr>
          <th>Familiar 3</th>
          <td><input class="form-control" name="familiar3" type="text" id="familiar3" size="50" onkeyup="this.value=this.value.toUpperCase()" value="<?php echo $row[19] ?>"></td>
          <td><input class="form-control" name="docu3" type="text" id="docu3" onkeypress="return acceptNum(event)" value="<?php echo $row[64] ?>" /></td>
          <td><input class="form-control" name="edad3" type="date" id="edad3" value="<?php echo $row[45] ?>"></td>
        </tr>
        <tr>
          <th>Familiar 4</th>
          <td><input class="form-control" name="familiar4" type="text" id="familiar4" size="50" onkeyup="this.value=this.value.toUpperCase()" value="<?php echo $row[20] ?>"></td>
          <td><input class="form-control" name="docu4" type="text" id="docu4" onkeypress="return acceptNum(event)" value="<?php echo $row[65] ?>" /></td>
          <td><input class="form-control" name="edad4" type="date" id="edad4" value="<?php echo $row[46] ?>"></td>
        </tr>
        <tr>
          <th>Familiar 5</th>
          <td><input class="form-control" name="familiar5" type="text" id="familiar5" size="50" onkeyup="this.value=this.value.toUpperCase()" value="<?php echo $row[21] ?>"></td>
          <td><input class="form-control" name="docu5" type="text" id="docu5" onkeypress="return acceptNum(event)" value="<?php echo $row[66] ?>" /></td>
          <td><input class="form-control" name="edad5" type="date" id="edad5" value="<?php echo $row[47] ?>"></td>
        </tr>
        <tr>
          <th>Familiar 6</th>
          <td><input class="form-control" name="familiar6" type="text" id="familiar6" size="50" onkeyup="this.value=this.value.toUpperCase()" value="<?php echo $row[22] ?>"></td>
          <td><input class="form-control" name="docu6" type="text" id="docu6" onkeypress="return acceptNum(event)" value="<?php echo $row[67] ?>" /></td>
          <td><input class="form-control" name="edad6" type="date" id="edad6" value="<?php echo $row[48] ?>"></td>
        </tr>
        <tr>
          <th>Familiar 7</th>
          <td><input class="form-control" name="familiar7" type="text" id="familiar7" size="50" onkeyup="this.value=this.value.toUpperCase()" value="<?php echo $row[23] ?>"></td>
          <td><input class="form-control" name="docu7" type="text" id="docu7" onkeypress="return acceptNum(event)" value="<?php echo $row[68] ?>" /></td>
          <td><input class="form-control" name="edad7" type="date" id="edad7" value="<?php echo $row[49] ?>"></td>
        </tr>
        <tr>
          <th>Familiar 8</th>
          <td><input class="form-control" name="familiar8" type="text" id="familiar8" size="50" onkeyup="this.value=this.value.toUpperCase()" value="<?php echo $row[24] ?>"></td>
          <td><input class="form-control" name="docu8" type="text" id="docu8" onkeypress="return acceptNum(event)" value="<?php echo $row[69] ?>" /></td>
          <td><input class="form-control" name="edad8" type="date" id="edad8" value="<?php echo $row[50] ?>"></td>
        </tr>
        <tr>
          <th>Familiar 9</th>
          <td><input class="form-control" name="familiar9" type="text" id="familiar9" size="50" onkeyup="this.value=this.value.toUpperCase()" value="<?php echo $row[25] ?>"></td>
          <td><input class="form-control" name="docu9" type="text" id="docu9" onkeypress="return acceptNum(event)" value="<?php echo $row[70] ?>" /></td>
          <td><input class="form-control" name="edad9" type="date" id="edad9" value="<?php echo $row[51] ?>"></td>
        </tr>
        <tr>
          <th>Familiar 10</th>
          <td><input class="form-control" name="familiar10" type="text" id="familiar10" size="50" onkeyup="this.value=this.value.toUpperCase()" value="<?php echo $row[26] ?>"></td>
          <td><input class="form-control" name="docu10" type="text" id="docu10" onkeypress="return acceptNum(event)" value="<?php echo $row[71] ?>" /></td>
          <td><input class="form-control" name="edad10" type="date" id="edad10" value="<?php echo $row[52] ?>"></td>
        </tr>
        <tr>
          <th>Personas del Grupo Familiar N°</th>
          <td><input class="form-control" name="cantidad_gf" type="text" id="cantidad_gf" size="5" onkeypress="return acceptNum(event)" value="<?php echo $row[36] ?>"></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <th>Madre Cabeza de Hogar</th>
          <td><select name="madre_ch" id="madre_ch" input class="form-control">
              <option value="<?php echo $row[37] ?>" selected="selected"><?php echo $row[37] ?></option>
              <option value="NO">NO</option>
              <option value="SI">SI</option>
            </select></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <th>Poblacion Dependiente</th>
          <td><select name="poblacion_depe" id="poblacion_depe" input class="form-control">
              <option value="<?php echo $row[38] ?>" selected="selected"><?php echo $row[38] ?></option>
              <option value="NO">NO</option>
              <option value="SI">SI</option>
            </select></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <th>Grupo Etnico</th>
          <td><select name="grupo_etnico" id="grupo_etnico" input class="form-control">
              <option value="<?php echo $row[39] ?>" selected="selected"><?php echo $row[39] ?></option>
              <option value="NO APLICA">NO APLICA</option>
              <option value="RAIZAL">RAIZAL</option>
              <option value="PALENQUE">PALENQUE</option>
              <option value="AFRODESCENDIENTE">AFRODESCENDIENTE</option>
            </select></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <th>Encuesta Telefonica</th>
          <td><select name="encuestado_tel" id="encuestado_tel" input class="form-control">
              <option value="<?php echo $row[40] ?>" selected="selected"><?php echo $row[40] ?></option>
              <option value="NO">NO</option>
              <option value="SI">SI</option>
            </select></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <th>Encuesta Personalizada</th>
          <td><select name="encuestado_per" id="encuestado_per" input class="form-control">
              <option value="<?php echo $row[41] ?>" selected="selected"><?php echo $row[41] ?></option>
              <option value="NO">NO</option>
              <option value="SI">SI</option>
            </select></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <th>Visitado en Sitio</th>
          <td><select name="visitado" id="visitado" input class="form-control">
              <option value="<?php echo $row[42] ?>" selected="selected"><?php echo $row[42] ?></option>
              <option value="NO">NO</option>
              <option value="SI">SI</option>
            </select></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>

        <tr>
          <td colspan="4">
            <div class='alert alert-secondary'>
              <H5>INFORMACION FINANCIERA</H5>
            </div>
          </td>
        </tr>

        <tr>
          <th>Valor Ahorrado</th>
          <td><input class="form-control" name="valorahorrado" type="text" id="valorahorrado" maxlength="30" onkeypress="return acceptNum(event)" value="<?php echo $row[27] ?>"></td>
        </tr>
        <tr>
          <th>Entidad</th>
          <td><input class="form-control" name="entidad" type="text" id="entidad" size="50" onkeyup="this.value=this.value.toUpperCase()" value="<?php echo $row[28] ?>"></td>
        </tr>
        <tr>
          <th>N° de Cuenta</th>
          <td><input class="form-control" name="numcuenta" type="text" id="numcuenta" maxlength="50" value="<?php echo $row[29] ?>"></td>
        </tr>
        <tr>
          <th>Fecha de Retiro Postulante</th>
          <td><input class="form-control" name="retiro" type="date" id="retiro" value="<?php echo $row[54] ?>"></td>
        </tr>
        <tr>
          <th>Preaprobado Entidad</th>
          <td><input class="form-control" name="preaprobadoentidad" type="text" id="preaprobadoentidad" size="50" onkeyup="this.value=this.value.toUpperCase()" value="<?php echo $row[74] ?>" /></td>
        </tr>
        <tr>
          <th>Preaprobado Valor</th>
          <td><input class="form-control" name="preaprobadovalor" type="text" id="preaprobadovalor" maxlength="50" onkeypress="return acceptNum(event) " value="<?php echo $row[72] ?>" /></td>
        </tr>
        <tr>
          <th>Cesantias Entidad</th>
          <td><input class="form-control" name="cesantiasentidad" type="text" id="cesantiasentidad" size="50" onkeyup="this.value=this.value.toUpperCase()" value="<?php echo $row[76] ?>" /></td>
        </tr>
        <tr>
          <th>Cesantias Valor</th>
          <td><input class="form-control" name="cesantiasvalor" type="text" id="cesantiasvalor" maxlength="50" onkeypress="return acceptNum(event)" value="<?php echo $row[75] ?>" /></td>
        </tr>

        <tr>
          <td colspan="4">
            <div class='alert alert-secondary'>
              <H5>INFORMACION DE RIESGO</H5>
            </div>
          </td>
        </tr>

        <tr>
          <th>N° Radicado</th>
          <td><input class="form-control" name="radicado" type="text" id="radicado" maxlength="30" value="<?php echo $row[60] ?>" onkeyup="this.value=this.value.toUpperCase()" /></td>
        </tr>
        <tr>
          <th>Entidad Remitente</th>
          <td><select name="ente_remite" id="ente_remite" input class="form-control">
              <option value="<?php echo $row[61] ?>" selected="selected"><?php echo $row[61] ?></option>
              <option value="OTROS">OTROS</option>
              <option value="OMPADE">OMPADE</option>
              <option value="GOBIERNO">GOBIERNO</option>
            </select></td>
        </tr>

        <tr>
          <th>Tipo de evento</th>
          <td><select name="tipoevento" id="tipoevento" input class="form-control">
              <option value="<?php echo $row['16'] ?>" selected="selected"><?php echo $row['16'] ?></option>
              <option value="NO APLICA">NO APLICA</option>
              <option value="HIDROLOGICO">HIDROLOGICO</option>
              <option value="GEOLOGICO">GEOLOGICO</option>
              <option value="CONSTRUCTIVO">CONSTRUCTIVO</option>
              <option value="HIDROLOGICO - GEOLOGICO">HIDROLOGICO - GEOLOGICO</option>
            </select></td>
        </tr>

        <tr>
          <th>Ubicado en Zona de Riesgo</th>
          <td><select name="zona_riesgo" id="zona_riesgo" input class="form-control">
              <option value="<?php echo $row[35] ?>" selected="selected"><?php echo $row[35] ?></option>
              <option value="NO">NO</option>
              <option value="SI">SI</option>
            </select></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>

        <tr>
          <td colspan="4">
            <div class='alert alert-secondary'>
              <H5>INFORMACION DE LA VIVIENDA</H5>
            </div>
          </td>
        </tr>

        <tr>
          <th>Inmueble Reside Actualmente</th>
          <td><select name="inmueble_actual" id="inmueble_actual" input class="form-control">
              <option value="<?php echo $row[31] ?>" selected="selected"><?php echo $row[31] ?></option>
              <option value="PROPIETARIO">PROPIETARIO</option>
              <option value="ARRENDATARIO">ARRENDATARIO</option>
              <option value="POSECION">POSECION</option>
              <option value="INVASION">INVASION</option>
            </select></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <th>Inmueble Titulo de Propiedad</th>
          <td><input class="form-control" name="inmueble_titulo" type="text" id="inmueble_titulo" size="20" onkeyup="this.value=this.value.toUpperCase()" value="<?php echo $row[32] ?>"></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <th>Inmueble Matricula Inmob.</th>
          <td><input class="form-control" name="inmueble_matricula" type="text" id="inmueble_matricula" size="30" onkeyup="this.value=this.value.toUpperCase()" value="<?php echo $row[56] ?>"></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <th>Inmueble Ficha Catastra</th>
          <td><input class="form-control" name="inmueble_catastral" type="text" id="inmueble_catastral" size="30" onkeyup="this.value=this.value.toUpperCase()" value="<?php echo $row[57] ?>"></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <th>Inmueble N° Escritura</th>
          <td><input class="form-control" name="inmueble_escritura" type="text" id="inmueble_escritura" size="30" onkeyup="this.value=this.value.toUpperCase()" value="<?php echo $row[58] ?>"></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <th>Inmueble Tiempo Habitado</th>
          <td><input class="form-control" name="inmueble_tiempo" type="text" id="inmueble_tiempo" size="20" onkeypress="return acceptNum(event)" value="<?php echo $row[33] ?>"></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <th>Inmueble tipo de Material</th>
          <td><select name="inmueble_material" id="inmueble_material" input class="form-control">
              <option value="<?php echo $row[34] ?>" selected="selected"><?php echo $row[34] ?></option>
              <option value="MATERIAL">MATERIAL</option>
              <option value="MADERA">MADERA</option>
              <option value="LAMINA">LAMINA</option>
              <option value="CARTON">CARTON</option>
            </select></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <th>Inmueble Servicios Publicos</th>
          <td><select name="inmueble_servicios" id="inmueble_servicios" input class="form-control">
              <option value="<?php echo $row[59] ?>" selected="selected"><?php echo $row[59] ?></option>
              <option value="SI">SI</option>
              <option value="NO">NO</option>
            </select></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <th>Tipo de solicitud de mejoramiento</th>
          <td><select name="inmueble_solicitud" id="inmueble_solicitud" input class="form-control">
              <option value="<?php echo $row[77] ?>" selected="selected"><?php echo $row[77] ?></option>
              <option value="NA">NA</option>
              <option value="BAÑO">BAÑO</option>
              <option value="COCINA">COCINA</option>
              <option value="LAVADERO">LAVADERO</option>
              <option value="ALCANTARILLADO">ALCANTARILLADO</option>
              <option value="MUROS">MUROS</option>
              <option value="REFUERZO ESTRUCTURAL">REFUERZO ESTRUCTURAL</option>
              <option value="TECHO O CUBIERTA">TECHO O CUBIERTA</option>
              <option value="PISO">PISO</option>
            </select></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>

        <!-- Seccion para CAMBIO DE BASE y SUBASE -->
        <tr>
          <th bgcolor="#CD6155">Reasignar ficha a otra base de dato</th>
          <td bgcolor="#CD6155" colspan="3">
            <select class="form-control" name="base_sub_base" id="base_sub_base">
              <?php  
                if ($row['85'] == 'SI') 
                  echo "<option value='MEU' selected='selected'>MEJORAMIENTO | Mejoramiento urbano (Actualmente)</option>"; 
                else
                  echo "<option value='MEU'>MEJORAMIENTO | Mejoramiento urbano</option>"; 
              ?>

              <?php 
                if ($row['86'] == 'SI') 
                  echo "<option value='MER' selected='selected'>MEJORAMIENTO | Mejoramiento rural (Actualmente)</option>"; 
                else
                  echo "<option value='MER'>MEJORAMIENTO | Mejoramiento rural</option>"; 
              ?>

              <?php 
                if ($row['87'] == 'SI') 
                  echo "<option value='VIP' selected='selected'>VIVIENDA NUEVA | Vivienda prioritaria VIP (Actualmente)</option>"; 
                else
                  echo "<option value='VIP'>VIVIENDA NUEVA | Vivienda prioritaria VIP</option>"; 
              ?>

              <?php 
                if ($row['88'] == 'SI') 
                  echo "<option value='DES' selected='selected'>VIVIENDA NUEVA | Condicion desplazado (Actualmente)</option>"; 
                else
                  echo "<option value='DES'>VIVIENDA NUEVA | Condicion desplazado</option>"; 
              ?>

              <?php 
                if ($row['89'] == 'SI') 
                  echo "<option value='SIP' selected='selected'>VIVIENDA NUEVA | Construccion en sitio propio (Actualmente)</option>"; 
                else
                  echo "<option value='SIP'>VIVIENDA NUEVA | Construccion en sitio propio</option>"; 
              ?>

              <?php 
                if ($row['84'] == 'SI') 
                  echo "<option value='REU' selected='selected'>VIVIENDA NUEVA | Reubicacion (Actualmente)</option>"; 
                else
                  echo "<option value='REU'>VIVIENDA NUEVA | Reubicacion</option>"; 
              ?>

              <?php 
                if (($row['84'] == 'NO') && ($row['85'] == 'NO') && ($row['86'] == 'NO') && ($row['87'] == 'NO') && ($row['88'] == 'NO') && ($row['89'] == 'NO'))
                  echo "<option value='NA' selected='selected'> VIVIENDA NUEVA | Vivienda de interes social VIS (Actualmente)</option>"; 
                else
                  echo "<option value='NA'> VIVIENDA NUEVA | Vivienda de interes social VIS</option>"; 
              ?>
            </select>

            <br>* En caso de NO necesitar reasignar, dejar este campo sin modificar...</td>
        </tr>
        <!-- Fin de la seccion cambio de base ****************-->

        <tr>
          <td>&nbsp;</td>
          <td><input type="hidden" name="base" id="base" <?php echo "value=" . $base ?> /></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td><input name="button" type="submit" class="btn btn-success btn-block" id="button" value="Guardar Cambios" /></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
      </table>
    </form>

  </aside>
</div>

<?php include("includes/footer.php"); ?>