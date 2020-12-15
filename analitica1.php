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

$sql = "SELECT * FROM ciudadanos WHERE id_base = 7";
$resultado = mysqli_query($sle, $sql) or die(mysqli_error());
$mejora = mysqli_num_rows($resultado);

$total = $mr + $mu + $reb + $vip + $vis + $des + $sip + $mejora;
$mr_por = ($mr * 100) / $total;
$mu_por = ($mu * 100) / $total;
$reb_por = ($reb * 100) / $total;
$vip_por = ($vip * 100) / $total;
$vis_por = ($vis * 100) / $total;
$des_por = ($des * 100) / $total;
$sip_por = ($sip * 100) / $total;
$mejora_por = ($mejora * 100) / $total;
?>
<!-- FIN Calculo datos estadisticos -->


<div class="row">

  <div class="col-md-12">
    <canvas id="myChart" width="200" height="100"></canvas>
  </div>

  <div class="col-md-12">
    <br><hr>
    <a href='menu.php'>
      <input name='Volver2' type='submit' class='btn btn-success btn-block' id='Volver2' value='Volver a la ventana anterior...' />
    </a>
  </div>

</div>


<!-- JS que prepara el entorno para GRAFICAR -->
<script>
  var ctx = document.getElementById('myChart').getContext('2d');
  var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ['Vivienda Nueva', 'Mejoramiento'],
      datasets: [{
        label: 'Personas registradas',
        data: ["<?php echo $vis; ?>", "<?php echo $mejora; ?>"],
        backgroundColor: [
          'rgba(255, 99, 132, 0.2)',
          'rgba(54, 162, 235, 0.2)'
        ],
        borderColor: [
          'rgba(255, 99, 132, 1)',
          'rgba(54, 162, 235, 1)'
        ],
        borderWidth: 1
      }]
    },
    options: {
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