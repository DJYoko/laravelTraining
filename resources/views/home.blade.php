@extends('_layout.base') @section('css') @endsection @section('content')
<div class="container">
  <h1>Home</h1>
  @if(Auth::check()) Hello {{ \Auth::user()->name}}

  <div class="bg-light p-3 mb-3">
    <h2>create</h2>
    <form id="vote-create-form">
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">name</label>
        <div class="col-sm-10">
          <input class="form-control" type="text" name="voteName" />
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Description</label>
        <div class="col-sm-10">
          <input class="form-control" type="text" name="voteDescription" />
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">StartAt</label>
        <div class="col-sm-4">
          <input class="form-control" type="datetime-local" name="voteStartAt" />
        </div>
        <label class="col-sm-2 col-form-label">EndAt</label>
        <div class="col-sm-4">
          <input class="form-control" type="datetime-local" name="voteEndAt" />
        </div>
      </div>
      <div class="text-center">
        <button class="btn btn-primary" type="button">
          Create
        </button>
      </div>
    </form>
  </div>

  <div class="bg-light p-3 mb-3">
    <h2>delete</h2>
    <form id="vote-delete-form">
      <div class="form-group row">
        <label class="col-sm-3 col-form-label">target vote ids</label>
        <div class="col-sm-7">
          <input
            class="form-control"
            type="text"
            id="delete-target-ids"
            placeholder="ex:) 1,2"
          />
        </div>
        <div class="col-sm-2">
          <button class="btn btn-danger" type="button">
            delete
          </button>
        </div>
      </div>
    </form>
  </div>

  <div class="bg-light p-3 mb-3">
    <h2>update</h2>
    <form id="vote-update-form">
      <div class="form-group row">
        <label class="col-sm-3 col-form-label">target vote id</label>
        <div class="col-sm-9">
          <select class="form-control" name="voteId" disabled></select>
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">name</label>
        <div class="col-sm-10">
          <input class="form-control" type="text" name="voteName" />
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Description</label>
        <div class="col-sm-10">
          <input class="form-control" type="text" name="voteDescription" />
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">StartAt</label>
        <div class="col-sm-4">
          <input class="form-control" type="datetime-local" name="voteStartAt" />
        </div>
        <label class="col-sm-2 col-form-label">EndAt</label>
        <div class="col-sm-4">
          <input class="form-control" type="datetime-local" name="voteEndAt" />
        </div>
      </div>
      <div class="text-center">
        <button class="btn btn-primary" type="button">
          update
        </button>
      </div>
    </form>
  </div>

  <div class="text-center">
    <button class="btn btn-primary mb-3" type="button" id="get-data-button">
      Get
    </button>
  </div>
  <pre id="get-result" class="bg-light p-3"></pre>

  @else Guest User | <a href="/auth/register"></a>
  @endif
</div>
@endsection @section('js')

<script src="{{ asset('/js/vote.js') }}"></script>

@endsection
