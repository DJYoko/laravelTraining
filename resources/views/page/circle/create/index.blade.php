@extends('_layout.base', ['title' => 'サークル登録'])

@section('content')
<div class="container py-5">
  <h1>サークル登録</h1>
  @if ($errors->any())
  <div class="alert alert-danger" dusk="circleCreatePageAlert">
    @foreach ($errors->all() as $error)
    <div>{{ $error }}</div>
    @endforeach
  </div>
  @endif
  <form action="{{route('circle.create.save')}}" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="{{ csrf_token() }}" dusk="circleCreateFormInputToken" />

    <div class="form-group">
      <label for="circleName">名前</label>
      <input type="text" class="form-control" id="circleName" aria-describedby="circleNameHelp" placeholder="表示名" name="circleName" value="{{ \Auth::user()->name}}のサークル" dusk="circleCreateFormInputName">
      <small id="circleNameHelp" class="form-text text-muted">表示されるサークル名を入力します</small>
    </div>
    <div class="form-group">
      <label for="circleDescription">説明</label>
      <input type="text" class="form-control" id="circleDescription" aria-describedby="circleDescriptionHelp" placeholder="表示名" name="circleDescription" value="{{ \Auth::user()->name}}が作成したサークルです" dusk="circleCreateFormInputDescription">
      <small id=" circleDescriptionHelp" class="form-text text-muted">サークル概要を入力します</small>
    </div>
    <div class="form-group">
      <label for="circlePath">URL</label>
      <input type="text" class="form-control" id="circlePath" aria-describedby="circlePathHelp" placeholder="表示名" name="circlePath" value="" dusk="circleCreateFormInputPath">
      <small id="circlePathHelp" class="form-text text-muted">当サイト内でのURLを入力します<br>例） http://????.com/circle/<strong>[この部分]</strong></small>
    </div>
    <div class="form-group">
      <label for="circleImage">アイコン画像</label>
      <div>
        <input type="file" class="" id="circleImage" aria-describedby="circleImageHelp" placeholder="表示名" name="circleImage" value="{{ \Auth::user()->name}}" dusk="circleCreateFormInputImage">
      </div>
      <small id="circleImageHelp" class="form-text text-muted">アイコン画像を選択します</small>
    </div>
    <div class="text-center">
      <button type="submit" class="btn btn-primary" dusk="circleCreateFormButtonSubmit">送信</button>
    </div>
  </form>
</div>
@endsection

@section('js')
@endsection
