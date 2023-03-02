<?php
include "conexion.php";

class crud extends conexion
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

    public function acceder($usuario, $password)
    {
        $conexion = parent::conectar();
        $passwordUsuario = "";
        $sql = "select * from persona where username = '$usuario'";
        $respuesta = mysqli_query($conexion, $sql);
        $passwordUsuario = mysqli_fetch_array($respuesta)['password'];
        if (password_verify($password, $passwordUsuario)) {
            $_SESSION['usuario'] = $usuario;
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
    public function actualizarEstado($usuario, $estado){
        $conexion = parent::conectar();
        $sql = "UPDATE persona SET estado = '$estado' WHERE username = '$usuario'";
        mysqli_query($conexion, $sql);
    }
}