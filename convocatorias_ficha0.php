<?php include("includes/header.php"); ?>
<?php include("includes/title.php"); ?>
<?php include("includes/login_valid_session.php"); ?>

<div class="row">
  <aside class="col-sm-1"></aside>

  <aside class="col-sm-10">

    <?php
    mysqli_select_db($sle, $database_sle);
    mysqli_query($sle, "SET NAMES 'utf8'");

    $cedula = $_GET['cedula'];
    $convocatoria = $_GET['convocatoria'];

    $sqlC = "SELECT * FROM convocatorias WHERE id_proyecto = '$convocatoria'";
    $resultC = mysqli_query($sle, $sqlC);
    $rowC = mysqli_fetch_row($resultC);

    $sqlCC = "SELECT * FROM convocatorias_ciudadanos WHERE ((id_proyecto = '$convocatoria') AND (cedula = '$cedula'))";
    $resultCC = mysqli_query($sle, $sqlCC);
    $rowCC = mysqli_fetch_row($resultCC);

    $sqlCI = "SELECT * FROM ciudadanos WHERE cedula = '$cedula'";
    $resultCI = mysqli_query($sle, $sqlCI);
    $rowCI = mysqli_fetch_row($resultCI);

    $Pproyecto = $rowC[1] . " - " . $rowC[2];
    $Pfecha = $rowCC[2];
    $Pcedula = $rowCI[0];
    $Pnombre = $rowCI[3] . " " . $rowCI[4] . " " . $rowCI[5] . " " . $rowCI[6];
    $Pdireccion = $rowCI[8] . " - " . $rowCI[9];
    $Ptelefono = $rowCI[12] . " // " . $rowCI[13];

    $Pfam1 = $rowCI[17];
    $Pfam1_ced = $rowCI[62];
    $Pfam2 = $rowCI[18];
    $Pfam2_ced = $rowCI[63];
    $Pfam3 = $rowCI[19];
    $Pfam3_ced = $rowCI[64];
    $Pfam4 = $rowCI[20];
    $Pfam4_ced = $rowCI[65];
    $Pfam5 = $rowCI[21];
    $Pfam5_ced = $rowCI[66];
    $Pfam6 = $rowCI[22];
    $Pfam6_ced = $rowCI[67];
    $Pfam7 = $rowCI[23];
    $Pfam7_ced = $rowCI[68];
    $Pfam8 = $rowCI[24];
    $Pfam8_ced = $rowCI[69];
    $Pfam9 = $rowCI[25];
    $Pfam9_ced = $rowCI[70];
    $Pfam10 = $rowCI[26];
    $Pfam10_ced = $rowCI[71];

    if ($Pfam1 == '')
      $Pfam1 = $Pfam1_ced = '';
    if ($Pfam2 == '')
      $Pfam2 = $Pfam2_ced = '';
    if ($Pfam3 == '')
      $Pfam3 = $Pfam3_ced = '';
    if ($Pfam4 == '')
      $Pfam4 = $Pfam4_ced = '';
    if ($Pfam5 == '')
      $Pfam5 = $Pfam5_ced = '';
    if ($Pfam6 == '')
      $Pfam6 = $Pfam6_ced = '';
    if ($Pfam7 == '')
      $Pfam7 = $Pfam7_ced = '';
    if ($Pfam8 == '')
      $Pfam8 = $Pfam8_ced = '';
    if ($Pfam9 == '')
      $Pfam9 = $Pfam9_ced = '';
    if ($Pfam10 == '')
      $Pfam10 = $Pfam10_ced = '';

    $Pcodigopin = $rowCC[0] . '-' . $rowCC[1];

    ?>
    
    <table border="0">
      <tr>
        <td colspan="4" bgcolor="#6699FF" class="TituloFICHAS">FORMULARIO DE POSTULACION</td>
        <td colspan="2" bgcolor="#6699FF"><H3><?php echo $Pcodigopin; ?></H3></td>
      </tr>
      <tr>
        <td colspan="6"><?php echo $Pproyecto; ?></td>
      </tr>
      <tr>
        <td colspan="6" bgcolor="#6699FF">DATOS BASICOS</td>
      </tr>
      <tr>
        <td width="20%">Fecha</td>
        <td width="20%"><?php echo $Pfecha; ?></td>
        <td width="10%">&nbsp;</td>
        <td width="15%">&nbsp;</td>
        <td width="15%">Radicado</td>
        <td width="20%">&nbsp;</td>
      </tr>
      <tr>
        <td>Nombre</td>
        <td colspan="3"><?php echo $Pnombre; ?></td>
        <td>Cedula</td>
        <td><?php echo $Pcedula; ?></td>
      </tr>
      <tr>
        <td>Direccion</td>
        <td colspan="3"><?php echo $Pdireccion; ?></td>
        <td>Telefono</td>
        <td><?php echo $Ptelefono; ?></td>
      </tr>
      <tr>
        <td colspan="6" bgcolor="#6699FF">GRUPO FAMILIAR</td>
      </tr>
      <tr>
        <td>Nombre</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>Cedula</td>
      </tr>
      <tr>
        <td colspan="5"><?php echo $Pfam1; ?></td>
        <td><?php echo $Pfam1_ced; ?></td>
      </tr>
      <tr>
        <td colspan="5"><?php echo $Pfam2; ?></td>
        <td><?php echo $Pfam2_ced; ?></td>
      </tr>
      <tr>
        <td colspan="5"><?php echo $Pfam3; ?></td>
        <td><?php echo $Pfam3_ced; ?></td>
      </tr>
      <tr>
        <td colspan="5"><?php echo $Pfam4; ?></td>
        <td><?php echo $Pfam4_ced; ?></td>
      </tr>
      <tr>
        <td colspan="5"><?php echo $Pfam5; ?></td>
        <td><?php echo $Pfam5_ced; ?></td>
      </tr>
      <tr>
        <td colspan="5"><?php echo $Pfam6; ?></td>
        <td><?php echo $Pfam6_ced; ?></td>
      </tr>
      <tr>
        <td colspan="5"><?php echo $Pfam7; ?></td>
        <td><?php echo $Pfam7_ced; ?></td>
      </tr>
      <tr>
        <td colspan="5"><?php echo $Pfam8; ?></td>
        <td><?php echo $Pfam8_ced; ?></td>
      </tr>
      <tr>
        <td colspan="5"><?php echo $Pfam9; ?></td>
        <td><?php echo $Pfam9_ced; ?></td>
      </tr>
      <tr>
        <td colspan="5"><?php echo $Pfam10; ?></td>
        <td><?php echo $Pfam10_ced; ?></td>
      </tr>
      <tr>
        <td colspan="6" bgcolor="#6699FF">ANEXOS</td>
      </tr>
      <tr>
        <td colspan="4">______________________________________________________________</td>
        <td>N° de Folios</td>
        <td>_____</td>
      </tr>
      <tr>
        <td colspan="4">______________________________________________________________</td>
        <td>N° de Folios</td>
        <td>_____</td>
      </tr>
      <tr>
        <td colspan="4">______________________________________________________________</td>
        <td>N° de Folios</td>
        <td>_____</td>
      </tr>
      <tr>
        <td colspan="6" bgcolor="#6699FF">NOMBRE Y FIRMA DEL POSTULANTE</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td colspan="2">_____________________________________</td>
        <td colspan="3">CC _____________ de _________________</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td colspan="6">
          <hr />
        </td>
      </tr>
      <tr>
        <td colspan="6">
          <p>Se certifica que el señor (a) <B><?php echo $Pnombre; ?></B>, identificado (a) con documento de identificacion N° <B><?php echo $Pcedula; ?></B>, ha presentado documentos en ( __ ) folios para postularse dentro del programa <B><?php echo $Pproyecto; ?> . </B>Formulario de Postulacion N° <B><?php echo $Pcodigopin; ?></B>. En constancia se firma en Dosquebradas el <?php echo date('Y-m-d'); ?>. *** La presente postulacion no garantiza la otorgacion de vivienda, cupo, subidio o mejoramiento, tampoco compromete al IDM con la adjudicacion del mismo a la persona aqui postulante ***</p>
          <p>Firma __________________________________</p>
        </td>
      </tr>
    </table>

    <?php
    echo "<HR><input type='button' name='Imprimir' id='Imprimir' value='Imprimir' onclick='window.print();' class='btn btn-success btn-block'/><a href='convocatorias.php'>
    <hr><input type='submit' name='Volver' id='Volver' value='Volver a la ventana anterior...' class='btn btn-success btn-block'/></a>";
    ?>

  </aside>

  <aside class="col-sm-1"></aside>
</div>

<?php include("includes/footer.php"); ?>