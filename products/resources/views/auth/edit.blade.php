@extends('layouts.app')
<title>Edit User</title>
@section('content')
    @if(Auth::user())
        <div class="container">
            @if(Session::get('status'))
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <p>{{ \Session::get('status') }}</p>
                </div>
            @endif
            <div class="row justify-content-center">
                <div class="col-md-8">

                    <div class="card">
                        <div class="card-header">Update register</div>

                        <div class="card-body">
                            <form method="POST" action="{{route('update', $user->id)}}"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="btn btn-light btn-lg btn-block"> Update Informations</div>
                                <div class="pt-3 form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text"
                                               class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                               name="name" value="{{$user->name}}" required autofocus>

                                        @if ($errors->has('name'))
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="email"
                                           class="col-md-4 col-form-label text-md-right">E-Mail Address</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email"
                                               class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                               name="email" value="{{$user->email}}" required>

                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="mt-5 btn btn-light btn-lg btn-block"> Update password</div>
                                <div class="text-muted text-center">(Just type it if you want change you password)</div>
                                <div class="pt-3 form-group row">
                                    <label for="password"
                                           class="col-md-4 col-form-label text-md-right">Password</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password"
                                               class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                               name="password">

                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password-confirm"
                                           class="col-md-4 col-form-label text-md-right">Confirm Password</label>

                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control"
                                               name="password_confirmation">
                                    </div>
                                </div>
                                <div class="mt-5 btn btn-light btn-lg btn-block"> Confirm your
                                    current password to update
                                </div>

                                <div class="pt-3 form-group row">
                                    <label for="password-update"
                                           class="col-md-4 col-form-label text-md-right">Password</label>

                                    <div class="col-md-6">
                                        <input id="password-update" type="password" class="form-control"
                                               name="password-update" required>
                                    </div>
                                </div>
                                <div class="p-3 form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-success">
                                            Update
                                        </button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                    <form id="deleteForm" action="{{route('delete', $user->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="delete btn btn-danger float-right mt-3"
                                onclick="deleteUser(event)"
                                type="submit">Delete account
                        </button>
                    </form>
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
            <a href="{{route('home')}}" class="btn btn-danger btn-lg active" role="button" aria-pressed="true">Go to
                login page</a>
        </div>
    @endif
@endsection
@section('scripts')
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
    <script>
        function deleteUser(event) {
            event.preventDefault();
            $.confirm({
                title: 'Delete!',
                content: 'you sure you want delete user?',
                buttons: {
                    confirm: function () {
                        return $('#deleteForm').submit();
                    },

                    cancel: function () {
                        $.alert('Canceled!');
                    },
                }
            });
        }</script>
@endsection


