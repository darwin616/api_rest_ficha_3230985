<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\InstructorInterface;
use App\repositories\InstructorRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(InstructorInterface::class, InstructorRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
