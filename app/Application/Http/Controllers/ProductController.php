<?php

namespace App\Application\Http\Controllers;

use App\Domain\Entities\Product;
use App\Domain\Repositories\ProductRepositoryInterface;
use App\Http\Requests\ProductStoreRequest;
use Illuminate\Database\Eloquent\Collection;

class ProductController extends Controller
{
    private ProductRepositoryInterface $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function index() : Collection
    {
        return $this->productRepository->index();
    }

    public function store(ProductStoreRequest $request)
    {
        $data = $request->all();
        $product = new Product($data['name'], $data['price'], $data['quantity']);
        return response()->json($this->productRepository->store($product)->toResponse());
    }

    public function update(ProductStoreRequest $request) : void
    {
        $data = $request->all();
        $product = new Product($data['name'], $data['price'], $data['quantity'], $data['id']);
        $this->productRepository->update($product);
    }

    public function destroy(int $productId) : void
    {
        $this->productRepository->destroy($productId);
    }
}
