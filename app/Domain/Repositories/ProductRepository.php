<?php

namespace App\Domain\Repositories;

use App\Domain\Entities\Product;
use Illuminate\Database\Eloquent\Collection;

interface ProductRepository
{
    public function index() : Collection;
    public function store(Product $product) : void;
    public function update(Product $product) : void;
    public function destroy(int $id) : void;
}