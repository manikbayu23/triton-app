<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Program Belajar') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mb-4">
                        <a href="{{ route('list_program.create') }}"
                            class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">Tambah
                            Program</a>
                    </div>
                    @if (session('success'))
                        <div id="alert-border-3"
                            class="flex items-center p-4 mb-4 text-green-800 border-t-4 border-green-300 bg-green-50 dark:text-green-400 dark:bg-gray-800 dark:border-green-800"
                            role="alert">
                            <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                            </svg>
                            <div class="ml-3 text-sm font-medium">
                                {{ session('success') }}
                            </div>
                        </div>
                    @endif
                    <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                        @foreach ($programs as $program)
                            <div class="h-auto max-w-full rounded-lg bg-white border border-gray-200 rounded-lg shadow">
                                <a href="#">
                                    <div class="h-56">
                                        <img class="rounded-t-lg w-full h-full object-cover"
                                            src="{{ asset($program->program_img) }}"
                                            alt="{{ $program->program_name }}" />
                                    </div>
                                </a>
                                <div class="p-5">
                                    <a href="#">
                                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">
                                            {{ $program->program_name }}</h5>
                                    </a>
                                    <p class="mb-3 font-normal text-gray-700">{{ $program->description_main }}</p>
                                    {{-- <a href="{{ route('variation.index', $program->id_programs) }}"
                                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                                        Variation
                                    </a> --}}
                                    <a href="{{ route('list_program.edit', $program->id_programs) }}"
                                        class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:focus:ring-yellow-900">
                                        Edit
                                    </a>
                                    <button type="button" data-id="{{ $program->id_programs }}"
                                        data-name="{{ $program->program_name }}"
                                        class="delete-program focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                                        Hapus
                                    </button>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>


    @push('css')
    @endpush
    @push('js')
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
    @endpush
    @push('scripts')
        <script>
            $(document).ready(function() {
                CKEDITOR.replaceAll('description_school');


                $('.delete-program').click(function(e) {
                    e.preventDefault();
                    var id = $(this).data("id");
                    var name = $(this).data("name");

                    console.log('idnya :' +
                        id);
                    var deleteUrl = "{{ route('list_program.destroy', ':id') }}".replace(':id', id);

                    Swal.fire({
                        title: 'Hapus Program?',
                        text: 'Anda ingin menghapus ' + name + '?',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                url: deleteUrl,
                                type: 'GET',
                                success: function(response) {
                                    Swal.fire(
                                        'Deleted!',
                                        name + ' telah dihapus.',
                                        'success'
                                    ).then(() => {
                                        window.location.reload();
                                    });
                                },
                                error: function(xhr) {
                                    Swal.fire(
                                        'Error!',
                                        'Terjadi kesalahan saat menghapus program.',
                                        'error'
                                    );
                                }
                            });
                        }
                    })
                });
            });
        </script>
    @endpush
</x-app-layout>
