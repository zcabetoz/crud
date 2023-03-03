<?php

namespace controller;

use services\SalaService;

include "../services/SalaService.php";

session_start();
if (!isset($_SESSION['usuario'])) {
    header('location:inicio.php');
}

$salaService = new SalaService;
if($salaService->crearSala() != 0){

}

