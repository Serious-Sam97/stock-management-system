<?php

namespace App\Infrastructure\Repositories;

use App\Domain\Entities\ProductQuantityHistory as EntitiesProductQuantityHistory;
use App\Infrastructure\Repositories\ProductQuantityHistory;
use App\Domain\Repositories\ProductQuantityHistoryRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class ProductQuantityHistoryEloquentRepository implements ProductQuantityHistoryRepositoryInterface
{
    public function index() : Collection
    {
        return ProductQuantityHistory::with('product')->get();
    }

    public function store(EntitiesProductQuantityHistory  $productQuantityHistory) : void
    {
        ProductQuantityHistory::create([
            'product_id' => $productQuantityHistory->getProductId(),
            'quantity' => $productQuantityHistory->getQuantity(),
        ]);
    }

    public function update(EntitiesProductQuantityHistory $productQuantityHistory) : void
    {
        $product = ProductQuantityHistory::find($productQuantityHistory->getId());
        $product->update([
            'quantity' => $productQuantityHistory->getQuantity()
        ]);
    }

    public function destroy(int $producQuantityHistorytId) : void
    {
        ProductQuantityHistory::where('id', $producQuantityHistorytId)->delete();
    }
}