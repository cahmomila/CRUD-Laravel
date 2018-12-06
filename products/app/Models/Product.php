<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'title',
        'description',
        'image',
        'thumbnail',
        'price',
    ];

    public function getLink()
    {
        Storage::disk('public')->url('uploads/');
    }
}
