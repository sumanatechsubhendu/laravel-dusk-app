<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\Product;

class ProductTest extends DuskTestCase
{
    public function testCreateProduct()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/products/create')
                    ->type('name', 'Test Product')
                    ->type('price', '100')
                    ->type('description', 'A test product description')
                    ->press('Save')
                    ->assertSee('Product created successfully.');

            $this->assertDatabaseHas('products', [
                'name' => 'Test Product',
            ]);
        });
    }

    public function testReadProducts()
    {
        $product = Product::factory()->create();

        $this->browse(function (Browser $browser) use ($product) {
            $browser->visit('/products')
                    ->assertSee($product->name)
                    ->clickLink($product->name)
                    ->assertPathIs('/products/' . $product->id);
        });
    }

    public function testUpdateProduct()
    {
        $product = Product::factory()->create([
            'name' => 'Old Product',
        ]);

        $this->browse(function (Browser $browser) use ($product) {
            $browser->visit('/products/' . $product->id . '/edit')
                    ->type('name', 'Updated Product')
                    ->press('Update')
                    ->assertSee('Product updated successfully.');

            $this->assertDatabaseHas('products', [
                'id' => $product->id,
                'name' => 'Updated Product',
            ]);
        });
    }

    public function testDeleteProduct()
    {
        $product = Product::factory()->create();

        $this->browse(function (Browser $browser) use ($product) {
            $browser->visit('/products')
                    ->press('@delete-button-' . $product->id)
                    ->assertSee('Product deleted successfully.');

            $this->assertDatabaseMissing('products', [
                'id' => $product->id,
            ]);
        });
    }
}
