<section id="formula-belajar">
    <div class="container">
        <h1 class="text-center text-white mb-2">Program Pilihan</h1>
        <p class="text-white text-center">Sesuaikan program piihan dengan kebutuhanmu</p>
        <div class="row justify-content-center row-cols-1 row-cols-sm-3 mt-5">
            @forelse ($programs as $program)
                <div class="col mb-3">
                    <a href="{{ route('program.show', $program->id_programs) }}" class="text-decoration-none text-dark">
                        <div class="card rounded-5 card-program animate-triton">
                            <img src="{{ asset($program->program_img) }}" class="card-img-top rounded-5"
                                alt="{{ asset($program->program_img) }}">
                            <div class="card-img-overlay d-flex flex-column justify-content-between">
                                <div class="gambar-hover" style="width: 85%;">{{ $program->front_description }}</div>
                                <div class="d-flex justify-content-end">
                                    <a href="{{ route('program.show', $program->id_programs) }}"
                                        class="btn-belajar">{{ $program->program_name }} <i
                                            class="fa-solid fa-chevron-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-info">Tidak Ada Data</div>
                </div>
            @endforelse
        </div>
    </div>
</section>
