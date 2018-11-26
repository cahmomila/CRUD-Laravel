<?php

namespace App\Http\Controllers;

use App\Http\Request\ProductRequest;
use App\Http\Services;
use App\Repositories\ProductsRepository;
use Image;
use File;


class ProductController extends Controller
{

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
        $productRepository->create($request->product);

        return redirect('products')->with('success', 'information added');
    }

    public function update(ProductRequest $request, ProductsRepository $productRepository, $id)
    {
        $productRepository->update($id, $request->product);

        return redirect('products');
    }


    public function destroy($id, ProductsRepository $productRepository)
    {
        $productRepository->delete($id);
        return redirect('products')->with('success', 'information added');
    }

}
