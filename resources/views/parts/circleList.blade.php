<div class="p-circleList row">
    @foreach ($_circles as $circle)
        <div class="p-circleList__circle col-sm-3">
            <a href="{{route('circle.detail', ['circlePath' => $circle->path])}}" class="p-circleList__circleLink">
                <p class="p-circleList__circleName">name: {{$circle->name}}</p>
            </a>
        </div>
    @endforeach
</div>
