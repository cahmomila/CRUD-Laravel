@extends('layouts.app')

@section('content')
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
        <a href="{{route('home')}}" class="mt-3 btn btn-dark"><i class="fa fa-arrow-left"></i> Go back</a>
    </div>
@endsection
