<ul>
    @foreach($fruits as $fruit)
        <li>
            {{ $fruit->name }} : ￥{{ $fruit->price }}
        </li>
    @endforeach
</ul>
