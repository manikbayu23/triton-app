@extends('user.layouts.base-template')

@section('content')
    {{-- section home --}}
    @include('user.components.home.index')

    {{-- section about --}}
    @include('user.components.home.about')

    {{-- section triton --}}
    @include('user.components.home.triton')

    {{-- section jadwal belajar --}}
    @include('user.components.home.learning-schedule')

    {{-- section formula belajar --}}
    @include('user.components.home.learning-formulas')

    {{-- section formula belajar --}}
    @include('user.components.home.testimony')

    {{-- section formula faq --}}
    @include('user.components.home.faqs')

    {{-- section formula faq --}}
    @include('user.components.home.news')
@endsection
