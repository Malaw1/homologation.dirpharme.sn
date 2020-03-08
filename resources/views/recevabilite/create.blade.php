@extends('layouts.app')

@section('content')

<form action="{{ url('rc_rapport') }}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="recevabilite_id" value="{{ $_GET['id'] }}" placeholder="">
    <input type="file" class="form-control" name="file"  placeholder="">
    <br>
    <textarea name="commentaire" id="" class="form-control"></textarea>
    <input type="hidden" value="{{ Auth()->user()->id }}" name="user_id">
    <br>
    <button type="submit" class="btn btn-success btn-lg" name="decision" value="Favorable" role="button">Favorable</button>
    <button type="submit" class="btn btn-danger btn-lg" name="decision" value="Non Favorable" role="button">Non Favorable</button>
</form>
@endsection

