<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Laravel\Lumen\Routing\Controller as BaseController;

abstract class AbstractController extends BaseController implements ControllerInterface
{
    protected $service;

    public function __construct($service)
    {
        $this->service = $service;
    }

    public function store(Request $request): JsonResponse
    {
        try {
            $result = $this->service->store($request->all());
            $response = $this->successResponse($result, Response::HTTP_CREATED);
        } catch (Exception $e) {
            $response = $this->errorResponse($e);
        }

        return response()->json($response, $response['status_code']);
    }

    public function getList(): JsonResponse
    {
        try {
            $result = $this->service->getList();
            $response = $this->successResponse($result, Response::HTTP_PARTIAL_CONTENT);
        } catch (Exception $e) {
            $response = $this->errorResponse($e);
        }

        return response()->json($response, $response['status_code']);
    }

    public function get(int $id): JsonResponse
    {
        try {
            $result = $this->service->get($id);
            $response = $this->successResponse($result);
        } catch (Exception $e) {
            $response = $this->errorResponse($e);
        }

        return response()->json($response, $response['status_code']);
    }

    public function update(Request $request, int $id): JsonResponse
    {
        try {
            $result['registro_alterado'] = $this->service->update($request->all(), $id);
            $response = $this->successResponse($result);
        } catch (Exception $e) {
            $response = $this->errorResponse($e);
        }

        return response()->json($response, $response['status_code']);
    }

    public function destroy(int $id): JsonResponse
    {
        try {
            $result['registro_deletado'] = $this->service->destroy($id);
            $response = $this->successResponse($result);
        } catch (Exception $e) {
            $response = $this->errorResponse($e);
        }

        return response()->json($response, $response['status_code']);
    }

    /**
     * @param array $data
     * @param int $statusCode
     * @return array
     */
    protected function successResponse(array $data, int $statusCode = Response::HTTP_OK): array
    {
        return [
            'status_code' => $statusCode,
            'data' => $data
        ];
    }

    /**
     * @param Exception $e
     * @param int $statuCode
     * @return array
     */
    protected function errorResponse(Exception $e, int $statuCode = Response::HTTP_BAD_REQUEST): array
    {
        return [
            'status_code' => $statuCode,
            'error' => true,
            'error_description' => $e->getMessage()
        ];
    }
}
