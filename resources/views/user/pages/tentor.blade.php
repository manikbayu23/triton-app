@extends('user.layouts.base-template')

@section('content')
    <section class="detail-program" style="padding-bottom: 100px;">
        <div class="container container-program">
            <div class="pt-5 position-relative mb-5">
                <a href="{{ route('home') }}" class="btn-back-detail mb-2 animate-home tab-button">
                    <i class="fa-solid fa-arrow-left "></i>
                    <div class="text ">Kembali</div>
                </a>
                <h1 class="text-center fw-semibold mb-4">Tentor {{ $tentor->subject_name }}</h1>
            </div>
            <div class="row row-cols-1 row-cols-lg-3 g-2 g-lg-3">
                @foreach ($teacher as $teacher)
                    <div class="col">
                        <div class="d-flex justify-content-center mb-3">
                            <div class="img-tentor">
                                <img src="{{ $teacher->teacher_img }}" class=" text-center" alt="">
                            </div>
                        </div>
                        <h2 class="text-center fs-4">{{ $teacher->teacher_name }}</h2>
                        <p class="text-center " style="color: grey;">{{ $teacher->alumni }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection

@push('css')
    <style>
        #header {
            display: none !important;
            ;
        }
    </style>
@endpush
{{-- panggil nama teacher --}}
