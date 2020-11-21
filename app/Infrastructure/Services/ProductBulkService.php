<?php

namespace App\Infrastructure\Services;

use App\Domain\Entities\Product;
use App\Domain\Repositories\ProductRepositoryInterface;
use App\Domain\Services\ProductBulkServiceInterface;

class ProductBulkService implements ProductBulkServiceInterface
{
    private ProductRepositoryInterface $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function bulkProducts(array $products) : void
    {
        foreach($products as $product){
            if($product['id'] === 0){
                $productDomain = new Product($product['name'], $product['price'], $product['quantity']);
                $this->productRepository->store($productDomain);
                continue;
            }
            $product = new Product($product['name'], $product['price'], $product['quantity'], $product['id']);
            $this->productRepository->update($product);
        }
    }
}