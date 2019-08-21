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

        const createForm = $('#vote-create-form');
        const csrf = createForm.find('input[name="_token"]').val();

        createForm.find('.btn').on('click', function(){
            createVotes();
        })

        const createVotes = function(){

        const votes = [];

        votes[0] = {
            name: 'sample1 name',
            description: 'sample1 description'
        };
        votes[1] = {
            name: 'sample2 name',
            description: 'sample2 description'
        };

        console.log(votes);

        $.ajax( {
            url: '/api/votes',
            method: 'post',
            data: {
                votes: votes
            },
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': csrf
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
