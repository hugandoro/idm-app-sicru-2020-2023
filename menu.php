<?php require_once('Connections/sle.php'); 
$currentPage = $_SERVER["PHP_SELF"];
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://gmpg.org/xfn/11">
<title>SICRU Ver 1.0</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="STYLESHEET" type="text/css" href="estilo.css">

    <!-- Librerias para el TREEMAP -->
    <link rel="stylesheet" href="jqwidgets/styles/jqx.base.css" type="text/css" />
    <script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="js/demos.js"></script>
    <script type="text/javascript" src="jqwidgets/jqxcore.js"></script>
    <script src="jqwidgets/jqxtooltip.js"></script>
    <script type="text/javascript" src="jqwidgets/jqxdata.js"></script>
    <script type="text/javascript" src="jqwidgets/jqxtreemap.js"></script>
    <!-- ************************* -->
    <!-- Librerias para el GRAFICO BARRAS -->
    <script type="text/javascript" src="jqwidgets/jqxdraw.js"></script>
    <script type="text/javascript" src="jqwidgets/jqxchart.core.js"></script>
    <!-- ************************* -->
</head>

<body>
<center>
  <p>
    <?php
  //Verifica que exista una sesion creada
  if (isset($_SESSION['nivel'])){
	//Verifica que nivel de acceso tiene  
	if ($_SESSION['nivel'] == "0"){
	   echo "USUARIO INACTIVO EN EL SISTEMA";
	   return;  
	}
  }
  else
  {
	  echo "SU SESION A EXPIRADO POR TIEMPO O NO SE HA REGISTRADO EN NUESTRO SISTEMA";
  	  return;
  }
?>
  </p>

<TABLE>
<TR><TD align="center"><p class="name"><img src="imagenes/header.png" width="100%" height="100%" /></p></TD></TR>
</TABLE>

  <TABLE>
    <TR>
      <?php
    mysqli_query($sle,"SET NAMES 'utf8'");
	
  	$sql="SELECT * FROM ciudadanos WHERE id_base = 0";
	$resultado=mysqli_query($sle,$sql)or die (mysqli_error()); 
	$reb = mysqli_num_rows($resultado);
  	$sql="SELECT * FROM ciudadanos WHERE id_base = 1";
	$resultado=mysqli_query($sle,$sql)or die (mysqli_error()); 
	$mu = mysqli_num_rows($resultado);
  	$sql="SELECT * FROM ciudadanos WHERE id_base = 2";
	$resultado=mysqli_query($sle,$sql)or die (mysqli_error()); 
	$mr = mysqli_num_rows($resultado);
  	$sql="SELECT * FROM ciudadanos WHERE id_base = 3";
	$resultado=mysqli_query($sle,$sql)or die (mysqli_error()); 
	$vis = mysqli_num_rows($resultado);
  	$sql="SELECT * FROM ciudadanos WHERE id_base = 4";
	$resultado=mysqli_query($sle,$sql)or die (mysqli_error()); 
	$vip = mysqli_num_rows($resultado);
  	$sql="SELECT * FROM ciudadanos WHERE id_base = 5";
	$resultado=mysqli_query($sle,$sql)or die (mysqli_error()); 
	$des = mysqli_num_rows($resultado);
  	$sql="SELECT * FROM ciudadanos WHERE id_base = 6";
	$resultado=mysqli_query($sle,$sql)or die (mysqli_error()); 
	$sip = mysqli_num_rows($resultado);
	
	$total=$mr+$mu+$reb+$vip+$vis+$des+$sip;
	$mr_por = ($mr*100)/$total;
	$mu_por = ($mu*100)/$total;
	$reb_por = ($reb*100)/$total;
	$vip_por = ($vip*100)/$total;
	$vis_por = ($vis*100)/$total;
	$des_por = ($des*100)/$total;
	$sip_por = ($sip*100)/$total;
  ?>
      <TD align="left"></TD>
    </TR>
    <TR>
      <TD align="center"><CENTER>
          <a href="buscar_ac.php">
          <input type="submit" class="Botones" value="Consultar en las Bases de Datos" /></a><BR>
          <?php if ($_SESSION["nivel"] != "1") {?>
          <a href="ingresar_ac.php">
          <input type="submit" class="Botones" value="Ingresar nuevo ciudadano" /></a><BR>
          <?php }?>
          <a href="listar0.php">
          <input type="submit" class="Botones" value="Listar Bases de datos" /></a><BR>
          <?php if ($_SESSION["nivel"] == "2") {?>
          <a href="convocatorias.php">
          <input type="submit" class="Botones" value="Convocatorias" /></a><BR>
          <?php }?>
          <?php if ($_SESSION["nivel"] == "2") {?>
          <a href="visitas.php">
          <input type="submit" class="Botones" value="Visitas Tecnicas" /></a><BR>
          <?php }?>
        </CENTER></TD>
    </TR>
    <TR>
      <TD align="center"><CENTER>
          <HR>
          <?php echo  "<B>".$_SESSION['usuario']."</B><BR>Funcionario de ".$_SESSION["dependencia"]."<BR>".$_SESSION["nivel_descripcion"]."<BR><a href='logout.php'><input name='button' type='submit' class='Botones' id='button' value='Cerrar Sesion' /></a></span>" ?>
          <HR>
        </CENTER></TD>
    </TR>
  </TABLE>

    
<script type="text/javascript">
        $(document).ready(function () {
            // prepare chart data as an array
            var  sampleData = [
                    { Base:'Rural', Registros:"<?php echo $mr;?>"},
                    { Base:'Urbano', Registros:"<?php echo $mu;?>"},
                    { Base:'Reubicacion', Registros:"<?php echo $reb;?>"},
                    { Base:'VIP', Registros:"<?php echo $vip;?>"},
                    { Base:'VIS', Registros:"<?php echo $vis;?>"},
                    { Base:'Desplazados', Registros:"<?php echo $des;?>"},
                    { Base:'Sitio Propio', Registros:"<?php echo $sip;?>"}
                ];

            // prepare jqxChart settings
            var settings = {
                title: "Distribucion poblacion registrada",
                description: "Bases de datos SICRU - <?php echo $total;?> registros a la fecha",
        enableAnimations: true,
                showLegend: true,
                padding: { left: 5, top: 5, right: 5, bottom: 5 },
                titlePadding: { left: 90, top: 0, right: 0, bottom: 10 },
                source: sampleData,
                xAxis:
                    {
                        dataField: 'Base',
                        showGridLines: true
                    },
                colorScheme: 'scheme01',
                seriesGroups:
                    [
                        {
                            type: 'column',
                            columnsGapPercent: 50,
                            seriesGapPercent: 0,
                            valueAxis:
                            {
                                unitInterval: 500,
                                minValue: 0,
                                maxValue: 6000,
                                displayValueAxis: true,
                                description: 'Ciudadanos registrados',
                                axisSize: 'auto',
                                tickMarksColor: '#888888'
                            },
                            series: [
                                    { dataField: 'Registros', displayText: 'Registros'}
                                ]
                        }
                    ]
            };
            
            // setup the chart
            $('#jqxChart').jqxChart(settings);

        });
    </script>

<CENTER><div id='jqxChart' style="width:850px; height:300px; position: relative; left: 0px; top: 0px;"></CENTER>

<HR><img src="imagenes/logotipo_pie.png" /><br><HR>
</center>
</body>
<?php mysqli_close($sle); ?></html>
