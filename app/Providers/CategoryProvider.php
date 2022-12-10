<?php

namespace App\Providers;

use App\Repositories\CategoryRepository;
use App\Repositories\Eloquent\CategoryRepositoryImpl;
use Illuminate\Support\ServiceProvider;

class CategoryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(CategoryRepository::class, CategoryRepositoryImpl::class);
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
