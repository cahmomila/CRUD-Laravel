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
        $image_name = $this->uploadImage($file);

        $productData['image'] = $image_name;
        $productData['thumbnail'] = 'images/thumb/' . $image_name;

        $this->model->create($productData);

    }

    public function update($id, $productData)
    {
        $product = $this->find($id);
        $this->deleteIfExists($product);

        $image_name = $this->uploadImage($productData['image']);

        $productData['image'] = $image_name;
        $productData['thumbnail'] = 'images/thumb/' . $image_name;

        $product->update($productData);
    }

    public function delete($id)
    {
        $product = $this->find($id);
        $this->deleteIfExists($product);
        $product->delete();
    }


}
