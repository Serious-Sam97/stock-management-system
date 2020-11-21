<?php

namespace App\Infrastructure\Repositories;

use App\Infrastructure\Repositories\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ProductQuantityHistory extends Model
{
    use HasFactory;

    public $fillable = [
        'product_id',
        'quantity',
    ];

    public function product() : HasOne
    {
        return $this->hasOne(Product::class);
    }
}
