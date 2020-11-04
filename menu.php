<?php include("includes/header.php"); ?>
<?php include("includes/title.php"); ?>
<?php include("includes/login_valid_session.php"); ?>

<!-- Calcula datos estadisticos para graficar -->
<?php
$sql = "SELECT * FROM ciudadanos WHERE id_base = 0";
$resultado = mysqli_query($sle, $sql) or die(mysqli_error());
$reb = mysqli_num_rows($resultado);

$sql = "SELECT * FROM ciudadanos WHERE id_base = 1";
$resultado = mysqli_query($sle, $sql) or die(mysqli_error());
$mu = mysqli_num_rows($resultado);

$sql = "SELECT * FROM ciudadanos WHERE id_base = 2";
$resultado = mysqli_query($sle, $sql) or die(mysqli_error());
$mr = mysqli_num_rows($resultado);

$sql = "SELECT * FROM ciudadanos WHERE id_base = 3";
$resultado = mysqli_query($sle, $sql) or die(mysqli_error());
$vis = mysqli_num_rows($resultado);

$sql = "SELECT * FROM ciudadanos WHERE id_base = 4";
$resultado = mysqli_query($sle, $sql) or die(mysqli_error());
$vip = mysqli_num_rows($resultado);

$sql = "SELECT * FROM ciudadanos WHERE id_base = 5";
$resultado = mysqli_query($sle, $sql) or die(mysqli_error());
$des = mysqli_num_rows($resultado);

$sql = "SELECT * FROM ciudadanos WHERE id_base = 6";
$resultado = mysqli_query($sle, $sql) or die(mysqli_error());
$sip = mysqli_num_rows($resultado);

$total = $mr + $mu + $reb + $vip + $vis + $des + $sip;
$mr_por = ($mr * 100) / $total;
$mu_por = ($mu * 100) / $total;
$reb_por = ($reb * 100) / $total;
$vip_por = ($vip * 100) / $total;
$vis_por = ($vis * 100) / $total;
$des_por = ($des * 100) / $total;
$sip_por = ($sip * 100) / $total;
?>
<!-- FIN Calculo datos estadisticos -->

<div class="row">

  <div class="col-md-12">
    <div class="card-deck">

      <div class="card">
        <img class="card-img-top" src="imagenes/icono_1a.png" alt="Card image cap" style="border-radius: 0%;">
        <div class="card-footer" style="text-align: center;">
            <a href="buscar_ac.php"><button type='submit' class='btn btn-outline-success btn-sm btn-block'>Consultar las bases de datos</button></a>
        </div>
      </div>

      <div class="card">
        <img class="card-img-top" src="imagenes/icono_2a.png" alt="Card image cap" style="border-radius: 0%;">
        <div class="card-footer" style="text-align: center;">
          <?php if ($_SESSION["nivel"] != "1") { ?>
            <a href="ingresar_ac.php"><button type='submit' class='btn btn-outline-success btn-sm btn-block'>Ingresar ciudadano al sistema</button></a>
          <?php } ?>
        </div>
      </div>

      <div class="card">
        <img class="card-img-top" src="imagenes/icono_3a.png" alt="Card image cap" style="border-radius: 0%;">
        <div class="card-footer" style="text-align: center;">
          <a href="listar0.php"><button type='submit' class='btn btn-outline-success btn-sm btn-block'>Listar registros bases de datos</button></a>
        </div>
      </div>

      <div class="card">
        <img class="card-img-top" src="imagenes/icono_4a.png" alt="Card image cap" style="border-radius: 0%;">
        <div class="card-footer" style="text-align: center;">
          <?php if ($_SESSION["nivel"] == "2") { ?>
            <a href="convocatorias.php"><button type='submit' class='btn btn-outline-success btn-sm btn-block'>Convocatorias</button></a>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>

  <div class="col-md-12">
    <div class="card-deck">

      <div class="card">
        <img class="card-img-top" src="imagenes/icono_5a.png" alt="Card image cap" style="border-radius: 0%;">
        <div class="card-footer" style="text-align: center;">
          <?php if ($_SESSION["nivel"] == "2") { ?>
            <a href="visitas.php"><button type='submit' class='btn btn-outline-success btn-sm btn-block'>Visitas tecnicas</button></a>
          <?php } ?>
        </div>
      </div>

      <div class="card">
        <img class="card-img-top" src="imagenes/icono_6a.png" alt="Card image cap" style="border-radius: 0%;">
        <div class="card-footer" style="text-align: center;">
          <a href="#"><button type='submit' class='btn btn-outline-success btn-sm btn-block'>Visitas sociales</button></a>
        </div>
      </div>

      <div class="card">
        <img class="card-img-top" src="imagenes/icono_7a.png" alt="Card image cap" style="border-radius: 0%;">
        <div class="card-footer" style="text-align: center;">
          <a href="#"><button type='submit' class='btn btn-outline-success btn-sm btn-block'>Analitica de datos</button></a>
        </div>
      </div>
      
      <div class="card">
        <img class="card-img-top" src="imagenes/icono_8a.png" alt="Card image cap" style="border-radius: 0%;">
        <div class="card-footer" style="text-align: center;">
          <a href="logout.php"><button type='submit' class='btn btn-outline-success btn-sm btn-block'>Cerrar sesion de usuario</button></a>
        </div>
      </div>
    </div>
  </div>

</div>


<!-- JS que prepara el entorno para GRAFICAR -->
<script type="text/javascript">
  $(document).ready(function() {
    // prepare chart data as an array
    var sampleData = [{
        Base: 'Rural',
        Registros: "<?php echo $mr; ?>"
      },
      {
        Base: 'Urbano',
        Registros: "<?php echo $mu; ?>"
      },
      {
        Base: 'Reubicacion',
        Registros: "<?php echo $reb; ?>"
      },
      {
        Base: 'VIP',
        Registros: "<?php echo $vip; ?>"
      },
      {
        Base: 'VIS',
        Registros: "<?php echo $vis; ?>"
      },
      {
        Base: 'Desplazados',
        Registros: "<?php echo $des; ?>"
      },
      {
        Base: 'Sitio Propio',
        Registros: "<?php echo $sip; ?>"
      }
    ];

    // prepare jqxChart settings
    var settings = {
      title: "Distribucion poblacion registrada",
      description: "Bases de datos SICRU - <?php echo $total; ?> registros a la fecha",
      enableAnimations: true,
      showLegend: true,
      padding: {
        left: 5,
        top: 5,
        right: 5,
        bottom: 5
      },
      titlePadding: {
        left: 90,
        top: 0,
        right: 0,
        bottom: 10
      },
      source: sampleData,
      xAxis: {
        dataField: 'Base',
        showGridLines: true
      },
      colorScheme: 'scheme01',
      seriesGroups: [{
        type: 'column',
        columnsGapPercent: 50,
        seriesGapPercent: 0,
        valueAxis: {
          unitInterval: 500,
          minValue: 0,
          maxValue: 6000,
          displayValueAxis: true,
          description: 'Ciudadanos registrados',
          axisSize: 'auto',
          tickMarksColor: '#888888'
        },
        series: [{
          dataField: 'Registros',
          displayText: 'Registros'
        }]
      }]
    };

    // setup the chart
    $('#jqxChart').jqxChart(settings);

  });
</script>
<!-- FIN del JS que prepara graficador -->

<!-- 
<div class="row">
  <div class="col-md-12">
    <div id='jqxChart' style="width:100%; height:300px; position: relative; left: 0px; top: 0px;"></div>
  </div>
</div>
-->

<?php include("includes/footer.php"); ?>