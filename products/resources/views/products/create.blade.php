@extends('layouts.app')
<title>Create Product</title>
@section('content')
    @if(Auth::user())
        <div class="container">
            <br>
            <h2 class="text-center">Product</h2>

            @if(isset($errors))
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            @endif
            <form method="post" action="{{route('products.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="form-group col-md-4">
                        <label for="title">Title:</label>
                        <input type="text" class="form-control" value="{{ old('product.title') ?? '' }}"
                               name="product[title]">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="form-group col-md-4">
                        <label for="description">Description:</label>
                        <input type="text" class="form-control" value="{{ old('product.description') ?? '' }}"
                               name="product[description]">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="form-group col-md-4">
                        <label for="image">Image:</label>
                        <input type="file" name="product[image]">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="form-group col-md-4">
                        <label for="price">Price:</label>
                        <input type="text" class="form-control" id="dinheiro" value="{{ old('product.price') ?? '' }}"
                               name="product[price]">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="form-group col-md-4" style="margin-top:60px">
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    @else
        <div style="text-align: center">
            <i style="font-size: 100px" class="material-icons">
                block
            </i>
            <h1>You must be logged for access this page!</h1>
            <a href="{{route('home')}}" class="btn btn-danger btn-lg active" role="button" aria-pressed="true">Go to
                login page</a>
        </div>
    @endif
@endsection
