<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kelas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mb-4">
                        <a href="{{ route('subject.create') }}"
                            class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">Tambah
                            Kelas</a>
                    </div>
                    <div class="relative overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-100 ">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        No
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Nama
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Gambar
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($subjects as $index => $subject)
                                    <tr class="bg-white border-b">
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                            {{ ($subjects->currentPage() - 1) * $subjects->perPage() + $index + 1 }}
                                        </th>
                                        <td class="px-6 py-4 text-gray-900">
                                            {{ $subject->subject_name }}
                                        </td>
                                        <td class="px-6 py-4 text-gray-900">
                                            <img src="{{ $subject->subject_img }}" width="80px"
                                                alt="{{ $subject->subject_name }}">
                                        </td>
                                        <td class="px-6 py-4">
                                            <a href="{{ route('subject.edit', $subject->id_subjects) }}"
                                                class="edit-button text-white bg-orange-700 hover:bg-orange-800 focus:ring-4 focus:outline-none focus:ring-orange-300 font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center mr-2 dark:bg-orange-600 dark:hover:bg-orange-700 dark:focus:ring-orange-800">
                                                Edit
                                            </a>
                                            <button type="button" data-id="{{ $subject->id_subjects }}"
                                                data-name="{{ $subject->subject_name }}"
                                                class="delete-level text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center mr-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                                                Hapus
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $subjects->links() }}
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
    @endpush
    @push('scripts')
        <script>
            $('.delete-level').click(function(e) {
                e.preventDefault();
                var id = $(this).data("id");
                var name = $(this).data("name");

                console.log('idnya :' +
                    id);
                var deleteUrl = "{{ route('subject.destroy', ':id') }}".replace(':id', id);

                Swal.fire({
                    title: 'Hapus Program?',
                    text: 'Anda ingin menghapus kelas ' + name + '?',
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
                                    'kelas ' +
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
        </script>
    @endpush
</x-app-layout>
