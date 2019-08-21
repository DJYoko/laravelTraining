@extends('_layout.base')
@section('css')
@endsection
@section('content')
<div class='container'>
  <h1>Home</h1>
  @if(Auth::check()) Hello {{ \Auth::user()->name}}

  <div class='bg-light p-3 mb-3'>
    <form id='vote-create-form'>
        <button class='btn btn-primary' type='button'>
        Create
        </button>
    </form>
  </div>

  <div class='bg-light p-3 mb-3'>
    <form id='vote-delete-form'>
        <input class='form-control' type='text' id='delete-target-ids'>
        <button class='btn btn-primary' type='button'>
        delete
        </button>
    </form>
  </div>

  <div class='bg-light p-3 mb-3'>
    <button class='btn btn-primary' type='button' id='get-data-button'>
            Get
    </button>
    <pre id='get-result'></pre>
  </div>

  @else Guest User | <a href='/auth/register'></a>
  @endif
</div>
@endsection
@section('js')

<script src="{{ asset('/js/vote.js') }}"></script>

@endsection
