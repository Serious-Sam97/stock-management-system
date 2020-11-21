<?php

namespace App\Domain\Entities;

class Product
{
    private ?int $id;
    private string $name;
    private float $price;
    private int $quantity;

    public function __construct(string $name, float $price, int $quantity, ?int $id = null)
    {
        $this->nameValidator($name);
        $this->quantityValidator($quantity);
        $this->priceValidator($price);

        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->quantity = $quantity;
    }

    /**
     * @throws Exception
     */
    private function priceValidator(float $price) : bool
    {
        if($price >= 0){
            return true;
        }

        throw new \Exception('The price cannot be less than zero');
    }
    
    /**
     * @throws Exception
     */
    private function nameValidator(string $name) : bool
    {
        if(strlen($name) <= 255 && !empty($name)){
            return true;
        }

        throw new \Exception('The name must be less than 256 characters');
    }

     /**
     * @throws Exception
     */
    private function quantityValidator(int $quantity) : bool
    {
        if($quantity <= 999999 && $quantity >= 0){
            return true;
        }

        throw new \Exception('The quantity must be less than 1000000');
    }

    public function getName() : string
    {
        return $this->name;
    }

    public function setName(string $name) : void
    {
        $this->nameValidator($name);
        $this->name = $name;
    }

    public function getPrice() : float
    {
        return $this->price;
    }

    public function setPrice(float $price) : void
    {
        $this->priceValidator($price);
        $this->price = $price;
    }

    public function getQuantity() : int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity) : void
    {
        $this->quantityValidator($quantity);
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

    public function toResponse() : array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'price' => $this->price,
            'quantity' => $this->quantity,
        ];
    }
}