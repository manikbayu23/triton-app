<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Kelas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('level.store') }}" method="POST">
                        @csrf
                        <div class="flex gap-3">
                            <div class="mb-3">
                                <label for="level_name" class="form-labels">Nama Kelas: </label>
                                <input type="text" name="level_name" id="level_name"
                                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label for="category" class="form-labels">Kategori: </label>
                                <select id="category" name="category"
                                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                    required>
                                    <option value="" selected>Pilih Kategori</option>
                                    <option value="SD">SD</option>
                                    <option value="SMP">SMP</option>
                                    <option value="SMA">SMA</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <button type="submit"
                                    class="text-white bg-gradient-to-r from-purple-500 via-purple-600 to-purple-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-purple-300 dark:focus:ring-purple-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">
                                    Tambah</button>
                            </div>
                        </div>
                    </form>

                    <div class="relative overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-100 ">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        No
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Kelas
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Kategori
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($levels as $index => $level)
                                    <tr class="bg-white border-b">
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                            {{ ($levels->currentPage() - 1) * $levels->perPage() + $index + 1 }}
                                        </th>
                                        <td class="px-6 py-4 text-gray-900">
                                            {{ $level->level_name }}
                                        </td>
                                        <td class="px-6 py-4 text-gray-900">
                                            {{ $level->category }}
                                        </td>
                                        <td class="px-6 py-4">
                                            <button type="button"
                                                class="edit-button text-white bg-orange-700 hover:bg-orange-800 focus:ring-4 focus:outline-none focus:ring-orange-300 font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center mr-2 dark:bg-orange-600 dark:hover:bg-orange-700 dark:focus:ring-orange-800"
                                                data-level-id="{{ $level->id_levels }}">
                                                Edit
                                            </button>
                                            <button type="button" data-id="{{ $level->id_levels }}"
                                                data-name="{{ $level->level_name }}"
                                                class="delete-level text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center mr-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                                                Hapus
                                            </button>
                                        </td>
                                    </tr>
                                    <tr class="edit-form edit-form-{{ $level->id_levels }}" style="display: none;">
                                        <td colspan="4"
                                            class="text-xs text-gray-700 uppercase bg-white-50 dark:bg-gray-700 dark:text-gray-400">
                                            <form action="{{ route('level.update', $level->id_levels) }}"
                                                method="POST">
                                                @csrf
                                                <div class="flex gap-3 items-center m-2">
                                                    <div class="mb-3">
                                                        <input type="text" name="level_name" id="level_name"
                                                            class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                                            value="{{ $level->level_name }}" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="category" class="form-labels">Kategori: </label>
                                                        <select id="category" name="category"
                                                            class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                                            required>
                                                            <option value="">Pilih Kategori</option>
                                                            <option value="SD"
                                                                @if ($level->category == 'SD') selected @endif>SD
                                                            </option>
                                                            <option value="SMP"
                                                                @if ($level->category == 'SMP') selected @endif>SMP
                                                            </option>
                                                            <option value="SMA"
                                                                @if ($level->category == 'SMA') selected @endif>SMA
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <button type="submit"
                                                            class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 shadow-lg shadow-red-500/50 dark:shadow-lg dark:shadow-red-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                                            Update</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $levels->links() }}
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
            $(document).ready(function() {
                $(".edit-button").click(function() {
                    var levelId = $(this).data("level-id");
                    var editForm = $(".edit-form-" + levelId);

                    if (editForm.is(":visible")) {
                        editForm.hide();
                    } else {
                        $(".edit-form").hide();
                        editForm.show();
                    }
                });
            });
            $('.delete-level').click(function(e) {
                e.preventDefault();
                var id = $(this).data("id");
                var name = $(this).data("name");

                console.log('idnya :' +
                    id);
                var deleteUrl = "{{ route('level.destroy', ':id') }}".replace(':id', id);

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
