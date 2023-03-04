<?php
namespace services;
session_start();
use repositories\PersonaRepository;
use repositories\SalaRepository as SalaRepository;

$path = $_SERVER['DOCUMENT_ROOT'];
include $path . "/unet/crud/src/crud/repositories/SalaRepository.php";
include $path . "/unet/crud/src/crud/repositories/PersonaRepository.php";
class SalaService
{
    private $salaRepository;
    private $personaRepository;

    public function __construct()
    {
        $this->salaRepository = new SalaRepository();
        $this->personaRepository = new PersonaRepository();
    }

    public function crearSala()
    {
        return $this->salaRepository->registrarSala();
    }

    public function getSalas()
    {
        return $this->salaRepository->getSalas();
    }

    public function getMensajes($idSala)
    {
        $mensajes = $this->salaRepository->getMensajes($idSala);
        $mensajeCompleto = [];

        foreach ($mensajes as $mensaje) {
            $usuario = $this->personaRepository->getUsuario($mensaje->id_usuario);

            $mensajeCompleto[] = array(
                'mensaje' => $mensaje->mensaje,
                'usuario' => $usuario->username,
                'id_usuario'=>$mensaje->id_usuario
            );
        }

        return $mensajeCompleto;
    }
    public function MensajeSala($id_sala, $id_usuario,  $mensaje){
        return $this->salaRepository->setMensajeSala($id_sala,$id_usuario,$mensaje);
    }

}