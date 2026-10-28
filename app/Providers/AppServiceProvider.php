<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\RolInterface;
use App\Repositories\RolRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this ->app->bind(RolInterface::class, RolRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
