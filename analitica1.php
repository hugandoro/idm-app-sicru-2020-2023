<?php include("includes/header.php"); ?>
<?php include("includes/title.php"); ?>
<?php include("includes/login_valid_session.php"); ?>

<!-- Calcula datos estadisticos para graficar -->
<?php
$sql = "SELECT * FROM ciudadanos WHERE tipo_inscripcion = 'PRESENCIAL'";
$resultado = mysqli_query($sle, $sql) or die(mysqli_error());
$presencial = mysqli_num_rows($resultado);

$sql = "SELECT * FROM ciudadanos WHERE tipo_inscripcion = 'WEB'";
$resultado = mysqli_query($sle, $sql) or die(mysqli_error());
$web = mysqli_num_rows($resultado);


//***********************************************************
//***********************************************************
//VIVIENDA NUEVA
$sql = "SELECT * FROM ciudadanos WHERE id_base = 3";
$resultado = mysqli_query($sle, $sql) or die(mysqli_error());
$vis = mysqli_num_rows($resultado);

//VIVIENDA NUEVA - Para reubicar
$sql = "SELECT * FROM ciudadanos WHERE por_reubicar = 'SI'";
$resultado = mysqli_query($sle, $sql) or die(mysqli_error());
$por_reubicar = mysqli_num_rows($resultado);

//VIVIENDA NUEVA - Prioritaria VIP
$sql = "SELECT * FROM ciudadanos WHERE vivienda_prioritaria = 'SI'";
$resultado = mysqli_query($sle, $sql) or die(mysqli_error());
$vivienda_prioritaria = mysqli_num_rows($resultado);

//VIVIENDA NUEVA - Desplazados
$sql = "SELECT * FROM ciudadanos WHERE condicion_desplazado = 'SI'";
$resultado = mysqli_query($sle, $sql) or die(mysqli_error());
$condicion_desplazado = mysqli_num_rows($resultado);

//VIVIENDA NUEVA - En sitio propio
$sql = "SELECT * FROM ciudadanos WHERE tiene_sitio_propio = 'SI'";
$resultado = mysqli_query($sle, $sql) or die(mysqli_error());
$tiene_sitio_propio = mysqli_num_rows($resultado);

//VIVIENDA NUEVA - Social VIS ( $VIS es todo el universo y se le restan los subtipos de vivienda para determinar cuantos son exclusivamente VIS )
$vivienda_social = $vis - $por_reubicar - $vivienda_prioritaria - $condicion_desplazado - $tiene_sitio_propio;


//***********************************************************
//***********************************************************
//MEJORAMIENTOS
$sql = "SELECT * FROM ciudadanos WHERE id_base = 7";
$resultado = mysqli_query($sle, $sql) or die(mysqli_error());
$mejora = mysqli_num_rows($resultado);

//MEJORAMIENTOS - Urbano
$sql = "SELECT * FROM ciudadanos WHERE mejora_urbana = 'SI'";
$resultado = mysqli_query($sle, $sql) or die(mysqli_error());
$mejora_urbana = mysqli_num_rows($resultado);

//MEJORAMIENTOS - Rural
$sql = "SELECT * FROM ciudadanos WHERE mejora_rural = 'SI'";
$resultado = mysqli_query($sle, $sql) or die(mysqli_error());
$mejora_rural = mysqli_num_rows($resultado);
//***********************************************************
//***********************************************************


$total = $vis + $mejora;


?>
<!-- FIN Calculo datos estadisticos -->


<div class="row">

  <div class="col-md-6">
    <canvas id="myChart" width="200" height="100"></canvas> <!-- Personas inscritas -->
    <br>
    <hr>
    <br>
  </div>

  <div class="col-md-6">
    <canvas id="myChart2" width="200" height="100"></canvas> <!-- Origen de la inscripcion -->
    <br>
    <hr>
    <br>
  </div>

  <div class="col-md-12">
    <canvas id="myChart3" width="200" height="100"></canvas> <!-- Origen de la inscripcion -->
    <br>
    <hr>
    <br>
  </div>

  <div class="col-md-12">
    <canvas id="myChart4" width="200" height="100"></canvas> <!-- Origen de la inscripcion -->
  </div>

  <div class="col-md-12">
    <br>
    <hr>
    <a href='menu.php'>
      <input name='Volver2' type='submit' class='btn btn-success btn-block' id='Volver2' value='Volver a la ventana anterior...' />
    </a>
  </div>

</div>


