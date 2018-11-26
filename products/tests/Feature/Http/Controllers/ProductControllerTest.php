<?php
/**
 * Created by PhpStorm.
 * User: lets
 * Date: 12/11/2018
 * Time: 13:45
 */

namespace Tests\Feature\Http\Controllers;

use App\Models\Product;
use App\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;


class ProductControllerTest extends TestCase
{

    public function testWhenCallGetIndexShouldResponseStatusOk()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)->get('/products');
        $response->assertSuccessful();
    }

    public function testWhenReturnIndexPage()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)->get('/products');
        $response->assertViewIs("index");
    }

    public function testWhenCallGetIndexShouldContainsProducts()
    {
        $product = factory(\App\Models\Product::class, 1)->create();
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)->get('/products');
        $response->assertViewHas('products');

    }

    public function testWhenCallCreatePage()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)->get('/products/create');
        $response->assertSuccessful();
    }


    public function testWhenParamsAreValidShouldCreateANewProduct()
    {
        $user = factory(User::class)->create();
        Storage::fake('public');
        $file = UploadedFile::fake()->image('avatar.jpg');
        $params = ['product' => ['title' => 'flor', 'description' => 'rose', 'image' => $file, 'price' => 3.9]];
        $response = $this->actingAs($user)->post('/products', $params);
        $response->assertRedirect('/products');
    }

    public function testWhenCallEditShouldResponse()
    {
        $user = factory(User::class)->create();
        $product = factory(\App\Models\Product::class)->create();
        $response = $this->actingAs($user)->get('products/' . $product->id . '/edit');
        $response->assertSuccessful();

    }

    public function testWhenCallAInvalidField()
    {
        $user = factory(User::class)->create();
        $product = factory(\App\Models\Product::class)->create();
        $params = ['title' => 'dasd', 'description' => 'sdada', 'price' => 'dasds'];
        $response = $this->actingAs($user)->put('products/' . $product->id, $params);
        $response->assertSessionHasErrors(['product.price']);
    }

    public function testWhenUpdate()
    {
        $user = factory(User::class)->create();
        $product = factory(Product::class)->create();

        $params = ['product' => ['title' => 'teste', 'description' => 'test', 'price' => 9]];

        $response = $this->actingAs($user)->put('products/' . $product->id, $params);

        $productUpdate = \App\Models\Product::find($product->id);

        $response->assertStatus(302);

    }

    public function testWhenDestroyAProduct()
    {
        $product = factory(\App\Models\Product::class)->create();
        $params = ['title' => 'Teste', 'description' => 'rose', 'price' => 9];
        $response = $this->delete('products/' . $product->id);

        $this->assertDatabaseMissing('products', ['id' => $product->id]);

    }


}