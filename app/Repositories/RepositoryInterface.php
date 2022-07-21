<?php

namespace App\Repositories;

interface RepositoryInterface
{
    public function getList(): array;
    public function get(int $id): array;
    public function store(array $data): array;
    public function updateData(array $data, int $id): bool;
    public function destroy(int $id);
}