<!-- JS que prepara el entorno para GRAFICAR PERSONAS INSCRITAS -->
<script>
  var ctx = document.getElementById('myChart').getContext('2d');
  var myChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
      labels: ['Vivienda Nueva', 'Mejoramiento'],
      datasets: [{
        label: 'Personas registradas',
        data: ["<?php echo $vis; ?>", "<?php echo $mejora; ?>"],
        backgroundColor: [
          'rgba(89, 165, 127, 1)',
          'rgba(196, 194, 88, 1)'
        ],
        borderColor: [
          'rgba(89, 165, 127, 1)',
          'rgba(196, 194, 88, 1)'
        ],
        borderWidth: 1
      }]
    },
    options: {
      responsive: true,
      legend: {
        position: 'top',
      },
      title: {
        display: true,
        text: 'Personas registradas'
      },
      animation: {
        animateScale: true,
        animateRotate: true
      },
      scales: {
        yAxes: [{
          ticks: {
            beginAtZero: true
          }
        }]
      }
    }
  });
</script>


<!-- JS que prepara el entorno para GRAFICAR ORIGEN DE LA INSCRIPCION -->
<script>
  var ctx = document.getElementById('myChart2').getContext('2d');
  var myChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
      labels: ['Presencial', 'Web'],
      datasets: [{
        label: 'Origen de las inscripciones',
        data: ["<?php echo $presencial; ?>", "<?php echo $web; ?>"],
        backgroundColor: [
          'rgba(89, 165, 127, 1)',
          'rgba(196, 194, 88, 1)'
        ],
        borderColor: [
          'rgba(89, 165, 127, 1)',
          'rgba(196, 194, 88, 1)'
        ],
        borderWidth: 1
      }]
    },
    options: {
      responsive: true,
      legend: {
        position: 'top',
      },
      title: {
        display: true,
        text: 'Origen de las inscripciones'
      },
      animation: {
        animateScale: true,
        animateRotate: true
      },
      scales: {
        yAxes: [{
          ticks: {
            beginAtZero: true
          }
        }]
      }
    }
  });
</script>

<!-- JS que prepara el entorno para GRAFICAR PERSONAS INSCRITAS - POR TIPO BASE DE DATOS -->
<script>
  var ctx = document.getElementById('myChart3').getContext('2d');
  var myChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
      labels: ['Mejoramiento urbano', 'Mejoramiento rural'],
      datasets: [{
        label: 'Mejoramiento', 

        data: ["<?php echo $mejora_urbana; ?>", "<?php echo $mejora_rural; ?>"],
        backgroundColor: [
          'rgba(89, 165, 127, 1)',
          'rgba(196, 194, 88, 1)'
        ],
        borderColor: [
          'rgba(89, 165, 127, 1)',
          'rgba(196, 194, 88, 1)'
        ],
        borderWidth: 1
      }]
    },
    options: {
      responsive: true,
      legend: {
        position: 'top',
      },
      title: {
        display: true,
        text: 'Personas registradas - MEJORAMIENTOS'
      },
      animation: {
        animateScale: true,
        animateRotate: true
      },
      scales: {
        yAxes: [{
          ticks: {
            beginAtZero: true
          }
        }]
      }
    }
  });
</script>

<!-- JS que prepara el entorno para GRAFICAR PERSONAS INSCRITAS - POR TIPO BASE DE DATOS -->
<script>
  var ctx = document.getElementById('myChart4').getContext('2d');
  var myChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
      labels: ['Reubicacion', 'VIP', 'Desplazamiento', 'Sitio propio', 'VIS'],
      datasets: [{
        label: 'Vivienda nueva', 

        data: ["<?php echo $por_reubicar; ?>", "<?php echo $vivienda_prioritaria; ?>", "<?php echo $condicion_desplazado; ?>", "<?php echo $tiene_sitio_propio; ?>", "<?php echo $vivienda_social; ?>"],
        backgroundColor: [
          'rgba(196, 194, 88, 1)',
          'rgba(50, 70, 127, 1)',
          'rgba(100, 120, 127, 1)',
          'rgba(150, 170, 127, 1)',
          'rgba(89, 165, 127, 1)'
        ],
        borderColor: [
          'rgba(196, 194, 88, 1)',
          'rgba(50, 70, 127, 1)',
          'rgba(100, 120, 127, 1)',
          'rgba(150, 170, 127, 1)',
          'rgba(89, 165, 127, 1)'
        ],
        borderWidth: 1
      }]
    },
    options: {
      responsive: true,
      legend: {
        position: 'top',
      },
      title: {
        display: true,
        text: 'Personas registradas - VIVIENDA NUEVA'
      },
      animation: {
        animateScale: true,
        animateRotate: true
      },
      scales: {
        yAxes: [{
          ticks: {
            beginAtZero: true
          }
        }]
      }
    }
  });
</script>

<?php include("includes/footer.php"); ?>