@extends('layouts.app')

@section('content')
    <form action="/categorie/edit/{{ $categorieName }}" class="w-75 needs-validation m-auto" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <section class="form-group">
            <label>Categorie naam:</label>
            <input type="text" name="name" class="form-control" value="{{ $categorieName }}">
            @if($errors->has('name'))
                <p class="alert-danger mt-2">Vergeet geen categorie naam in te vullen</p>
            @endif
        </section>
        <section class="form-group">
            <label>Afbeelding: <span>(maximaal 2MB)</span></label>
            <img src="{{ $categorieImage }}" alt="">

            <label class="mt-3">Kies een nieuwe afbeelding hier (knop hieronder)</label>
            <input type="file" class="form-control-file" name="image" value="">
            @if($errors->has('image'))
                <p class="alert-danger mt-2">Vergeet geen afbeelding toe te voegen</p>
            @endif
        </section>
        <section class="form-group">
            <label class="mt-3">Aanpassingen opslaan</label>
            <input type="submit" value="Opslaan" class="btn d-block btn-primary mb-5">
        </section>
    </form>
@endsection
