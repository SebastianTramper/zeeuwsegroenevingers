@extends('layouts.app')

@section('content')
    @foreach($categorie as $c)
        <a href="/categorie/{{ $c->name }}" class="btn">{{ $c->name }}</a>
    @endforeach
@endsection
