@extends('layouts.app')

@section('content')
<div class="container col-md-8 py-5">
    <h1 class="h1">
        {{ $artikel["title"] }}
    </h1>
    <img src="storage/{{ $artikel->image }}" class="img-fluid" style="max-height: 400px;width: 100%;object-fit: cover" alt="">
    <p class="mt-3">
        {{ $artikel->text }}
    </p>
</div>
@endsection
