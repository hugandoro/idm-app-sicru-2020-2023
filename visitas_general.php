<?php include("includes/header.php"); ?>
<?php include("includes/title.php"); ?>
<?php include("includes/login_valid_session.php"); ?>

<div class="row">
  <aside class="col-sm-1"></aside>

  <aside class="col-sm-10">

    <TABLE>
      <TR>
        <TD align="center">
          <?php

          $codigo = $_GET['codigo'];
          mysqli_select_db($sle, $database_sle);
          mysqli_query($sle, "SET NAMES 'utf8'");

          $sql = "SELECT * FROM visitas WHERE (codigo = '$codigo')";
          $resultado = mysqli_query($sle, $sql) or die(mysqli_error());
          $row = mysqli_fetch_row($resultado);

          $sql1 = "SELECT * FROM ciudadanos WHERE (cedula = '$row[1]')";
          $resultado1 = mysqli_query($sle, $sql1) or die(mysqli_error());
          $row1 = mysqli_fetch_row($resultado1);
          ?>

          <table class="table table-bordered">
            <tr>
              <td colspan="2" class="alert alert-secondary">INFORMACION BASICA</td>
            </tr>
            <tr>
              <td>Titular</td>
              <td><input class="form-control" name="titular" id="titular" size="50" readonly="readonly" value="<?php echo "$row1[3] $row1[4] $row1[5] $row1[6]"; ?>" />
              </td>
            </tr>
            <tr>
              <td>Direccion</td>
              <td><input class="form-control" name="direccion" id="direccion" size="50" readonly="readonly" value="<?php echo "$row1[8]"; ?>" /></td>
            </tr>
            <tr>
              <td colspan="2" class="alert alert-secondary">DATOS GENERALES</td>
            </tr>
            <tr>
              <td>Fecha de la visita</td>
              <td><input class="form-control" name="fecha" id="fecha" readonly="readonly" value="<?php echo "$row[2]"; ?>" /></td>
            </tr>
            <tr>
              <td>Area lote m2 frente</td>
              <td><input class="form-control" name="frente" id="frente" readonly="readonly" value="<?php echo "$row[3]"; ?>" />m2</td>
            </tr>
            <tr>
              <td>Area lote m2 fondo</td>
              <td><input class="form-control" name="fondo" id="fondo" readonly="readonly" value="<?php echo "$row[4]"; ?>" />m2</td>
            </tr>
            <tr>
              <td>Estado de la propiedad</td>
              <td><input class="form-control" name="estado" id="estado" readonly="readonly" value="<?php
                                                                              if ($row[5] == '4') echo "MUY BUENO";
                                                                              if ($row[5] == '3') echo "BUENO";
                                                                              if ($row[5] == '2') echo "REGULAR";
                                                                              if ($row[5] == '1') echo "MALO";
                                                                              if ($row[5] == '0') echo "NA";
                                                                              ?>" /></td>
            </tr>
            <tr>
              <td>Documento de Propiedad</td>
              <td><input class="form-control" name="documentopro" type="text" id="documentopro" readonly="readonly" value="<?php echo "$row[101]"; ?>" /> N° <input class="form-control" name="documentopronum" type="text" id="documentopronum" readonly="readonly" value="<?php echo "$row[102]"; ?>" /></td>
            </tr>
            <tr>
              <td>Coordenada GPS</td>
              <td>N
                <input class="form-control" name="gpsNgrado" type="text" id="gpsNgrado" size="3" maxlength="3" readonly="readonly" value="<?php echo "$row[6]"; ?>" />
                °
                <input class="form-control" name="gpsNminuto" type="text" id="gpsNminuto" size="3" maxlength="3" readonly="readonly" value="<?php echo "$row[7]"; ?>" />
                '
                <input class="form-control" name="gpsNsegundo" type="text" id="gpsNsegundo" size="3" maxlength="3" readonly="readonly" value="<?php echo "$row[8]"; ?>" />
                ''
                <br>
                W
                <input class="form-control" name="gpsWgrado" type="text" id="gpsWgrado" size="3" maxlength="3" readonly="readonly" value="<?php echo "$row[9]"; ?>" />
                °
                <input class="form-control" name="gpsWminuto" type="text" id="cedula8" size="3" maxlength="3" readonly="readonly" value="<?php echo "$row[10]"; ?>" />
                '
                <input class="form-control" name="gpsWsegundo" type="text" id="cedula9" size="3" maxlength="3" readonly="readonly" value="<?php echo "$row[11]"; ?>" />
                ''
              </td>
            </tr>
            <tr>
              <td>Evidencia Grafica</td>
              <td>
                <img src="anexos/<?php echo "$row[112]"; ?>" width="300" alt="Imagen - Fotografia" />
                <!--<form name="form1" method="post" action="visitas_general2.php" enctype="multipart/form-data" onclick="pregunta()">
                  <hr><input class="form-control" name="anexo" type="file" id="anexo" class='form-control' />
                  <input class="form-control" type="hidden" name="codigo" <?php echo "value = $codigo"; ?>>
                  <hr><input class="btn btn-success btn-block" name="button" type="submit" class="Botones" id="button" value="Actualizar imagen" /> -->
                </form>
              </td>
            </tr>
            <tr>
              <td></td>
              <td></td>
            </tr>
          </table>
          <HR>
          <table class="table table-bordered">
            <tr>
              <td colspan="3" class="alert alert-secondary">0. ALGUNO DE LOS MIEMBROS DEL HOGAR PRESENTA LA CONDICION...</td>
            </tr>
            <tr>
              <td>Niños menores de 8 años</td>
              <td><input class="form-control" name="condicion1" id="condicion1" readonly="readonly" value="<?php echo "$row[92]"; ?>" /></td>
            </tr>
            <tr>
              <td>Adultos mayores de 65 años</td>
              <td><input class="form-control" name="condicion2" id="condicion2" readonly="readonly" value="<?php echo "$row[93]"; ?>" /></td>
            </tr>
            <tr>
              <td>Discapacidad Fisica</td>
              <td><input class="form-control" name="condicion3" id="condicion3" readonly="readonly" value="<?php echo "$row[94]"; ?>" /></td>
            </tr>
            <tr>
              <td>Red Unidos</td>
              <td><input class="form-control" name="condicion4" id="condicion4" readonly="readonly" value="<?php echo "$row[95]"; ?>" /></td>
            </tr>
            <tr>
              <td>Desplazados</td>
              <td><input class="form-control" name="condicion5" id="condicion5" readonly="readonly" value="<?php echo "$row[96]"; ?>" /></td>
            </tr>
            <tr>
              <td>Madre o Padre sin pareja</td>
              <td><input class="form-control" name="condicion6" id="condicion6" readonly="readonly" value="<?php echo "$row[97]"; ?>" /></td>
            </tr>
          </table>
          <HR>
          <table class="table table-bordered">
            <tr>
              <td colspan="3" class="alert alert-secondary">TABLA DE PUNTAJE</td>
            </tr>
            <tr>
              <td>Puntaje Cocina</td>
              <td><input class="form-control" name="cocina" id="cocina" size="20" readonly="readonly" value="<?php echo "$row[107]"; ?> " /></td>
              <td></td>
            </tr>
            <tr>
              <td>Puntaje Baño-Lavadero</td>
              <td><input class="form-control" name="cocina" id="cocina" size="20" readonly="readonly" value="<?php echo "$row[108]"; ?> " /></td>
              <td></td>
            </tr>
            <tr>
              <td>Puntaje Muros</td>
              <td><input class="form-control" name="cocina" id="cocina" size="20" readonly="readonly" value="<?php echo "$row[109]"; ?> " /></td>
              <td></td>
            </tr>
            <tr>
              <td>Puntaje Pisos</td>
              <td><input class="form-control" name="cocina" id="cocina" size="20" readonly="readonly" value="<?php echo "$row[110]"; ?> " /></td>
              <td></td>
            </tr>
            <tr>
              <td>Puntaje Cubierta</td>
              <td><input class="form-control" name="cocina" id="cocina" size="20" readonly="readonly" value="<?php echo "$row[111]"; ?> " /></td>
              <td></td>
            </tr>

            <tr>
              <td colspan="3" class="alert alert-secondary">1. SANEAMIENTO BASICO - COCINA</td>
            </tr>
            <tr>
              <td>Cocina</td>
              <td><input class="form-control" name="cocina1" id="cocina1" readonly="readonly" value="<?php echo "$row[12]"; ?>" /></td>
              <td><input class="form-control" name="cocina1e" id="cocina1e" readonly="readonly" value="<?php
                                                                                  if ($row[13] == '3') echo "BUENO";
                                                                                  if ($row[13] == '2') echo "REGULAR";
                                                                                  if ($row[13] == '1') echo "MALO";
                                                                                  if ($row[13] == '0') echo "NA";
                                                                                  ?>" /></td>
            </tr>
            <tr>
              <td>Lavaplato</td>
              <td><input class="form-control" name="cocina2" id="cocina2" readonly="readonly" value="<?php echo "$row[14]"; ?>" /></td>
              <td><input class="form-control" name="cocina2e" id="cocina2e" readonly="readonly" value="<?php
                                                                                  if ($row[15] == '3') echo "BUENO";
                                                                                  if ($row[15] == '2') echo "REGULAR";
                                                                                  if ($row[15] == '1') echo "MALO";
                                                                                  if ($row[15] == '0') echo "NA";
                                                                                  ?>" /></td>
            </tr>
            <tr>
              <td>Meson material</td>
              <td><input class="form-control" name="cocina3" id="cocina3" readonly="readonly" value="<?php echo "$row[16]"; ?>" /></td>
              <td><input class="form-control" name="cocina3e" id="cocina3e" readonly="readonly" value="<?php
                                                                                  if ($row[17] == '3') echo "BUENO";
                                                                                  if ($row[17] == '2') echo "REGULAR";
                                                                                  if ($row[17] == '1') echo "MALO";
                                                                                  if ($row[17] == '0') echo "NA";
                                                                                  ?>" /></td>
            </tr>
            <tr>
              <td>Revoque</td>
              <td><input class="form-control" name="cocina4" id="cocina4" readonly="readonly" value="<?php echo "$row[18]"; ?>" /></td>
              <td><input class="form-control" name="cocina4e" id="cocina4e" readonly="readonly" value="<?php
                                                                                  if ($row[19] == '3') echo "BUENO";
                                                                                  if ($row[19] == '2') echo "REGULAR";
                                                                                  if ($row[19] == '1') echo "MALO";
                                                                                  if ($row[19] == '0') echo "NA";
                                                                                  ?>" /></td>
            </tr>
            <tr>
              <td>Enchape</td>
              <td><input class="form-control" name="cocina5" id="cocina5" readonly="readonly" value="<?php echo "$row[20]"; ?>" /></td>
              <td><input class="form-control" name="cocina5e" id="cocina5e" readonly="readonly" value="<?php
                                                                                  if ($row[21] == '3') echo "BUENO";
                                                                                  if ($row[21] == '2') echo "REGULAR";
                                                                                  if ($row[21] == '1') echo "MALO";
                                                                                  if ($row[21] == '0') echo "NA";
                                                                                  ?>" /></td>
            </tr>
            <tr>
              <td>Piso mortero</td>
              <td><input class="form-control" name="cocina6" id="cocina6" readonly="readonly" value="<?php echo "$row[22]"; ?>" /></td>
              <td><input class="form-control" name="cocina6e" id="cocina6e" readonly="readonly" value="<?php
                                                                                  if ($row[23] == '3') echo "BUENO";
                                                                                  if ($row[23] == '2') echo "REGULAR";
                                                                                  if ($row[23] == '1') echo "MALO";
                                                                                  if ($row[23] == '0') echo "NA";
                                                                                  ?>" /></td>
            </tr>
            <tr>
              <td>Instalaciones hidraulicas</td>
              <td><input class="form-control" name="cocina7" id="cocina7" readonly="readonly" value="<?php echo "$row[24]"; ?>" /></td>
              <td><input class="form-control" name="cocina7e" id="cocina7e" readonly="readonly" value="<?php
                                                                                  if ($row[25] == '3') echo "BUENO";
                                                                                  if ($row[25] == '2') echo "REGULAR";
                                                                                  if ($row[25] == '1') echo "MALO";
                                                                                  if ($row[25] == '0') echo "NA";
                                                                                  ?>" /></td>
            </tr>
            <tr>
              <td>Instalaciones sanitarias</td>
              <td><input class="form-control" name="cocina8" id="cocina8" readonly="readonly" value="<?php echo "$row[26]"; ?>" /></td>
              <td><input class="form-control" name="cocina8e" id="cocina8e" readonly="readonly" value="<?php
                                                                                  if ($row[27] == '3') echo "BUENO";
                                                                                  if ($row[27] == '2') echo "REGULAR";
                                                                                  if ($row[27] == '1') echo "MALO";
                                                                                  if ($row[27] == '0') echo "NA";
                                                                                  ?>" /></td>
            </tr>
            <tr>
              <td>Instalaciones electricas</td>
              <td><input class="form-control" name="cocina9" id="cocina9" readonly="readonly" value="<?php echo "$row[28]"; ?>" /></td>
              <td><input class="form-control" name="cocina9e" id="cocina9e" readonly="readonly" value="<?php
                                                                                  if ($row[29] == '3') echo "BUENO";
                                                                                  if ($row[29] == '2') echo "REGULAR";
                                                                                  if ($row[29] == '1') echo "MALO";
                                                                                  if ($row[29] == '0') echo "NA";
                                                                                  ?>" /></td>
            </tr>
            <tr>
              <td>Espacio para cocina sin humo</td>
              <td><input class="form-control" name="cocina10" id="cocina10" readonly="readonly" value="<?php echo "$row[30]"; ?>" /></td>
              <td><input class="form-control" name="cocina10e" id="cocina10e" readonly="readonly" value="<?php
                                                                                    if ($row[31] == '3') echo "BUENO";
                                                                                    if ($row[31] == '2') echo "REGULAR";
                                                                                    if ($row[31] == '1') echo "MALO";
                                                                                    if ($row[31] == '0') echo "NA";
                                                                                    ?>" /></td>
            </tr>
          </table>
          <HR>
          <table class="table table-bordered">
            <tr>
              <td colspan="3" class="alert alert-secondary">2. SANEAMIENTO BASICO - BAÑOS Y LAVADERO</td>
            </tr>
            <tr>
              <td>Baño</td>
              <td><input class="form-control" name="bano1" id="bano1" readonly="readonly" value="<?php echo "$row[32]"; ?>" /></td>
              <td><input class="form-control" name="bano1e" id="bano1e" readonly="readonly" value="<?php
                                                                              if ($row[33] == '3') echo "BUENO";
                                                                              if ($row[33] == '2') echo "REGULAR";
                                                                              if ($row[33] == '1') echo "MALO";
                                                                              if ($row[33] == '0') echo "NA";
                                                                              ?>" /></td>
            </tr>
            <tr>
              <td>Sanitario</td>
              <td><input class="form-control" name="bano2" id="bano2" readonly="readonly" value="<?php echo "$row[34]"; ?>" /></td>
              <td><input class="form-control" name="bano2e" id="bano2e" readonly="readonly" value="<?php
                                                                              if ($row[35] == '3') echo "BUENO";
                                                                              if ($row[35] == '2') echo "REGULAR";
                                                                              if ($row[35] == '1') echo "MALO";
                                                                              if ($row[35] == '0') echo "NA";
                                                                              ?>" /></td>
            </tr>
            <tr>
              <td>Lavamanos</td>
              <td><input class="form-control" name="bano3" id="bano3" readonly="readonly" value="<?php echo "$row[36]"; ?>" /></td>
              <td><input class="form-control" name="bano3e" id="bano3e" readonly="readonly" value="<?php
                                                                              if ($row[37] == '3') echo "BUENO";
                                                                              if ($row[37] == '2') echo "REGULAR";
                                                                              if ($row[37] == '1') echo "MALO";
                                                                              if ($row[37] == '0') echo "NA";
                                                                              ?>" /></td>
            </tr>
            <tr>
              <td>Ducha</td>
              <td><input class="form-control" name="bano4" id="bano4" readonly="readonly" value="<?php echo "$row[38]"; ?>" /></td>
              <td><input class="form-control" name="bano4e" id="bano4e" readonly="readonly" value="<?php
                                                                              if ($row[39] == '3') echo "BUENO";
                                                                              if ($row[39] == '2') echo "REGULAR";
                                                                              if ($row[39] == '1') echo "MALO";
                                                                              if ($row[39] == '0') echo "NA";
                                                                              ?>" /></td>
            </tr>
            <tr>
              <td>Revoque</td>
              <td><input class="form-control" name="bano5" id="bano5" readonly="readonly" value="<?php echo "$row[40]"; ?>" /></td>
              <td><input class="form-control" name="bano5e" id="bano5e" readonly="readonly" value="<?php
                                                                              if ($row[41] == '3') echo "BUENO";
                                                                              if ($row[41] == '2') echo "REGULAR";
                                                                              if ($row[41] == '1') echo "MALO";
                                                                              if ($row[41] == '0') echo "NA";
                                                                              ?>" /></td>
            </tr>
            <tr>
              <td>Enchape</td>
              <td><input class="form-control" name="bano6" id="bano6" readonly="readonly" value="<?php echo "$row[42]"; ?>" /></td>
              <td><input class="form-control" name="bano6e" id="bano6e" readonly="readonly" value="<?php
                                                                              if ($row[43] == '3') echo "BUENO";
                                                                              if ($row[43] == '2') echo "REGULAR";
                                                                              if ($row[43] == '1') echo "MALO";
                                                                              if ($row[43] == '0') echo "NA";
                                                                              ?>" /></td>
            </tr>
            <tr>
              <td>Instalaciones hidraulicas</td>
              <td><input class="form-control" name="bano7" id="bano7" readonly="readonly" value="<?php echo "$row[44]"; ?>" /></td>
              <td><input class="form-control" name="bano7e" id="bano7e" readonly="readonly" value="<?php
                                                                              if ($row[45] == '3') echo "BUENO";
                                                                              if ($row[45] == '2') echo "REGULAR";
                                                                              if ($row[45] == '1') echo "MALO";
                                                                              if ($row[45] == '0') echo "NA";
                                                                              ?>" /></td>
            </tr>
            <tr>
              <td>Instalaciones sanitarias</td>
              <td><input class="form-control" name="bano8" id="bano8" readonly="readonly" value="<?php echo "$row[46]"; ?>" /></td>
              <td><input class="form-control" name="bano8e" id="bano8e" readonly="readonly" value="<?php
                                                                              if ($row[47] == '3') echo "BUENO";
                                                                              if ($row[47] == '2') echo "REGULAR";
                                                                              if ($row[47] == '1') echo "MALO";
                                                                              if ($row[47] == '0') echo "NA";
                                                                              ?>" /></td>
            </tr>
            <tr>
              <td>Instalaciones electricas</td>
              <td><input class="form-control" name="bano9" id="bano9" readonly="readonly" value="<?php echo "$row[48]"; ?>" /></td>
              <td><input class="form-control" name="bano9e" id="bano9e" readonly="readonly" value="<?php
                                                                              if ($row[49] == '3') echo "BUENO";
                                                                              if ($row[49] == '2') echo "REGULAR";
                                                                              if ($row[49] == '1') echo "MALO";
                                                                              if ($row[49] == '0') echo "NA";
                                                                              ?>" /></td>
            </tr>
            <tr>
              <td>Sistema septico</td>
              <td><input class="form-control" name="bano10" id="bano10" readonly="readonly" value="<?php echo "$row[50]"; ?>" /></td>
              <td><input class="form-control" name="bano10e" id="bano10e" readonly="readonly" value="<?php
                                                                                if ($row[51] == '3') echo "BUENO";
                                                                                if ($row[51] == '2') echo "REGULAR";
                                                                                if ($row[51] == '1') echo "MALO";
                                                                                if ($row[51] == '0') echo "NA";
                                                                                ?>" /></td>
            </tr>
            <tr>
              <td>Lavadero</td>
              <td><input class="form-control" name="bano11" id="bano11" readonly="readonly" value="<?php echo "$row[52]"; ?>" /></td>
              <td><input class="form-control" name="bano11e" id="bano11e" readonly="readonly" value="<?php
                                                                                if ($row[53] == '3') echo "BUENO";
                                                                                if ($row[53] == '2') echo "REGULAR";
                                                                                if ($row[53] == '1') echo "MALO";
                                                                                if ($row[53] == '0') echo "NA";
                                                                                ?>" /></td>
            </tr>
          </table>
          <HR>
          <table class="table table-bordered">
            <tr>
              <td colspan="3" class="alert alert-secondary">3. SANEAMIENTO BASICO - pisos</td>
            </tr>
            <tr>
              <td>Tierra</td>
              <td><input class="form-control" name="piso1" id="piso1" readonly="readonly" value="<?php echo "$row[54]"; ?>" /></td>
              <td><input class="form-control" name="piso1e" id="piso1e" readonly="readonly" value="<?php
                                                                              if ($row[55] == '3') echo "BUENO";
                                                                              if ($row[55] == '2') echo "REGULAR";
                                                                              if ($row[55] == '1') echo "MALO";
                                                                              if ($row[55] == '0') echo "NA";
                                                                              ?>" /></td>
            </tr>
            <tr>
              <td>Esterilla</td>
              <td><input class="form-control" name="piso2" id="piso2" readonly="readonly" value="<?php echo "$row[56]"; ?>" /></td>
              <td><input class="form-control" name="piso2e" id="piso2e" readonly="readonly" value="<?php
                                                                              if ($row[57] == '3') echo "BUENO";
                                                                              if ($row[57] == '2') echo "REGULAR";
                                                                              if ($row[57] == '1') echo "MALO";
                                                                              if ($row[57] == '0') echo "NA";
                                                                              ?>" /></td>
            </tr>
            <tr>
              <td>Madera</td>
              <td><input class="form-control" name="piso3" id="piso3" readonly="readonly" value="<?php echo "$row[58]"; ?>" /></td>
              <td><input class="form-control" name="piso3e" id="piso3e" readonly="readonly" value="<?php
                                                                              if ($row[59] == '3') echo "BUENO";
                                                                              if ($row[59] == '2') echo "REGULAR";
                                                                              if ($row[59] == '1') echo "MALO";
                                                                              if ($row[59] == '0') echo "NA";
                                                                              ?>" /></td>
            </tr>
            <tr>
              <td>Mortero</td>
              <td><input class="form-control" name="piso4" id="piso4" readonly="readonly" value="<?php echo "$row[60]"; ?>" /></td>
              <td><input class="form-control" name="piso4e" id="piso4e" readonly="readonly" value="<?php
                                                                              if ($row[61] == '3') echo "BUENO";
                                                                              if ($row[61] == '2') echo "REGULAR";
                                                                              if ($row[61] == '1') echo "MALO";
                                                                              if ($row[61] == '0') echo "NA";
                                                                              ?>" /></td>
            </tr>
            <tr>
              <td>Baldosa</td>
              <td><input class="form-control" name="piso5" id="piso5" readonly="readonly" value="<?php echo "$row[62]"; ?>" /></td>
              <td><input class="form-control" name="piso5e" id="piso5e" readonly="readonly" value="<?php
                                                                              if ($row[63] == '3') echo "BUENO";
                                                                              if ($row[63] == '2') echo "REGULAR";
                                                                              if ($row[63] == '1') echo "MALO";
                                                                              if ($row[63] == '0') echo "NA";
                                                                              ?>" /></td>
            </tr>
          </table>
          <HR>
          <table class="table table-bordered">
            <tr>
              <td colspan="3" class="alert alert-secondary">4. SANEAMIENTO BASICO - cubierta</td>
            </tr>
            <tr>
              <td>Cubierta</td>
              <td><input class="form-control" name="cubierta1" id="cubierta1" readonly="readonly" value="<?php echo "$row[64]"; ?>" /></td>
              <td><input class="form-control" name="cubierta1e" id="cubierta1e" readonly="readonly" value="<?php
                                                                                      if ($row[65] == '3') echo "BUENO";
                                                                                      if ($row[65] == '2') echo "REGULAR";
                                                                                      if ($row[65] == '1') echo "MALO";
                                                                                      if ($row[65] == '0') echo "NA";
                                                                                      ?>" /></td>
            </tr>
            <tr>
              <td>Teja carton</td>
              <td><input class="form-control" name="cubierta2" id="cubierta2" readonly="readonly" value="<?php echo "$row[66]"; ?>" /></td>
              <td><input class="form-control" name="cubierta2e" id="cubierta2e" readonly="readonly" value="<?php
                                                                                      if ($row[67] == '3') echo "BUENO";
                                                                                      if ($row[67] == '2') echo "REGULAR";
                                                                                      if ($row[67] == '1') echo "MALO";
                                                                                      if ($row[67] == '0') echo "NA";
                                                                                      ?>" /></td>
            </tr>
            <tr>
              <td>Teja barro</td>
              <td><input class="form-control" name="cubierta3" id="cubierta3" readonly="readonly" value="<?php echo "$row[68]"; ?>" /></td>
              <td><input class="form-control" name="cubierta3e" id="cubierta3e" readonly="readonly" value="<?php
                                                                                      if ($row[69] == '3') echo "BUENO";
                                                                                      if ($row[69] == '2') echo "REGULAR";
                                                                                      if ($row[69] == '1') echo "MALO";
                                                                                      if ($row[69] == '0') echo "NA";
                                                                                      ?>" /></td>
            </tr>
            <tr>
              <td>Teja eternit</td>
              <td><input class="form-control" name="cubierta4" id="cubierta4" readonly="readonly" value="<?php echo "$row[70]"; ?>" /></td>
              <td><input class="form-control" name="cubierta4e" id="cubierta4e" readonly="readonly" value="<?php
                                                                                      if ($row[71] == '3') echo "BUENO";
                                                                                      if ($row[71] == '2') echo "REGULAR";
                                                                                      if ($row[71] == '1') echo "MALO";
                                                                                      if ($row[71] == '0') echo "NA";
                                                                                      ?>" /></td>
            </tr>
            <tr>
              <td>Estructura en madera</td>
              <td><input class="form-control" name="cubierta5" id="cubierta5" readonly="readonly" value="<?php echo "$row[72]"; ?>" /></td>
              <td><input class="form-control" name="cubierta5e" id="cubierta5e" readonly="readonly" value="<?php
                                                                                      if ($row[73] == '3') echo "BUENO";
                                                                                      if ($row[73] == '2') echo "REGULAR";
                                                                                      if ($row[73] == '1') echo "MALO";
                                                                                      if ($row[73] == '0') echo "NA";
                                                                                      ?>" /></td>
            </tr>
            <tr>
              <td>Estructura metalica</td>
              <td><input class="form-control" name="cubierta6" id="cubierta6" readonly="readonly" value="<?php echo "$row[74]"; ?>" /></td>
              <td><input class="form-control" name="cubierta6e" id="cubierta6e" readonly="readonly" value="<?php
                                                                                      if ($row[75] == '3') echo "BUENO";
                                                                                      if ($row[75] == '2') echo "REGULAR";
                                                                                      if ($row[75] == '1') echo "MALO";
                                                                                      if ($row[75] == '0') echo "NA";
                                                                                      ?>" /></td>
            </tr>
            <tr>
              <td>Teja zinc</td>
              <td><input class="form-control" name="cubierta7" id="cubierta7" readonly="readonly" value="<?php echo "$row[76]"; ?>" /></td>
              <td><input class="form-control" name="cubierta7e" id="cubierta7e" readonly="readonly" value="<?php
                                                                                      if ($row[77] == '3') echo "BUENO";
                                                                                      if ($row[77] == '2') echo "REGULAR";
                                                                                      if ($row[77] == '1') echo "MALO";
                                                                                      if ($row[77] == '0') echo "NA";
                                                                                      ?>" /></td>
            </tr>
            <tr>
              <td>Placa concreto</td>
              <td><input class="form-control" name="cubierta8" id="cubierta8" readonly="readonly" value="<?php echo "$row[78]"; ?>" /></td>
              <td><input class="form-control" name="cubierta8e" id="cubierta8e" readonly="readonly" value="<?php
                                                                                      if ($row[79] == '3') echo "BUENO";
                                                                                      if ($row[79] == '2') echo "REGULAR";
                                                                                      if ($row[79] == '1') echo "MALO";
                                                                                      if ($row[79] == '0') echo "NA";
                                                                                      ?>" /></td>
            </tr>
          </table>
          <HR>
          <table class="table table-bordered">
            <tr>
              <td colspan="3" class="alert alert-secondary">5. SANEAMIENTO BASICO - estructura y muros</td>
            </tr>
            <tr>
              <td>Paredes esterilla</td>
              <td><input class="form-control" name="muros1" id="muros1" readonly="readonly" value="<?php echo "$row[80]"; ?>" /></td>
              <td><input class="form-control" name="muros1e" id="muros1e" readonly="readonly" value="<?php
                                                                                if ($row[81] == '3') echo "BUENO";
                                                                                if ($row[81] == '2') echo "REGULAR";
                                                                                if ($row[81] == '1') echo "MALO";
                                                                                if ($row[81] == '0') echo "NA";
                                                                                ?>" /></td>
            </tr>
            <tr>
              <td>Paredes bahareque</td>
              <td><input class="form-control" name="muros2" id="muros2" readonly="readonly" value="<?php echo "$row[82]"; ?>" /></td>
              <td><input class="form-control" name="muros2e" id="muros2e" readonly="readonly" value="<?php
                                                                                if ($row[83] == '3') echo "BUENO";
                                                                                if ($row[83] == '2') echo "REGULAR";
                                                                                if ($row[83] == '1') echo "MALO";
                                                                                if ($row[83] == '0') echo "NA";
                                                                                ?>" /></td>
            </tr>
            <tr>
              <td>Muros ladrillo no confinados</td>
              <td><input class="form-control" name="muros3" id="muros3" readonly="readonly" value="<?php echo "$row[84]"; ?>" /></td>
              <td><input class="form-control" name="muros3e" id="muros3e" readonly="readonly" value="<?php
                                                                                if ($row[85] == '3') echo "BUENO";
                                                                                if ($row[85] == '2') echo "REGULAR";
                                                                                if ($row[85] == '1') echo "MALO";
                                                                                if ($row[85] == '0') echo "NA";
                                                                                ?>" /></td>
            </tr>
            <tr>
              <td>Muros en ladrillo confinados</td>
              <td><input class="form-control" name="muros4" id="muros4" readonly="readonly" value="<?php echo "$row[86]"; ?>" /></td>
              <td><input class="form-control" name="muros4e" id="muros4e" readonly="readonly" value="<?php
                                                                                if ($row[87] == '3') echo "BUENO";
                                                                                if ($row[87] == '2') echo "REGULAR";
                                                                                if ($row[87] == '1') echo "MALO";
                                                                                if ($row[87] == '0') echo "NA";
                                                                                ?>" /></td>
            </tr>
            <tr>
              <td>Porticos</td>
              <td><input class="form-control" name="muros5" id="muros5" readonly="readonly" value="<?php echo "$row[88]"; ?>" /></td>
              <td><input class="form-control" name="muros5e" id="muros5e" readonly="readonly" value="<?php
                                                                                if ($row[89] == '3') echo "BUENO";
                                                                                if ($row[89] == '2') echo "REGULAR";
                                                                                if ($row[89] == '1') echo "MALO";
                                                                                if ($row[89] == '0') echo "NA";
                                                                                ?>" /></td>
            </tr>
            <tr>
              <td>Otros</td>
              <td><input class="form-control" name="muros6" id="muros6" readonly="readonly" value="<?php echo "$row[90]"; ?>" /></td>
              <td><input class="form-control" name="muros6e" id="muros6e" readonly="readonly" value="<?php
                                                                                if ($row[91] == '3') echo "BUENO";
                                                                                if ($row[91] == '2') echo "REGULAR";
                                                                                if ($row[91] == '1') echo "MALO";
                                                                                if ($row[91] == '0') echo "NA";
                                                                                ?>" /></td>
            </tr>

            <tr>
              <td colspan="2">
                <HR>
              </td>
            </tr>

            <tr>
              <td>Realizo la Visita</td>
              <td><input class="form-control" name="nombrevisito" id="nombrevisito" readonly="readonly" value="<?php echo "$row[103]"; ?>" /></td>
            </tr>
            <tr>
              <td>Identificacion</td>
              <td><input class="form-control" name="documentovisito" id="documentovisito" readonly="readonly" value="<?php echo "$row[104]"; ?>" /></td>
            </tr>

            <tr>
              <td colspan="2">
                <HR>
              </td>
            </tr>

            <tr>
              <td>Atendio la Visita</td>
              <td><input class="form-control" name="nombreatendio" id="nombreatendio" readonly="readonly" value="<?php echo "$row[105]"; ?>" /></td>
            </tr>
            <tr>
              <td>Identificacion</td>
              <td><input class="form-control" name="documentoatendio" id="documentoatendio" readonly="readonly" value="<?php echo "$row[106]"; ?>" /></td>
            </tr>
          </table>
          <HR>
          <table class="table table-bordered">
            <tr>
              <td class="alert alert-secondary">Observaciones</td>
            </tr>
            <tr>
              <td><textarea class="form-control" name="observaciones" id="observaciones" cols="90" rows="5" readonly="readonly""><?php echo "$row[98]"; ?></textarea></td>
            </tr>
          </table>

        </TD>
      </TR>
    </TABLE>

  </aside>

  <aside class=" col-sm-1"></aside>
  </div>

<?php include("includes/footer.php"); ?>