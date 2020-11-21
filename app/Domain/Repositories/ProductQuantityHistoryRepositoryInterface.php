<?php

namespace App\Domain\Repositories;

use App\Domain\Entities\ProductQuantityHistory;
use Illuminate\Database\Eloquent\Collection;

interface ProductQuantityHistoryRepositoryInterface
{
    public function index() : Collection;
    public function store(ProductQuantityHistory $productQuantityHistory) : ProductQuantityHistory;
    public function update(ProductQuantityHistory $productQuantityHistory) : void;
    public function destroy(int $id) : void;
}