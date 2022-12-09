<?php

namespace App\Providers;

use App\Repositories\Eloquent\PlaceRepositoryImpl;
use App\Repositories\PlaceRepository;
use App\Services\Impl\PlaceServiceImp;
use App\Services\Impl\PlaceServiceImpl;
use App\Services\PlaceService;
use Illuminate\Support\ServiceProvider;

class PlaceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(PlaceRepository::class, PlaceRepositoryImpl::class);
        $this->app->singleton(PlaceService::class, function($app) {
            $placeRepository = $app->make(PlaceRepository::class);
            return new PlaceServiceImpl($placeRepository);
        });
        
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
