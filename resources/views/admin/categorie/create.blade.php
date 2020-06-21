@extends('layouts.app')

@section('content')
    <form action="{{ route('categorie-store') }}" class="w-75 needs-validation m-auto" method="POST" enctype="multipart/form-data">
        @csrf
        <section class="form-group">
            <label>Categorie naam:</label>
            <input type="text" name="name" class="form-control">
            @if($errors->has('name'))
                <p class="alert-danger mt-2">Vergeet geen categorie naam in te vullen</p>
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
            <input type="submit" value="Opslaan" class="btn btn-primary mb-5">
        </section>
    </form>
@endsection
