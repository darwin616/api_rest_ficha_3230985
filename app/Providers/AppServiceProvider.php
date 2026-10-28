<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\TrimestreInterface;
use App\Repositories\TrimestreRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(TrimestreInterface::class, TrimestreRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
