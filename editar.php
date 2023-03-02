<?php include 'template/header.php'; ?>
<?php
if (!isset($_GET['codigo'])) {
    header('location:index.php?mensaje=error');
}
include_once 'model/conexion.php';
$codigo = $_GET['codigo'];
$sentencia = $bd->prepare('SELECT * FROM personas WHERE codigo = ?;');
$sentencia->execute([$codigo]);
$persona = $sentencia->fetch(PDO::FETCH_OBJ);
?>
<div class="container-fluid mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="text-center">Editar Registro</h3>
                </div>
                <form class="p-4" action="editarProceso.php" method="post">
                    <div class="mb-3">
                        <label class="form-label">Nombre</label>
                        <input class="form-control" type="text" name="name" required value="<?php echo $persona->nombre; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Edad</label>
                        <input class="form-control" type="number" name="age" required value="<?php echo $persona->edad; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Signo</label>
                        <input class="form-control" type="text" name="sign" required value="<?php echo $persona->signo; ?>">
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="codigo" value="<?php echo $persona->codigo; ?>">
                        <input type="submit" class="btn btn-primary" value="Editar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include 'template/footer.php'; ?>