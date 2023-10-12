<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Booking') }}
        </h2>
    </x-slot>
    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mb-2">
                        <a href="{{ route('booking.index') }}"
                            class=" px-3 py-2 text-xs font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Kembali</a>
                    </div>
                    <div class="flex flex-wrap mb-5">
                        <div class="md:basis-1/2 basis-full mb-5 border-4 border-white">
                            <h1 class="font-semibold mb-4 border-b-2 border-b-indigo-500 py-1">Data Pendaftar
                            </h1>
                            <div class="flex mb-3 p-2 bg-slate-50">
                                <div class="basis-1/2">Nama</div>
                                <div class="basis-1/2 ">: {{ $booking->name }}</div>
                            </div>
                            <div class="flex mb-3 p-2 bg-slate-50">
                                <div class="basis-1/2">Tempat Tanggal Lahir</div>
                                <div class="basis-1/2">: {{ $booking->place_birth }}, {{ $booking->date_birth }}</div>
                            </div>
                            <div class="flex mb-3 p-2 bg-slate-50">
                                <div class="basis-1/2">Nomor Telepon</div>
                                <div class="basis-1/2">: {{ $booking->phone_number }}</div>
                            </div>
                            <div class="flex mb-3 p-2 bg-slate-50">
                                <div class="basis-1/2">Alamat</div>
                                <div class="basis-1/2">: {{ $booking->address }}</div>
                            </div>
                            <div class="flex mb-3 p-2 bg-slate-50">
                                <div class="basis-1/2">Asal Sekolah</div>
                                <div class="basis-1/2">: {{ $booking->school }}</div>
                            </div>
                        </div>
                        <div class="md:basis-1/2 basis-full border-4 border-white">
                            <h1 class="font-semibold mb-4 border-b-2 border-b-indigo-500 py-1">Data Orang Tua</h1>
                            <div class="flex mb-3 p-2 bg-slate-50">
                                <div class="basis-1/2">Nama Orang Tua</div>
                                <div class="basis-1/2">: {{ $booking->parent_name }}</div>
                            </div>
                            <div class="flex mb-3 p-2 bg-slate-50">
                                <div class="basis-1/2">Nomor Telepon</div>
                                <div class="basis-1/2">: {{ $booking->parent_phone_number }}</div>
                            </div>
                            <div class="flex mb-3 p-2 bg-slate-50">
                                <div class="basis-1/2">Pekerjaan</div>
                                <div class="basis-1/2">: {{ $booking->parent_job }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-5 border-4 border-white">
                        <div class="mb-4  flex justify-between border-b-2 border-b-indigo-500 py-1">
                            <h1 class="font-semibold ">Booking</h1>
                            <span>Tanggal : {{ $booking->booking_date }}</span>
                        </div>
                        <div class="flex mb-3 p-2 bg-slate-50">
                            <div class="basis-1/2">Kode Booking</div>
                            <div class="basis-1/2">: {{ $booking->booking_code }}</div>
                        </div>
                        <div class="flex mb-3 p-2 bg-slate-50">
                            <div class="basis-1/2">Program</div>
                            <div class="basis-1/2">: {{ $booking->program->program_name ?? '-' }}</div>
                        </div>

                        <div class="flex mb-3 p-2 bg-slate-50">
                            <div class="basis-1/2">Waktu</div>
                            <div class="basis-1/2">:
                                @if ($booking->time->day == 'day1')
                                    Senin & Kamis
                                @elseif ($booking->time->day == 'day2')
                                    Selasa & Jumat
                                @else
                                    Rabu & Sabtu
                                @endif

                                <span>/</span>
                                Pukul:
                                @if ($booking->time->time == 'time1')
                                    15.00 - 17.00
                                @else
                                    17.20 - 19.30
                                @endif
                            </div>
                        </div>
                        <div class="flex mb-3 p-2 bg-slate-50">
                            <div class="basis-1/2">Ruangan</div>
                            <div class="basis-1/2">: {{ $booking->room->room_name ?? '-' }}</div>
                        </div>
                        <div class="flex mb-3 p-2 bg-slate-50">
                            <div class="basis-1/2">Kelas</div>
                            <div class="basis-1/2">: {{ $booking->level->level_name }}</div>
                        </div>
                        <div class="flex mb-3 p-2 bg-slate-50">
                            <div class="basis-1/2">Status</div>
                            <div class="basis-1/2">: @if ($booking->status == 1)
                                    <span
                                        class="bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300">dikonfirmasi</span>
                                @elseif ($booking->status == 2)
                                    <span
                                        class="bg-red-100 text-red-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-red-900 dark:text-red-300">batal</span>
                                @else
                                    <span
                                        class="bg-yellow-100 text-yellow-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-yellow-900 dark:text-yellow-300">pending</span>
                                @endif
                            </div>
                        </div>
                    </div>

                    @if ($booking->status == 0)
                        <div class="flex justify-center  md:justify-end gap-1">
                            <button type="button" data-id="{{ $booking->id_booking }}"
                                data-name="{{ $booking->name }}" data-option="Batal"
                                class="update-booking text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center mr-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                                Batalkan
                            </button>
                            <button type="button"
                                class="update-booking text-white bg-orange-700 hover:bg-orange-800 focus:ring-4 focus:outline-none focus:ring-orange-300 font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center mr-2 dark:bg-orange-600 dark:hover:bg-orange-700 dark:focus:ring-orange-800"
                                data-id="{{ $booking->id_booking }}" data-option="Konfirmasi">
                                Konfirmasi
                            </button>
                        </div>
                    @endif

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
                                            location.href = '{{ route('booking.index') }}';
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
