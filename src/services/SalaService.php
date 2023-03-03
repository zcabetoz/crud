<?php

namespace services;

use repositories\SalaRepository as SalaRepository;

include "../crud/repositories/SalaRepository.php";

class SalaService
{
    public function crearSala(){
        $repository = new SalaRepository();
        return $repository->registrarSala();
    }
}