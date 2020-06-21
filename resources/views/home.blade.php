@extends('layouts.app')

@section('content')
    <div class="feed container col-md-8">
        @foreach($post as $p)
        <section class="post-container position-relative">
            <section class="post position-relative pb-5">
                <h1 class="mb-3">{{ $p->title }}</h1>
                <img src="{{ asset('img/banner.jpeg') }}" alt="">
                <p class="mt-4 mb-1">{{ $p->excerpt }}</p>
                <a href="/{{ $p->categorie->name }}/{{ $p->slug }}">Lees verder</a>
                <div class="post-date-contianer d-inline-block position-absolute">
                    <div class="post-date position-relative">
                        <p class="position-absolute">{{ $post_time }}</p>
                    </div>
                </div>
            </section>
            <div class="post-line position-absolute left"></div>
        </section>
        @endforeach
    </div>
@endsection
