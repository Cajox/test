@extends('layouts.layout')

@section('content')
@if($_SESSION['user']['role'] == 'admin')

    @if($comments)

        <h1 style="padding-bottom: 50px" class="text-center">Comments</h1>

        <table class="table">
            <thead>
            <tr>
                <th class="text-center">Product Ttile</th>
                <th class="text-center">Text</th>
                <th class="text-center">User account name</th>
                <th class="text-center">Name from form</th>
                <th class="text-center">Email from form</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($comments as $comment)
            <tr>
                <td class="text-center">{{$comment['product_title']}}</td>
                <td class="text-center">{{$comment['text']}}</td>
                <td class="text-center">{{$comment['firstname']}}</td>
                <td class="text-center">{{$comment['name']}}</td>
                <td class="text-center">{{$comment['email']}}</td>
                <td class="text-center">

                    @if($comment['active'] == 1)

                    <form method="post" action="/update/comment/active">

                        <input type="hidden" name="id" value="{{$comment['id']}}">
                        <input type="hidden" name="active" value="0">

                        <div class="form-group">
                            <input type="submit" class="btn btn-danger" value="Deaktiviraj">

                        </div>

                    </form>

                    @else

                    <form method="post" action="/update/comment/active">

                        <input type="hidden" name="id" value="{{$comment['id']}}">
                        <input type="hidden" name="active" value="1">

                        <div class="form-group">
                            <input type="submit" class="btn btn-info" value="Aktiviraj">
                        </div>

                    </form>

                    @endif

                </td>
            </tr>
            @endforeach
            </tbody>
        </table>

    @else
    <h1 class="text-center">No comments</h1>
    @endif

@else
    <h1 class="text-center">No permision</h1>
@endif
@endsection
