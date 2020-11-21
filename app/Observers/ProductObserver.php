<?php

namespace App\Observers;

use App\Domain\Entities\ProductQuantityHistory;
use App\Domain\Repositories\ProductQuantityHistoryRepositoryInterface;
use App\Infrastructure\Repositories\Product;
use App\Infrastructure\Repositories\ProductQuantityHistoryEloquentRepository;

class ProductObserver
{
    private ProductQuantityHistoryRepositoryInterface $productQuantityHistoryRepository;

    public function __construct()
    {
        $this->productQuantityHistoryRepository = new ProductQuantityHistoryEloquentRepository();
    }

    public function created(Product $product)
    {
        $productQuantityHistory = new ProductQuantityHistory(null, $product->id, $product->quantity);
        $this->productQuantityHistoryRepository->store($productQuantityHistory);
    }

    public function updated(Product $product)
    {
        if($product->isDirty('quantity')){
            $productQuantityHistory = new ProductQuantityHistory(null, $product->id, $product->quantity);
            $this->productQuantityHistoryRepository->store($productQuantityHistory);
        }
    }
}
