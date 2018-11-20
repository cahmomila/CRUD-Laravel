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
use App\Repositories\ProductsRepository;
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
        $x = factory(\App\Models\Product::class, 1)->create();
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
        $params = ['product' => ['title' => 'flor', 'description' => 'rose', 'image' => $file, 'price' => 3.9 ]];
        $response = $this->actingAs($user)->post('/products', $params);
        $response->assertRedirect('/products');
    }

    public function  testWhenCallEditShouldResponse()
    {
        $user = factory(User::class)->create();
        $x = factory(\App\Models\Product::class)->create();
        $response = $this->actingAs($user)->get('products/'. $x->id .'/edit');
        $response->assertSuccessful();

    }

      public function testWhenCallAInvalidField()
    {
        $user = factory(User::class)->create();
        $x = factory(\App\Models\Product::class)->create();
        $params = ['title' => 'dasd', 'description' => 'sdada', 'price' => 'dasds'];
        $response = $this->actingAs($user)->put('products/' . $x->id , $params);
       $response->assertSessionHasErrors(['product.price']);
   }

   public function testWhenUpdate()
    {
        $user = factory(User::class)->create();
        $product = factory(Product::class)->create();

       $data = [
           'title' => 'teste',
           'description' => 'test',
           'price' => 9,
       ];

       $produc = \App\Models\Product::find($product->id);
       $response = $this->actingAs($user);
       $produc->update($data);

       $this->assertEquals($data['title'], $produc->title);
       $this->assertEquals($data['description'], $produc->description);
       $this->assertEquals($data['price'], $produc->price);


   }

   public function testWhenDestroyAProduct()
   {
       $x = factory(\App\Models\Product::class)->create();
       $params = ['title' => 'Teste', 'description' => 'rose', 'price' => 9];
       $response = $this->delete('products/' . $x->id);

       $this->assertDatabaseMissing('products',['id' => $x->id]);

   }




}
