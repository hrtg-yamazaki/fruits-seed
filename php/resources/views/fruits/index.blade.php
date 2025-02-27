@extends('layout')


@section('content')


<div class="mx-auto w-75 py-5">
    <div class="card">
        <div class="card-body">
            <h3 class="text-dark text-center mb-3">
                Fruits list
            </h3>
            @if($fruits->toArray())
                <table class="table table-striped text-center" border="1">
                    <thead class="thead-dark">
                        <tr>
                            <th>name</th>
                            <th>price</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                            @foreach($fruits as $fruit)
                                <tr>
                                    <td>{{ $fruit->name }}</td>
                                    <td>{{ $fruit->price }}</td>
                                </tr>
                            @endforeach
                        
                    </tbody>
                </table>
            @else
                <p>No fruits here.</p>
                <p>Please exec: "make seed".</p>
            @endif
        </div>
    </div>
</div>


@endsection
