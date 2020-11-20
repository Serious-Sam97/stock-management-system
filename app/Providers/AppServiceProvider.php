<?php

namespace App\Providers;

use App\Application\Http\Controllers\ProductController;
use App\Domain\Repositories\ProductRepository;
use App\Infrastructure\Repositories\ProductEloquentRepository;
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
          ->needs(ProductRepository::class)
          ->give(function () {
              return new ProductEloquentRepository();
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
