<?php include_once 'src/crud/repositories/conexion.php'; ?>

<!doctype html>
<html lang="en">

<?php
$tituloPagina = 'Registro de usuarios';
include 'src/template/header.php'
?>
<body>
<?php include 'src/template/titulo.php' ?>
    <div class="container-fluid mt-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">Nuevo Usuario</h3>
                    </div>
                    <form class="p-4" action="registrar.php" method="post">
                        <div class="mb-3">
                            <label class="form-label">Nombre de usuario</label>
                            <input class="form-control" type="text" name="username" required autofocus>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Contraseña</label>
                            <input class="form-control" type="password" name="password" required>
                        </div>
                        <div class="d-grid">
                            <input type="submit" class="btn btn-success" value="Registrar">
                            <a class="d-block text-center mt-4 small" href="index.php">Ya tienes cuenta? Iniciar sesión</a>
                        </div>
                    </form>
                </div>
                <?php
                if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'falta') {
                    ?>
                    <div class="py-4 ">
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Error</strong> Complete todos los campos
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                    <?php
                }
                ?>
                <?php
                if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'existe') {
                    ?>
                    <div class="py-4 ">
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Error</strong> El nombre de usuario ya esta registrado
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
<?php include 'src/template/footer.php'; ?>
</body>
</html>
