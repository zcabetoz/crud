<?php

namespace controller;

use services\SalaService;

include "../services/SalaService.php";

//session_start();
if (!isset($_SESSION['usuario'])) {
    header('location:inicio.php');
}

$salaService = new SalaService;

$action = $_GET['action'];
$idSala = $_GET['idSala'];

switch ($action) {
    case 'crear_sala':
        $idSala = $salaService->crearSala();
        break;
    case 'enviar_mensaje':
        $salaService->MensajeSala($idSala, $_SESSION['id'], $_POST['mensaje']);
        break;
}

if ($idSala != 0) {
   header('location:../../inicio.php?idSala=' . $idSala);
}



