<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\UsuarioInterface;
use App\Repositories\UsuarioRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(UsuarioInterface::class, UsuarioRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
