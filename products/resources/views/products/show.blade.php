@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3>Prodcut {{$product->id}}</h3>
            </div>
            <div class="card-body">
                <div class="media">
                    <div class="media-body mr-5 mt-2 text-center">
                        <button type="button" class="btn btn-light btn-lg btn-block">Title</button>
                        <h4 class="m-3">{{$product->title}}</h4>
                        <button type="button" class="btn btn-light btn-lg btn-block">Description</button>
                        <h4 class="m-3">{{$product->description}}</h4>
                        <button type="button" class="btn btn-light btn-lg btn-block">Price</button>
                        <h4 class="m-3" data-mask="000.000,00" data-mask-reverse="true">{{$product->price}}</h4>
                    </div>
                    <img src="/storage/uploads/thumb/{{$product->image}}">
                </div>
            </div>
        </div>
        <div>
            <a href="{{route('products.index')}}" class="mt-3 btn btn-dark"><i class="fa fa-arrow-left"></i> Go back</a>
@endsection
