@extends('layouts.app')
<title>Home</title>

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Create Products</h5>
                        <p class="card-text">Page to add a new product</p>
                        <a href="{{route('products.create')}}" class="btn btn-outline-danger btn-lg btn-block">Go to
                            Create
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">List of products</h5>
                        <p class="card-text">Here you can see the products created and added to the list</p>
                        <a href="{{route('products.index')}}" class="btn btn-outline-danger btn-lg btn-block">Go to the
                            list</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
