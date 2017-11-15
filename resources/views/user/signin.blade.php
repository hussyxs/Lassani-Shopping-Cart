@extends('layouts.master')

@section('signin-content')
    <div class="card border-info">
        <h4 class="card-header">Sign In</h4> 
        <div class="card-body">
        @if (count($errors) > 0)
            <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <p>{{$error}}</p>
            @endforeach
            </div>
        @endif
            <h4 class="card-title"> Im hungry, are you ?</h4>
            <form action="{{route('user.signin')}}" method="post">
                <div class="form-group">
                    <label for="email" class="sr-only">Email address</label>
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <div class="input-group-addon"><i class="fa fa-at" aria-hidden="true"></i></div>
                        <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Email" required autofocus />
                    </div>
                    <small id="emailHelp" class="form-text text-muted hidden">
                        We'll never share your email with anyone else.
                    </small>
                </div>
                <div class="form-group">
                    <label for="password" class="sr-only">Password</label>
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <div class="input-group-addon"><i class="fa fa-key" aria-hidden="true"></i></div>
                        <input type="password" class="form-control" id="password" name="password" aria-describedby="passwordHelp" placeholder="Password" required autofocus />
                    </div>
                    <small id="passwordHelp" class="form-text text-muted hidden">
                        Your password must be 6-12 characters long, contain letters and numbers, and must not contain spaces, special characters, or emojis.
                    </small>
                </div>
                <button type="submit" class="btn btn-block btn-primary">Sign In</button>
                <p>Dont have an Account <a href="{{ route('user.signup') }}">Sign Up Instead!</a></p>
                {{csrf_field()}}
            </form>
        </div>
    </div>
@endsection