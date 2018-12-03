<?php
/**
 * Created by PhpStorm.
 * User: lets
 * Date: 13/11/2018
 * Time: 11:21
 */

namespace App\Http\Request;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'product.title' => 'required',
            'product.description' => 'required',
            'product.image' => 'required|image',
            'product.price' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'product.title.required' => 'The title field is required',
            'product.description.required' => 'The description field is required',
            'product.image.required' => 'The image field is required',
            'product.image.image' => 'The image field must be an image (jpeg, png, bmp, gif, or svg)',
            'product.price.required' => 'The price field is required',
        ];
    }
}
