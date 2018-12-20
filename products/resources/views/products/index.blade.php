@extends('layouts.app')

@section('content')
    @if(Auth::user())
        <div class="container">
            <h2 class="text-center">Products List</h2>

            @if (\Session::has('success'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <p>{{ \Session::get('success') }}</p>
                </div><br/>
            @endif
            <div class="row mb-4">
                <div class="col-8 col-md-4">
                    <form action="{{route('products.index')}}" method="get">
                        <div class="input-group">
                            <input type="search" name="search" class="form-control" placeholder="Search">
                            <span class="input-group-prepend">
                        <button type="submit" class="btn btn-outline-primary">Search</button>
                    </span>
                        </div>
                    </form>
                </div>
                <div class="col-4 col-md-8">
                    <a href="{{route('products.create')}}" class="btn btn-info float-right btn-dark">
                        Create Product <i class="fa fa-plus"></i>
                    </a>
                </div>
            </div>

            <div class="table-responsive">
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
                        <tr id="productId-{{$product->id}}">
                            <td>{{$product->id}}</td>
                            <td>{{$product->title}}</td>
                            <td>{{$product->description}}</td>
                            <td><img src="storage/uploads/thumb/{{$product->image}}"></td>
                            <td data-mask="000.000,00" data-mask-reverse="true">{{$product->price}}</td>

                            <td>
                                <a href="{{route('products.edit', $product->id)}}" class="btn btn-warning">Edit</a>
                                <button class="delete btn btn-danger" onclick="deleteProduct({{$product->id}})"
                                        type="button">Delete
                                </button>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            {{ $products->links()}}
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
@section('scripts')
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
    <script>
        function deleteProduct(id) {
            $.ajaxSetup({
                headers:
                    {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
            });

            $.confirm({
                title: 'Delete!',
                content: 'you sure you want delete this product?',
                buttons: {
                    confirm: function () {
                        $.ajax({
                            type: "DELETE",
                            url: `/products/${id}`,
                            success: function (response) {
                                $.alert(response.message);
                                $(`#productId-${id}`).remove();
                            },
                        });
                    },
                    cancel: function () {
                        $.alert('Canceled!');
                    },
                }
            });
        }</script>
@endsection
