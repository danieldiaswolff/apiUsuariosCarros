<?php

declare(strict_types=1);

namespace App\Providers;

use App\Models\Carros;
use App\Repositories\CarrosRepository;
use App\Services\CarrosService;
use Illuminate\Support\ServiceProvider;

class CarrosServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(CarrosService::class, function ($app) {
           return new CarrosService(new CarrosRepository(new Carros()));
        });
    }
}
