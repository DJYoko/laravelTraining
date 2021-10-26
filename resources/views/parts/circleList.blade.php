<div class="p-circleList">
    @foreach ($_circles as $circle)
        <div class="p-circleList__circle">
            <a href="{{route('circle.detail', ['circlePath' => $circle->path])}}" class="p-circleList__circleLink">
                <p class="p-circleList__circleName">{{$circle->name}}</p>
            </a>
        </div>
    @endforeach
</div>
