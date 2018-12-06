@extends('layouts.app')

@section('content')
    <div class="container">
        <br>
        <h2 class="text-center">Products List</h2>
        <br/>
        @if (\Session::has('success'))
            <div class="alert alert-success">
                <p>{{ \Session::get('success') }}</p>
            </div><br/>
        @endif
        <a href="{{route('products.create')}}" class="btn btn-info float-right btn-dark"> <i
                class="material-icons">add</i></a>
        <table style="text-align: center" class="table table-striped table-hover">
            <thead class="thead-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Thumbnail</th>
                <th scope="col">Price(R$)</th>
                <th scope="col" colspan="2">Action</th>
            </tr>
            </thead>
            <tbody>

            @foreach($products as $product)
                <tr>
                    <td>{{$product->id}}</td>
                    <td>{{$product->title}}</td>
                    <td>{{$product->description}}</td>
                    <td><img src="storage/uploads/thumb/{{$product->image}}"></td>
                    <td data-mask="000.000,00" data-mask-reverse="true">{{$product->price}}</td>

                    <td><a href="{{route('products.edit', $product->id)}}" class="btn btn-warning">Edit</a></td>
                    <td>
                        <form action="{{route('products.destroy', $product->id)}}" method="post">
                            @csrf
                            <input name="_method" type="hidden" value="DELETE">
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $products->links() }}

    </div>
@endsection
