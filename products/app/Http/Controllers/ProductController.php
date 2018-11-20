<?php

namespace App\Http\Controllers;

use App\Http\Request\ProductRequest;
use App\Http\Services;
use App\Repositories\ProductsRepository;
use Illuminate\Http\Request;
use Image;
use File;
use App\Traits\UploadsTraits;



class ProductController extends Controller
{
    use UploadsTraits;

    public function index()
    {
        $products = \App\Models\Product::all();
        return view('index', compact('products'));
    }

    public function create()
    {
        return view('create');
    }


    public function edit($id)
    {
        $product = \App\Models\Product::find($id);
        return view('edit', compact('product', 'id'));
    }

    public function store(ProductRequest $request, ProductsRepository $productRepository)
    {
        $productRepository->createProduct($request->product);

        return redirect('products')->with('success', 'information added');
    }

    public function update(ProductRequest $request, ProductsRepository $productRepository, $id)
    {
            $productRepository->updateProduct($id, $request->product);

        return redirect('products');
    }


    public function destroy($id, ProductsRepository $productRepository)
    {
       $productRepository->delete($id);
        return redirect('products')->with('success', 'information added');
    }

}
