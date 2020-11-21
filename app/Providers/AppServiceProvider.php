<?php

namespace App\Providers;

use App\Application\Http\Controllers\ProductController;
use App\Application\Http\Controllers\ProductQuantityHistoryController;
use App\Domain\Repositories\ProductQuantityHistoryRepositoryInterface;
use App\Domain\Repositories\ProductRepositoryInterface;
use App\Infrastructure\Repositories\ProductEloquentRepository;
use App\Infrastructure\Repositories\ProductQuantityHistoryEloquentRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->when(ProductController::class)
          ->needs(ProductRepositoryInterface::class)
          ->give(function () {
              return new ProductEloquentRepository();
        });
        
        $this->app->when(ProductQuantityHistoryController::class)
        ->needs(ProductQuantityHistoryRepositoryInterface::class)
        ->give(function () {
            return new ProductQuantityHistoryEloquentRepository();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
