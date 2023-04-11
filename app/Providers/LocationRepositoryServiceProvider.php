<?php

namespace App\Providers;

use App\Contracts\LocationRepositoryInterface;
use App\Repositories\LocationRepository;
use Illuminate\Support\ServiceProvider;

class LocationRepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(LocationRepositoryInterface::class, LocationRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
