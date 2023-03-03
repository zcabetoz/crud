<?php

include_once 'conexion.php';

class EstadosRepository extends \repositories\conexion
{
    public function getEstado($codigo){
        $sql = "select * from estados where codigo = '$codigo'";

        $respuesta = mysqli_query(parent::conectar(), $sql);

        return mysqli_fetch_array($respuesta)['nombre'];
    }
}