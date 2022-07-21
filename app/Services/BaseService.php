<?php

namespace App\Services;

abstract class BaseService implements ServiceInterface
{
    protected $repo;

    public function __construct($repo)
    {
        $this->repo = $repo;
    }

    public function getList(): array
    {
        return $this->repo->getList();
    }

    public function get($id): array
    {
        return $this->repo->get($id);
    }

    public function store(array $data): array
    {
        return $this->repo->store($data);
    }

    public function update(array $data, $id) : bool
    {
        return $this->repo->update($data, $id);
    }

    public function destroy($id): bool
    {
        return $this->repo->destroy($id);
    }
}
