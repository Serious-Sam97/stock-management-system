<?php

namespace App\Infrastructure\Repositories;

use App\Domain\Entities\Product as EntitiesProduct;
use App\Domain\Repositories\ProductRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model implements ProductRepository
{
    use HasFactory;

    public $fillable = [
        'name',
        'price',
        'quantity'
    ];

    public function index() : Collection
    {
        return Product::all();
    }

    public function store(EntitiesProduct $entitiesProduct) : EntitiesProduct
    {
        $entitiesProduct->setId(Product::create([
            'name' => $entitiesProduct->getname(),
            'price' => $entitiesProduct->getPrice(),
            'quantity' => $entitiesProduct->getQuantity()
        ])->id);

        return $entitiesProduct;
    }

    // public function update(EntitiesProduct $entitiesProduct) : void
    // {
    //     // $product = P
    //     // Product::update([
    //     //     'name' => $entitiesProduct->getname(),
    //     //     'price' => $entitiesProduct->getPrice(),
    //     //     'quantity' => $entitiesProduct->getQuantity()
    //     // ]);
    // }
}
