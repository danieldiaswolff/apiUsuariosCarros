<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

interface ControllerInterface
{

    public function destroy(int $id): JsonResponse;

    public function store(Request $request): JsonResponse;

    public function getList(): JsonResponse;

    public function get(int $id): JsonResponse;

    public function update(Request $request, int $id): JsonResponse;
}
