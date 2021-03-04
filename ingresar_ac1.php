<?php include("includes/header.php"); ?>
<?php include("includes/title.php"); ?>
<?php include("includes/login_valid_session.php"); ?>

<script type="text/javascript">
  //VERIFICAR ESPACIOS EN BLANCO
  function noespacios(B) {
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
    //REUBICADOS *********************************************
    //********************************************************
    if (B == '0') {
      if (document.getElementById('parentesco').value == '') {
        alert('REUBICADOS - Requiere *** PARENTESCO ***');
        return false;
      }
      if (document.getElementById('nombre1').value == '') {
        alert('REUBICADOS - Requiere *** NOMBRE 1 ***');
        return false;
      }
      if (document.getElementById('apellido1').value == '') {
        alert('REUBICADOS - Requiere *** APELLIDO 1 ***');
        return false;
      }
      if (document.getElementById('direccion').value == '') {
        alert('REUBICADOS - Requiere *** DIRECCION ***');
        return false;
      }
      if (document.getElementById('barrio').value == '') {
        alert('REUBICADOS - Requiere *** BARRIO ***');
        return false;
      }
      if (document.getElementById('zona').value == '') {
        alert('REUBICADOS - Requiere *** ZONA ***');
        return false;
      }
      if ((document.getElementById('fijo').value == '') && (document.getElementById('celular').value == '')) {
        alert('REUBICADOS - Requiere *** FIJO O CELULAR ***');
        return false;
      }
      if (document.getElementById('radicado').value == '') {
        alert('REUBICADOS - Requiere *** RADICADO ***');
        return false;
      }
      if (document.getElementById('ente_remite').value == '') {
        alert('REUBICADOS - Requiere *** ENTE QUE REMITE ***');
        return false;
      }
      if (document.getElementById('tipoevento').value == '') {
        alert('REUBICADOS - Requiere *** TIPO DE EVENTO ***');
        return false;
      }
      if (document.getElementById('zona_riesgo').value == '') {
        alert('REUBICADOS - Requiere *** ZONA DE RIESGO ***');
        return false;
      }
      if (document.getElementById('inmueble_actual').value == '') {
        alert('REUBICADOS - Requiere *** INMUEBLE ACTUAL ***');
        return false;
      }
      if (document.getElementById('inmueble_titulo').value == '') {
        alert('REUBICADOS - Requiere *** INMUEBLE TITULO ***');
        return false;
      }
      if (document.getElementById('inmueble_tiempo').value == '') {
        alert('REUBICADOS - Requiere *** INMUEBLE TIEMPO ***');
        return false;
      }
      if (document.getElementById('inmueble_material').value == '') {
        alert('REUBICADOS - Requiere *** INMUEBLE MATERIAL ***');
        return false;
      }
      if (document.getElementById('inmueble_servicios').value == '') {
        alert('REUBICADOS - Requiere *** INMUEBLE SERVICIOS ***');
        return false;
      }
    }
    //*****************************************************************
    //*****************************************************************

    //VERIFICA CAMPOS VACIOS
    //MEJORAMIENTO URBANO*************************************
    //********************************************************
    if (B == '1') {
      if (document.getElementById('parentesco').value == '') {
        alert('MEJ. URBANO - Requiere *** PARENTESCO ***');
        return false;
      }
      if (document.getElementById('nombre1').value == '') {
        alert('MEJ. URBANO - Requiere *** NOMBRE 1 ***');
        return false;
      }
      if (document.getElementById('apellido1').value == '') {
        alert('MEJ. URBANO - Requiere *** APELLIDO 1 ***');
        return false;
      }
      if (document.getElementById('direccion').value == '') {
        alert('MEJ. URBANO - Requiere *** DIRECCION ***');
        return false;
      }
      if (document.getElementById('barrio').value == '') {
        alert('MEJ. URBANO - Requiere *** BARRIO ***');
        return false;
      }
      if (document.getElementById('zona').value == '') {
        alert('MEJ. URBANO - Requiere *** ZONA ***');
        return false;
      }
      if ((document.getElementById('fijo').value == '') && (document.getElementById('celular').value == '')) {
        alert('MEJ. URBANO - Requiere *** FIJO O CELULAR ***');
        return false;
      }
      if (document.getElementById('inmueble_actual').value == '') {
        alert('MEJ. URBANO - Requiere *** INMUEBLE ACTUAL ***');
        return false;
      }
      if (document.getElementById('inmueble_titulo').value == '') {
        alert('MEJ. URBANO - Requiere *** INMUEBLE TITULO ***');
        return false;
      }
      if (document.getElementById('inmueble_escritura').value == '') {
        alert('MEJ. URBANO - Requiere *** INMUEBLE ESCRITURA ***');
        return false;
      }
      if (document.getElementById('inmueble_servicios').value == '') {
        alert('MEJ. URBANO - Requiere *** INMUEBLE SERVICIOS ***');
        return false;
      }
      if (document.getElementById('inmueble_solicitud').value == '') {
        alert('MEJ. URBANO - Requiere *** INMUEBLE TIPO SOLICITUD ***');
        return false;
      }
    }
    //*****************************************************************
    //*****************************************************************

    //VERIFICA CAMPOS VACIOS
    //MEJORAMIENTO RURAL *************************************
    //********************************************************
    if (B == '2') {
      if (document.getElementById('parentesco').value == '') {
        alert('MEJ. RURAL - Requiere *** PARENTESCO ***');
        return false;
      }
      if (document.getElementById('nombre1').value == '') {
        alert('MEJ. RURAL - Requiere *** NOMBRE 1 ***');
        return false;
      }
      if (document.getElementById('apellido1').value == '') {
        alert('MEJ. RURAL - Requiere *** APELLIDO 1 ***');
        return false;
      }
      if (document.getElementById('direccion').value == '') {
        alert('MEJ. RURAL - Requiere *** DIRECCION ***');
        return false;
      }
      if (document.getElementById('barrio').value == '') {
        alert('MEJ. RURAL - Requiere *** BARRIO ***');
        return false;
      }
      if (document.getElementById('zona').value == '') {
        alert('MEJ. RURAL - Requiere *** ZONA ***');
        return false;
      }
      if ((document.getElementById('fijo').value == '') && (document.getElementById('celular').value == '')) {
        alert('MEJ. RURAL - Requiere *** FIJO O CELULAR ***');
        return false;
      }
      if (document.getElementById('inmueble_actual').value == '') {
        alert('MEJ. RURAL - Requiere *** INMUEBLE ACTUAL ***');
        return false;
      }
      if (document.getElementById('inmueble_titulo').value == '') {
        alert('MEJ. RURAL - Requiere *** INMUEBLE TITULO ***');
        return false;
      }
      if (document.getElementById('inmueble_servicios').value == '') {
        alert('MEJ. RURAL - Requiere *** INMUEBLE SERVICIOS ***');
        return false;
      }
      if (document.getElementById('inmueble_solicitud').value == '') {
        alert('MEJ. RURAL - Requiere *** INMUEBLE TIPO SOLICITUD ***');
        return false;
      }
    }
    //*****************************************************************
    //*****************************************************************

    //VERIFICA CAMPOS VACIOS
    //VIVIENDA VIS *******************************************
    //********************************************************
    if (B == '3') {
      if (document.getElementById('parentesco').value == '') {
        alert('VIVIENDA NUEVA - Requiere *** PARENTESCO ***');
        return false;
      }
      if (document.getElementById('nombre1').value == '') {
        alert('VIVIENDA NUEVA - Requiere *** NOMBRE 1 ***');
        return false;
      }
      if (document.getElementById('apellido1').value == '') {
        alert('VIVIENDA NUEVA - Requiere *** APELLIDO 1 ***');
        return false;
      }
      if (document.getElementById('direccion').value == '') {
        alert('VIVIENDA NUEVA - Requiere *** DIRECCION ***');
        return false;
      }
      if (document.getElementById('barrio').value == '') {
        alert('VIVIENDA NUEVA - Requiere *** BARRIO ***');
        return false;
      }
      if (document.getElementById('zona').value == '') {
        alert('VIVIENDA NUEVA - Requiere *** ZONA ***');
        return false;
      }
      if ((document.getElementById('fijo').value == '') && (document.getElementById('celular').value == '')) {
        alert('VIVIENDA NUEVA - Requiere *** FIJO O CELULAR ***');
        return false;
      }
      if (document.getElementById('valorahorrado').value == '') {
        alert('VIVIENDA NUEVA - Requiere *** VALOER AHORRADO ***');
        return false;
      }
      if (document.getElementById('entidad').value == '') {
        alert('VIVIENDA NUEVA - Requiere *** ENTIDAD ***');
        return false;
      }
      if (document.getElementById('numcuenta').value == '') {
        alert('VIVIENDA NUEVA - Requiere *** NUMERO DE CUENTA ***');
        return false;
      }
      if (document.getElementById('preaprobadoentidad').value == '') {
        alert('VIVIENDA NUEVA - Requiere *** PREAPROBADO ENTIDAD ***');
        return false;
      }
      if (document.getElementById('preaprobadovalor').value == '') {
        alert('VIVIENDA NUEVA - Requiere *** PREAPROBADO VALOR ***');
        return false;
      }
    }
    //*****************************************************************
    //*****************************************************************

    //VERIFICA CAMPOS VACIOS
    //VIVIENDA VIP *******************************************
    //********************************************************
    if (B == '4') {
      if (document.getElementById('parentesco').value == '') {
        alert('VIVIENDA VIP - Requiere *** PARENTESCO ***');
        return false;
      }
      if (document.getElementById('nombre1').value == '') {
        alert('VIVIENDA VIP - Requiere *** NOMBRE 1 ***');
        return false;
      }
      if (document.getElementById('apellido1').value == '') {
        alert('VIVIENDA VIP - Requiere *** APELLIDO 1 ***');
        return false;
      }
      if (document.getElementById('direccion').value == '') {
        alert('VIVIENDA VIP - Requiere *** DIRECCION ***');
        return false;
      }
      if (document.getElementById('barrio').value == '') {
        alert('VIVIENDA VIP - Requiere *** BARRIO ***');
        return false;
      }
      if (document.getElementById('zona').value == '') {
        alert('VIVIENDA VIP - Requiere *** ZONA ***');
        return false;
      }
      if ((document.getElementById('fijo').value == '') && (document.getElementById('celular').value == '')) {
        alert('VIVIENDA VIP - Requiere *** FIJO O CELULAR ***');
        return false;
      }
      if (document.getElementById('valorahorrado').value == '') {
        alert('VIVIENDA VIP - Requiere *** VALOER AHORRADO ***');
        return false;
      }
      if (document.getElementById('entidad').value == '') {
        alert('VIVIENDA VIP - Requiere *** ENTIDAD ***');
        return false;
      }
      if (document.getElementById('numcuenta').value == '') {
        alert('VIVIENDA VIP - Requiere *** NUMERO DE CUENTA ***');
        return false;
      }
      if (document.getElementById('preaprobadoentidad').value == '') {
        alert('VIVIENDA VIP - Requiere *** PREAPROBADO ENTIDAD ***');
        return false;
      }
      if (document.getElementById('preaprobadovalor').value == '') {
        alert('VIVIENDA VIP - Requiere *** PREAPROBADO VALOR ***');
        return false;
      }
    }
    //*****************************************************************
    //*****************************************************************

    //VERIFICA CAMPOS VACIOS
    //DESPLAZADOS ********************************************
    //********************************************************
    if (B == '5') {
      if (document.getElementById('parentesco').value == '') {
        alert('DESPLAZADOS - Requiere *** PARENTESCO ***');
        return false;
      }
      if (document.getElementById('nombre1').value == '') {
        alert('DESPLAZADOS - Requiere *** NOMBRE 1 ***');
        return false;
      }
      if (document.getElementById('apellido1').value == '') {
        alert('DESPLAZADOS - Requiere *** APELLIDO 1 ***');
        return false;
      }
      if (document.getElementById('direccion').value == '') {
        alert('DESPLAZADOS - Requiere *** DIRECCION ***');
        return false;
      }
      if (document.getElementById('barrio').value == '') {
        alert('DESPLAZADOS - Requiere *** BARRIO ***');
        return false;
      }
      if (document.getElementById('zona').value == '') {
        alert('DESPLAZADOS - Requiere *** ZONA ***');
        return false;
      }
      if ((document.getElementById('fijo').value == '') && (document.getElementById('celular').value == '')) {
        alert('DESPLAZADOS - Requiere *** FIJO O CELULAR ***');
        return false;
      }
    }
    //*****************************************************************
    //*****************************************************************

    //VERIFICA CAMPOS VACIOS
    //SITIO PROPIO *******************************************
    //********************************************************
    if (B == '6') {
      if (document.getElementById('parentesco').value == '') {
        alert('SITIO PROPIO - Requiere *** PARENTESCO ***');
        return false;
      }
      if (document.getElementById('nombre1').value == '') {
        alert('SITIO PROPIO - Requiere *** NOMBRE 1 ***');
        return false;
      }
      if (document.getElementById('apellido1').value == '') {
        alert('SITIO PROPIO - Requiere *** APELLIDO 1 ***');
        return false;
      }
      if (document.getElementById('direccion').value == '') {
        alert('SITIO PROPIO - Requiere *** DIRECCION ***');
        return false;
      }
      if (document.getElementById('barrio').value == '') {
        alert('SITIO PROPIO - Requiere *** BARRIO ***');
        return false;
      }
      if (document.getElementById('zona').value == '') {
        alert('SITIO PROPIO - Requiere *** ZONA ***');
        return false;
      }
      if ((document.getElementById('fijo').value == '') && (document.getElementById('celular').value == '')) {
        alert('SITIO PROPIO - Requiere *** FIJO O CELULAR ***');
        return false;
      }
      if (document.getElementById('inmueble_actual').value == '') {
        alert('SITIO PROPIO - Requiere *** INMUEBLE ACTUAL ***');
        return false;
      }
      if (document.getElementById('inmueble_titulo').value == '') {
        alert('SITIO PROPIO - Requiere *** INMUEBLE TITULO ***');
        return false;
      }
      if (document.getElementById('inmueble_tiempo').value == '') {
        alert('SITIO PROPIO - Requiere *** INMUEBLE TIEMPO ***');
        return false;
      }
      if (document.getElementById('inmueble_material').value == '') {
        alert('SITIO PROPIO - Requiere *** INMUEBLE MATERIAL ***');
        return false;
      }
    }
    //*****************************************************************
    //*****************************************************************

    //VERIFICA CAMPOS VACIOS
    //MEJORAMIENTO *******************************************
    //********************************************************
    if (B == '7') {
      if (document.getElementById('parentesco').value == '') {
        alert('MEJORAMIENTO - Requiere *** PARENTESCO ***');
        return false;
      }
      if (document.getElementById('nombre1').value == '') {
        alert('MEJORAMIENTO - Requiere *** NOMBRE 1 ***');
        return false;
      }
      if (document.getElementById('apellido1').value == '') {
        alert('MEJORAMIENTO - Requiere *** APELLIDO 1 ***');
        return false;
      }
      if (document.getElementById('direccion').value == '') {
        alert('MEJORAMIENTO - Requiere *** DIRECCION ***');
        return false;
      }
      if (document.getElementById('barrio').value == '') {
        alert('MEJORAMIENTO - Requiere *** BARRIO ***');
        return false;
      }
      if (document.getElementById('zona').value == '') {
        alert('MEJORAMIENTO - Requiere *** ZONA ***');
        return false;
      }
      if ((document.getElementById('fijo').value == '') && (document.getElementById('celular').value == '')) {
        alert('MEJORAMIENTO - Requiere *** FIJO O CELULAR ***');
        return false;
      }
      if (document.getElementById('inmueble_actual').value == '') {
        alert('MEJORAMIENTO - Requiere *** INMUEBLE ACTUAL ***');
        return false;
      }
      if (document.getElementById('inmueble_titulo').value == '') {
        alert('MEJORAMIENTO - Requiere *** INMUEBLE TITULO ***');
        return false;
      }
      if (document.getElementById('inmueble_escritura').value == '') {
        alert('MEJORAMIENTO- Requiere *** INMUEBLE ESCRITURA ***');
        return false;
      }
      if (document.getElementById('inmueble_servicios').value == '') {
        alert('MEJORAMIENTO - Requiere *** INMUEBLE SERVICIOS ***');
        return false;
      }
      if (document.getElementById('inmueble_solicitud').value == '') {
        alert('MEJORAMIENTO - Requiere *** INMUEBLE TIPO SOLICITUD ***');
        return false;
      }
    }
    //*****************************************************************
    //*****************************************************************


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
    $base = "NA";
    if (isset($_POST['cedula'])) $cedula = $_POST['cedula'];
    if (isset($_POST['base'])) $base = $_POST['base'];

    if ($base == "NA") {
      echo "<div style='text-align: center;'>
              <H3>No selecciono una base de datos para inscribir</H3><HR>
              <a href='menu.php'><input type='submit' class='btn btn-success btn-block' name='Volver2' id='Volver2' value='Volver al menu...' /></a>
            </div>";
      return;
    }

    $c1 = "";
    $c2 = "";
    $c3 = "";
    $c4 = "";
    $c5 = "";
    $c6 = "";
    $c7 = "";
    $c8 = "";
    $c9 = "";
    $c10 = "";
    $c11 = "";
    $c12 = "";
    $c13 = "";
    $c14 = "";
    $c15 = "";
    $c16 = "";
    $c17 = "";
    $c18 = "";
    $c19 = "";
    $c20 = "";
    $c21 = "";
    $c22 = "";
    $c23 = "";
    $c24 = "";
    $c25 = "";
    $c26 = "";
    $c27 = "";
    $c28 = "";
    $c29 = "";
    $c30 = "";
    $c31 = "";
    $c32 = "";
    $c33 = "";
    $c34 = "";
    $c35 = "";
    $c36 = "";
    $c37 = "";
    $c38 = "";
    $c39 = "";
    $c40 = "";
    $c41 = "";
    $c42 = "";
    $c43 = "";
    $c44 = "";
    $c45 = "";
    $c46 = "";
    $c47 = "";
    $c48 = "";
    $c49 = "";
    $c50 = "";
    $c51 = "";
    $c52 = "";
    $c53 = "";
    $c54 = "";
    $c55 = "";
    $c56 = "";
    $c57 = "";
    $c58 = "";
    $c59 = "";
    $c60 = "";
    $c61 = "";
    $c62 = "";
    $c63 = "";
    $c64 = "";
    $c65 = "";
    $c66 = "";
    $c67 = "";

    if ($base == 0) //REUBICADOS
    {
      $c4 = "#FADBD8";
      $c5 = $c4;
      $c7 = $c4;
      $c10 = $c4;
      $c11 = $c4;
      $c13 = $c4;
      $c14 = $c4;
      $c15 = $c4;
      $c55 = $c4;
      $c56 = $c4;
      $c57 = $c4;
      $c58 = $c4;
      $c59 = $c4;
      $c60 = $c4;
      $c64 = $c4;
      $c65 = $c4;
      $c66 = $c4;
    }
    if ($base == 1) //MEJORAMIENTO URBANO
    {
      $c4 = "#FADBD8";
      $c5 = $c4;
      $c7 = $c4;
      $c10 = $c4;
      $c11 = $c4;
      $c13 = $c4;
      $c14 = $c4;
      $c15 = $c4;
      $c59 = $c4;
      $c60 = $c4;
      $c63 = $c4;
      $c66 = $c4;
      $c67 = $c4;
    }
    if ($base == 2) //MEJORAMIENTO RURAL
    {
      $c4 = "#FADBD8";
      $c5 = $c4;
      $c7 = $c4;
      $c10 = $c4;
      $c11 = $c4;
      $c13 = $c4;
      $c14 = $c4;
      $c15 = $c4;
      $c59 = $c4;
      $c60 = $c4;
      $c66 = $c4;
      $c67 = $c4;
    }
    if ($base == 3) //VIS
    {
      $c4 = "#FADBD8";
      $c5 = $c4;
      $c7 = $c4;
      $c10 = $c4;
      $c11 = $c4;
      $c13 = $c4;
      $c14 = $c4;
      $c15 = $c4;
      $c47 = $c4;
      $c48 = $c4;
      $c49 = $c4;
      $c51 = $c4;
      $c52 = $c4;
    }
    if ($base == 4) //VIP
    {
      $c4 = "#FADBD8";
      $c5 = $c4;
      $c7 = $c4;
      $c10 = $c4;
      $c11 = $c4;
      $c13 = $c4;
      $c14 = $c4;
      $c15 = $c4;
      $c47 = $c4;
      $c48 = $c4;
      $c49 = $c4;
      $c51 = $c4;
      $c52 = $c4;
    }
    if ($base == 5) //DESPLAZADOS
    {
      $c4 = "#FADBD8";
      $c5 = $c4;
      $c7 = $c4;
      $c10 = $c4;
      $c11 = $c4;
      $c13 = $c4;
      $c14 = $c4;
      $c15 = $c4;
    }
    if ($base == 6) //SITIO PROPIO
    {
      $c4 = "#FADBD8";
      $c5 = $c4;
      $c7 = $c4;
      $c10 = $c4;
      $c11 = $c4;
      $c13 = $c4;
      $c14 = $c4;
      $c15 = $c4;
      $c59 = $c4;
      $c60 = $c4;
      $c64 = $c4;
      $c65 = $c4;
    }
    if ($base == 7) //MEJORAMIENTO
    {
      $c4 = "#FADBD8";
      $c5 = $c4;
      $c7 = $c4;
      $c10 = $c4;
      $c11 = $c4;
      $c13 = $c4;
      $c14 = $c4;
      $c15 = $c4;
      $c59 = $c4;
      $c60 = $c4;
      $c63 = $c4;
      $c66 = $c4;
      $c67 = $c4;
    }



    $paso = 0;
    if (($base == 0) && ($_SESSION["REU"] >= "3")) {
      echo "<div style='text-align: center;'><H3>BASE DE DATOS - Por Reubicar</H3><HR></div>"; //BASE = 0 - Por Reubicar
      $paso = 1;
    }
    if (($base == 1) && ($_SESSION["MU"] >= "3")) {
      echo "<div style='text-align: center;'><H3>BASE DE DATOS - Mejora Vivienda Urbana</H3><HR></div>"; //BASE = 1 - Mejora Vivienda Urbana
      $paso = 1;
    }
    if (($base == 2) && ($_SESSION["MR"] >= "3")) {
      echo "<div style='text-align: center;'><H3>BASE DE DATOS - Mejora Vivienda Rural</H3><HR></div>"; //BASE = 2 - Mejora Vivienda Rural
      $paso = 1;
    }
    if (($base == 3) && ($_SESSION["VIS"] >= "3")) {
      echo "<div style='text-align: center;'><H3>BASE DE DATOS - Vivienda Nueva</H3><HR></div>"; //BASE = 3 - VIS
      $paso = 1;
    }
    if (($base == 4) && ($_SESSION["VIP"] >= "3")) {
      echo "<div style='text-align: center;'><H3>BASE DE DATOS - Vivienda Interes Prioritario (VIP)</H3><HR></div>"; //BASE = 4 - VIP	
      $paso = 1;
    }
    if (($base == 5) && ($_SESSION["DES"] >= "3")) {
      echo "<div style='text-align: center;'><H3>BASE DE DATOS - Desplazados</H3><HR></div>"; //BASE = 5 - Desplazados
      $paso = 1;
    }
    if (($base == 6) && ($_SESSION["SP"] >= "3")) {
      echo "<div style='text-align: center;'><H3>BASE DE DATOS - Construccion en Sitio Propio</H3><HR></div>"; //BASE = 6 - Construccion en Sitio Propio	
      $paso = 1;
    }
    if (($base == 7) && ($_SESSION["MEJORAMIENTO"] >= "3")) {
      echo "<div style='text-align: center;'><H3>BASE DE DATOS - Mejoramiento</H3><HR></div>"; //BASE = 7 - Mejoramiento
      $paso = 1;
    }

    if ($paso == 0) {
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

    <form name="form1" method="post" onsubmit="return noespacios(<?php echo $base; ?>)" action="ingresar_ac2.php">
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
          <td width="35%" bgcolor="<?php echo $c1 ?>" colspan="3">
            <input class="form-control" name="cedula" type="number" id="cedula" readonly="readonly" <?php echo "value=" . $cedula ?>></td>
          <!-- <td width="15%">&nbsp;</td>
          <td width="35%">&nbsp;</td> -->
        </tr>
        <tr>
          <th >Situacion Actual</th>
          <td bgcolor="<?php echo $c2 ?>" colspan="3">
            <select class="form-control" name="situacion" id="situacion">
              <option value="NO APLICA" selected="selected">NO APLICA</option>
              <option value="DESPLAZADOS">DESPLAZADOS</option>
              <option value="RED UNIDOS">RED UNIDOS</option>
              <option value="SISBEN">SISBEN</option>
              <option value="SITUACION DE DISCAPACIDAD">SITUACION DE DISCAPACIDAD</option>
              <option value="CABEZA DE HOGAR">CABEZA DE HOGAR</option>
              <option value="ZONA DE ALTO RIESGO">ZONA DE ALTO RIESGO</option>
              <option value="VICTIMA DE LA VIOLENCIA">VICTIMA DE LA VIOLENCIA</option>
            </select></td>
        </tr>
        <tr>
          <th >Situacion Laboral</th>
          <td bgcolor="<?php echo $c3 ?>" colspan="3">
            <select class="form-control" name="laboral" id="laboral">
              <option value="NO APLICA" selected="selected">NO APLICA</option>
              <option value="EMPLEADO">EMPLEADO</option>
              <option value="INDEPENDIENTE">INDEPENDIENTE</option>
              <option value="PENSIONADO">PENSIONADO</option>
              <option value="DESEMPLEADO">DESEMPLEADO</option>
            </select></td>
        </tr>
        <tr>
          <th >Parentesco</th>
          <td bgcolor="<?php echo $c4 ?>" colspan="3">
            <select class="form-control" name="parentesco" id="parentesco">
              <option value="REPRESENTANTE" selected="selected">REPRESENTANTE</option>
              <option value="JEFE">JEFE</option>
            </select></td>
        </tr>
        <tr>
          <th >1er Nombre</th>
          <td bgcolor="<?php echo $c5 ?>" colspan="3"><input class="form-control" type="text" name="nombre1" id="nombre1" onkeyup="this.value=this.value.toUpperCase()" /></td>
        </tr>
        <tr>
          <th >2do Nombre</th>
          <td bgcolor="<?php echo $c6 ?>" colspan="3"><input class="form-control" type="text" name="nombre2" id="nombre2" onkeyup="this.value=this.value.toUpperCase()" /></td>
        </tr>
        <tr>
          <th >1er Apellido</th>
          <td bgcolor="<?php echo $c7 ?>" colspan="3"><input class="form-control" type="text" name="apellido1" id="apellido1" onkeyup="this.value=this.value.toUpperCase()" /></td>
        </tr>
        <tr>
          <th >2do Apellido</th>
          <td bgcolor="<?php echo $c8 ?>" colspan="3"><input class="form-control" type="text" name="apellido2" id="apellido2" onkeyup="this.value=this.value.toUpperCase()" /></td>
        </tr>
        <tr>
          <th >Fecha de Nacimiento</th>
          <td bgcolor="<?php echo $c9 ?>" colspan="3"><input class="form-control" name="edad" type="date" id="edad" /></td>
        </tr>
        <tr>
          <th >Direccion</th>
          <td bgcolor="<?php echo $c10 ?>" colspan="3"><input class="form-control" name="direccion" type="text" id="direccion" size="50" onkeyup="this.value=this.value.toUpperCase()" /></td>
        </tr>
        <tr>
          <th >Barrio</th>
          <td bgcolor="<?php echo $c11 ?>" colspan="3"><input class="form-control" name="barrio" type="text" id="barrio" size="40" onkeyup="this.value=this.value.toUpperCase()" /></td>
        </tr>
        <tr>
          <th >Comuna</th>
          <td bgcolor="<?php echo $c12 ?>" colspan="3"><input class="form-control" type="text" name="comuna" id="comuna" onkeyup="this.value=this.value.toUpperCase()" /></td>
        </tr>
        <tr>
          <th >Zona</th>
          <td bgcolor="<?php echo $c13 ?>" colspan="3">
            <select class="form-control" name="zona" id="zona">
              <option value="URBANA" selected="selected">URBANA</option>
              <option value="RURAL">RURAL</option>
            </select></td>
        </tr>
        <tr>
          <th >Telefono Fijo</th>
          <td bgcolor="<?php echo $c14 ?>" colspan="3"><input class="form-control" name="fijo" type="number" id="fijo" size="24" maxlength="7" onkeypress="return acceptNum(event)" /></td>
        </tr>
        <tr>
          <th >Telefono Celular</th>
          <td bgcolor="<?php echo $c15 ?>" colspan="3"><input class="form-control" name="celular" type="number" id="celular" maxlength="10" onkeypress="return acceptNum(event)" /></td>
        </tr>

        <tr>
          <th >Email</th>
          <td bgcolor="<?php echo $c16 ?>" colspan="3"><input class="form-control" name="email" type="email" id="email" size="20" onkeyup="this.value=this.value.toUpperCase()" /></td>
        </tr>

        <tr>
          <th >Observaciones</th>
          <td bgcolor="<?php echo $c17 ?>" colspan="3">
            <textarea class="form-control" name="observaciones" id="observaciones" cols="45" rows="5" onkeyup="this.value=this.value.toUpperCase()"></textarea></td>
        </tr>
        <tr>
          <th >Fecha de Registro</th>
          <td bgcolor="<?php echo $c18 ?>" colspan="3"><input class="form-control" name="fecha" type="date" id="fecha" <?php echo "value=" . date('Y-m-d') ?> readonly="readonly" /></td>
        </tr>

        <tr>
          <th >Fecha ultima actualizacion</th>
          <td bgcolor="<?php echo $c19 ?>"><input class="form-control" name="fecha_actualizacion" type="date" id="fecha_actualizacion" <?php echo "value=" . date('Y-m-d') ?> readonly="readonly" /></td>
          <th >Documento</th>
          <th >Fecha Nac.</th>
        </tr>
        <tr>
          <th >Familiar 1</th>
          <td bgcolor="<?php echo $c20 ?>"><input class="form-control" name="familiar1" type="text" id="familiar1" size="50" onkeyup="this.value=this.value.toUpperCase()" /> </td>
          <td bgcolor="<?php echo $c21 ?>"><input class="form-control" name="docu1" type="number" id="docu1" onkeypress="return acceptNum(event)" /></td>
          <td><input name="edad1" type="date" id="edad1" /></td>
        </tr>
        <tr>
          <th >Familiar 2</th>
          <td bgcolor="<?php echo $c22 ?>"><input class="form-control" name="familiar2" type="text" id="familiar2" size="50" onkeyup="this.value=this.value.toUpperCase()" /></td>
          <td bgcolor="<?php echo $c23 ?>"><input class="form-control" name="docu2" type="number" id="docu2" onkeypress="return acceptNum(event)" /></td>
          <td><input name="edad2" type="date" id="edad2" /></td>
        </tr>
        <tr>
          <th >Familiar 3</th>
          <td bgcolor="<?php echo $c24 ?>"><input class="form-control" name="familiar3" type="text" id="familiar3" size="50" onkeyup="this.value=this.value.toUpperCase()" /></td>
          <td bgcolor="<?php echo $c25 ?>"><input class="form-control" name="docu3" type="number" id="docu3" onkeypress="return acceptNum(event)" /></td>
          <td><input name="edad3" type="date" id="edad3" /></td>
        </tr>
        <tr>
          <th >Familiar 4</th>
          <td bgcolor="<?php echo $c26 ?>"><input class="form-control" name="familiar4" type="text" id="familiar4" size="50" onkeyup="this.value=this.value.toUpperCase()" /></td>
          <td bgcolor="<?php echo $c27 ?>"><input class="form-control" name="docu4" type="number" id="docu4" onkeypress="return acceptNum(event)" /></td>
          <td><input name="edad4" type="date" id="edad4" /></td>
        </tr>
        <tr>
          <th >Familiar 5</th>
          <td bgcolor="<?php echo $c28 ?>"><input class="form-control" name="familiar5" type="text" id="familiar5" size="50" onkeyup="this.value=this.value.toUpperCase()" /></td>
          <td bgcolor="<?php echo $c29 ?>"><input class="form-control" name="docu5" type="number" id="docu5" onkeypress="return acceptNum(event)" /></td>
          <td><input name="edad5" type="date" id="edad5" /></td>
        </tr>
        <tr>
          <th >Familiar 6</th>
          <td bgcolor="<?php echo $c30 ?>"><input class="form-control" name="familiar6" type="text" id="familiar6" size="50" onkeyup="this.value=this.value.toUpperCase()" /></td>
          <td bgcolor="<?php echo $c31 ?>"><input class="form-control" name="docu6" type="number" id="docu6" onkeypress="return acceptNum(event)" /></td>
          <td><input name="edad6" type="date" id="edad6" /></td>
        </tr>
        <tr>
          <th >Familiar 7</th>
          <td bgcolor="<?php echo $c32 ?>"><input class="form-control" name="familiar7" type="text" id="familiar7" size="50" onkeyup="this.value=this.value.toUpperCase()" /></td>
          <td bgcolor="<?php echo $c33 ?>"><input class="form-control" name="docu7" type="number" id="docu7" onkeypress="return acceptNum(event)" /></td>
          <td><input name="edad7" type="date" id="edad7" /></td>
        </tr>
        <tr>
          <th >Familiar 8</th>
          <td bgcolor="<?php echo $c34 ?>"><input class="form-control" name="familiar8" type="text" id="familiar8" size="50" onkeyup="this.value=this.value.toUpperCase()" /></td>
          <td bgcolor="<?php echo $c35 ?>"><input class="form-control" name="docu8" type="number" id="docu8" onkeypress="return acceptNum(event)" /></td>
          <td><input name="edad8" type="date" id="edad8" /></td>
        </tr>
        <tr>
          <th >Familiar 9</th>
          <td bgcolor="<?php echo $c36 ?>"><input class="form-control" name="familiar9" type="text" id="familiar9" size="50" onkeyup="this.value=this.value.toUpperCase()" /></td>
          <td bgcolor="<?php echo $c37 ?>"><input class="form-control" name="docu9" type="number" id="docu9" onkeypress="return acceptNum(event)" /></td>
          <td><input name="edad9" type="date" id="edad9" /></td>
        </tr>
        <tr>
          <th >Familiar 10</th>
          <td bgcolor="<?php echo $c38 ?>"><input class="form-control" name="familiar10" type="text" id="familiar10" size="50" onkeyup="this.value=this.value.toUpperCase()" /></td>
          <td bgcolor="<?php echo $c39 ?>"><input class="form-control" name="docu10" type="number" id="docu10" onkeypress="return acceptNum(event)" /></td>
          <td><input name="edad10" type="date" id="edad10" /></td>
        </tr>

        <tr>
          <th >Personas del Grupo Familiar N°</th>
          <td bgcolor="<?php echo $c40 ?>" colspan="3"><input class="form-control" name="cantidad_gf" type="number" id="cantidad_gf" size="5" onkeypress="return acceptNum(event)" /></td>
        </tr>
        <tr>
          <th >Madre Cabeza de Hogar</th>
          <td bgcolor="<?php echo $c41 ?>" colspan="3"><select class="form-control" name="madre_ch" id="madre_ch">
              <option value="NO" selected="selected">NO</option>
              <option value="SI">SI</option>
            </select></td>
        </tr>
        <tr>
          <th >Poblacion Dependiente</th>
          <td bgcolor="<?php echo $c42 ?>" colspan="3"><select class="form-control" name="poblacion_depe" id="poblacion_depe">
              <option value="NO" selected="selected">NO</option>
              <option value="SI">SI</option>
            </select></td>
        </tr>
        <tr>
          <th >Grupo Etnico</th>
          <td bgcolor="<?php echo $c43 ?>" colspan="3"><select class="form-control" name="grupo_etnico" id="grupo_etnico">
              <option value="NO APLICA" selected="selected">NO APLICA</option>
              <option value="RAIZAL">RAIZAL</option>
              <option value="PALENQUE">PALENQUE</option>
              <option value="AFRODESCENDIENTE">AFRODESCENDIENTE</option>
            </select></td>
        </tr>
        <tr>
          <th >Encuesta Telefonica</th>
          <td bgcolor="<?php echo $c44 ?>" colspan="3"><select class="form-control" name="encuestado_tel" id="encuestado_tel">
              <option value="NO" selected="selected">NO</option>
              <option value="SI">SI</option>
            </select></td>
        </tr>
        <tr>
          <th >Encuesta Personalizada</th>
          <td bgcolor="<?php echo $c45 ?>" colspan="3"><select class="form-control" name="encuestado_per" id="encuestado_per">
              <option value="NO" selected="selected">NO</option>
              <option value="SI">SI</option>
            </select></td>
        </tr>
        <tr>
          <th >Visitado en Sitio</th>
          <td bgcolor="<?php echo $c46 ?>" colspan="3"><select class="form-control" name="visitado" id="visitado">
              <option value="NO" selected="selected">NO</option>
              <option value="SI">SI</option>
            </select></td>
        </tr>

        <tr>
          <th colspan="4">
            <div class='alert alert-secondary'>
              <H5>INFORMACION FINANCIERA</H5>
            </div>
          </td>
        </tr>

        <tr>
          <th >Valor Ahorrado</th>
          <td colspan="3" bgcolor="<?php echo $c47 ?>"><input class="form-control" name="valorahorrado" type="number" id="valorahorrado" onkeypress="return acceptNum(event)" size="30" maxlength="30" /></td>
        </tr>
        <tr>
          <th >Entidad</th>
          <td colspan="3" bgcolor="<?php echo $c48 ?>"><input class="form-control" name="entidad" type="text" id="entidad" size="30" onkeyup="this.value=this.value.toUpperCase()" /></td>
        </tr>
        <tr>
          <th >N° de Cuenta</th>
          <td colspan="3" bgcolor="<?php echo $c49 ?>"><input class="form-control" name="numcuenta" type="text" id="numcuenta" size="30" maxlength="50" /></td>
        </tr>
        <tr>
          <th >Fecha de Retiro</th>
          <td colspan="3" bgcolor="<?php echo $c50 ?>"><input class="form-control" name="retiro" type="date" id="retiro" /></td>
        </tr>

        <tr>
          <th >Preaprobado Entidad</th>
          <td colspan="3" bgcolor="<?php echo $c51 ?>"><input class="form-control" name="preaprobadoentidad" type="text" id="preaprobadoentidad" size="30" onkeyup="this.value=this.value.toUpperCase()" /></td>
        </tr>
        <tr>
          <th >Preaprobado Valor</th>
          <td colspan="3" bgcolor="<?php echo $c52 ?>"><input class="form-control" name="preaprobadovalor" type="number" id="preaprobadovalor" onkeypress="return acceptNum(event)" size="30" maxlength="50" /></td>
        </tr>

        <tr>
          <th >Cesantias Entidad</th>
          <td colspan="3" bgcolor="<?php echo $c53 ?>"><input class="form-control" name="cesantiasentidad" type="text" id="cesantiasentidad" size="30" onkeyup="this.value=this.value.toUpperCase()" /></td>
        </tr>
        <tr>
          <th >Cesantias Valor</th>
          <td colspan="3" bgcolor="<?php echo $c54 ?>"><input class="form-control" name="cesantiasvalor" type="number" id="cesantiasvalor" onkeypress="return acceptNum(event)" size="30" maxlength="50" /></td>
        </tr>

        <tr>
          <td colspan="4">
            <div class='alert alert-secondary'>
              <H5>INFORMACION DE RIESGO</H5>
            </div>
          </td>
        </tr>

        <tr>
          <th >N° Radicado</th>
          <td colspan="3" bgcolor="<?php echo $c55 ?>"><input class="form-control" name="radicado" type="text" id="radicado" maxlength="30" onkeyup="this.value=this.value.toUpperCase()" /></td>
        </tr>
        <tr>
          <th >Entidad Remitente</th>
          <td colspan="3" bgcolor="<?php echo $c56 ?>"><select class="form-control" name="ente_remite" id="ente_remite">
              <option value="OTROS" selected="selected">OTROS</option>
              <option value="OMPADE">OMPADE</option>
              <option value="GOBIERNO">GOBIERNO</option>
            </select></td>
        </tr>

        <tr>
          <th >Tipo de evento</th>
          <td colspan="3" bgcolor="<?php echo $c57 ?>"><select class="form-control" name="tipoevento" id="tipoevento">
              <option value="NO APLICA">NO APLICA</option>
              <option value="HIDROLOGICO">HIDROLOGICO</option>
              <option value="GEOLOGICO">GEOLOGICO</option>
              <option value="CONSTRUCTIVO">CONSTRUCTIVO</option>
              <option value="HIDROLOGICO - GEOLOGICO">HIDROLOGICO - GEOLOGICO</option>
            </select></td>
        </tr>

        <tr>
          <th >Ubicado en Zona de Riesgo</th>
          <td colspan="3" bgcolor="<?php echo $c58 ?>"><select class="form-control" name="zona_riesgo" id="zona_riesgo">
              <option value="NO" selected="selected">NO</option>
              <option value="SI">SI</option>
            </select></td>
        </tr>

        <tr>
          <td colspan="4">
            <div class='alert alert-secondary'>
              <H5>INFORMACION DE LA VIVIENDA</H5>
            </div>
          </td>
        </tr>

        <tr>
          <th >Inmueble Reside Actualmente</th>
          <td colspan="3" bgcolor="<?php echo $c59 ?>"><select class="form-control" name="inmueble_actual" id="inmueble_actual">
              <option value="FAMILIAR" selected="selected">FAMILIAR</option>
              <option value="PROPIETARIO">PROPIETARIO</option>
              <option value="ARRENDATARIO">ARRENDATARIO</option>
              <option value="POSECION">POSECION</option>
              <option value="INVASION">INVASION</option>
            </select></td>
        </tr>
        <tr>
          <th >Inmueble Titulo de Propiedad</th>
          <td colspan="3" bgcolor="<?php echo $c60 ?>"><input class="form-control" name="inmueble_titulo" type="text" id="inmueble_titulo" size="30" onkeyup="this.value=this.value.toUpperCase()" /></td>
        </tr>
        <tr>
          <th >Inmueble Matricula Inmob.</th>
          <td colspan="3" bgcolor="<?php echo $c61 ?>"><input class="form-control" name="inmueble_matricula" type="text" id="inmueble_matricula" size="30" onkeyup="this.value=this.value.toUpperCase()" /></td>
        </tr>
        <tr>
          <th >Inmueble Ficha Catastral</th>
          <td colspan="3" bgcolor="<?php echo $c62 ?>"><input class="form-control" name="inmueble_catastral" type="text" id="inmueble_catastral" size="30" onkeyup="this.value=this.value.toUpperCase()" /></td>
        </tr>
        <tr>
          <th >Inmueble N° Escritura</th>
          <td colspan="3" bgcolor="<?php echo $c63 ?>"><input class="form-control" name="inmueble_escritura" type="text" id="inmueble_escritura" size="30" onkeyup="this.value=this.value.toUpperCase()" /></td>
        </tr>
        <tr>
          <th >Inmueble Tiempo Habitado</th>
          <td colspan="3" bgcolor="<?php echo $c64 ?>"><input class="form-control" name="inmueble_tiempo" type="number" id="inmueble_tiempo" size="30" onkeypress="return acceptNum(event)" /></td>
        </tr>
        <tr>
          <th >Inmueble tipo de Material</th>
          <td colspan="3" bgcolor="<?php echo $c65 ?>"><select class="form-control" name="inmueble_material" id="inmueble_material">
              <option value="MATERIAL" selected="selected">MATERIAL</option>
              <option value="MADERA">MADERA</option>
              <option value="LAMINA">LAMINA</option>
              <option value="CARTON">CARTON</option>
            </select></td>
        </tr>
        <tr>
          <th >Inmueble Servicios Publicos</th>
          <td colspan="3" bgcolor="<?php echo $c66 ?>"><select class="form-control" name="inmueble_servicios" id="inmueble_servicios">
              <option value="SI">SI</option>
              <option value="NO">NO</option>
            </select></td>
        </tr>
        <tr>
          <th class="MicrotitulosHOGAR">Tipo de solicitud de mejoramiento</th>
          <td colspan="3" bgcolor="<?php echo $c67 ?>"><select class="form-control" name="inmueble_solicitud" id="inmueble_solicitud">
              <option value="NA" selected="selected">NA</option>
              <option value="BAÑO">BAÑO</option>
              <option value="COCINA">COCINA</option>
              <option value="LAVADERO">LAVADERO</option>
              <option value="ALCANTARILLADO">ALCANTARILLADO</option>
              <option value="MUROS">MUROS</option>
              <option value="REFUERZO ESTRUCTURAL">REFUERZO ESTRUCTURAL</option>
              <option value="TECHO O CUBIERTA">TECHO O CUBIERTA</option>
              <option value="PISO">PISO</option>
            </select></td>
        </tr>

        <tr>
          <td colspan="4">
            <div class='alert alert-secondary'>
              <H5>CARACTERIZACION DE LA SOLICITUD</H5>
            </div>
          </td>
        </tr>

        <tr>
          <th bgcolor="#CD6155">Subtipo de base de datos a asignar</th>
          <td bgcolor="#CD6155" colspan="3">
            <select class="form-control" name="sub_base" id="sub_base">
              <?php if ($base == 7) echo "<option value='MEU' selected='selected'>MEJORAMIENTO URBANO</option>"; ?>
              <?php if ($base == 7) echo "<option value='MER'>MEJORAMIENTO RURAL</option>"; ?>
              <?php if ($base == 3) echo "<option value='DES'>CONDICION DESPLAZADO</option>"; ?>
              <?php if ($base == 3) echo "<option value='SIP'>CONSTRUCCION EN SITIO PROPIO</option>"; ?>
              <?php if ($base == 3) echo "<option value='REU'>REUBICACION</option>"; ?>
              <?php if ($base == 3) echo "<option value='VIP'>VIVIENDA PRIORITARIA VIP</option>"; ?>
              <?php if ($base == 3) echo "<option value='NA' selected='selected'>VIVIENDA DE INTERES SOCIAL - VIS</option>"; ?>
            </select>
            <br>* RECUERDE Clasificar la ficha en la categoria segun corresponda ( Rural, Urbano, Desplazado, Etc...)</td>
        </tr>

        <tr>
          <td>&nbsp;</td>
          <td colspan="3"><input type="hidden" name="base" id="base" <?php echo "value=" . $base ?>></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td colspan="3"><input name="button" type="submit" class="btn btn-success btn-block" id="button" value="Registrar Ciudadano" /></td>
        </tr>
      </table>
    </form>

  </aside>
</div>

<?php include("includes/footer.php"); ?>