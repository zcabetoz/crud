<?php
if (!isset($_GET['estado']) || !isset($_GET['usuario'])) {
    header('location:inicio.php');
}
include_once 'model/crud.php';
$agregarEstado = new crud();
$agregarEstado->actualizarEstado($_GET['estado'], $_GET['usuario']);
header('location:inicio.php');

