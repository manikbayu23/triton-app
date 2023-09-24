//navbar
window.addEventListener('scroll', () => {
    if (window.scrollY > 400) {
        document.getElementById('header').classList.add('nav-scroll');
        document.getElementById('navbar-brand').classList.add('show');
    } else {
        document.getElementById('header').classList.remove('nav-scroll');
        document.getElementById('navbar-brand').classList.remove('show');

    }
});






var h2 = document.querySelector('h2');
window.addEventListener('load', function () {
    h2.classList.add('show');
});

//tahun footer
const tahunSpan = document.getElementById('tahun');
const tahunSekarang = new Date().getFullYear();
tahunSpan.textContent = tahunSekarang;

const MyNamespace = {
    init: function () {
        const comments = document.querySelector('.comments');

        setInterval(function () {
            comments.scrollBy(0, 1);
            if (comments.scrollTop >= comments.scrollHeight - comments.offsetHeight) {
                comments.scrollTop = 0;
            }
        }, 20);
    }
};


//loader
var loader = function () {
    setTimeout(function () {
        if ($('#triton-loader').length > 0) {
            $('#triton-loader').removeClass('show');
            $('.animate-home').addClass('animate__animated animate__fadeInUp');
            $('.animate-home-left').addClass('animate__animated animate__zoomIn');
        }
    }, 1000);
};

loader();


// var buttonHome = document.querySelector(".button-home");

// // Tambahkan event listener untuk window dan menentukan kapan elemen akan muncul
// window.addEventListener("scroll", function () {
//     if (window.pageYOffset > 500) {
//         buttonHome.classList.add("home-scroll");
//     } else {
//         buttonHome.classList.remove("home-scroll");
//     }
// });



function sendWhatsapp () {
    let nama = document.getElementById("nama").value;
    let tempatLahir = document.getElementById("tempat-lahir").value;
    let tanggalLahir = document.getElementById("tanggal-lahir").value;
    let telepon = document.getElementById("telepon").value;
    let sekolah = document.getElementById("sekolah").value;
    let orangTua = document.getElementById("orang-tua").value;
    let alamat = document.getElementById("alamat").value;
    let teleponTua = document.getElementById("telepon-orang-tua").value;
    let pekerjaan = document.getElementById("pekerjaan").value;
    let programBelajar = document.getElementById("program-belajar").value;
    let hari = document.getElementById("hari").value;
    let jam = document.getElementById("jam").value;
    let bayarMaretApril = document.getElementById("pembayaran-maret-april").value;
    let bayarMeiJuni = document.getElementById("pembayaran-mei-juni").value;
    let peringkat = document.getElementById("peringkat").value;
    let ketuaOsis = document.getElementById("ketua-osis").value;
    let juaraAkademik = document.getElementById("juara-akademik").value;
    let juaraNasional = document.getElementById("juara-nasional").value;
    let pendaftaranKolektif = document.getElementById("pendaftaran-kolektif").value;
    let alumniTriton = document.getElementById("alumni-triton").value;
    let anakGuru = document.getElementById("anak-guru").value;


    if (validateForm()) {
        let message = "Hi, cs Triton saya ingin memesan" + "%0AProgram: " + programBelajar +
          "%0ANama: " + nama + "%0ATelepon: " + telepon + "%0ATempat Lahir: " + tempatLahir
          + "%0ATanggal Lahir: " + tanggalLahir + "%0Asal Sekolah: " + sekolah + "%0ANama Orang Tua / Wali: " + orangTua 
          "%0AAlamat: " + alamat + "%0ANo. Telepon Orang Tua: " + teleponTua + "%0APekerjaan: " + pekerjaan + "%0APilihan Hari: " + hari + "%0APilihan Jam: " + jam;
    
        if (bayarMaretApril !== null) {
          message += "%0ADiskon: " + bayarMaretApril;
        }
        else if (bayarMeiJuni !== null) {
          message += "%0ADiskon: " + bayarMeiJuni;
        }
        else if (peringkat !== null) {
          message += "%0ADiskon: " + peringkat;
        }
        else if (ketuaOsis !== null) {
          message += "%0ADiskon: " + ketuaOsis;
        }
        else if (juaraAkademik !== null) {
          message += "%0ADiskon: " + juaraAkademik;
        }
        else if (juaraNasional !== null) {
          message += "%0ADiskon: " + juaraNasional;
        }
        else if (pendaftaranKolektif !== null) {
          message += "%0ADiskon: " + pendaftaranKolektif;
        }
        else if (alumniTriton !== null) {
          message += "%0ADiskon: " + alumniTriton;
        }
        else if (anakGuru !== null) {
          message += "%0ADiskon: " + anakGuru;
        }
  
       
        let url = "https://wa.me/6282146434314?text=" + message;
        window.open(url);
      }
};

function validateForm() {
    let nama = document.getElementById("nama").value;
    let tempatLahir = document.getElementById("tempat-lahir").value;
    let tanggalLahir = document.getElementById("tanggal-lahir").value;
    let telepon = document.getElementById("telepon").value;
    let sekolah = document.getElementById("sekolah").value;
    let orangTua = document.getElementById("orang-tua").value;
    let alamat = document.getElementById("alamat").value;
    let teleponTua = document.getElementById("telepon-orang-tua").value;
    let pekerjaan = document.getElementById("pekerjaan").value;
    let programBelajar = document.getElementById("program-belajar").value;
    let hari = document.getElementById("hari").value;
    let jam = document.getElementById("jam").value;

  
    if (nama === "" || tempatLahir === "" || tanggalLahir === "" || telepon === "" || sekolah === "" || orangTua === "" || alamat === "" 
    || programBelajar === "" || hari === "" || jam === "" || teleponTua === "" || pekerjaan === ""  ) {
      alert("Please complete all forms before ordering.");
      return false;
    }
    return true;
  };
  