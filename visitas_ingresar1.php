<?php include("includes/header.php"); ?>
<?php include("includes/title.php"); ?>
<?php include("includes/login_valid_session.php"); ?>

<div class="row">
  <aside class="col-sm-1"></aside>

  <aside class="col-sm-10">

    <?php
    $cedula = $_POST['cedula'];
    $bandera = 0;

    mysqli_select_db($sle, $database_sle);
    mysqli_query($sle, "SET NAMES 'utf8'");

    $sql = "SELECT * FROM ciudadanos WHERE (cedula = '$cedula')";
    $resultado = mysqli_query($sle, $sql) or die(mysqli_error());
    while ($row = mysqli_fetch_row($resultado)) {
      $bandera = 1;
      $titular = $row[6] . " " . $row[5] . " " . $row[4] . " " . $row[3];
      $direccion = $row[8] . " - Barrio " . $row[9];
    }
    ?>


    <?php if ($bandera == 1) { ?>
      <form name="form1" method="post" action="visitas_ingresar2.php" enctype="multipart/form-data">
        <table class="table table-bordered">
          <tr>
            <th colspan="2" class="alert alert-secondary">INFORMACION BASICA</th>
          </tr>
          <tr>
            <th>Titular</th>
            <td><input class="form-control" name="titular" id="titular" size="50" readonly="readonly" value="<?php echo "$titular"; ?>" />
              <input class="form-control" type="hidden" name="cedula" id="cedula" <?php echo "value=" . $cedula ?>>
            </td>
          </tr>
          <tr>
            <th>Direccion</th>
            <td><input class="form-control" name="direccion" type="text" id="direccion" onkeypress="return acceptNum(event)" size="50" readonly="readonly" value="<?php echo "$direccion"; ?>" /></td>
          </tr>
          <tr>
            <th colspan="2" class="alert alert-secondary">DATOS GENERALES</th>
          </tr>
          <tr>
            <th>Fecha de la visita</th>
            <td><input class="form-control" name="fecha" type="date" id="fecha" /></td>
          </tr>
          <tr>
            <th>Area lote m2 frente</th>
            <td><input class="form-control" name="frente" type="text" id="frente" onkeypress="return acceptNum(event)" maxlength="5" />
              m2</td>
          </tr>
          <tr>
            <th>Area lote m2 fondo</th>
            <td><input class="form-control" name="fondo" type="text" id="fondo" onkeypress="return acceptNum(event)" maxlength="5" />
              m2</td>
          </tr>
          <tr>
            <th>Estado de la propiedad</th>
            <td><select name="estado" id="estado" class="form-control">
                <option value="4">MUY BUENO</option>
                <option value="3">BUENO</option>
                <option value="2">REGULAR</option>
                <option value="1">MALO</option>
                <option value="0" selected="selected">NA</option>
              </select></td>
          </tr>
          <tr>
            <th>Documento de Propiedad</th>
            <td><input class="form-control" name="documentopro" type="text" id="documentopro" /> N° <input class="form-control" name="documentopronum" type="text" id="documentopronum" /></td>
          </tr>
          <tr>
            <th>Coordenada GPS</th>
            <td>N
              <input class="form-control" name="gpsNgrado" type="text" id="gpsNgrado" onkeypress="return acceptNum(event)" size="4" maxlength="4" />
              °
              <input class="form-control" name="gpsNminuto" type="text" id="gpsNminuto" onkeypress="return acceptNum(event)" size="4" maxlength="4" />
              '
              <input class="form-control" name="gpsNsegundo" type="text" id="gpsNsegundo" onkeypress="return acceptNum(event)" size="4" maxlength="4" />
              ''
              <br>
                W
              <input class="form-control" name="gpsWgrado" type="text" id="gpsWgrado" onkeypress="return acceptNum(event)" size="4" maxlength="4" />
              °
              <input class="form-control" name="gpsWminuto" type="text" id="cedula8" onkeypress="return acceptNum(event)" size="4" maxlength="4" />
              '
              <input class="form-control" name="gpsWsegundo" type="text" id="cedula9" onkeypress="return acceptNum(event)" size="4" maxlength="4" />
              ''
            </td>
          </tr>
          <tr>
            <th>Anexar Evidencia Grafica</th>
            <td><input class="form-control" name="anexo1" type="file" id="anexo" /></td>
          </tr>
          <tr>
            <td></td>
            <td>El anexo debe ser formato JPG no superior a 500k</td>
          </tr>
        </table>
        <HR>
        <table class="table table-bordered">
          <tr>
            <th colspan="3" class="alert alert-secondary">0. ALGUNO DE LOS MIEMBROS DEL HOGAR PRESENTA LA CONDICION...</th>
          </tr>
          <tr>
            <th>Niños menores de 8 años</th>
            <td><select name="condicion1" id="condicion1" class="form-control">
                <option value="SI">SI</option>
                <option value="NO">NO</option>
                <option value="NA" selected="selected">NA</option>
              </select></td>
          </tr>
          <tr>
            <th>Adultos mayores de 65 años</th>
            <td><select name="condicion2" id="condicion2" class="form-control">
                <option value="SI">SI</option>
                <option value="NO">NO</option>
                <option value="NA" selected="selected">NA</option>
              </select></td>
          </tr>
          <tr>
            <th>Discapacidad Fisica</th>
            <td><select name="condicion3" id="condicion3" class="form-control">
                <option value="SI">SI</option>
                <option value="NO">NO</option>
                <option value="NA" selected="selected">NA</option>
              </select></td>
          </tr>
          <tr>
            <th>Red Unidos</th>
            <td><select name="condicion4" id="condicion4" class="form-control">
                <option value="SI">SI</option>
                <option value="NO">NO</option>
                <option value="NA" selected="selected">NA</option>
              </select></td>
          </tr>
          <tr>
            <th>Desplazados</th>
            <td><select name="condicion5" id="condicion5" class="form-control">
                <option value="SI">SI</option>
                <option value="NO">NO</option>
                <option value="NA" selected="selected">NA</option>
              </select></td>
          </tr>
          <tr>
            <th>Madre o Padre sin pareja</th>
            <td><select name="condicion6" id="condicion6" class="form-control">
                <option value="SI">SI</option>
                <option value="NO">NO</option>
                <option value="NA" selected="selected">NA</option>
              </select></td>
          </tr>
        </table>
        <HR>
        <table class="table table-bordered">
          <tr>
            <th colspan="3" class="alert alert-secondary">1. SANEAMIENTO BASICO - COCINA</th>
          </tr>
          <tr>
            <th>Cocina</th>
            <td><select name="cocina1" id="cocina1" class="form-control">
                <option value="SI">SI</option>
                <option value="NO">NO</option>
                <option value="NA" selected="selected">NA</option>
              </select></td>
            <td><select name="cocina1e" id="cocina1e" class="form-control">
                <option value="3">BUENO</option>
                <option value="2">REGULAR</option>
                <option value="1">MALO</option>
                <option value="0" selected="selected">NA</option>
              </select></td>
          </tr>
          <tr>
            <th>Lavaplato</th>
            <td><select name="cocina2" id="cocina2" class="form-control">
                <option value="SI">SI</option>
                <option value="NO">NO</option>
                <option value="NA" selected="selected">NA</option>
              </select></td>
            <td><select name="cocina2e" id="cocina2e" class="form-control">
                <option value="3">BUENO</option>
                <option value="2">REGULAR</option>
                <option value="1">MALO</option>
                <option value="0" selected="selected">NA</option>
              </select></td>
          </tr>
          <tr>
            <th>Meson material</th>
            <td><select name="cocina3" id="cocina3" class="form-control">
                <option value="SI">SI</option>
                <option value="NO">NO</option>
                <option value="NA" selected="selected">NA</option>
              </select></td>
            <td><select name="cocina3e" id="cocina3e" class="form-control">
                <option value="3">BUENO</option>
                <option value="2">REGULAR</option>
                <option value="1">MALO</option>
                <option value="0" selected="selected">NA</option>
              </select></td>
          </tr>
          <tr>
            <th>Revoque</th>
            <td><select name="cocina4" id="cocina4" class="form-control">
                <option value="SI">SI</option>
                <option value="NO">NO</option>
                <option value="NA" selected="selected">NA</option>
              </select></td>
            <td><select name="cocina4e" id="cocina4e" class="form-control">
                <option value="3">BUENO</option>
                <option value="2">REGULAR</option>
                <option value="1">MALO</option>
                <option value="0" selected="selected">NA</option>
              </select></td>
          </tr>
          <tr>
            <th>Enchape</th>
            <td><select name="cocina5" id="cocina5" class="form-control">
                <option value="SI">SI</option>
                <option value="NO">NO</option>
                <option value="NA" selected="selected">NA</option>
              </select></td>
            <td><select name="cocina5e" id="cocina5e" class="form-control">
                <option value="3">BUENO</option>
                <option value="2">REGULAR</option>
                <option value="1">MALO</option>
                <option value="0" selected="selected">NA</option>
              </select></td>
          </tr>
          <tr>
            <th>Piso mortero</th>
            <td><select name="cocina6" id="cocina6" class="form-control">
                <option value="SI">SI</option>
                <option value="NO">NO</option>
                <option value="NA" selected="selected">NA</option>
              </select></td>
            <td><select name="cocina6e" id="cocina6e" class="form-control">
                <option value="3">BUENO</option>
                <option value="2">REGULAR</option>
                <option value="1">MALO</option>
                <option value="0" selected="selected">NA</option>
              </select></td>
          </tr>
          <tr>
            <th>Instalaciones hidraulicas</th>
            <td><select name="cocina7" id="cocina7" class="form-control">
                <option value="SI">SI</option>
                <option value="NO">NO</option>
                <option value="NA" selected="selected">NA</option>
              </select></td>
            <td><select name="cocina7e" id="cocina7e" class="form-control">
                <option value="3">BUENO</option>
                <option value="2">REGULAR</option>
                <option value="1">MALO</option>
                <option value="0" selected="selected">NA</option>
              </select></td>
          </tr>
          <tr>
            <th>Instalaciones sanitarias</th>
            <td><select name="cocina8" id="cocina8" class="form-control">
                <option value="SI">SI</option>
                <option value="NO">NO</option>
                <option value="NA" selected="selected">NA</option>
              </select></td>
            <td><select name="cocina8e" id="cocina8e" class="form-control">
                <option value="3">BUENO</option>
                <option value="2">REGULAR</option>
                <option value="1">MALO</option>
                <option value="0" selected="selected">NA</option>
              </select></td>
          </tr>
          <tr>
            <th>Instalaciones electricas</th>
            <td><select name="cocina9" id="cocina9" class="form-control">
                <option value="SI">SI</option>
                <option value="NO">NO</option>
                <option value="NA" selected="selected">NA</option>
              </select></td>
            <td><select name="cocina9e" id="cocina9e" class="form-control">
                <option value="3">BUENO</option>
                <option value="2">REGULAR</option>
                <option value="1">MALO</option>
                <option value="0" selected="selected">NA</option>
              </select></td>
          </tr>
          <tr>
            <th>Espacio para cocina sin humo</th>
            <td><select name="cocina10" id="cocina10" class="form-control">
                <option value="SI">SI</option>
                <option value="NO">NO</option>
                <option value="NA" selected="selected">NA</option>
              </select></td>
            <td><select name="cocina10e" id="cocina10e" class="form-control">
                <option value="3">BUENO</option>
                <option value="2">REGULAR</option>
                <option value="1">MALO</option>
                <option value="0" selected="selected">NA</option>
              </select></td>
          </tr>
        </table>
        <HR>
        <table class="table table-bordered">
          <tr>
            <th colspan="3" class="alert alert-secondary">2. SANEAMIENTO BASICO - BAÑOS Y LAVADERO</th>
          </tr>
          <tr>
            <th>Baño</th>
            <td><select name="bano1" id="bano1" class="form-control">
                <option value="SI">SI</option>
                <option value="NO">NO</option>
                <option value="NA" selected="selected">NA</option>
              </select></td>
            <td><select name="bano1e" id="bano1e" class="form-control">
                <option value="3">BUENO</option>
                <option value="2">REGULAR</option>
                <option value="1">MALO</option>
                <option value="0" selected="selected">NA</option>
              </select></td>
          </tr>
          <tr>
            <th>Sanitario</th>
            <td><select name="bano2" id="bano2" class="form-control">
                <option value="SI">SI</option>
                <option value="NO">NO</option>
                <option value="NA" selected="selected">NA</option>
              </select></td>
            <td><select name="bano2e" id="bano2e" class="form-control">
                <option value="3">BUENO</option>
                <option value="2">REGULAR</option>
                <option value="1">MALO</option>
                <option value="0" selected="selected">NA</option>
              </select></td>
          </tr>
          <tr>
            <th>Lavamanos</th>
            <td><select name="bano3" id="bano3" class="form-control">
                <option value="SI">SI</option>
                <option value="NO">NO</option>
                <option value="NA" selected="selected">NA</option>
              </select></td>
            <td><select name="bano3e" id="bano3e" class="form-control">
                <option value="3">BUENO</option>
                <option value="2">REGULAR</option>
                <option value="1">MALO</option>
                <option value="0" selected="selected">NA</option>
              </select></td>
          </tr>
          <tr>
            <th>Ducha</th>
            <td><select name="bano4" id="bano4" class="form-control">
                <option value="SI">SI</option>
                <option value="NO">NO</option>
                <option value="NA" selected="selected">NA</option>
              </select></td>
            <td><select name="bano4e" id="bano4e" class="form-control">
                <option value="3">BUENO</option>
                <option value="2">REGULAR</option>
                <option value="1">MALO</option>
                <option value="0" selected="selected">NA</option>
              </select></td>
          </tr>
          <tr>
            <th>Revoque</th>
            <td><select name="bano5" id="bano5" class="form-control">
                <option value="SI">SI</option>
                <option value="NO">NO</option>
                <option value="NA" selected="selected">NA</option>
              </select></td>
            <td><select name="bano5e" id="bano5e" class="form-control">
                <option value="3">BUENO</option>
                <option value="2">REGULAR</option>
                <option value="1">MALO</option>
                <option value="0" selected="selected">NA</option>
              </select></td>
          </tr>
          <tr>
            <th>Enchape</th>
            <td><select name="bano6" id="bano6" class="form-control">
                <option value="SI">SI</option>
                <option value="NO">NO</option>
                <option value="NA" selected="selected">NA</option>
              </select></td>
            <td><select name="bano6e" id="bano6e" class="form-control">
                <option value="3">BUENO</option>
                <option value="2">REGULAR</option>
                <option value="1">MALO</option>
                <option value="0" selected="selected">NA</option>
              </select></td>
          </tr>
          <tr>
            <th>Instalaciones hidraulicas</th>
            <td><select name="bano7" id="bano7" class="form-control">
                <option value="SI">SI</option>
                <option value="NO">NO</option>
                <option value="NA" selected="selected">NA</option>
              </select></td>
            <td><select name="bano7e" id="bano7e" class="form-control">
                <option value="3">BUENO</option>
                <option value="2">REGULAR</option>
                <option value="1">MALO</option>
                <option value="0" selected="selected">NA</option>
              </select></td>
          </tr>
          <tr>
            <th>Instalaciones sanitarias</th>
            <td><select name="bano8" id="bano8" class="form-control">
                <option value="SI">SI</option>
                <option value="NO">NO</option>
                <option value="NA" selected="selected">NA</option>
              </select></td>
            <td><select name="bano8e" id="bano8e" class="form-control">
                <option value="3">BUENO</option>
                <option value="2">REGULAR</option>
                <option value="1">MALO</option>
                <option value="0" selected="selected">NA</option>
              </select></td>
          </tr>
          <tr>
            <th>Instalaciones electricas</th>
            <td><select name="bano9" id="bano9" class="form-control">
                <option value="SI">SI</option>
                <option value="NO">NO</option>
                <option value="NA" selected="selected">NA</option>
              </select></td>
            <td><select name="bano9e" id="bano9e" class="form-control">
                <option value="3">BUENO</option>
                <option value="2">REGULAR</option>
                <option value="1">MALO</option>
                <option value="0" selected="selected">NA</option>
              </select></td>
          </tr>
          <tr>
            <th>Sistema septico</th>
            <td><select name="bano10" id="bano10" class="form-control">
                <option value="SI">SI</option>
                <option value="NO">NO</option>
                <option value="NA" selected="selected">NA</option>
              </select></td>
            <td><select name="bano10e" id="bano10e" class="form-control">
                <option value="3">BUENO</option>
                <option value="2">REGULAR</option>
                <option value="1">MALO</option>
                <option value="0" selected="selected">NA</option>
              </select></td>
          </tr>
          <tr>
            <th>Lavadero</th>
            <td><select name="bano11" id="bano11" class="form-control">
                <option value="SI">SI</option>
                <option value="NO">NO</option>
                <option value="NA" selected="selected">NA</option>
              </select></td>
            <td><select name="bano11e" id="bano11e" class="form-control">
                <option value="3">BUENO</option>
                <option value="2">REGULAR</option>
                <option value="1">MALO</option>
                <option value="0" selected="selected">NA</option>
              </select></td>
          </tr>
        </table>
        <HR>
        <table class="table table-bordered">
          <tr>
            <th colspan="3" class="alert alert-secondary">3. SANEAMIENTO BASICO - pisos</th>
          </tr>
          <tr>
            <th>Tierra</th>
            <td><select name="piso1" id="piso1" class="form-control">
                <option value="SI">SI</option>
                <option value="NO">NO</option>
                <option value="NA" selected="selected">NA</option>
              </select></td>
            <td><select name="piso1e" id="piso1e" class="form-control">
                <option value="3">BUENO</option>
                <option value="2">REGULAR</option>
                <option value="1">MALO</option>
                <option value="0" selected="selected">NA</option>
              </select></td>
          </tr>
          <tr>
            <th>Esterilla</th>
            <td><select name="piso2" id="piso2" class="form-control">
                <option value="SI">SI</option>
                <option value="NO">NO</option>
                <option value="NA" selected="selected">NA</option>
              </select></td>
            <td><select name="piso2e" id="piso2e" class="form-control">
                <option value="3">BUENO</option>
                <option value="2">REGULAR</option>
                <option value="1">MALO</option>
                <option value="0" selected="selected">NA</option>
              </select></td>
          </tr>
          <tr>
            <th>Madera</th>
            <td><select name="piso3" id="piso3" class="form-control">
                <option value="SI">SI</option>
                <option value="NO">NO</option>
                <option value="NA" selected="selected">NA</option>
              </select></td>
            <td><select name="piso3e" id="piso3e" class="form-control">
                <option value="3">BUENO</option>
                <option value="2">REGULAR</option>
                <option value="1">MALO</option>
                <option value="0" selected="selected">NA</option>
              </select></td>
          </tr>
          <tr>
            <th>Mortero</th>
            <td><select name="piso4" id="piso4" class="form-control">
                <option value="SI">SI</option>
                <option value="NO">NO</option>
                <option value="NA" selected="selected">NA</option>
              </select></td>
            <td><select name="piso4e" id="piso4e" class="form-control">
                <option value="3">BUENO</option>
                <option value="2">REGULAR</option>
                <option value="1">MALO</option>
                <option value="0" selected="selected">NA</option>
              </select></td>
          </tr>
          <tr>
            <th>Baldosa</th>
            <td><select name="piso5" id="piso5" class="form-control">
                <option value="SI">SI</option>
                <option value="NO">NO</option>
                <option value="NA" selected="selected">NA</option>
              </select></td>
            <td><select name="piso5e" id="piso5e" class="form-control">
                <option value="3">BUENO</option>
                <option value="2">REGULAR</option>
                <option value="1">MALO</option>
                <option value="0" selected="selected">NA</option>
              </select></td>
          </tr>
        </table>
        <HR>
        <table class="table table-bordered">
          <tr>
            <th colspan="3" class="alert alert-secondary">4. SANEAMIENTO BASICO - cubierta</th>
          </tr>
          <tr>
            <th>Cubierta</th>
            <td><select name="cubierta1" id="cubierta1" class="form-control">
                <option value="SI">SI</option>
                <option value="NO">NO</option>
                <option value="NA" selected="selected">NA</option>
              </select></td>
            <td><select name="cubierta1e" id="cubierta1e" class="form-control">
                <option value="3">BUENO</option>
                <option value="2">REGULAR</option>
                <option value="1">MALO</option>
                <option value="0" selected="selected">NA</option>
              </select></td>
          </tr>
          <tr>
            <th>Teja carton</th>
            <td><select name="cubierta2" id="cubierta2" class="form-control">
                <option value="SI">SI</option>
                <option value="NO">NO</option>
                <option value="NA" selected="selected">NA</option>
              </select></td>
            <td><select name="cubierta2e" id="cubierta2e" class="form-control">
                <option value="3">BUENO</option>
                <option value="2">REGULAR</option>
                <option value="1">MALO</option>
                <option value="0" selected="selected">NA</option>
              </select></td>
          </tr>
          <tr>
            <th>Teja barro</th>
            <td><select name="cubierta3" id="cubierta3" class="form-control">
                <option value="SI">SI</option>
                <option value="NO">NO</option>
                <option value="NA" selected="selected">NA</option>
              </select></td>
            <td><select name="cubierta3e" id="cubierta3e" class="form-control">
                <option value="3">BUENO</option>
                <option value="2">REGULAR</option>
                <option value="1">MALO</option>
                <option value="0" selected="selected">NA</option>
              </select></td>
          </tr>
          <tr>
            <th>Teja eternit</th>
            <td><select name="cubierta4" id="cubierta4" class="form-control">
                <option value="SI">SI</option>
                <option value="NO">NO</option>
                <option value="NA" selected="selected">NA</option>
              </select></td>
            <td><select name="cubierta4e" id="cubierta4e" class="form-control">
                <option value="3">BUENO</option>
                <option value="2">REGULAR</option>
                <option value="1">MALO</option>
                <option value="0" selected="selected">NA</option>
              </select></td>
          </tr>
          <tr>
            <th>Estructura en madera</th>
            <td><select name="cubierta5" id="cubierta5" class="form-control">
                <option value="SI">SI</option>
                <option value="NO">NO</option>
                <option value="NA" selected="selected">NA</option>
              </select></td>
            <td><select name="cubierta5e" id="cubierta5e" class="form-control">
                <option value="3">BUENO</option>
                <option value="2">REGULAR</option>
                <option value="1">MALO</option>
                <option value="0" selected="selected">NA</option>
              </select></td>
          </tr>
          <tr>
            <th>Estructura metalica</th>
            <td><select name="cubierta6" id="cubierta6" class="form-control">
                <option value="SI">SI</option>
                <option value="NO">NO</option>
                <option value="NA" selected="selected">NA</option>
              </select></td>
            <td><select name="cubierta6e" id="cubierta6e" class="form-control">
                <option value="3">BUENO</option>
                <option value="2">REGULAR</option>
                <option value="1">MALO</option>
                <option value="0" selected="selected">NA</option>
              </select></td>
          </tr>
          <tr>
            <th>Teja zinc</th>
            <td><select name="cubierta7" id="cubierta7" class="form-control">
                <option value="SI">SI</option>
                <option value="NO">NO</option>
                <option value="NA" selected="selected">NA</option>
              </select></td>
            <td><select name="cubierta7e" id="cubierta7e" class="form-control">
                <option value="3">BUENO</option>
                <option value="2">REGULAR</option>
                <option value="1">MALO</option>
                <option value="0" selected="selected">NA</option>
              </select></td>
          </tr>
          <tr>
            <th>Placa concreto</th>
            <td><select name="cubierta8" id="cubierta8" class="form-control">
                <option value="SI">SI</option>
                <option value="NO">NO</option>
                <option value="NA" selected="selected">NA</option>
              </select></td>
            <td><select name="cubierta8e" id="cubierta8e" class="form-control">
                <option value="3">BUENO</option>
                <option value="2">REGULAR</option>
                <option value="1">MALO</option>
                <option value="0" selected="selected">NA</option>
              </select></td>
          </tr>
        </table>
        <HR>
        <table class="table table-bordered">
          <tr>
            <th colspan="3" class="alert alert-secondary">5. SANEAMIENTO BASICO - estructura y muros</th>
          </tr>
          <tr>
            <th>Paredes esterilla</th>
            <td><select name="muros1" id="muros1" class="form-control">
                <option value="SI">SI</option>
                <option value="NO">NO</option>
                <option value="NA" selected="selected">NA</option>
              </select></td>
            <td><select name="muros1e" id="muros1e" class="form-control">
                <option value="3">BUENO</option>
                <option value="2">REGULAR</option>
                <option value="1">MALO</option>
                <option value="0" selected="selected">NA</option>
              </select></td>
          </tr>
          <tr>
            <th>Paredes bahareque</th>
            <td><select name="muros2" id="muros2" class="form-control">
                <option value="SI">SI</option>
                <option value="NO">NO</option>
                <option value="NA" selected="selected">NA</option>
              </select></td>
            <td><select name="muros2e" id="muros2e" class="form-control">
                <option value="3">BUENO</option>
                <option value="2">REGULAR</option>
                <option value="1">MALO</option>
                <option value="0" selected="selected">NA</option>
              </select></td>
          </tr>
          <tr>
            <th>Muros ladriñño no confinados</th>
            <td><select name="muros3" id="muros3" class="form-control">
                <option value="SI">SI</option>
                <option value="NO">NO</option>
                <option value="NA" selected="selected">NA</option>
              </select></td>
            <td><select name="muros3e" id="muros3e" class="form-control">
                <option value="3">BUENO</option>
                <option value="2">REGULAR</option>
                <option value="1">MALO</option>
                <option value="0" selected="selected">NA</option>
              </select></td>
          </tr>
          <tr>
            <th>Muros en ladrillo confinados</th>
            <td><select name="muros4" id="muros4" class="form-control">
                <option value="SI">SI</option>
                <option value="NO">NO</option>
                <option value="NA" selected="selected">NA</option>
              </select></td>
            <td><select name="muros4e" id="muros4e" class="form-control">
                <option value="3">BUENO</option>
                <option value="2">REGULAR</option>
                <option value="1">MALO</option>
                <option value="0" selected="selected">NA</option>
              </select></td>
          </tr>
          <tr>
            <th>Porticos</th>
            <td><select name="muros5" id="muros5" class="form-control">
                <option value="SI">SI</option>
                <option value="NO">NO</option>
                <option value="NA" selected="selected">NA</option>
              </select></td>
            <td><select name="muros5e" id="muros5e" class="form-control">
                <option value="3">BUENO</option>
                <option value="2">REGULAR</option>
                <option value="1">MALO</option>
                <option value="0" selected="selected">NA</option>
              </select></td>
          </tr>
          <tr>
            <th>Otros</th>
            <td><select name="muros6" id="muros6" class="form-control">
                <option value="SI">SI</option>
                <option value="NO">NO</option>
                <option value="NA" selected="selected">NA</option>
              </select></td>
            <td><select name="muros6e" id="muros6e" class="form-control">
                <option value="3">BUENO</option>
                <option value="2">REGULAR</option>
                <option value="1">MALO</option>
                <option value="0" selected="selected">NA</option>
              </select></td>
          </tr>

          <tr>
            <td colspan="2">
              <HR>
            </td>
          </tr>

          <tr>
            <th>Realizo la Visita</th>
            <td><input class="form-control" name="nombrevisito" type="text" id="nombrevisito" /></td>
          </tr>
          <tr>
            <th>Identificacion</th>
            <td><input class="form-control" name="documentovisito" type="text" id="documentovisito" onkeypress="return acceptNum(event)" /></td>
          </tr>

          <tr>
            <td colspan="2">
              <HR>
            </td>
          </tr>

          <tr>
            <th>Atendio la Visita</th>
            <td><input class="form-control" name="nombreatendio" type="text" id="nombreatendio" /></td>
          </tr>
          <tr>
            <th>Identificacion</th>
            <td><input class="form-control" name="documentoatendio" type="text" id="documentoatendio" onkeypress="return acceptNum(event)" /></td>
          </tr>
        </table>
        <HR>
        <table class="table table-bordered">
          <tr>
            <th class="alert alert-secondary">Observaciones</th>
          </tr>
          <tr>
            <td><textarea class="form-control" name="observaciones" id="observaciones" cols="90" rows="5" onkeyup="this.value=this.value.toUpperCase()"></textarea></td>
          </tr>
          <tr>
            <td><input name="button" type="submit" class="btn btn-success btn-block" id="button" value="Registrar Visita" /></td>
          </tr>
        </table>
        <HR>
      </form>

    <?php } else {
      echo "FICHA NO REGISRADA EN EL SISTEMA";
    }
    ?>

  </aside>

  <aside class="col-sm-1"></aside>
</div>

<?php include("includes/footer.php"); ?>