@extends('layout')


@section('content')


<div class="mx-auto w-75 py-5">
    <ul>
        @foreach($fruits as $fruit)
            <li>
                {{ $fruit->name }} : ￥{{ $fruit->price }}
            </li>
        @endforeach
    </ul>
</div>


@endsection