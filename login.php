<?php include_once 'model/crud.php'; ?>

<?php session_start();
$username = $_POST['username'];
$password = $_POST['password'];

$autenticacion = new crud();
if($autenticacion->validarUsuario($username, $password)){
    if($autenticacion->acceder($username, $password)){
        header('location:inicio.php');
    }else{
        header('location:index.php?mensaje=error');
    }
}else{
    header('location:index.php?mensaje=error');
}
?>