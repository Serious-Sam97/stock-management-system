<?php

namespace App\Domain\Entities;

class Product
{
    private ?int $id;
    private string $name;
    private float $price;
    private int $quantity;

    public function __construct(string $name, float $price, int $quantity, ?int $id)
    {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->quantity = $quantity;
    }

    public function getName() : string
    {
        return $this->name;
    }

    public function setName(string $name) : void
    {
        $this->name = $name;
    }

    public function getPrice() : float
    {
        return $this->price;
    }

    public function setPrice(float $price) : void
    {
        $this->price = $price;
    }

    public function getQuantity() : int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity) : void
    {
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
}