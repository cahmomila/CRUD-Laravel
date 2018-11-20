
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>List</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-dark bg-dark">
    <ul class="nav nav-pills">
        <li class="nav-item">
            <a class="nav-link active bg-white text-dark" href="{{action('HomeController@index')}}">Home</a>
        </li>
</nav>
<div class="container">
    <br>
    <h2 class="text-center">Products List</h2>
    <br/>
    @if (\Session::has('success'))
        <div class="alert alert-success">
            <p>{{ \Session::get('success') }}</p>
        </div><br />
    @endif
    <a href="{{action('ProductController@create')}}" class="btn btn-info float-right btn-dark"> <i class="material-icons">add</i></a>
    <table class="table table-striped">
        <thead class="thead-dark">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Title</th>
            <th scope="col">Description</th>
            <th scope="col">Thumbnail</th>
            <th scope="col">Price</th>
            <th scope="col" colspan="2">Action</th>
        </tr>
        </thead>
        <tbody>

        @foreach($products as $product)
            <tr>
                <td>{{$product['id']}}</td>
                <td>{{$product['title']}}</td>
                <td>{{$product['description']}}</td>
                <td><img src="storage/images/thumb/{{$product['image']}}"></td>
                <td>{{$product['price']}}</td>

            <td><a href="{{action('ProductController@edit', $product['id'])}}" class="btn btn-warning">Edit</a></td>
                <td>
                    <form action="{{action('ProductController@destroy', $product['id'])}}" method="post">
                        @csrf
                        <input name="_method" type="hidden" value="DELETE">
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
</body>
</html>
