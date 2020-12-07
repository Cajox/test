@extends('layouts.layout')

@section('content')

@if($_SESSION['user'])
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center"><h3>Citrus Catalog</h3></div>
        </div>

        @if($items)
            <div class="row flex">
                <div class="col-md-12">
                    <div class="mx-auto" id="grid">
                        @foreach($items as $item)
                        <div class="col-sm-4">
                            <div class="card" style="width: 30rem;">
                                <img style="height: 25rem;" class="img-thumbnail img-responsive" src="{{ $item['image'] }}">
                                <div class="">
                                    <h4 class="text-center"><b>Naslov slike</b>: {{ $item['product_title'] }}</h4>
                                    <p class="text-center"><b>Opis slike</b>: {{ $item['description'] }}</p>
                                    <p class="text-center"><b>Kompanija</b>: {{ $item['company_name'] }}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

            @include('pagination.index')
            @include('comment.index')

    @else
            <div class="row">
                <div class="col-md-12 text-center"><h3><b>Catalog doesnt have items!</b></h3></div>
            </div>
        @endif
        <hr>
        </div>
    @else
        <div class="jumbotron">
        <h1>Citrus catalog</h1>
        <p>
            This is simple script. You can register and login. If you are logged, you can see all products.
        </p>
        <p>
            <a class="btn btn-primary btn-lg" href="/login" role="button">Login</a>
            <a class="btn btn-primary btn-lg" href="/register" role="button">Register</a>
        </p>
    </div>
@endif
@endsection