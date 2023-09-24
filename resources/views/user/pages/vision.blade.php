@extends('user.layouts.base-template')

@section('content')
    <section class="">
        <div class="container container-program">
            <div class="pt-5 position-relative mb-5">
                <a href="{{ route('home') }}" class="btn-back-detail mb-2 animate-home tab-button">
                    <i class="fa-solid fa-arrow-left "></i>
                    <div class="text ">Kembali</div>
                </a>
                <h2 class="text-center text-dark fw-semibold mb-1 mt-3">Kenapa harus pilih Triton?</h2>
                <h3 class="text-center text-dark mb-5">Kami Memiliki Fasilitas Terbaik</h3>
                <div class="d-flex justify-content-center ">
                    <div class="d-flex justify-content-center mb-5" style="height: 15rem; width: 25rem;">
                        <img src="{{ asset('assets/gambar/8.png') }}" class="object-fit-cover rounded-5 bg-primary w-100"
                            alt="...">
                    </div>
                </div>
                <div>
                    <h1 class="text-center text-dark fw-semibold mb-2">Visi Misi</h1>
                    <div class="d-flex justify-content-around mb-5 gap-2">
                        <div class="col-6 text-end">
                            Turut serta dalam mencerdaskan kehidupan bangsa dan menjadi bimbingan belajar yang unggul
                            adaptif serta solutif dalam memberi pelayanan akademis kepada siswa
                        </div>
                        <div class="col-6">
                            <ul>
                                <li>Mencetak siswa-siswa berprestasi baik di tingkat daerah maupun nasional,</li>
                                <li>Menjalankan roda perusahaan dengan tata kelola yang baik,</li>
                                <li>Menghasilkan guru-guru terbaik di masing-masing bidang yang</li>
                                <li>Memberkan pelayanan yang solutif dan adaptif sesuai dengan perkembangan zaman</li>
                            </ul>
                        </div>
                    </div>

                    <div class="section-strategi">
                        <div class="line"></div>
                        <div class="content-strategi">
                            <div class="d-flex mb-5 ">
                                <div class="col-5 text-end mr-2">
                                    <h4>Strategi Pembelajaran Diawali
                                        Dengan Menuntaskan Masalah
                                        Akademik Siswa</h4>
                                    <p>Materi yg dibahas di Triton sejalan
                                        dengan materi yang dibahas di sekolah.
                                        Ketika ada materi yang terlewat di sekolah,
                                        kamu bisa membahasnya lagi di Triton</p>
                                </div>
                                <div class="col-2 d-flex justify-content-center  mb-3">
                                    <div style="height: 12rem; width: 12rem;">
                                        <img src="{{ asset('assets/gambar/1.png') }}"
                                            class="object-fit-cover rounded-circle bg-primary w-100" alt="...">
                                    </div>
                                </div>
                                <div class="col-5"></div>
                            </div>


                            <div class="d-flex mb-5 ">
                                <div class="col-5 text-end mr-2">
                                </div>
                                <div class="col-2 d-flex justify-content-center  mb-3">
                                    <div class="rounded-circle overflow-hidden" style="height: 12rem; width: 12rem;">
                                        <img src="{{ asset('assets/gambar/2.png') }}"
                                            class="object-fit-cover  bg-primary w-100" alt="...">
                                    </div>
                                </div>
                                <div class="col-5">
                                    <h4>Seni Pemecahan Masalah (The Art of
                                        Problem Solving)</h4>
                                    <p>Di Triton kamu akan diberikan tips dan trik dalam menjawab soal berupa cara cepat
                                        menghafal
                                        teks dan rumus rumus singkat.</p>
                                    <ul>
                                        <li>Untuk mata pelajaran yang berbasis teks seperti Bahasa Indonesia dan Biologi,
                                            kamu akan
                                            di diberikan cara menghafal. Contohnya bisa dilihat disini.</li>
                                        <li>Untuk mata pelajaran yg berbasis angka seperti Matematika dan Fisika, kamu akan
                                            diberikan rumus rumus singkat yang merupakan rumus modifikasi dari rumus konsep
                                            yang
                                            disederhanakan menjadi rumus yang lebih singkat guna untuk mempermudah kamu
                                            dalam
                                            mengingat, memahami dan menghemat waktumu disaat ujian. Contohnya bisa dilihat
                                            disini.
                                        </li>
                                    </ul>
                                </div>
                            </div>


                            <div class="d-flex mb-5 ">
                                <div class="col-5 text-end mr-2">
                                    <h4>Klinik Akademik Belajar Tambahan</h4>
                                    <p>Di Triton kamu bisa melakukan klinik akademik dengan 1 pengajar 1 siswa, bisa juga
                                        dilakukan
                                        setiap
                                        hari
                                        dengan batasan waktu 1 jam. Apabila klinikmu lebih dari 1 orang, Triton akan
                                        mengelompokkan
                                        kamu
                                        dengan
                                        siswa lain yang memiliki jenjang sama / tidak dicampur. Di Triton juga tidak
                                        menggunakan
                                        sistem guru
                                        piket / jaga, jadi kamu bisa langsung booking ke admin, informasikan ingin belajar
                                        mata
                                        pelajaran
                                        apa,
                                        hari apa, pengajarnya siapa. Diinformasikan sehari sebelum kalian melakukan klinik
                                        akademik.
                                        Untuk
                                        klinik akademik ini kamu bisa lakukan secara GRATIS.</p>
                                </div>
                                <div class="col-2 d-flex justify-content-center  mb-3">
                                    <div class="rounded-circle overflow-hidden" style="height: 12rem; width: 12rem;">
                                        <img src="{{ asset('assets/gambar/3.png') }}"
                                            class="object-fit-cover  bg-primary w-100" alt="...">
                                    </div>
                                </div>
                                <div class="col-5"></div>
                            </div>

                            <div class="d-flex mb-5 ">
                                <div class="col-5 text-end mr-2">
                                </div>
                                <div class="col-2 d-flex justify-content-center  mb-3">
                                    <div class="rounded-circle overflow-hidden" style="height: 12rem; width: 12rem;">
                                        <img src="{{ asset('assets/gambar/4.png') }}"
                                            class="object-fit-cover  bg-primary w-100" alt="...">
                                    </div>
                                </div>
                                <div class="col-5">
                                    <h4>Jadwal Fleksibel</h4>
                                    <p>Di Triton kamu bisa mengatur jadwal sendiri sesuai kebutuhan kamu. Misalnya kalau
                                        kamu akan
                                        ulangan
                                        fisika, kamu bisa booking untuk belajar fisika. Triton tidak mengharuskan kamu untuk
                                        belajar
                                        sesuai
                                        jadwal yang sudah ditentukan tapi sesuai dengan kebutuhanmu</p>
                                </div>
                            </div>

                            <div class="d-flex mb-5 ">
                                <div class="col-5 text-end mr-2">
                                    <h4>Request Pengajar</h4>
                                    <p>Di Triton kamu bisa bebas memilih pengajar yang kamu sukai sehingga kalian akan lebih
                                        nyaman
                                        dan
                                        lebih
                                        mudah mengerti akan materi yg dipaparkan. Pengajar di Triton merupakan pengajar yg
                                        profesional dan
                                        mumpuni, ada yang menjadi guru di sekolah, asisten dosen di kampus, dan juga menjadi
                                        dosen
                                        di
                                        kampus.
                                        Pengajar di Triton merupakan lulusan terbaik dari PTN favorit.</p>
                                </div>
                                <div class="col-2 d-flex justify-content-center  mb-3">
                                    <div style="height: 12rem; width: 12rem;">
                                        <img src="{{ asset('assets/gambar/5.png') }}"
                                            class="object-fit-cover rounded-circle bg-primary w-100" alt="...">
                                    </div>
                                </div>
                                <div class="col-5"></div>
                            </div>

                            <div class="d-flex mb-5 ">
                                <div class="col-5 text-end mr-2">
                                </div>
                                <div class="col-2 d-flex justify-content-center  mb-3">
                                    <div class="rounded-circle overflow-hidden" style="height: 12rem; width: 12rem;">
                                        <img src="{{ asset('assets/gambar/6.png') }}"
                                            class="object-fit-cover  bg-primary w-100" alt="...">
                                    </div>
                                </div>
                                <div class="col-5">
                                    <h4>Konsultasi Jurusan dan
                                        Perguruan Tinggi</h4>
                                    <p>Kamu merasa bingung nanti setelah lulus SMA mau lanjut kuliah dimana dan jurusan apa?
                                        Tenang
                                        kami
                                        bisa
                                        membantumu. Teknisnya, kamu akan diminta mengumpulkan nilai raport dari semester 1
                                        kelas 1
                                        SMA
                                        sampai
                                        semester 1 kelas 3 SMA kemudian akan dianalisa oleh Triton untuk memperoleh
                                        karakteristik
                                        dari
                                        nilaimu.
                                        Kamu juga akan diberikan peta persaingan antar universitas. Setelah itu Triton akan
                                        memberikan
                                        rekomendasi jurusan dan tempat kuliah yang sesuai dengan karakteristikmu</p>
                                </div>
                            </div>

                            <div class="d-flex mb-5 ">
                                <div class="col-5 text-end mr-2">
                                    <h4>Biaya Bimbel Terjangkau</h4>
                                    <p>Triton memberikan biaya bimbel yg sangat terjangkau jika dilihat dari fasilitas yang
                                        diberikan.
                                        Tunggu
                                        apalagii, Ayo bergabung dengan kami, Triton Denpasar untuk masa depan yang lebih
                                        cerah.</p>
                                </div>
                                <div class="col-2 d-flex justify-content-center  mb-3">
                                    <div style="height: 12rem; width: 12rem;">
                                        <img src="{{ asset('assets/gambar/7.png') }}"
                                            class="object-fit-cover rounded-circle bg-primary w-100" alt="...">
                                    </div>
                                </div>
                                <div class="col-5"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
{{-- panggil nama teacher --}}
@push('css')
    <style>
        #header {
            display: none;
        }

        .section-strategi {
            position: relative;
            overflow: hidden;
        }

        .content-strategi {
            position: relative;
            z-index: 2;
        }

        .line {
            height: 95%;
            width: 4px;
            left: 50%;
            transform: translateX(-50%);
            background-color: rgb(191, 191, 191);
            z-index: 1;
            position: absolute;

        }
    </style>
@endpush
