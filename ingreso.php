<?php include("includes/header.php"); ?>
<?php include("includes/title.php"); ?>

<br>
<div class="row">
    <div class="col-md-12">

        <div class="row">
            <aside class="col-sm-4"></aside>

            <aside class="col-sm-4">
                <div class="card">
                    <article class="card-body">
                        <!-- <a href="" class="float-right btn btn-outline-primary">Sign up</a> -->
                        <!-- <h4 class="card-title mb-4 mt-1">Registro de acceso</h4> -->
                        <form id="form2" name="form2" method="POST" action="validacion.php">
                            <div class="form-group">
                                <label>Usuario</label>
                                <input name="usuario" id="password" class="form-control" placeholder="Digite su usuario..." type="text">
                            </div>
                            <div class="form-group">
                                <!-- <a class="float-right" href="#">Forgot?</a> -->
                                <label>Contraseña</label>
                                <input name="password" id="password" class="form-control" placeholder="Contraseña..." type="password">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success btn-block"> Ingresar </button>
                            </div>
                        </form>
                    </article>
                </div> <!-- card.// -->
            </aside> <!-- col.// -->

            <aside class="col-sm-4"></aside>
        </div>

    </div>
</div>

<?php include("includes/footer.php"); ?>