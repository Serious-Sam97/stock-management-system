<?php

namespace Tests\Unit;

use App\Domain\Entities\Product;
use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{

    /**
     * @dataProvider validProductsProvider
     */
    public function testProductsValidValidations(array $productProvider) : void
    {
        $product = new Product($productProvider[0], $productProvider[1], $productProvider[2]);
        $this->assertInstanceOf(Product::class, $product);
        $this->assertObjectHasAttribute('id', $product);  
    }

    /**
     * @dataProvider wrongProductsProvider
     */
    public function testValidateWrongValues(array $productProvider) : void
    {
        $this->expectException(\Exception::class);
        new Product($productProvider[0], $productProvider[1], $productProvider[2]);
    }

    /**
     * @dataProvider wrongProductsTypeProvider
     */
    public function testValidateWrongTypes(array $productProvider) : void
    {
        $this->expectException(\TypeError::class);
        new Product($productProvider[0], $productProvider[1], $productProvider[2]);
    }

    public function validProductsProvider(){
        return [
            [
                ['Intel Core i7 9700K 3.60GHz', 2791.95, 1]
            ],
            [
                ['Galax, GeForce, GTX 1650 EX PLUS', 1259.00, 35]
            ],
            [
                ['Asus TUF GAMING B460M-PLUS', 952.87, 0, null]
            ],
            [
                ['DDR4 Hikvision, 8GB 3000MHz', 297.70, 99999, 32]
            ],
            [
                ['SSD Hikvision C100', 15555566.55, 645, 0]
            ]
        ];
    }

    public function wrongProductsProvider(){
        return [
            [
                ['', 2791.95, 1]
            ],
            [
                ['', 1259.00, -35]
            ],
            [
                ['Asus TUF GAMING B460M-PLUS', 99999999999999999, -5, null]
            ],
            [
                ['DDR4 Hikvision, 8GB 3000MHz', -54, 99999, 32]
            ],
        ];
    }

    public function wrongProductsTypeProvider(){
        return [
            [
                [null, '1259', 'test']
            ],
        ];
    }
}
