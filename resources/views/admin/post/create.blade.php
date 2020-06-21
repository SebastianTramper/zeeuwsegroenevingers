@extends('layouts.app')

@section('content')
    <form action="{{ route('store') }}" class="w-75 needs-validation m-auto" method="POST" enctype="multipart/form-data">
        @csrf
        <section class="form-group">
            <label>Titel:</label>
            <input type="text" name="title" class="form-control">
            @if($errors->has('title'))
                <p class="alert-danger mt-2">Vergeet geen titel in te vullen</p>
            @endif
        </section>
        <section class="form-group">
            <label>Afbeelding: <span>(maximaal 2MB)</span></label>
            <input type="file" class="form-control-file" name="image">
            @if($errors->has('image'))
                <p class="alert-danger mt-2">Vergeet geen afbeelding toe te voegen</p>
            @endif
        </section>
        <section class="form-group">
            <label>Korte beschrijving: <span>(voor in google)</span></label>
            <textarea name="excerpt" class="form-control"></textarea>
            @if($errors->has('excerpt'))
                <p class="alert-danger mt-2">Vergeet geen korte beschrijving in te vullen</p>
            @endif
        </section>
        <section class="form-group">
            <label>volledige beschrijving: <span>(op de website)</span></label>
            <textarea name="text" class="form-control"></textarea>
            @if($errors->has('text'))
                <p class="alert-danger mt-2">Vergeet geen beschrijving in te vullen</p>
            @endif
        </section>
        <section class="form-group">
            <label for="seizoen">Kies een seizoen:</label>
            <select name="seizoen" id="seizoen" class="form-control">
                <option value="1">Zomer</option>
                <option value="2">Herfst</option>
                <option value="3">Winter</option>
                <option value="4">Lente</option>
            </select>
            @if($errors->has('seizoen'))
                <p class="alert-danger mt-2">Vergeet geen seizoen te selecteren</p>
            @endif
        </section>
        <section class="form-group">
            <label for="categorie">Kies een categorie:</label>
            <select name="categorie" id="categorie" class="form-control">
                @foreach($categorie as $cat)
                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                @endforeach
            </select>
            @if($errors->has('categorie'))
                <p class="alert-danger mt-2">Vergeet geen categorie te selecteren</p>
            @endif
        </section>
        <section class="form-group">
            <input type="submit" value="Opslaan" class="btn btn-primary mb-5">
        </section>
    </form>
@endsection
