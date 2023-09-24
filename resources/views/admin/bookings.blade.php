<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Booking') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="relative overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-100 ">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        No
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Tanggal
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Nama
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Program
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Kelas
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Status
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bookings as $index => $booking)
                                    <tr class="bg-white border-b">
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                            {{ ($bookings->currentPage() - 1) * $bookings->perPage() + $index + 1 }}
                                        </th>
                                        <td class="px-6 py-4 text-gray-900">
                                            {{ $booking->booking_date }}
                                        </td>
                                        <td class="px-6 py-4 text-gray-900">
                                            {{ $booking->name }}
                                        </td>
                                        <td class="px-6 py-4 text-gray-900">
                                            {{ $booking->program->program_name ?? '-' }}
                                        </td>
                                        <td class="px-6 py-4 text-gray-900">
                                            {{ $booking->level->level_name }}
                                        </td>
                                        <td class="px-6 py-4 text-gray-900">
                                            @if ($booking->status == 1)
                                                <span
                                                    class="bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300">dikonfirmasi</span>
                                            @elseif ($booking->status == 2)
                                                <span
                                                    class="bg-red-100 text-red-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-red-900 dark:text-red-300">batal</span>
                                            @else
                                                <span
                                                    class="bg-yellow-100 text-yellow-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-yellow-900 dark:text-yellow-300">pending</span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4">
                                            @if ($booking->status == 0)
                                                <button type="button"
                                                    class="update-booking text-white bg-orange-700 hover:bg-orange-800 focus:ring-4 focus:outline-none focus:ring-orange-300 font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center mr-2 dark:bg-orange-600 dark:hover:bg-orange-700 dark:focus:ring-orange-800"
                                                    data-id="{{ $booking->id_booking }}" data-option="Konfirmasi">
                                                    Konfirmasi
                                                </button>
                                                <button type="button" data-id="{{ $booking->id_booking }}"
                                                    data-name="{{ $booking->name }}" data-option="Batal"
                                                    class="update-booking text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center mr-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                                                    Batalkan
                                                </button>
                                            @endif
                                            <a href="{{ route('booking.show', $booking->id_booking) }}"
                                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center mr-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                                data-id="{{ $booking->id_booking }}">
                                                Detail
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $bookings->links() }}
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


            // Listen for the "Konfirmasi" button click
            var url;

            // Listen for the "Konfirmasi" button click
            $('.update-booking').on('click', function(e) {
                e.preventDefault();
                var option = $(this).data('option');
                var bookingId = $(this).data('id');

                if (option == 'Konfirmasi' || option == 'Batal') {

                    url = "{{ route('booking.confirmation', ['id' => ':id']) }}".replace(':id', bookingId);

                    if (option == 'Konfirmasi') {
                        var statusValue = 1;
                        var textConfirm = 'Apakah Anda yakin ingin mengkonfirmasi booking ini?'
                        var textSuccess = 'Booking telah dikonfirmasi.';
                    } else if (option == 'Batal') {
                        var statusValue = 2;
                        var textConfirm = 'Apakah Anda yakin ingin membatalkan booking ini?'
                        var textSuccess = 'Booking telah dibatalkan.';

                    }

                    // Display a SweetAlert2 confirmation dialog
                    Swal.fire({
                        title: 'Konfirmasi Booking',
                        text: textConfirm,
                        icon: 'question',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Ya, Konfirmasi!',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // User confirmed, send an AJAX request with the CSRF token
                            $.ajax({
                                url: url,
                                type: 'PUT',
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                data: {
                                    statusValue: statusValue
                                },
                                success: function(response) {
                                    console.log('Data updated successfully');
                                    Swal.fire('Berhasil!', textSuccess,
                                            'success')
                                        .then(function() {
                                            // Reload the page after the SweetAlert2 confirmation
                                            location.reload();
                                        });
                                },
                                error: function(error) {
                                    console.error('Error:', error);
                                    Swal.fire('Terjadi Kesalahan!',
                                        'Gagal mengkonfirmasi booking.', 'error');
                                }
                            });
                        }
                    });
                }
            });
        </script>
    @endpush
</x-app-layout>
