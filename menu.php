<?php include("includes/header.php"); ?>
<?php include("includes/title.php"); ?>
<?php include("includes/login_valid_session.php"); ?>


<div class="row">

  <div class="col-md-12">
    <div class="card-deck">

      <div class="card">
        <img class="card-img-top" src="imagenes/icono_1.png" alt="Card image cap" style="border-radius: 0%;">
        <div class="card-footer" style="text-align: center;">
            <a href="buscar_ac.php"><button type='submit' class='btn btn-outline-success btn-sm btn-block'>Consultar las bases de datos</button></a>
        </div>
      </div>

      <div class="card">
        <img class="card-img-top" src="imagenes/icono_2.png" alt="Card image cap" style="border-radius: 0%;">
        <div class="card-footer" style="text-align: center;">
          <?php if ($_SESSION["nivel"] != "1") { ?>
            <a href="ingresar_ac.php"><button type='submit' class='btn btn-outline-success btn-sm btn-block'>Ingresar ciudadano al sistema</button></a>
          <?php } ?>
        </div>
      </div>

      <div class="card">
        <img class="card-img-top" src="imagenes/icono_3.png" alt="Card image cap" style="border-radius: 0%;">
        <div class="card-footer" style="text-align: center;">
          <a href="listar0.php"><button type='submit' class='btn btn-outline-success btn-sm btn-block'>Listar registros bases de datos</button></a>
        </div>
      </div>

      <div class="card">
        <img class="card-img-top" src="imagenes/icono_4.png" alt="Card image cap" style="border-radius: 0%;">
        <div class="card-footer" style="text-align: center;">
          <?php if ($_SESSION["nivel"] == "2") { ?>
            <!-- <a href="convocatorias.php"><button type='submit' class='btn btn-outline-success btn-sm btn-block'>Convocatorias</button></a> -->
          <?php } ?>
        </div>
      </div>
    </div>
  </div>

  <div class="col-md-12">
    <div class="card-deck">

      <div class="card">
        <img class="card-img-top" src="imagenes/icono_5.png" alt="Card image cap" style="border-radius: 0%;">
        <div class="card-footer" style="text-align: center;">
          <?php if ($_SESSION["nivel"] == "2") { ?>
            <!-- <a href="visitas.php"><button type='submit' class='btn btn-outline-success btn-sm btn-block'>Visitas tecnicas</button></a> -->
          <?php } ?>
        </div>
      </div>

      <div class="card">
        <img class="card-img-top" src="imagenes/icono_6.png" alt="Card image cap" style="border-radius: 0%;">
        <div class="card-footer" style="text-align: center;">
          <!-- <a href="#"><button type='submit' class='btn btn-outline-success btn-sm btn-block'>Solicitudes de Pre-Registro</button></a> -->
        </div>
      </div>

      <div class="card">
        <img class="card-img-top" src="imagenes/icono_7.png" alt="Card image cap" style="border-radius: 0%;">
        <div class="card-footer" style="text-align: center;">
          <a href="analitica1.php"><button type='submit' class='btn btn-outline-success btn-sm btn-block'>Analitica de datos</button></a>
        </div>
      </div>
      
      <div class="card">
        <img class="card-img-top" src="imagenes/icono_8.png" alt="Card image cap" style="border-radius: 0%;">
        <div class="card-footer" style="text-align: center;">
          <a href="logout.php"><button type='submit' class='btn btn-outline-success btn-sm btn-block'>Cerrar sesion de usuario</button></a>
        </div>
      </div>
    </div>
  </div>

</div>


<?php include("includes/footer.php"); ?>