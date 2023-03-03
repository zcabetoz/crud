<?php

namespace repositories;

use repositories\conexion;

// as Conexion;

include "conexion.php";

class SalaRepository extends conexion
{
    public function registrarSala()
    {
        echo "Registrar";
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
}