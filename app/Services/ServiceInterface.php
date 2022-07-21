<?php

namespace App\Services;

interface ServiceInterface
{

    public function getList(): array;

    public function get(int $id): array;

    public function store(array $data): array;

    public function update(array $data, int $id): bool;

    public function destroy(int $id): bool;
}
