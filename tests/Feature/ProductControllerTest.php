<?php

namespace Tests\Feature;

use App\Infrastructure\Repositories\Product;
use Database\Factories\ProductFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductControllerTest extends TestCase
{
    use RefreshDatabase;
    
    public function testGetAllProducts()
    {
        $this->get('/api/products')
        ->assertSuccessful();
    }

    /**
     * @dataProvider validProductsProvider
     */
    public function testStoreProduct(array $product)
    {
        $this->post('/api/products', $product)
        ->assertSuccessful();

        $this->assertDatabaseHas('products', $product);
    }

    /**
     * @dataProvider wrongProductsProvider
     */
    public function testStoreProductWithWrongProducts(array $product)
    {
        $this->post('/api/products', $product);

        $this->assertDatabaseMissing('products', $product);
    }

    public function testUpdateProduct()
    {
        $databaseProduct = Product::factory()->create();

        $this->put("/api/products/$databaseProduct->id", [
            'id' => $databaseProduct->id,
            'name' => 'NAME TEST FOR UPDATE',
            'price' => 2,
            'quantity' => 54
        ])->assertSuccessful();

        $this->assertDatabaseHas('products', [
            'id' => $databaseProduct->id,
            'name' => 'NAME TEST FOR UPDATE',
            'price' => 2,
            'quantity' => 54
        ]);
    }

    public function testDeleteProduct()
    {
        $databaseProduct = Product::factory()->create();

        $this->delete("/api/products/$databaseProduct->id", $databaseProduct->toArray())
        ->assertSuccessful();

        $this->assertDatabaseMissing('products', $databaseProduct->toArray());
    }

    public function validProductsProvider(){
        return [
            [
                ['name' => 'Intel Core i7 9700K 3.60GHz', 'price' => 2791.95, 'quantity' => 1]
            ],
            [
                ['name' => 'Galax, GeForce, GTX 1650 EX PLUS', 'price' => 1259.00, 'quantity' => 35]
            ],
        ];
    }

    public function wrongProductsProvider(){
        return [
            [
                ['name' => '', 'price' => 2791.95, 'quantity' => 1]
            ],
            [
                ['name' => 'Asus TUF GAMING B460M-PLUS', 'price' => 952.87, 'quantity' => -50]
            ],
        ];
    }
}
