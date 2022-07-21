<?php

namespace App\Http\Controllers;

use App\Services\UsuariosService;
use App\http\Controllers\AbstractController;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class UsuariosController extends AbstractController
{

    public function __construct(UsuariosService $service)
    {
        parent::__construct($service);
    }

    public function getUsersWithCars(): JsonResponse
    {
        try {
            $result = $this->service->getUsersWithCars();
            $response = $this->successResponse($result, Response::HTTP_PARTIAL_CONTENT);
        } catch (Exception $e) {
            $response = $this->errorResponse($e);
        }

        return response()->json($response, $response['status_code']);
    }

    public function getUserWithCars(int $id): JsonResponse
    {
        try {
            $result = $this->service->getUserWithCars($id);
            $response = $this->successResponse($result, Response::HTTP_PARTIAL_CONTENT);
        } catch (Exception $e) {
            $response = $this->errorResponse($e);
        }

        return response()->json($response, $response['status_code']);
    }

    public function deleteUsuarioERelacionamentoComCarro(int $id): JsonResponse
    {
        try {
            $result['registro_deletado'] = $this->service->deleteUsuarioERelacionamentoComCarro($id);
            $response = $this->successResponse($result, Response::HTTP_PARTIAL_CONTENT);
        } catch (Exception $e) {
            $response = $this->errorResponse($e);
        }

        return response()->json($response, $response['status_code']);
    }

}
