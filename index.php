<?php include 'template/header.php' ?>
<?php
include_once 'model/conexion.php';
$sentencia = $bd->query("SELECT * FROM personas");
$personas = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-7">
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
            <?php
            if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'error') {
            ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error</strong> Vuelve a intentarlo
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php
            }
            ?>

            <div class="card">
                <div class="card-header text-center">
                    Listado de personas
                </div>
                <div class="p-4">
                    <div class="table-responsive">
                        <table class="table align-middle">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Edad</th>
                                    <th scope="col">Signos</th>
                                    <th scope="col" class="text-center">Actiones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($personas as $persona) {
                                ?>
                                    <tr>
                                        <td scope="row"><?php echo $persona->codigo ?></td>
                                        <td><?php echo $persona->nombre ?></td>
                                        <td><?php echo $persona->edad ?></td>
                                        <td><?php echo $persona->signo ?></td>
                                        <td>
                                            <a href="editar.php?codigo=<?php echo $persona->codigo ?>" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Editar</a>
                                            <a href="#" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i> Eliminar</a>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="card">
                <div class="card-header text-center">
                    Registrarse
                </div>
                <form class="p-4" action="registrar.php" method="post">
                    <div class="mb-3">
                        <label class="form-label">Nombre</label>
                        <input type="text" class="form-control" autofocus name="name" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label"> Edad</label>
                        <input type="number" name="age" require class="form-control" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Signo Zodiacal</label>
                        <input type="text" class="form-control" name="sign" required autofocus>
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="hidden" value="1">
                        <input type="submit" class="btn btn-primary" value="Register">
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
        </div>
    </div>
</div>
<?php include 'template/footer.php' ?>