<?php

namespace App\Http\Controllers;

use App\Http\Request\ProductRequest;
use App\Http\Services;
use Illuminate\Http\Request;
use App\Repositories\ProductsRepository;
use App\Repositories\Criterias\Where;
use Image;
use File;

class ProductController extends Controller
{

    public function index(ProductsRepository $productRepository, Request $request)
    {
        if ($request->get('search')) {
            $search = $request->get('search');
            $products = $productRepository
                ->pushCriteria(new Where('title', 'like', $search . '%'))
                ->paginate(15);
        } else {
            $products = $productRepository->paginate(15);
        }
        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function edit($id, ProductsRepository $productRepository)
    {
        $product = $productRepository->find($id);
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

    public function show($id, ProductsRepository $productsRepository)
    {
        $product = $productsRepository->find($id);

        return view('products.show', compact('product', 'id'));
    }

//    public function welcome()
//    {
//        return view('email.welcome');
//    }


    public function destroy($id, ProductsRepository $productRepository)
    {
        try {
            $productRepository->delete($id);
            return response()->json(['success' => true]);

        } catch (Exception $e) {
            return response()->json(['error' => true], 500);
        }

    }


}
