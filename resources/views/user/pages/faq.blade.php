@extends('user.layouts.base-template')

@section('content')
    <section id="halaman-faq">
        <div class="container">
            <a href="{{ route('home') }}" class="btn-back mb-5 animate-home">
                <i class="fa-solid fa-arrow-left "></i>
                <div class="text ">Kembali</div>
            </a>
            <div class="d-lg-flex d-sm-block justify-content-lg-end">

                <div class="col-lg-5 col-sm-12 d-flex align-items-center">
                    <div class=" text-center w-100 animate-home-left">
                        <img src="assets/gambar/faq.png" width="60%" alt="">
                    </div>
                </div>
                <div class="col-lg-7 col-sm-12 ">

                    <div id="faq" class="mb-5">
                        <h2 class="text-dark mb-2 p-0 fw-semibold">Pertanyaan Umum</h2>
                        <ul>
                            @if ($faqs)
                                @foreach ($faqs as $faq)
                                    @if ($faq->category == 'umum')
                                        <li>
                                            <input type="checkbox" checked>
                                            <i></i>
                                            <h2>{{ $faq->question }}</h2>
                                            <p>{{ $faq->answer }}</p>
                                        </li>
                                    @endif
                                @endforeach
                            @endif
                        </ul>
                    </div>
                    <div id="faq" class="mb-5">
                        <h2 class="text-dark mb-2 p-0 fw-semibold">Kelas dan Proses Mengajar</h2>
                        <ul>
                            @if ($faqs)
                                @foreach ($faqs as $faq)
                                    @if ($faq->category == 'kelas_proses')
                                        <li>
                                            <input type="checkbox" checked>
                                            <i></i>
                                            <h2>{{ $faq->question }}</h2>
                                            <p>{{ $faq->answer }}</p>
                                        </li>
                                    @endif
                                @endforeach
                            @endif

                        </ul>
                    </div>
                    <div id="faq" class="mb-5">
                        <h2 class="text-dark mb-2 p-0 fw-semibold">Pendaftaran</h2>
                        <ul>
                            @if ($faqs)
                                @foreach ($faqs as $faq)
                                    @if ($faq->category == 'pendaftaran')
                                        <li>
                                            <input type="checkbox" checked>
                                            <i></i>
                                            <h2>{{ $faq->question }}</h2>
                                            <p>{{ $faq->answer }}</p>
                                        </li>
                                    @endif
                                @endforeach
                            @endif

                        </ul>
                    </div>
                    <div id="faq" class="mb-5">
                        <h2 class="text-dark mb-2 p-0 fw-semibold">Pertanyaan Lain</h2>

                        <ul>
                            @if ($faqs)
                                @foreach ($faqs as $faq)
                                    @if ($faq->category == 'lainnya')
                                        <li>
                                            <input type="checkbox" checked>
                                            <i></i>
                                            <h2>{{ $faq->question }}</h2>
                                            <p>{{ $faq->answer }}</p>
                                        </li>
                                    @endif
                                @endforeach
                            @endif
                            <li>
                                <input type="checkbox" checked>
                                <i></i>
                                <h2>Untuk petanyaan lain bisa melalui Whatsapp kami di bawah ini</h2>
                                <p><a href="https://wa.me/6282146434314?text=Hii%20Triton%20Denpasar..."
                                        target="_blank">Whatsapp</a></p>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection

@push('css')
    <style>
        #header {
            display: none !important;
        }
    </style>
@endpush
{{-- panggil nama teacher --}}
