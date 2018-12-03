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


class ProductsRepository extends Repository
{
    use UploadsTraits;

    protected function getClass()
    {
        return Product::class;
    }

    public function create($productData)
    {
        $file = $productData['image'];
        $imageName = $this->uploadImage($file);
        $price = $productData['price'];
        $price = str_replace('.', '', $price);
        $price = str_replace(',', '.', $price);
        $productData['price'] = $price;
        $productData['image'] = $imageName;
        $productData['thumbnail'] = 'images/thumb/' . $imageName;

        $this->model->create($productData);

    }

    public function update($id, $productData)
    {
        $product = $this->find($id);
        $this->deleteIfExists($product);

        $imageName = $this->uploadImage($productData['image']);
        $price = $productData['price'];
        $price = str_replace('.', '', $price);
        $price = str_replace(',', '.', $price);
        $productData['price'] = $price;
        $productData['image'] = $imageName;
        $productData['thumbnail'] = 'images/thumb/' . $imageName;

        $product->update($productData);
    }

    public function delete($id)
    {
        $product = $this->find($id);
        $this->deleteIfExists($product);
        $product->delete();
    }


}
