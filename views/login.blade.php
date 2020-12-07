@extends('layouts.layout')

@section('content')
<div class="jumbotron">
    @auth()
        easdfasdfdasfd
    @endauth
    <h2>Login</h2>

    @isset($errors)
        <div class="alert alert-danger">
            {{$errors}}
        </div>
    @endisset

    @isset($errorMsg)
    <div class="alert alert-danger">
        {{$errorMsg}}
    </div>
    @endisset

    <form method="POST" action="/loginSubmit">
        <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="@isset($oldInput['email']) {{$oldInput['email']}} @endisset">
        </div>
        <div class="form-group ">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Password"  value="">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

</div>
@endsection
