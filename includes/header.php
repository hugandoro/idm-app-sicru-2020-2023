<?php
    header('Content-Type: text/html; charset=UTF-8');
    error_reporting(-1);
    
    $currentPage = $_SERVER["PHP_SELF"];
    session_start();

    require_once('Connections/sle.php');
    mysqli_query($sle, "SET NAMES 'utf8'");
?>
<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="application-name" content="BIEN - Instituto de Desarrollo Municipal - Dosquebradas">
    <meta name="author" content="Instituto de Desarrollo Municipal - BIEN">
    <meta name="description" content="BIEN">
    <meta name="generator" content="BIEN - IDM">
    <meta name="keywords" content="IDM, BIEN, Dosquebradas">

    <title>IDM | BIEN</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- bootstrap 4 -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

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

    <!-- Librerias CHARTJS -->
    <script type="text/javascript" src="https://www.chartjs.org/dist/2.9.3/Chart.min.js"></script>
    <script type="text/javascript" src="https://www.chartjs.org/samples/latest/utils.js"></script>
    <!-- <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script> -->
    <!-- ************************* -->

    <!-- Estilos personalizados -->
    <style type="text/css">
        a:link, a:visited, a:active {
            text-decoration:none;
        }
    </style>
    
</head>

<body style="background-color: #D5D8DC;">
    <div class="container">
    <!--- Inicia el contenido -->

    <?php 
        if (isset($_SESSION['nivel'])){
            include("includes/nav.php"); 
        }
    ?>