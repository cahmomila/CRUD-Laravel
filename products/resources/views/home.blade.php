@extends('layouts.app')
<link rel="stylesheet" href="{{asset('css/app.css')}}">
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">


                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                        <div class="card">
                            <a class="btn btn-outline-danger" href="{{action('ProductController@create')}}" role="button">Create Products</a>
                            <a class="btn btn-outline-danger" href="{{action('ProductController@index')}}" role="button">List Products</a>
                        </div>
        </div>
    </div>
</div>
@endsection
