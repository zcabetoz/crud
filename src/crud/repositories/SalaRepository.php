<?php

namespace repositories;

$path = $_SERVER['DOCUMENT_ROOT'];
include_once $path."/unet/crud/src/crud/repositories/conexion.php";

class SalaRepository extends conexion
{
    public function registrarSala()
    {
        $fecha = date("Y-m-d H:i:s", time());
        try {
            $conexion = parent::conectar();
            $sql = "insert into sala (id_tipo, fecha) values (3, '$fecha')";
            if ($conexion->query($sql) === TRUE) {
                echo "New record created successfully";
                return $conexion->insert_id;
            } else {
                echo "Error: " . $sql . "<br>" . $conexion->error;
            }
        } catch (\Exception $e) {
            echo $e->getMessage();
        }

        return 0;
    }


    public function getSalas(){
        $sql = "select * from sala ";

        $respuesta = mysqli_query(parent::conectar(), $sql);

        $salas = [];

        while ($row = mysqli_fetch_object($respuesta)) {
           $salas[] = $row;
        }

        return $salas;
    }

    public function getMensajes($idSala){
        $sql = "select * from mensajes where id_sala = '$idSala' ORDER BY id DESC";

        $respuesta = mysqli_query(parent::conectar(), $sql);

        $mensajes = [];

        while ($row = mysqli_fetch_object($respuesta)) {
            $mensajes[] = $row;
        }
        return $mensajes;
    }
    public function setMensajeSala($idSala, $idusuario, $mensaje){
        $fecha = date("Y-m-d H:i:s", time());
        try {
            $conexion = parent::conectar();
            $sql = "insert into mensajes (id_usuario, id_sala, mensaje,fecha) values ('$idusuario','$idSala','$mensaje','$fecha')";
            echo $sql;
            if ($conexion->query($sql) === TRUE) {
                return $conexion->insert_id;
            } else {
                echo "Error: " . $sql . "<br>" . $conexion->error;
            }
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
        return 0;
    }
}