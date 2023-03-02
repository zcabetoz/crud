<?php include 'template/header.php' ?>
<?php
include_once 'model/conexion.php';

?>

    <div class="container-fluid mt-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <?php
                if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'registrado') {
                    ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Registro</strong> Se guardaron los datos exitosamente
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php
                }
                ?>
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">Iniciar Sesion</h3>
                    </div>
                    <form class="p-4" action="login.php" method="post">
                        <div class="mb-3">
                            <label class="form-label">Nombre de Usuario</label>
                            <input class="form-control" type="text" name="username" required autofocus>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Contraseña</label>
                            <input class="form-control" type="password" name="password" required>
                        </div>
                        <div class="d-grid">
                            <input type="submit" class="btn btn-primary" value="Iniciar sesion">
                            <a class="btn btn-secondary mt-2" href="registro.php">Regístrarte</a>
                        </div>
                    </form>
                </div>
                <?php
                if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'error') {
                    ?>
                    <div class="py-4 ">
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Error</strong> Usuario o clave invalida
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
<?php include 'template/footer.php' ?>