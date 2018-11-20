<?php
/**
 * Created by PhpStorm.
 * User: lets
 * Date: 16/11/2018
 * Time: 10:33
 */
namespace App\Repositories;

use App\Base\Repository;
use App\Models\Product;
use App\Traits\UploadsTraits;


class ProductsRepository  extends Repository
{
    use UploadsTraits;

    protected function getClass()
    {
        return Product::class;
    }

    public function createProduct($productData)
    {
        $file = $productData['image'];
        $image_name = $this->uploadImage($file);

        $this->model->create([
                'title' => $productData['title'],
                'description' => $productData['description'],
                'image' => $image_name,
                'thumbnail' => 'images/thumb/' . $image_name,
                'price' => $productData['price'],
            ]
        );

    }

    public function updateProduct($id, $productData)
    {
        $product = $this->find($id);
        $this->deleteIfExists($product);

        $image_name = $this->uploadImage($productData['image']);
        $product->update([
            'title' => $productData['title'],
            'description' => $productData['description'],
            'image' => $image_name,
            'thumbnail' => 'images/thumb/' . $image_name,
            'price' => $productData['price'],
        ]);

    }

    public function delete($id)
    {
        $product = $this->find($id);
        $this->deleteIfExists($product);
        $product->delete();
    }


}
