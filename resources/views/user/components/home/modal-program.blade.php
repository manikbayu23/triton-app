<div class="modal fade" id="modalDaftar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <h1 class="text-center fs-4 fw-semibold pt-3 mb-4 animate-triton">Silahkan Pilih
                    Program Belajar</h1>
                <div class="button-daftar row justify-content-center">
                    @forelse ($programs as $program)
                        <a href="{{ route('program.show', $program->id_programs) }}"
                            class="btn btn-warning w-75 mb-4 p-3 "><strong>
                                {{ $program->program_name }}</strong> </a>
                    @endforeach
                </div>
            </div>
            <div class="modal-footer">
                <div class="p-2"></div>
            </div>
        </div>
    </div>
</div>
