<?php
if (empty($_POST['username']) || empty($_POST['password'])) {
    header('location:registro.php?mensaje=falta');
    exit();
}
include 'model/crud.php';
$username = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

$autenticacion = new crud();
if (!$autenticacion->validarUsuario($username)) {
    if ($autenticacion->registrar($username, $password)) {
        header('location:index.php?mensaje=registrado');
    } else {
        header('location:index.php?mensaje=error');
        exit();
    }
} else {
    header('location:registro.php?mensaje=existe');
}




