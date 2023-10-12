@extends('user.layouts.base-template')

@section('content')
    <div id="tab1" class="tab-content">
        <section id="program-reguler2">
            <div class="container">
                <a href="{{ route('home') }}" class="btn-back mb-2 animate-home">
                    <i class="fa-solid fa-arrow-left "></i>
                    <div class="text ">Kembali</div>
                </a>

                <div class="d-flex flex-column flex-lg-row justify-content-lg-center w-100 ">
                    <div class="col-lg-6 col-sm-12 d-flex align-items-center justify-content-center">
                        <div class=" animate-home-left d-flex text-end justify-content-center">
                            @if ($program->program_name == 'Program Regular')
                                <img src="assets/gambar/regular rinci.png" width="55%" alt="Program Regular">
                            @elseif($program->program_name == 'Program Great')
                                <img src="assets/gambar/program great rinci.png" width="55%" alt="great">
                            @elseif($program->program_name == 'Program Eksekutif')
                                <img src="assets/gambar/program eksekutif rinci.png" width="55%" alt="eksekutif">
                            @elseif($program->program_name == 'Program Regular + UTBK')
                                <img src="assets/gambar/bedah rinci.png" width="60%" alt="tangkas utbk + regular">
                            @elseif($program->program_name == 'Program Tangkas UTBK')
                                <img src="assets/gambar/tangkas UTBK rinci.png" width="55%" alt="tangkas utbk">
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-6  col-sm-12 bg-white p-4 rounded-2">
                        <h1 class="fw-bold mb-4 animate-home text-primary-triton">{{ $program->program_name }}</h1>
                        <p class="mb-4 fw-medium animate-home">{{ $program->description_main }}</p>
                        <h5 class="fw-bold mb-4 animate-home">
                            Program terbuka untuk kelas :
                        </h5>

                        <div class="row row-cols-3 w-lg-100 w-lg-50 animate-home">
                            @foreach ($program->variations as $variation)
                                <div class="col mb-3">
                                    <div class="bt-program fw-semibold  border-bottom py-2"
                                        style="border-bottom: 0.2rem solid #f5bb35 !important">
                                        {{ $variation->level->level_name }}
                                    </div>
                                </div>
                            @endforeach

                            <div class="col-12 d-flex justify-content-center animate-home gap-2">
                                <button type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop"
                                    class="mt-4 btn-sekarang   shadow">DAFTAR
                                    SEKARANG</button>
                                <a class="mt-4 btn-selengkapnya  shadow tab-button" onclick="openTab(event, 'tab2')">INFO
                                    SELENGKAPNYA</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div id="tab2" class="tab-content">
        <section class="detail-program">
            <div class="container container-program">
                <div class="pt-5 position-relative mb-5">
                    <a class="btn-back-detail mb-2 animate-home tab-button" onclick="openTab(event, 'tab1')">
                        <i class="fa-solid fa-arrow-left "></i>
                        <div class="text ">Kembali</div>
                    </a>
                    <h1 class="text-center fw-semibold mb-4">{{ $program->program_name }}</h1>
                </div>
            </div>
            <div class="d-flex justify-content-center">
                <div class="program-flex">
                    <div class="row row-cols-3 animate-home">
                        @foreach ($program->variations as $variation)
                            @if ($variation->level->category == 'SMA')
                                <div class="col mb-3">
                                    <div class="bt-program fw-semibold  border-bottom py-2"
                                        style="border-bottom: 0.2rem solid #f5bb35 !important">
                                        {{ $variation->level->level_name }}
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <div class="description
                                        mb-5">
                        {!! $program->senior_description !!}
                    </div>
                    <div class="row row-cols-3  animate-home">
                        @foreach ($program->variations as $variation)
                            @if ($variation->level->category == 'SMP')
                                <div class="col mb-3">
                                    <div class="bt-program fw-semibold  border-bottom py-2"
                                        style="border-bottom: 0.2rem solid #f5bb35 !important">
                                        {{ $variation->level->level_name }}
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <div class="description
                                                        mb-5">
                        {!! $program->junior_description !!}
                    </div>
                    <div class="row row-cols-3  animate-home">
                        @foreach ($program->variations as $variation)
                            @if ($variation->level->category == 'SD')
                                <div class="col mb-3">
                                    <div class="bt-program fw-semibold  border-bottom py-2"
                                        style="border-bottom: 0.2rem solid #f5bb35 !important">
                                        {{ $variation->level->level_name }}
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <div class="description">
                        {!! $program->elementary_description !!}
                    </div>
                    <div class="col-12 d-flex justify-content-center animate-home gap-2 mb-5">
                        <button type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop"
                            href="../pemesanan-program.html" class="mt-4 btn-sekarang   shadow">DAFTAR
                            SEKARANG</button>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content modal-content-pemesanan">
                <div class="modal-header modal-header-pemesanan">
                    <div class="modal-header-pemesanan-content">
                        <img src="../assets/gambar/logo.png" width="30%" alt="">
                    </div>
                </div>
                <div class="modal-body ">
                    <h1 class="fs-4 mb-3 text-center">{{ $program->program_name }}</h1>
                    <form action="{{ route('booking') }}" method="POST">
                        @csrf
                        <input type="hidden" value="{{ $program->id_programs }}" name="id_programs">
                        <div class="mb-3">
                            <label for="" class="form-label fw-bold">
                                Plih Kelas
                            </label>
                            <select name="id_level" id="id_level" class="form-control rounded-4 bg-light" required>
                                <option value="" selected>Plih Kelas</option>
                                @foreach ($program->variations as $variation)
                                    <option value="{{ $variation->level->id_levels }}"
                                        data-program="{{ $variation->program->id_programs }}">
                                        {{ $variation->level->level_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label fw-bold">
                                Pilih Waktu
                            </label>
                            <select name="id_time" id="id_time" class="form-control rounded-4 bg-light" required>
                                <option value="">Plih Waktu </option>
                                @foreach ($times as $time)
                                    <option value="{{ $time->id_time }}">
                                        @if ($time->day == 'day1')
                                            Senin & Kamis
                                        @elseif ($time->day == 'day2')
                                            Selasa & Jumat
                                        @else
                                            Rabu & Sabtu
                                        @endif

                                        <span>/</span>
                                        Pukul:
                                        @if ($time->time == 'time1')
                                            15.00 & 17.00
                                        @else
                                            17.20 & 19.30
                                        @endif
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label fw-bold">
                                Pilih Ruangan
                            </label>
                            <select name="id_room" id="id_room" class="form-control rounded-4 bg-light" required>
                                <option value="">Plih Ruangan </option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label fw-bold">Nama Lengkap</label>
                            <input type="text" name="name" id="nama" class="form-control rounded-4 bg-light"
                                placeholder="masukan nama lengkap" required>
                        </div>
                        <div class="row row-cols-2">
                            <div class="mb-3">
                                <label for="tempat-lahir" class="form-label fw-bold">Tempat
                                    Lahir</label>
                                <input type="text" name="place_birth" id="tempat-lahir"
                                    class="form-control rounded-4 bg-light" placeholder="masukan tempat lahir" required>
                            </div>
                            <div class="mb-3">
                                <label for="tanggal-lahir" class="form-label fw-bold">Tanggal
                                    Lahir</label>
                                <input type="date" name="date_birth" id="tanggal-lahir"
                                    class="form-control rounded-4 bg-light" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="telepon" class="form-label fw-bold"> No. Handphone</label>
                            <input type="number" name="phone_number" id="telepon"
                                class="form-control rounded-4 bg-light" placeholder="masukan nomor handphone" required>
                        </div>
                        <div class="mb-5">
                            <label for="sekolah" class="form-label fw-bold"> Asal Sekolah</label>
                            <input type="text" name="school" id="sekolah" class="form-control rounded-4 bg-light"
                                placeholder="masukan asal sekolah" required>
                        </div>
                        <div class="mb-3">
                            <label for="orang-tua" class="form-label fw-bold"> Nama Orang Tua /
                                Wali</label>
                            <input type="text" name="parent_name" id="orang-tua"
                                class="form-control rounded-4 bg-light" placeholder="masukan nama orang tua" required>
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label fw-bold"> Alamat</label>
                            <input type="text" name="address" id="alamat" class="form-control rounded-4 bg-light"
                                placeholder="masukan alamat" required>
                        </div>
                        <div class="mb-3">
                            <label for="telepon-orang-tua" class="form-label fw-bold"> No. Handphone
                                Orang
                                Tua / Wali</label>
                            <input type="number" name="parent_phone_number" id="telepon-orang-tua"
                                class="form-control rounded-4 bg-light" placeholder="masukan nomer telepon orang tua"
                                required>
                        </div>
                        <div class="mb-5">
                            <label for="pekerjaan" class="form-label fw-bold"> Pekerjaan Orang Tua /
                                Wali</label>
                            <input type="text" name="parent_job" id="pekerjaan"
                                class="form-control rounded-4 bg-light" placeholder="masukan pekerjaan orang tua"
                                required>
                        </div>
                        {{-- <div class="mb-5">
                            <label for="" class="form-label fw-bold"> Diskon</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox"
                                    value="Pembayaran Lunas bulan Maret s/d April Rp.500.000" id="pembayaran-maret-april">
                                <label class="form-check-label" for="pembayaran-maret-april">
                                    Pembayaran Lunas bulan Maret s/d April <b>Rp.500.000</b> </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox"
                                    value="Pembayaran Lunas bulan Mei s/d Juni 
                                    Rp400.000"
                                    id="pembayaran-mei-juni">
                                <label class="form-check-label" for="pembayaran-mei-juni">Pembayaran
                                    Lunas
                                    bulan Mei s/d Juni
                                    <b>Rp400.000</b>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="">
                                <label class="form-check-label" for="">Juara umum 1,2,3 di sekolah
                                    (menunjukkan bukti surat
                                    keterangan) <b>Rp.200.000</b>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox"
                                    value="Peringkat 1-10 di kelas Rp.100.000" id="peringkat">
                                <label class="form-check-label" for="peringkat">Peringkat 1-10 di kelas
                                    <b>Rp.100.000</b>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Ketua OSIS Rp.200.000"
                                    id="ketua-osis">
                                <label class="form-check-label" for="ketua-osis">Ketua OSIS
                                    <b>Rp.200.000</b>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox"
                                    value="Menjuarai lomba-lomba akademik dan sejenisnya (provinsi & kabupaten) seperti karya ilmiah paskibraka, debat, olimpiade akademik dan essay, (menunjukkan piagam) Rp.200.000"
                                    id="juara-akademik">
                                <label class="form-check-label" for="juara-akademik">Menjuarai
                                    lomba-lomba
                                    akademik dan
                                    sejenisnya
                                    (provinsi & kabupaten) seperti karya ilmiah paskibraka, debat,
                                    olimpiade
                                    akademik dan essay,
                                    (menunjukkan piagam) <b> Rp.200.000</b>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox"
                                    value="Menjuarai lomba seperti point diatas tingkat nasional (menunjukan piagam) Rp.400.000"
                                    id="juara-nasional">
                                <label class="form-check-label" for="juara-nasional">Menjuarai lomba
                                    seperti
                                    point diatas
                                    tingkat
                                    nasional (menunjukan piagam) <b>Rp.400.000</b>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox"
                                    value="Pendaftaran kolektif minimal 4 orang Rp.100.000" id="pendaftaran-kolektif">
                                <label class="form-check-label" for="pendaftaran-kolektif">Pendaftaran
                                    kolektif minimal 4 orang
                                    <b>Rp.100.000</b>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Alumni Triton Rp.200.000"
                                    id="alumni-triton">
                                <label class="form-check-label" for="alumni-triton">Alumni Triton
                                    <b>Rp.200.000</b>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Anak Guru dan Dosen Rp.100.000"
                                    id="anak-guru">
                                <label class="form-check-label" for="anak-guru">Anak Guru dan Dosen
                                    <b>Rp.100.000</b>
                                </label>
                            </div>
                        </div> --}}
                        <div class="mb-5 d-flex justify-content-center gap-2">
                            <button type="button" class="btn btn-primary  py-2 px-4 fw-semibold"
                                data-bs-dismiss="modal">TUTUP</button>
                            <input type="submit" class="btn btn-danger py-2 px-4 text-center fw-semibold"
                                value="DAFTAR">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="btn-link left">
        @if ($previous)
            <a href="{{ route('program.show', $previous->id_programs) }}">
                <i class="fa-solid fa-chevron-left fa-lg"></i></a>
        @endif
    </div>

    <div class="btn-link right">
        @if ($next)
            <a href="{{ route('program.show', $next->id_programs) }}">
                <i class="fa-solid fa-chevron-right fa-lg"></i></a>
        @endif
    </div>

    @push('css')
        <style>
            .tab-button {
                cursor: pointer;
            }

            .tab-content {
                display: none;
            }

            #header {
                display: none;
            }

            .btn-link {
                border-radius: 50%;
                background-color: rgb(211, 4, 4);
                position: absolute;
                top: 50%;
                transform: translateY(-50%);
                width: 5rem;
                height: 5rem;
                display: flex;
                justify-content: center;
                align-items: center;
                color: #fff;
                text-decoration: none;
                opacity: 50%;
                transition: 400ms ease-in-out;
                cursor: pointer;
                overflow: hidden;
            }

            .btn-link:hover {
                color: #fff;
                opacity: 80%;
            }

            .btn-link a {
                text-decoration: none;
                color: #fff;
                width: 100%;
                height: 100%;
                display: flex;
                justify-content: center;
                align-items: center;
            }

            .btn-link.right {
                right: 20px;
            }

            .btn-link.left {
                left: 20px;
            }
        </style>
    @endpush
    @push('scripts')
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- Sertakan jQuery -->
        <script>
            function openTab(evt, tabName) {
                var i, tabContent, tabButtons;

                tabContent = document.getElementsByClassName("tab-content");
                for (i = 0; i < tabContent.length; i++) {
                    tabContent[i].style.display = "none";
                }

                tabButtons = document.getElementsByClassName("tab-button");
                for (i = 0; i < tabButtons.length; i++) {
                    tabButtons[i].classList.remove("active");
                }

                document.getElementById(tabName).style.display = "block";
                evt.currentTarget.classList.add("active");
            }

            // Secara default, buka tab pertama kali di load
            document.getElementById("tab1").style.display = "block";
            document.getElementsByClassName("tab-button")[0].classList.add("active");

            $('#id_time').on('change', function(e) {
                e.preventDefault();

                // Anda mungkin perlu mendapatkan id_level juga di sini, tergantung pada logika Anda
                var id_level = $('#id_level').val(); // Ambil nilai kelas yang dipilih
                var id_program = $('#id_level').find(':selected').data(
                    'program'); // Ambil data-program dari kelas yang dipilih
                var id_time = $(this).val(); // Ambil nilai waktu yang dipilih

                // Periksa apakah id_program dan id_time ada sebelum mengirimkan permintaan AJAX
                var url = "{{ route('program.show-room') }}";

                // Kirim permintaan AJAX
                $.ajax({
                    type: 'GET',
                    url: url,
                    data: {
                        id_level: id_level,
                        id_program: id_program,
                        id_time: id_time // Sertakan id_time dalam data yang dikirim
                    },
                    success: function(data) {
                        var rooms = data.data;
                        var idRoomSelect = $('#id_room'); // Dapatkan elemen select dengan id "id_room"

                        // Kosongkan pilihan sebelum menambahkan yang baru
                        idRoomSelect.empty();

                        // Loop melalui data ruangan dan tambahkan pilihan ke dalam select
                        if (rooms.length === 0) {
                            // Jika tidak ada data ruangan, tambahkan opsi default
                            var defaultOption = $('<option>', {
                                value: '', // Atur nilai ke kosong atau sesuai kebutuhan Anda
                                text: 'Tidak ada ruangan yang tersedia untuk kelas dan waktu yang dipilih',
                                disabled: 'disabled',
                                selected: 'selected'
                            });
                            idRoomSelect.append(defaultOption);
                        } else {
                            // Jika ada data ruangan, loop melalui data dan tambahkan pilihan ke dalam select
                            rooms.forEach(function(room) {
                                // Buat elemen option dengan nilai (value) berupa id_room dan teks (text) berupa room_name
                                var option = $('<option>', {
                                    value: room.room.id_room,
                                    text: room.room.room_name + ', Tersedia ' + room
                                        .capacity +
                                        ' Peserta'
                                });

                                // Jika capacity adalah 0, nonaktifkan opsi
                                if (room.capacity == 0) {
                                    option.prop('disabled', true);
                                }

                                // Tambahkan elemen option ke dalam select
                                idRoomSelect.append(option);
                            });
                        }
                    }
                });
            });
        </script>
    @endpush
@endsection
