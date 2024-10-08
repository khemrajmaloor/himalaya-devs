@extends('layout.main')
@section('page-container')
    <!-- Introduction -->
    <section class="intro" id="home">
        @include('partials/introduction')
    </section>

    <!-- My services -->
    <section class="my-services" id="services">
        @include('partials/services')
    </section>

    <!-- About me -->
    <section class="about-me" id="about">
        @include('partials/about')
    </section>

    <!-- My Work -->
    <section class="my-work" id="work">
        @include('partials/work')
    </section>
@endsection
