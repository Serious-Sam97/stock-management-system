<?php

namespace App\Infrastructure\Repositories;

use App\Domain\Entities\Product as EntitiesProduct;
use Illuminate\Database\Eloquent\Collection;
use App\Domain\Repositories\ProductRepository;

class ProductEloquentRepository implements ProductRepository
{
    public function index() : Collection
    {
        return Product::all();
    }

    public function store(EntitiesProduct  $entitiesProduct) : EntitiesProduct
    {
        $entitiesProduct->setId(Product::create([
            'name' => $entitiesProduct->getname(),
            'price' => $entitiesProduct->getPrice(),
            'quantity' => $entitiesProduct->getQuantity()
        ])->id);

        return $entitiesProduct;
    }

    public function update(EntitiesProduct $entitiesProduct) : void
    {
        $product = Product::find($entitiesProduct->getId());
        $product->update([
            'name' => $entitiesProduct->getname(),
            'price' => $entitiesProduct->getPrice(),
            'quantity' => $entitiesProduct->getQuantity()
        ]);
    }

    public function destroy(int $productId) : void
    {
        Product::where('id', $productId)->delete();
    }
}