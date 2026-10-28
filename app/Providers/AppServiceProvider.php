<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\DiaInterface;
use App\Repositories\DiaRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(DiaInterface::class, DiaRepository::class);                                                                                                     
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
