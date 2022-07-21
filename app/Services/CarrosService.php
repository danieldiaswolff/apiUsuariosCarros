<?php

namespace App\Services;


use App\Repositories\CarrosRepository;
use App\Repositories\UsuariosRepository;
use App\Services\BaseService;

class CarrosService extends BaseService
{
    public function __construct(CarrosRepository $repository)
    {
        parent::__construct($repository);
    }

    public function associarUsuarioCarro(int $usuarioId, int $carroId): bool
    {
        return $this->repo->associarUsuarioCarro($carroId, $usuarioId);
    }

    public function desassociarUsuarioCarro(int $carroId): bool
    {
        return $this->repo->desassociarUsuarioCarro($carroId);
    }
}
