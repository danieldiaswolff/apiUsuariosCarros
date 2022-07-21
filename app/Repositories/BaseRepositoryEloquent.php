<?php

namespace App\Repositories;


abstract class BaseRepositoryEloquent implements RepositoryInterface
{
    protected $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function getList(): array
    {
        return $this->model->all()->toArray();
    }

    public function get($id): array
    {
        return $this->model->findOrFail($id)->toArray();
    }

    public function store(array $data): array
    {
        return $this->model->create($data)->toArray();
    }

    public function updateData(array $data, $id) : bool
    {
        return $this->model->findOrFail($id)->update($data);
    }

    public function destroy($id): bool
    {
        return $this->model->destroy($id);
    }
}
