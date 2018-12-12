<?php

namespace App\Http\Controllers;

use App\Http\Request\ProductRequest;
use App\Http\Services;
use Illuminate\Http\Request;
use App\Repositories\ProductsRepository;
use Image;
use File;

class ProductController extends Controller
{

    public function index(ProductsRepository $repository)
    {
        $products = (new ProductsRepository())->paginate(15);
        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $product = \DB::table('products')->where('title', 'like', '%' . $search . '%')->paginate(5);
        return view('products.index', ['products' => $product]);
    }


    public function edit($id)
    {
        $product = (new ProductsRepository())->find($id);
        return view('products.edit', compact('product', 'id'));
    }

    public function store(ProductRequest $request, ProductsRepository $productRepository)
    {
        $productRepository->create($request->product);


        return redirect('products')->with('success', 'information added');
    }

    public function update(ProductRequest $request, ProductsRepository $productRepository, $id)
    {
        $productRepository->update($id, $request->product);

        return redirect('products')->with('success', 'information updated');
    }


    public function destroy($id, ProductsRepository $productRepository)
    {
        $productRepository->delete($id);
        return redirect('products')->with('success', 'information removed');
    }

}
