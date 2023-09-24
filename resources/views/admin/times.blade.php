<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Waktu') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('time.store') }}" method="POST">
                        @csrf
                        <div class="flex gap-3">
                            <div class="mb-3">
                                <label for="clock" class="form-labels">Pilihan Jam: </label>
                                <select id="clock" name="time"
                                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                    required>
                                    <option value="" selected>Pilih Jam</option>
                                    <option value="time1">15.00 - 17.00</option>
                                    <option value="time2">17.20 - 19.30</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="day" class="form-labels">Pilihan Hari: </label>
                                <select id="day" name="day"
                                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                    required>
                                    <option value="" selected>Pilih Hari</option>
                                    <option value="day1">Senin & Kamis</option>
                                    <option value="day2">Selasa & Jumat</option>
                                    <option value="day3">Rabu & Sabtu</option>
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
                                        Jam
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Hari
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($times as $index => $time)
                                    <tr class="bg-white border-b">
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                            {{ ($times->currentPage() - 1) * $times->perPage() + $index + 1 }}
                                        </th>
                                        <td class="px-6 py-4 text-gray-900">
                                            Pukul:
                                            @if ($time->time == 'time1')
                                                15.00 - 17.00
                                            @else
                                                17.20 - 19.30
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 text-gray-900">
                                            @if ($time->day == 'day1')
                                                Senin - Kamis
                                            @elseif ($time->day == 'day2')
                                                Selasa - Jumat
                                            @else
                                                Rabu - Sabtu
                                            @endif
                                        </td>
                                        <td class="px-6 py-4">
                                            <button type="button"
                                                class="edit-button text-white bg-orange-700 hover:bg-orange-800 focus:ring-4 focus:outline-none focus:ring-orange-300 font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center mr-2 dark:bg-orange-600 dark:hover:bg-orange-700 dark:focus:ring-orange-800"
                                                data-level-id="{{ $time->id_time }}">
                                                Edit
                                            </button>
                                            <button type="button" data-id="{{ $time->id_time }}"
                                                data-name="{{ $time->time }}"
                                                class="delete-level text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center mr-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                                                Hapus
                                            </button>
                                        </td>
                                    </tr>
                                    <tr class="edit-form edit-form-{{ $time->id_time }}" style="display: none;">
                                        <td colspan="4"
                                            class="text-xs text-gray-700 uppercase bg-white-50 dark:bg-gray-700 dark:text-gray-400">
                                            <form action="{{ route('time.update', $time->id_time) }}" method="POST">
                                                @csrf
                                                <div class="flex gap-3 items-center m-2">
                                                    <div class="mb-3">
                                                        <label for="clock" class="form-labels">Pilihan Jam: </label>
                                                        <select id="clock" name="time"
                                                            class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                                            required>
                                                            <option value="">Pilih Jam</option>
                                                            <option value="time1"
                                                                @if ($time->time == 'time1') selected @endif>15.00
                                                                - 17.00</option>
                                                            <option value="time2"
                                                                @if ($time->time == 'time2') selected @endif> 17.20
                                                                - 19.30</option>
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="day" class="form-labels">Pilihan Hari: </label>
                                                        <select id="day" name="day"
                                                            class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                                            required>
                                                            <option value="">Pilih Hari</option>
                                                            <option value="day1"
                                                                @if ($time->day == 'day1') selected @endif>Senin
                                                                - Kamis</option>
                                                            <option value="day2"
                                                                @if ($time->day == 'day2') selected @endif>Selasa
                                                                - Jumat</option>
                                                            <option value="day3"
                                                                @if ($time->day == 'day3') selected @endif>Rabu -
                                                                Sabtu</option>
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
                        {{ $times->links() }}
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
                var deleteUrl = "{{ route('time.destroy', ':id') }}".replace(':id', id);

                Swal.fire({
                    title: 'Hapus Program?',
                    text: 'Anda ingin menghapus waktu ini ?',
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
