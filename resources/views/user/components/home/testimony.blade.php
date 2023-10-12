<section id="testimoni">
    <div class="container-fluid">
        <h2 class="fw-bold mb-5 text-center  animate-triton">Apa Kata Mereka ?</h2>
        <div class="new-over d-flex">
            @foreach ($testimonials as $testimonial)
                <div class="col-lg-4 col-sm-12 mb-3 me-3">
                    <div
                        class="card py-4 rounded-0 border-2 border-opacity-25 rounded-4 border-secondary animate-triton">
                        <div class="card-body text-center">
                            <div class="d-flex justify-content-center">
                                <div class="img-testimoni">
                                    <img src="{{ $testimonial->img_testimonial }}" class=" text-center" alt="">
                                </div>
                            </div>
                            <h2 class="nama-mereka">{{ $testimonial->name }}</h2>
                            <h3 class="sekolah-mereka">{{ $testimonial->school }}</h3>
                            <p>“{{ $testimonial->description }}”</p>
                            <p><strong>Diterima di {{ $testimonial->accepted }}</strong></p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
