<?php

namespace App\Domain\Entities;

class ProductQuantityHistory
{
    private ?int $id;
    private int $productId;
    private int $quantity;

    public function __construct(?int $id, int $productId, int $quantity)
    {
        $this->id = $id;
        $this->productId = $productId;
        $this->quantity = $quantity;
    }

    public function getId() : int
    {
        return $this->id;
    }

    public function setId(int $id) : void
    {
        $this->id = $id;
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