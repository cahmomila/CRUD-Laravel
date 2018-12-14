<?php
/**
 * Created by PhpStorm.
 * User: lets
 * Date: 16/11/2018
 * Time: 09:59
 */

namespace App\Traits;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Image;
use File;

trait UploadableTrait
{
    public function uploadImage(UploadedFile $file)
    {

        $imageName = time() . $file->getClientOriginalName();
        Storage::disk('public')->put('uploads/' . $imageName, $file->get());
        $this->uploadThumbnail($imageName);

        return $imageName;
    }

    public function uploadThumbnail($fileName)
    {
        $imagePath = Storage::disk('public')->path('uploads/' . $fileName);
        $thumb = Image::make($imagePath);
        $thumb->resize(100, 100)->save('storage/uploads/thumb/' . $fileName);

        return $thumb;
    }


    public function deleteUploadedFilesFor($product)
    {
        if (\Storage::disk('public')->exists('uploads/' . $product->image))
            \Storage::disk('public')->delete('uploads/' . $product->image);

        if (\Storage::disk('public')->exists($product->thumbnail))
            \Storage::disk('public')->delete($product->thumbnail);
    }

}
