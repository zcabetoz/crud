<?php
namespace repositories;
class conexion
{

    public $server = 'localhost';
    public $user = 'root';
    public $password = '';
    public $database = 'chatunet2';
    public $port = 3306;

    public function conectar()
    {
        return mysqli_connect(
            $this->server,
            $this->user,
            $this->password,
            $this->database,
            $this->port
        );
    }

}
