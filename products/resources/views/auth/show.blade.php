@extends('layouts.app')
<title>User</title>
@section('content')
    @if(Auth::user())
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <h3>User informations</h3>
                </div>
                <div class="card-body">
                    <form>
                        <fieldset disabled>
                            <div class="form-row">
                                <div class="col-md-4 mb-3">
                                    <label for="validationDefault01">Name</label>
                                    <input type="text" class="form-control" value="{{$user->name}}">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="validationDefault02">CPF</label>
                                    <input type="text" class="form-control" value="{{$user->cpf}}">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="validationDefaultUsername">Email</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">@</span>
                                        </div>
                                        <input type="text" class="form-control" value="{{$user->email}}">
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <a class="mt-3 btn btn-outline-info float-right" href="{{route('edit', $user->id)}}">Update
                            account</a>
                    </form>
                </div>
            </div>
            <button value="Voltar" onclick="history.go(-1)" class="mt-3 btn btn-dark"><i class="fa fa-arrow-left"></i> Go back</button>
        </div>
    @else
        <div class="text-center">
            <i style="font-size: 100px" class="material-icons">
                block
            </i>
            <h1>You must be logged for access this page!</h1>
            <a href="{{route('home')}}" class="btn btn-danger btn-lg active" role="button" aria-pressed="true">Go to
                login page</a>
        </div>
    @endif
@endsection
