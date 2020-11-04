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

  //VALIDA ANTES DE ELIMINAR
  function confirmar(texto) {
    if (confirm(texto)) {
      return true;
    } else return false;
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

    if (($base == 0) && ($_SESSION["REU"] >= "1")) {
      echo "<div style='text-align: center;'><H3>BASE DE DATOS - Por Reubicar</H3><HR></div>";
      $sql = "SELECT * FROM ciudadanos WHERE (cedula = '$cedula')";
      $resultado = mysqli_query($sle, $sql) or die(mysqli_error());
      if (mysqli_num_rows($resultado) > 0) $paso = 1;
    }
    if (($base == 1) && ($_SESSION["MU"] >= "1")) {
      echo "<div style='text-align: center;'><H3>BASE DE DATOS - Mejora Vivienda Urbana</H3><HR></div>";
      $sql = "SELECT * FROM ciudadanos WHERE (cedula = '$cedula')";
      $resultado = mysqli_query($sle, $sql) or die(mysqli_error());
      if (mysqli_num_rows($resultado) > 0) $paso = 1;
    }
    if (($base == 2) && ($_SESSION["MR"] >= "1")) {
      echo "<div style='text-align: center;'><H3>BASE DE DATOS - Mejora Vivienda Rural</H3><HR></div>";
      $sql = "SELECT * FROM ciudadanos WHERE (cedula = '$cedula')";
      $resultado = mysqli_query($sle, $sql) or die(mysqli_error());
      if (mysqli_num_rows($resultado) > 0) $paso = 1;
    }
    if (($base == 3) && ($_SESSION["VIS"] >= "1")) {
      echo "<div style='text-align: center;'><H3>BASE DE DATOS - Vivienda Nueva</H3><HR></div>";
      $sql = "SELECT * FROM ciudadanos WHERE (cedula = '$cedula')";
      $resultado = mysqli_query($sle, $sql) or die(mysqli_error());
      if (mysqli_num_rows($resultado) > 0) $paso = 1;
    }
    if (($base == 4) && ($_SESSION["VIP"] >= "1")) {
      echo "<div style='text-align: center;'><H3>BASE DE DATOS - Vivienda Interes Prioritario (VIP)</H3><HR></div>";
      $sql = "SELECT * FROM ciudadanos WHERE (cedula = '$cedula')";
      $resultado = mysqli_query($sle, $sql) or die(mysqli_error());
      if (mysqli_num_rows($resultado) > 0) $paso = 1;
    }
    if (($base == 5) && ($_SESSION["DES"] >= "1")) {
      echo "<div style='text-align: center;'><H3>BASE DE DATOS - Poblacion en Condicion de Desplazamiento</H3><HR></div>";
      $sql = "SELECT * FROM ciudadanos WHERE (cedula = '$cedula')";
      $resultado = mysqli_query($sle, $sql) or die(mysqli_error());
      if (mysqli_num_rows($resultado) > 0) $paso = 1;
    }
    if (($base == 6) && ($_SESSION["SP"] >= "1")) {
      echo "<div style='text-align: center;'><H3>BASE DE DATOS - Construccion en Sitio Propio</H3><HR></div>";
      $sql = "SELECT * FROM ciudadanos WHERE (cedula = '$cedula')";
      $resultado = mysqli_query($sle, $sql) or die(mysqli_error());
      if (mysqli_num_rows($resultado) > 0) $paso = 1;
    }

    if ($paso == 1) {
      $row = mysqli_fetch_row($resultado);
    } else {
      echo "<div class='alert alert-danger' style='text-align: center;'>";
      echo "NO TIENE PERMISOS PARA CONSULTAR ESTA BASE DE DATOS<BR><BR>";
      echo "<a href='menu.php'><input type='submit' name='Volver2' class='btn btn-success btn-block' id='Volver2' value='Volver' /></a>";
      echo "</div>";
      return;
    }
    ?>
  </aside>

  <aside class="col-sm-2"></aside>
</div>


<div class="row">

  <aside class="col-sm-12">
    <table class="table table-bordered">
      <tr>
        <td colspan="4"><div class='alert alert-secondary'><H5>DATOS BASICOS</H5></div></td>
      </tr>

      <tr>
        <th width="15%">Cedula</th>
        <td width="35%"><label for="cedula"><?php echo $row[0] ?></label></td>
        <th width="15%">Fecha de Registro</th>
        <td width="35%"><?php echo $row[15] ?></td>
      </tr>
      <tr>
        <th>Situacion Actual</th>
        <td><label for="situacion"><?php echo $row[1] ?></label></td>
        <th>Situacion Laboral</th>
        <td><?php echo $row[53] ?></td>
      </tr>
      <tr>
        <th>Parentesco</th>
        <td><label for="parentesco"><?php echo $row[2] ?></label></td>
        <th>Fecha ultima actualizacion</th>
        <td><?php echo $row[55] ?></td>
      </tr>
      <tr>
        <th>1er Nombre</th>
        <td><label for="nombre1"><?php echo $row[3] ?></label></td>
        <th>2do Nombre</th>
        <td><?php echo $row[4] ?></td>
      </tr>
      <tr>
        <th>1er Apellido</th>
        <td><label for="apellido1"><?php echo $row[5] ?></label></td>
        <th>2do Apellido</th>
        <td><?php echo $row[6] ?></td>
      </tr>
      <tr>
        <th>Fecha Nacimiento</th>
        <td><?php echo $row[7] ?></td>
        <th>Email</th>
        <td><?php echo $row[30] ?></td>
      </tr>
      <tr>
        <th>Direccion</th>
        <td><label for="direccion"><?php echo $row[8] ?></label></td>
        <th>Barrio</th>
        <td><?php echo $row[9] ?></td>
      </tr>
      <tr>
        <th>Comuna</th>
        <td><label for="comuna"><?php echo $row[10] ?></label></td>
        <th>Zona</th>
        <td><?php echo $row[11] ?></td>
      </tr>
      <tr>
        <th>Telefono Fijo</th>
        <td><label for="fijo"><?php echo $row[12] ?></label></td>
        <th>Telefono Celular</th>
        <td><?php echo $row[13] ?></td>
      </tr>
      <tr>
        <th>Observaciones</th>
        <td colspan="3"><label for="observaciones"><?php echo $row[14] ?></label></td>
      </tr>
      <tr>
        <th>Personas del Grupo Familiar N°</th>
        <td><?php echo $row[36] ?></td>
        <th>Documento</th>
        <th>Fecha Nac.</th>
      </tr>
      <tr>
        <th>Familiar 1</th>
        <td><label for="f1"><?php echo $row[17] ?></label></td>
        <td><?php echo $row[62] ?></td>
        <td><?php echo $row[43] ?></td>
      </tr>
      <tr>
        <th>Familiar 2</th>
        <td><label for="f2"><?php echo $row[18] ?></label></td>
        <td><?php echo $row[63] ?></td>
        <td><?php echo $row[44] ?></td>
      </tr>
      <tr>
        <th>Familiar 3</th>
        <td><label for="f3"><?php echo $row[19] ?></label></td>
        <td><?php echo $row[64] ?></td>
        <td><?php echo $row[45] ?></td>
      </tr>
      <tr>
        <th>Familiar 4</th>
        <td><label for="f4"><?php echo $row[20] ?></label></td>
        <td><?php echo $row[65] ?></td>
        <td><?php echo $row[46] ?></td>
      </tr>
      <tr>
        <th>Familiar 5</th>
        <td><label for="f5"><?php echo $row[21] ?></label></td>
        <td><?php echo $row[66] ?></td>
        <td><?php echo $row[47] ?></td>
      </tr>
      <tr>
        <th>Familiar 6</th>
        <td><label for="f6"><?php echo $row[22] ?></label></td>
        <td><?php echo $row[67] ?></td>
        <td><?php echo $row[48] ?></td>
      </tr>
      <tr>
        <th>Familiar 7</th>
        <td><label for="f7"><?php echo $row[23] ?></label></td>
        <td><?php echo $row[68] ?></td>
        <td><?php echo $row[49] ?></td>
      </tr>
      <tr>
        <th>Familiar 8</th>
        <td><label for="f8"><?php echo $row[24] ?></label></td>
        <td><?php echo $row[69] ?></td>
        <td><?php echo $row[50] ?></td>
      </tr>
      <tr>
        <th>Familiar 9</th>
        <td><label for="f9"><?php echo $row[25] ?></label></td>
        <td><?php echo $row[70] ?></td>
        <td><?php echo $row[51] ?></td>
      </tr>
      <tr>
        <th>Familiar 10</th>
        <td><label for="f10"><?php echo $row[26] ?></label></td>
        <td><?php echo $row[71] ?></td>
        <td><?php echo $row[52] ?></td>
      </tr>

      <tr>
        <th>Madre Cabeza de Hogar</th>
        <td><label for="ch"><?php echo $row[37] ?></label></td>
        <th>Poblacion Dependiente</th>
        <td><?php echo $row[38] ?></td>
      </tr>
      <tr>
        <th>Grupo Etnico</th>
        <td><label for="ge"><?php echo $row[39] ?></label></td>
        <th>Encuesta Telefonica</th>
        <td><?php echo $row[40] ?></td>
      </tr>
      <tr>
        <th>Encuesta Personalizada</th>
        <td><label for="ep"><?php echo $row[41] ?></label></td>
        <th>Visitado en Sitio</th>
        <td><?php echo $row[42] ?></td>
      </tr>
      <tr>
        <td colspan="4"><div class='alert alert-secondary'><H5>INFORMACION FINANCIERA</H5></div></td>
      </tr>

      <tr>
        <th>Valor Ahorrado</th>
        <td><label for='va'><?php echo $row[27] ?></label></td>
        <th>Entidad</th>
        <td><?php echo $row[28] ?></td>
      </tr>
      <tr>
        <th>N° de Cuenta</th>
        <td><label for='nc'><?php echo $row[29] ?></label></td>
        <th>Fecha de Retiro Postulante</th>
        <td><?php echo $row[54] ?></td>
      </tr>
      <tr>
        <th>Preaprobado Entidad</th>
        <td><label for='ent'><?php echo $row[74] ?></label></td>
        <th>Preaprobado Valor</th>
        <td><?php echo $row[72] ?></td>
      </tr>
      <tr>
        <th>Cesantias Entidad</th>
        <td><label for='ent'><?php echo $row[76] ?></label></td>
        <th>Cesantias Valor</th>
        <td><?php echo $row[75] ?></td>
      </tr>
      <tr>
        <td colspan="4" ><div class='alert alert-secondary'><H5>INFORMACION DE RIESGO</H5></div></td>
      </tr>

      <tr>
        <th>N° de Radicado</th>
        <td><label for="radicado"><?php echo $row[60] ?></label></td>
        <th>Entidad Remitente</th>
        <td><?php echo $row[61] ?></td>
      </tr>
      <tr>
        <th>Tipo de evento</th>
        <td><label for="tipo"><?php echo $row[16] ?></label></td>
        <th>Ubicado en Zona de Riesgo</th>
        <td><?php echo $row[35] ?></td>
      </tr>
      <tr>
        <td colspan="4" ><div class='alert alert-secondary'><H5>INFORMACION DE LA VIVIENDA</H5></div></td>
      </tr>

      <tr>
        <th>Inmueble Reside Actualmente</th>
        <td><label for="imres"><?php echo $row[31] ?></label></td>
        <th>Inmueble Titulo de Propiedad</th>
        <td><?php echo $row[32] ?></td>
      </tr>
      <tr>
        <th>Inmueble Matricula Inmobiliaria</th>
        <td><?php echo $row[56] ?></td>
        <th>Inmueble Ficha Catastral</th>
        <td><?php echo $row[57] ?></td>
      </tr>
      <tr>
        <th>Inmueble N° Escritura</th>
        <td><?php echo $row[58] ?></td>
        <th>Inmueble Tiempo Habitado</th>
        <td><?php echo $row[33] ?></td>
      </tr>
      <tr>
        <th>Inmueble tipo de Material</th>
        <td><label for="imtipo"><?php echo $row[34] ?></label></td>
        <th>Inmueble Servicios Publicos</th>
        <td><?php echo $row[59] ?></td>
      </tr>
      <tr>
        <th>Tipo de solicitud de mejoramiento</th>
        <td><label for="imtipo"><?php echo $row[77] ?></label></td>
        <td></td>
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
          <!-- BOTON PARA EDITAR -->
          <?php if (($base == 0) && ($_SESSION["REU"] >= "2")) { ?>
            <a href='editar0.php?base=<?php echo $base ?>&cedula=<?php echo $cedula ?>'><input name='Volver' type='submit' class='btn btn-info' id='Volver' value='EDITAR ficha' /></a>
          <?php } ?>
          <?php if (($base == 1) && ($_SESSION["MU"] >= "2")) { ?>
            <a href='editar0.php?base=<?php echo $base ?>&cedula=<?php echo $cedula ?>'><input name='Volver' type='submit' class='btn btn-info' id='Volver' value='EDITAR ficha' /></a>
          <?php } ?>
          <?php if (($base == 2) && ($_SESSION["MR"] >= "2")) { ?>
            <a href='editar0.php?base=<?php echo $base ?>&cedula=<?php echo $cedula ?>'><input name='Volver' type='submit' class='btn btn-info' id='Volver' value='EDITAR ficha' /></a>
          <?php } ?>
          <?php if (($base == 3) && ($_SESSION["VIS"] >= "2")) { ?>
            <a href='editar0.php?base=<?php echo $base ?>&cedula=<?php echo $cedula ?>'><input name='Volver' type='submit' class='btn btn-info' id='Volver' value='EDITAR ficha' /></a>
          <?php } ?>
          <?php if (($base == 4) && ($_SESSION["VIP"] >= "2")) { ?>
            <a href='editar0.php?base=<?php echo $base ?>&cedula=<?php echo $cedula ?>'><input name='Volver' type='submit' class='btn btn-info' id='Volver' value='EDITAR ficha' /></a>
          <?php } ?>
          <?php if (($base == 5) && ($_SESSION["DES"] >= "2")) { ?>
            <a href='editar0.php?base=<?php echo $base ?>&cedula=<?php echo $cedula ?>'><input name='Volver' type='submit' class='btn btn-info' id='Volver' value='EDITAR ficha' /></a>
          <?php } ?>
          <?php if (($base == 6) && ($_SESSION["SP"] >= "2")) { ?>
            <a href='editar0.php?base=<?php echo $base ?>&cedula=<?php echo $cedula ?>'><input name='Volver' type='submit' class='btn btn-info' id='Volver' value='EDITAR ficha' /></a>
          <?php } ?>

          <!-- BOTON PARA ELIMINAR -->
          <?php if (($base == 0) && ($_SESSION["REU"] == "4")) { ?>
            <a href='eliminar0.php?base=<?php echo $base ?>&cedula=<?php echo $cedula ?>' onclick="return confirmar('ALERTA !!! ¿Estas seguro de eliminar?')"><input name='Volver3' type='submit' class='btn btn-danger' id='Volver3' value='ELIMINAR ficha' />
            </a>
          <?php } ?>
          <?php if (($base == 1) && ($_SESSION["MU"] == "4")) { ?>
            <a href='eliminar0.php?base=<?php echo $base ?>&cedula=<?php echo $cedula ?>' onclick="return confirmar('ALERTA !!! ¿Estas seguro de eliminar?')"><input name='Volver3' type='submit' class='btn btn-danger' id='Volver3' value='ELIMINAR ficha' />
            </a>
          <?php } ?>
          <?php if (($base == 2) && ($_SESSION["MR"] == "4")) { ?>
            <a href='eliminar0.php?base=<?php echo $base ?>&cedula=<?php echo $cedula ?>' onclick="return confirmar('ALERTA !!! ¿Estas seguro de eliminar?')"><input name='Volver3' type='submit' class='btn btn-danger' id='Volver3' value='ELIMINAR ficha' />
            </a>
          <?php } ?>
          <?php if (($base == 3) && ($_SESSION["VIS"] == "4")) { ?>
            <a href='eliminar0.php?base=<?php echo $base ?>&cedula=<?php echo $cedula ?>' onclick="return confirmar('ALERTA !!! ¿Estas seguro de eliminar?')"><input name='Volver3' type='submit' class='btn btn-danger' id='Volver3' value='ELIMINAR ficha' />
            </a>
          <?php } ?>
          <?php if (($base == 4) && ($_SESSION["VIP"] == "4")) { ?>
            <a href='eliminar0.php?base=<?php echo $base ?>&cedula=<?php echo $cedula ?>' onclick="return confirmar('ALERTA !!! ¿Estas seguro de eliminar?')"><input name='Volver3' type='submit' class='btn btn-danger' id='Volver3' value='ELIMINAR ficha' />
            </a>
          <?php } ?>
          <?php if (($base == 5) && ($_SESSION["DES"] == "4")) { ?>
            <a href='eliminar0.php?base=<?php echo $base ?>&cedula=<?php echo $cedula ?>' onclick="return confirmar('ALERTA !!! ¿Estas seguro de eliminar?')"><input name='Volver3' type='submit' class='btn btn-danger' id='Volver3' value='ELIMINAR ficha' />
            </a>
          <?php } ?>
          <?php if (($base == 6) && ($_SESSION["SP"] == "4")) { ?>
            <a href='eliminar0.php?base=<?php echo $base ?>&cedula=<?php echo $cedula ?>' onclick="return confirmar('ALERTA !!! ¿Estas seguro de eliminar?')"><input name='Volver3' type='submit' class='btn btn-danger' id='Volver3' value='ELIMINAR ficha' />
            </a>
          <?php } ?>

        </td>
        <td>&nbsp;</td>
        <td><a href='menu.php'>
            <input name='Volver2' type='submit' class='btn btn-success btn-block' id='Volver2' value='Volver' />
          </a></td>
      </tr>
    </table>
  </aside>

</div>

<?php include("includes/footer.php"); ?>