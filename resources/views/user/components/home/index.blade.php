<section id="home">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <h1 class="mt-5 mb-4 fw-semibold text-white text-center pt-5 animate-home">
                Triton Denpasar</h1>
            <h4 class="text-center text-white animate-home mb-lg-5 mb-sm-2" style="font-size: 1.2rem;">The Art of
                Problem
                Solving
            </h4>
            <div class="button-home gap-4 d-flex flex-lg-row flex-column justify-content-center">
                <div class="d-flex justify-content-center">
                    <a class="btn-home shadow animate-home "
                        href="https://wa.me/6282146434314?text=Hii%20Triton%20Denpasar...">Hubungi Kami</a>
                </div>
                <div class="d-flex justify-content-center">
                    <button type="button" class="btn-home animate-home " data-bs-toggle="modal"
                        data-bs-target="#modalDaftar">Daftar Sekarang</button>
                </div>
            </div>
        </div>
    </div>
    {{-- modal program  --}}
    @include('user.components.home.modal-program');
    <!-- <div class="ombak-home animate-home">
    </div> -->
    <div class="animate-home">
        <img src="assets/gambar/ombak-ilus.png" width="100%" class="" alt="">
    </div>
</section>
