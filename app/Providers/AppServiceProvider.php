<?php

namespace App\Providers;

use App\Application\Http\Controllers\ProductController;
use App\Application\Http\Controllers\ProductQuantityHistoryController;
use App\Domain\Repositories\ProductQuantityHistoryRepositoryInterface;
use App\Domain\Repositories\ProductRepositoryInterface;
use App\Domain\Services\ProductBulkServiceInterface;
use App\Infrastructure\Repositories\Product;
use App\Infrastructure\Repositories\ProductEloquentRepository;
use App\Infrastructure\Repositories\ProductQuantityHistoryEloquentRepository;
use App\Infrastructure\Services\ProductBulkService;
use App\Observers\ProductObserver;
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
        $productEloquentRepository = new ProductEloquentRepository();
        $this->app->when(ProductController::class)
          ->needs(ProductRepositoryInterface::class)
          ->give(function () use($productEloquentRepository) {
              return $productEloquentRepository;
        });
        
        $this->app->when(ProductController::class)
          ->needs(ProductBulkServiceInterface::class)
          ->give(function () use($productEloquentRepository) {
              return new ProductBulkService($productEloquentRepository);
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
        Product::observe(ProductObserver::class);
    }
}
