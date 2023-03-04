<?php

namespace repositories;

$path = $_SERVER['DOCUMENT_ROOT'];
include_once $path."/unet/crud/src/crud/repositories/conexion.php";

class PersonaRepository extends conexion
{
    public function registrar($usuario, $password)
    {
        $estado = 1;
        $conexion = parent::conectar();

        $sql = "insert into persona (username, password, estado) values (?,?,?)";
        $query = $conexion->prepare($sql);
        $query->bind_param('ssi', $usuario, $password, $estado);
        return $query->execute();
    }

    public function acceder($username, $password)
    {
        $conexion = parent::conectar();
        $passwordUsuario = "";
        $sql = "select * from persona where username = '$username'";
        $respuesta = mysqli_query($conexion, $sql);
        $usuario = mysqli_fetch_array($respuesta);
        if (password_verify($password, $usuario['password'])) {
            $_SESSION['usuario'] = $username;
            $_SESSION['estado'] = $usuario['estado'];
            $_SESSION['id'] = $usuario['id'];
            return true;
        } else {
            return false;
        }
    }

    public function validarUsuario($usuario)
    {
        $conexion = parent::conectar();
        $sql = "select * from persona where username = '$usuario'";
        $query = mysqli_query($conexion, $sql);
        return $query->num_rows > 0;
    }

    public function actualizarEstado($estado)
    {
        $usuario = $_SESSION['usuario'];
        $conexion = parent::conectar();
        $sql = "UPDATE persona SET estado = '$estado' WHERE username = '$usuario'";
        $_SESSION['estado'] = $estado;
        mysqli_query($conexion, $sql);
    }

    public function getUsuario($idUsuario)
    {
        $conexion = parent::conectar();
        $passwordUsuario = "";
        $sql = "select * from persona where id = '$idUsuario'";
        $respuesta = mysqli_query($conexion, $sql);

        return mysqli_fetch_object($respuesta);
    }


}