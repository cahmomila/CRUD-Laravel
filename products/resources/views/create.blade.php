<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Create</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
<nav class="navbar navbar-dark bg-dark">
    <ul class="nav justify-content-end">
        <li class="nav-item">
            <a class="nav-link active" href="{{action('HomeController@index')}}">Home</a>
        </li>
    </ul>
</nav>
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
    <form method="post" action="{{url('products')}}" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="Name">Title:</label>
                <input type="text" class="form-control" name="product[title]">
            </div>
        </div>

        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="Name">Description:</label>
                <input type="text" class="form-control" name="product[description]">
            </div>
        </div>

        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <input type="file" name="product[image]">
            </div>
        </div>

        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="Name">Price:</label>
                <input type="text" class="form-control" name="product[price]">
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
</body>
</html>
