<?php

namespace App\Services;

use App\Repositories\UsuariosRepository;
use App\Repositories\CarrosRepository;
use App\Services\BaseService;

class UsuariosService extends BaseService
{
    public function __construct(UsuariosRepository $repository)
    {
        parent::__construct($repository);
    }
    
    public function store(array $data): array
    {
        $data['senha'] = encrypt($data['senha']);
        return $this->repo->store($data);
    }
   
    public function update(array $data, $id) : bool
    {
        $data['senha'] = encrypt($data['senha']);
        return $this->repo->update($data, $id);
    }

    public function getUsersWithCars(): array
    {
        return $this->repo->getUsersWithCars();
    }

    public function getUserWithCars(int $id): array
    {
        return $this->repo->getUserWithCars($id);
    }

    public function deleteUsuarioERelacionamentoComCarro(int $id): bool
    {
        return $this->repo->deleteUsuarioERelacionamentoComCarro($id);
    }

  
}
