<div class="p-circleList">
    @foreach ($_circles as $circle)
        <div class="p-circleList__circle">
            <a href="{{route('circle.detail', ['circlePath' => $circle->path])}}" class="p-circleList__circleLink"
                @if($circle->thumbnail_path)
                    style="background-image:url({{config( 'constants.CIRCLE_IMAGE_STORAGE_DIRECTORY' ) . $circle->thumbnail_path}});"
                @endif
            >
                <p class="p-circleList__circleName">
                  <span class="p-circleList__circleNameText">
                    {{$circle->name}}
                  </span>
                </p>
            </a>
        </div>
    @endforeach
</div>
