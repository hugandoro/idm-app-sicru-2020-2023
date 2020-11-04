        <!-- Validacion de SESION ACTIVA -->
        <div class="row">
            <div class="col-md-12">
            
                    <?php
                    //Verifica que exista una sesion creada
                    if (isset($_SESSION['nivel'])) {

                        //Verifica que nivel de acceso tiene  
                        if ($_SESSION['nivel'] == "0") {
                            echo    "<div class='alert alert-info' style='align-content: center;'>
                                        <center>Usuario INACTIVO en el sistema - Acceso Denegado</center>
                                    </div>";
                            echo    "<div class='form-group'>
                                        <a href='index.php'><button type='submit' class='btn btn-success btn-block'> Volver... </button></a>
                                    </div>";
                            exit;
                        }

                    } else {
                        echo    "<div class='alert alert-info' style='align-content: center;'>
                                    <center>Credenciales de acceso INVALIDAS - Acceso Denegado</center>
                                </div>";
                        echo    "<div class='form-group'>
                                    <a href='index.php'><button type='submit' class='btn btn-success btn-block'> Volver... </button></a>
                                </div>";
                        exit;
                    }
                    ?>

            </div>
        </div>

        <br>

        <p>

        </p>