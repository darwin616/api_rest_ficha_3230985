<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\ModalidadInterface;
use App\Repositories\ModalidadRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
       $this->app->bind(ModalidadInterface::class, ModalidadRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
