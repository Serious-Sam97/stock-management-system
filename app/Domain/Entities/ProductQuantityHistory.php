<?php

namespace App\Domain\Entities;

class ProductQuantityHistory
{
    private int $productId;
    private int $quantity;

    public function __construct(int $productId, int $quantity)
    {
      $this->productId = $productId;
      $this->quantity = $quantity;
    }

    public function getProductId() : int
    {
        return $this->productId;
    }

    public function setProductId(int $productId) : void
    {
        $this->productId = $productId;
    }

    public function getQuantity() : int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity) : void
    {
        $this->quantity = $quantity;
    }
}