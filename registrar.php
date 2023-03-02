<?php 
    if(empty($_POST['name']) || empty($_POST['age']) || empty($_POST['sign']) || empty($_POST['hidden'])){
        header('location:index.php?mensaje=falta');
        exit();
    }
    include 'model/conexion.php';
    $nombre = $_POST['name'];
    $edad = $_POST['age'];
    $signo = $_POST['sign'];
    $sentencia = $bd->prepare('INSERT INTO personas(nombre,edad,signo) VALUES (?,?,?);');
    $resultado = $sentencia->execute([$nombre, $edad, $signo]);

    if($resultado == true){
        header('location:index.php?mensaje=registrado');
    }else{
        header('location:index.php?mensaje=error');
        exit();
    }
?>