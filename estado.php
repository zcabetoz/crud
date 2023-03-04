<?php

use repositories\personaRepository;

session_start();
if (!isset($_GET['estado']) || !isset($_SESSION['usuario'])) {
    header('location:inicio.php');
}
include_once 'src/crud/repositories/PersonaRepository.php';
$agregarEstado = new personaRepository();
$agregarEstado->actualizarEstado($_GET['estado']);
header('location:inicio.php?idSala='.$_SESSION['idSala']);

