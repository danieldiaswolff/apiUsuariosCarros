<?php

namespace App\Http\Controllers;

use App\Services\CarrosService;
use App\http\Controllers\AbstractController;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class CarrosController extends AbstractController
{

    public function __construct(CarrosService $service)
    {
        parent::__construct($service);
    }
 
    public function associarUsuarioCarro(int $usuarioId, int $carroId): JsonResponse
    {
        try {
            $request['assosiacao'] = $response = $this->service->associarUsuarioCarro($usuarioId, $carroId);
            $response = $this->successResponse($request, Response::HTTP_PARTIAL_CONTENT);
        } catch (Exception $e) {
            $response = $this->errorResponse($e);
        }

        return response()->json($response, $response['status_code']);
    }
    
    public function desassociarUsuarioCarro(int $carroId): JsonResponse
    {
        try {
            $this->service->desassociarUsuarioCarro($carroId);
            $response = $this->successResponse(['assosiacao' => true], Response::HTTP_PARTIAL_CONTENT);
        } catch (Exception $e) {
            $response = $this->errorResponse($e);
        }

        return response()->json($response, $response['status_code']);
    }
    
}
