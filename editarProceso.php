<?php
if (!isset($_POST['codigo']))
    header('location:index.php?mensaje=error');
    include 'model/conexion.php';
    $codigo = $_POST['codigo'];
    $nombre = $_POST['name'];
    $edad = $_POST['age'];
    $signo = $_POST['sign'];
    $sentencia = $bd->prepare("UPDATE personas SET nombre = ?, edad = ?, signo = ? WHERE codigo = ?;");
    $resultado = $sentencia->execute([$nombre, $edad, $signo, $codigo]);

    if($resultado){
        header('location:index.php?mensaje=registrado');
    }else{
        header('location:index.php?mensaje=error');
    }
?>