<?php

declare(strict_types=1);

namespace App\Providers;

use App\Models\Usuarios;
use App\Repositories\UsuariosRepository;
use App\Services\UsuariosService;
use Illuminate\Support\ServiceProvider;

class UsuariosServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(UsuariosService::class, function ($app) {
           return new UsuariosService(new UsuariosRepository(new Usuarios()));
        });
    }
}
