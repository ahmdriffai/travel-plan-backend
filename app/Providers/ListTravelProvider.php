<?php

namespace App\Providers;

use App\Repositories\Eloquent\ListTravelRepositoryImpl;
use App\Repositories\ListTravelRepository;
use App\Services\Impl\ListTravelServiceImpl;
use App\Services\ListTravelService;
use Illuminate\Support\ServiceProvider;

class ListTravelProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(ListTravelRepository::class, ListTravelRepositoryImpl::class);
        $this->app->singleton(ListTravelService::class, function($app) {
            $listTravelRepository = $app->make(ListTravelRepository::class);
            return new ListTravelServiceImpl($listTravelRepository);
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
