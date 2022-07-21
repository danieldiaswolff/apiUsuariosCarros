<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ValidateDataMiddleware
{
    public function handle(Request $request, \Closure $next)
    {
        $validate = $this->validate($request);

        if ($validate->fails()) {

            $response = [
                'status_code' => 400,
                'error' => true,
                'error_message' => 'Dados Inválidos',
                'error_description' => $validate->errors()
            ];

            return $response;
        }


        return $next($request);
    }

    private function defineModel(string $namespace): ?Model
    {
        $model = null;

        if (class_exists($namespace)) {
            $model = new $namespace();
        }

        return $model;
    }

    private function validate(Request $request)
    {
        $alias = $request->route()[1]['as'];
        $model = $this->defineModel($alias);

        if (empty($model)) {
            throw new \InvalidArgumentException('A model ' . $alias . ' não existe');
        }


        return Validator::make(
            $request->toArray(),
            $model->rules($request),
            $model->messages
        );
    }
}
