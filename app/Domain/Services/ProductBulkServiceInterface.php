<?php

namespace App\Domain\Services;

use App\Domain\Entities\Product;
use Illuminate\Database\Eloquent\Collection;

interface ProductBulkServiceInterface
{
    public function bulkProducts(array $products) : void;
}