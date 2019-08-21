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


    });


</script>

@endsection
