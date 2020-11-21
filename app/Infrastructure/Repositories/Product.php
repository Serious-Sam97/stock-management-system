<?php

namespace App\Infrastructure\Repositories;

use App\ProductQuantityHistory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    public $fillable = [
        'name',
        'price',
        'quantity'
    ];

    public function productQuantityHistories() : HasMany
    {
        return $this->hasMany(ProductQuantityHistory::class);
    }
}
