@extends('layouts.layout')

@section('content')

<div class="jumbotron">
    <h2>Register</h2>

    @isset($errorMsg)
    <div class="alert alert-danger">
        {{ $errorMsg }}
    </div>
    @endisset

    @isset($errors)
        <div class="alert alert-danger">
            {{$errors}}
        </div>
    @endisset

    @isset($success)
    <div class="alert alert-success">
        {{ $success }}
    </div>
    @endisset

    <form method="POST" action="/registerSubmit">
        <div class="form-group ">
            <label for="firstname">First Name</label>
            <input type="text" class="form-control" id="firstname" name="firstname" placeholder="First Name" value="@isset($oldInput['firstname']) {{$oldInput['firstname']}} @endisset" required>
        </div>
        <div class="form-group">
            <label for="lastname">Last Name</label>
            <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Last Name" value="@isset($oldInput['lastname']) {{$oldInput['lastname']}} @endisset" required>
        </div>
        <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="@isset($oldInput['email']) {{$oldInput['email']}} @endisset" required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
        </div>
        <div class="form-group">
            <label for="password-confirm">Password</label>
            <input type="password" class="form-control" id="password-confirm" name="password-confirm" placeholder="Password Confirm" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

</div>

@endsection