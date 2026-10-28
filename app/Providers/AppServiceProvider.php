<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\MallaTrimestralInterface;
use App\Repositories\MallaTrimestralRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(MallaTrimestralInterface::class, MallaTrimestralRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
