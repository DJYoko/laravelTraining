@extends('_layout.base')
@section('css')
@endsection
@section('content')
<div class="container">
  <h1>Home</h1>
  @if(Auth::check()) Hello {{ \Auth::user()->name}}

  <div class="bg-light p-3 mb-3">
    <form id="vote-create-form">
        @csrf
        <button class="btn btn-primary" type="button">
        Create
        </button>
    </form>
  </div>

  <div class="bg-light p-3 mb-3">
  <button class="btn btn-primary" type="button" id="get-data-button">
        Get
    </button>
    <pre id="get-result"></pre>
</div>
  @else Guest User | <a href="/auth/register"></a>
  @endif
</div>
@endsection
@section('js')

<script>
  $(function() {
    $("#get-data-button").on("click", function() {
      $.ajax({
        url: "/_api/votes",
        method: "get",
        dataType: "json",
        success: function(response) {
            const res = JSON.stringify(response.votes, null, 2);
            console.log(res);
            $('#get-result').html(res);
        },
        error: function(response) {
          console.log(response);
        }
      });
    });

    const createForm = $("#vote-create-form");
    const csrfToken = createForm.find('input[name="_token"]').val();

    createForm.find(".btn").on("click", function() {
      createVotes();
    });

    const createVotes = function() {
      const requestData = {
        _token: csrfToken,
        votes: []
      };

      requestData.votes[0] = {
        name: "sample1 name",
        description: "sample1 description"
      };
      requestData.votes[1] = {
        name: "sample2 name",
        description: "sample2 description",
        start_at: '2019-08-20 12:00:00',
        end_at: '2019-09-20 12:00:00'
      };

      console.log(requestData);

      $.ajax({
        url: "/_api/votes",
        method: "post",
        dataType: "json",
        data: requestData,
        headers: {
          "X-CSRF-TOKEN": csrfToken
        },
        success: function(data) {
          console.log(data);
        },
        error: function(data) {
          console.log(data);
        }
      });
    };
  });
</script>

@endsection
