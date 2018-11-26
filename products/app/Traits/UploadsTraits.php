<?php
/**
 * Created by PhpStorm.
 * User: lets
 * Date: 16/11/2018
 * Time: 09:59
 */

namespace App\Traits;

use Illuminate\Http\UploadedFile;
use Image;
use File;

trait UploadsTraits
{
    public function uploadImage(UploadedFile $file)
    {

        $image_name = time() . $file->getClientOriginalName();
        $file->move('storage/images/', $image_name);
        $thumbnail_name = Image::make('storage/images/' . $image_name)->resize(100, 100)->save('storage/images/thumb/' . $image_name);

        return $image_name;
    }

    public function deleteIfExists($product)
    {
        if (\Storage::disk('public')->exists('images/' . $product->image))
            \Storage::disk('public')->delete('images/' . $product->image);

        if (\Storage::disk('public')->exists($product->thumbnail))
            \Storage::disk('public')->delete($product->thumbnail);
    }

}
