<?php

namespace App\Application\Http\Controllers;

use App\Domain\Entities\Product;
use App\Domain\Repositories\ProductRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private ProductRepository $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function index() : Collection
    {
        return $this->productRepository->index();
    }

    public function store(Request $request)
    {
        //TODO: Change Request TO LARAVEL VALIDATOR

        $data = $request->all();
        $product = new Product($data['name'], (float)$data['price'], (int)$data['quantity']);
        return response()->json($this->productRepository->store($product)->toResponse());
    }

    public function update(Request $request) : void
    {
        //TODO: Change Request TO LARAVEL VALIDATOR

        $data = $request->all();
        $product = new Product($data['name'], (float)$data['price'], (int)$data['quantity'], $data['id']);
        $this->productRepository->update($product);
    }

    public function destroy(int $productId) : void
    {
        $this->productRepository->destroy($productId);
    }
}
