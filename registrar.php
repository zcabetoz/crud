<?php

use repositories\personaRepository;

if (empty($_POST['username']) || empty($_POST['password'])) {
    header('location:registro.php?mensaje=falta');
    exit();
}
include 'src/crud/repositories/PersonaRepository.php';
$username = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

$autenticacion = new personaRepository();
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




