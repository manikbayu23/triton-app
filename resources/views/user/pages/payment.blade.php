@extends('user.layouts.base-template')
@section('content')
    <div class="d-flex justify-content-center  align-items-center bg-light" style="height: 100vh;">
        <div class="col-6 p-4  h-100 d-flex justify-content-center align-items-center">
            <div>
                <img src="{{ asset('assets/gambar/success.png') }}" width="500px" alt="">
            </div>
        </div>
        <div class="col-6 p-5">
            <div class="card rounded-3 border-0 shadow">
                <div class="card-header bg-white">
                    <div class="d-flex justify-content-between"><span>Invoice : {{ $booking['booking_code'] }}</span>
                        <span>Status :
                            <b>
                                @if ($booking['status'] == 0)
                                    Belum Dibayar
                                @endif
                            </b> </span>
                    </div>
                </div>
                <div class="card-body py-4">
                    <p class="text-secondary text-center" style="font-size: 14px;">Hai {{ $booking['name'] }}, terima kasih
                        telah melakukan
                        pendaftaran Bimbel
                        di
                        TRITON</p>
                    <p class="text-center" style="font-size: 14px;">Mohon transfers senilai:</p>
                    <div class="d-flex flex-column justify-content-center">
                        <div class="d-flex justify-content-center">
                            <div class="alert alert-primary w-75 d-flex justify-content-center gap-2 ">
                                <p class="fs-4 m-0"> Rp. <b class="fs-4 booking-price">{{ $booking['price'] }}</b></p>
                                <button id="copyButton" class="text-primary"
                                    style="background-color: transparent; border:none;"> <i
                                        class="fa-regular fa-clipboard fs-3"></i></button>
                            </div>
                        </div>
                        <p class="text-center " style="font-size: 14px;">Ke rekening di bawah ini: </p>
                        <div class="d-flex justify-content-center gap-2">
                            <div class="d-flex justify-content-center align-items-center">
                                <img src="{{ asset('assets/gambar/bca.png') }}" width="80px" alt="">
                            </div>
                            <div class="text-center text-secondary font-semibold fs-5 my-3"> 4324353</div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center py-3">
                        <a class="btn btn-primary text-center"
                            href="https://wa.me/6282146434314?text=Hii%20Triton%20Denpasar..."
                            target="_blank">Konfirmasi</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('css')
    <style>
        #header {
            display: none;
        }

        #footer {
            display: none;
        }
    </style>
@endpush

@push('scripts')
    <script>
        document.getElementById("copyButton").addEventListener("click", function() {
            var price = document.querySelector(".booking-price").textContent;

            navigator.clipboard.writeText(price)
                .then(function() {
                    alert("Disalin ke clipboard: ");
                })
                .catch(function(err) {
                    console.error("Gagal menyalin ke clipboard: ", err);
                });
        });
    </script>
@endpush
