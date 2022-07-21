<?php

namespace App\Repositories;

use App\Repositories\BaseRepositoryEloquent;
use App\Models\Usuarios;

class UsuariosRepository extends BaseRepositoryEloquent
{
    public function __construct(Usuarios $model)
    {
        parent::__construct($model);
    }
   
    public function getUsersWithCars(): array
    {
        return $this->model->with('carros')->get()->toArray();
    }

    public function getUserWithCars($id): array
    {
        return $this->model->with('carros')->findOrFail($id)->toArray();
    }


    public function deleteUsuarioERelacionamentoComCarro($id): bool
    {
        $user = $this->model->findOrFail($id);
        $user->carros()->update(['usuario_id' => null]);
        return $user->delete();
    }

}
