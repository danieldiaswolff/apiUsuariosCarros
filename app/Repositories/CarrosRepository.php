<?php

namespace App\Repositories;

use App\Repositories\BaseRepositoryEloquent;
use App\Models\Carros;

class CarrosRepository extends BaseRepositoryEloquent
{
    public function __construct(Carros $model)
    {
        parent::__construct($model);
    }


    public function associarUsuarioCarro(int $carroId, int $usuarioId): bool
    {
        $carro = $this->model->findOrFail($carroId);
        return $carro->usuario()->associate($usuarioId)->save();
    }

    public function desassociarUsuarioCarro($carroId): bool
    {
        $carro = $this->model->findOrFail($carroId);
        return $carro->usuario()->dissociate()->save();
    }
}
