@extends('layouts.app')
<title>Create Product</title>
@section('content')
    @if(Auth::user())
        <div class="container">

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
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header"><h2 class="text-center">Create Product</h2></div>

                        <div class="card-body">
                            <form method="post" action="{{route('products.store')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row pt-3">
                                    <label for="title"
                                           class="col-sm-4 col-form-label text-md-right">Title:</label>

                                    <div class="col-md-4">
                                        <input class="form-control" type="text"
                                               name="product[title]" value="{{ old('product.title') ?? '' }}">
                                    </div>
                                </div>
                                <div class="form-group row pt-3">
                                    <label for="description"
                                           class="col-sm-4 col-form-label text-md-right">Description:</label>
                                    <div class="col-md-4">
                                        <input class="form-control" type="text"
                                               name="product[description]"
                                               value="{{ old('product.description') ?? '' }}">
                                    </div>
                                </div>
                                <div class="form-group row pt-3">
                                    <label for="image"
                                           class="col-sm-4 col-form-label text-md-right">Image:</label>
                                    <div class="col-md-4">
                                        <input type="file" name="product[image]">
                                    </div>
                                </div>
                                <div class="form-group row pt-3">
                                    <label for="price"
                                           class="col-sm-4 col-form-label text-md-right">Price:</label>
                                    <div class="col-md-4">
                                        <input id="dinheiro" class="form-control" type="text"
                                               name="product[price]" value="{{ old('product.price') ?? '' }}">
                                    </div>
                                </div>
                                <div class="p-3 form-group row">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-success">
                                            Create
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <button value="Voltar" onclick="history.go(-1)" class="mt-3 btn btn-dark"><i class="fa fa-arrow-left"></i> Go back</button>
                </div>
            </div>
        </div>
    @else
        <div class="text-center">
            <i style="font-size: 100px" class="material-icons">
                block
            </i>
            <h1>You must be logged for access this page!</h1>
            <a href="{{route('home')}}" class="btn btn-danger btn-lg active" role="button"
               aria-pressed="true">Go to
                login page</a>
        </div>
    @endif
@endsection
