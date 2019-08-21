@extends('_layout.base')
@section('css')
<style>
#vote-create-form {
    border: 1px solid #ccc;
    padding: 20px;
    background-color:#eaeaea;
}
</style>
@endsection

@section('content')
<div class="container">
    <h1>Home</h1>
    @if(Auth::check())
        Hello {{ \Auth::user()->name}}


        <button class="btn btn-primary" type="button" id="get-data-button">
                Get
            </button>

        <form id="vote-create-form">
            @csrf
            <button class="btn btn-primary" type="button">
                Create
            </button>
        </form>
    @else
        Guest User | <a href="/auth/register"></a>
    @endif

</div>
@endsection
@section('js')

<script>
    $(function(){

        $('#get-data-button').on('click', function(){
            $.ajax( {
                url: '/_api/votes',
                method: 'get',
                dataType: 'json',
                success: function(data) {
                    console.log(data)
                },
                error: function(data) {
                    console.log(data)
                }
            });
        })

        const createForm = $('#vote-create-form');
        const csrfToken = createForm.find('input[name="_token"]').val();

        createForm.find('.btn').on('click', function(){
            createVotes();
        })

        const createVotes = function(){

        const requestData = {
            _token: csrfToken,
            votes: []
        };

        requestData.votes[0] = {
            name: 'sample1 name',
            description: 'sample1 description'
        };
        requestData.votes[1] = {
            name: 'sample2 name',
            description: 'sample2 description'
        };

        console.log(requestData);

        $.ajax( {
            url: '/_api/votes',
            method: 'post',
            dataType: 'json',
            data: requestData,
            headers: {
                'X-CSRF-TOKEN': csrfToken
            },
            success: function(data) {
                console.log(data)
            },
            error: function(data) {
                console.log(data)
            }
        });
        }
    });

</script>

@endsection
