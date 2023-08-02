{{-- @extends('layouts.home.template') --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Scaffold Bootstrap Template - Index</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('scaffold/assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('scaffold/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('scaffold/assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('scaffold/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('scaffold/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('scaffold/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('scaffold/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('scaffold/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('scaffold/assets/css/style.css') }}" rel="stylesheet">

</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center">
        <div class="container d-flex align-items-center">

            <div class="logo me-auto">
                <h1><a href="index.html">
                        <img src="{{ asset('assets/dashboard/img/gambar.png') }}" alt="">
                    </a></h1>
            </div>

            <nav id="navbar" class="navbar order-last order-lg-0">
                <ul>
                    <li><a class="nav-link scrollto active" href="#hero">Beranda</a></li>
                    <li><a class="nav-link scrollto" href="#about">Tentang Kami</a></li>
                    <li><a class="nav-link scrollto" href="#contact">Hubungi Kami</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->
        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero">

        <div class="container">
            <div class="row">
                <div class="col-lg-6 pt-5 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center"
                    data-aos="fade-up">
                    <div>
                        <h1>CV. Arvil Tunggal Engineering Consultant</h1>
                        <p style="text-align: justify">Merupakan salah satu dari sekian banyak perusahaan yang bergerak
                            dibidang jasa konsultasi.
                            Perusahaan ini didirikan oleh beberapa engineer yang mempunyai komitmen, loyalitas, dan
                            dedikasi yang tinggi terhadap bidang keilmuan maupun non-teknik. Perusahaan didirikan dengan
                            tujuan untuk pelayanan jasa kepada konsumen yang membutuhkan jasa konsultan dibidang
                            konstruksi, arsitek, pengembangan kota, dan wilayah serta tata lingkungan</p>
                        <a href="/login" class="btn-get-started scrollto">Login</a>
                    </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="fade-left">
                    <img src="{{ asset('scaffold/assets/img/hero-img.png') }}" class="img-fluid" alt="">
                </div>
            </div>
        </div>

    </section><!-- End Hero -->

    <main id="main">

        <!-- ======= About Section ======= -->
        <section id="about" class="about">
            <div class="container">

                <div class="row">
                    <div class="col-lg-6" data-aos="zoom-in">
                        <img src="{{ asset('scaffold/assets/img/about.jpg') }}" class="img-fluid" alt="">
                    </div>
                    <div class="col-lg-6 d-flex flex-column justify-contents-center" data-aos="fade-left">
                        <div class="content pt-4 pt-lg-0">
                            <h3>Tentang Kami</h3>
                            <p class="fst-italic">
                                Lingkup Kegiatan & Jasa Pelayanan
                            </p>
                            <ul>
                                <li><i class="bi bi-check-circle"></i> Jasa Konsultasi Bidang Konstruksi Sipil</li>
                                <li><i class="bi bi-check-circle"></i> Jasa Konsultasi Bidang Perencanaan dan Pengawasan
                                    Pembangunan</li>
                                <li><i class="bi bi-check-circle"></i>Jasa Konsultasi Bidang Arsitektur, Landscape,
                                    Design, Interior, dan Eksterior.
                                </li>
                                <li><i class="bi bi-check-circle"></i>Jasa Bidang Lingkungan Hidup (AMDAL)
                                </li>
                            </ul>
                            {{-- <p>
                                Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
                                reprehenderit in voluptate tera noden carma palorp mades tera.
                            </p> --}}
                        </div>
                    </div>
                </div>

            </div>
        </section><!-- End About Section -->

        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact section-bg">
            <div class="container">

                <div class="section-title" data-aos="fade-up">
                    <h2>Hubungi Kami</h2>
                </div>

                <div class="row">

                    <div class="col-lg-5 d-flex align-items-stretch" data-aos="fade-right">
                        <div class="info">
                            <div class="address">
                                <i class="bi bi-geo-alt"></i>
                                <h4>Alamat:</h4>
                                <p>Jl. Raja Eyato No.174, Molosipat W, Kec. Kota Bar., Kota Gorontalo, Gorontalo 96133
                                </p>
                            </div>

                            <div class="email">
                                <i class="bi bi-envelope"></i>
                                <h4>Email:</h4>
                                <p>arviltunggal29@gmail.com</p>
                            </div>

                            <div class="phone">
                                <i class="bi bi-phone"></i>
                                <h4>Call:</h4>
                                <p>+62 822-9364-4767</p>
                            </div>

                        </div>

                    </div>

                    <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch" data-aos="fade-left">
                        {{-- <iframe
                            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621"
                            frameborder="0" style="border:0; width: 100%; height: 290px;" allowfullscreen></iframe> --}}
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.641682053245!2d123.04703907416835!3d0.5391443994555862!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x32792b5c2decd1a7%3A0xa6477d3387880659!2sCV.%20ARVIL%20TUNGGAL%E2%80%9929%20ENGINEERING%20CONSULTANT!5e0!3m2!1sid!2sid!4v1690992832349!5m2!1sid!2sid"
                            width="800" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>

                </div>

            </div>
        </section><!-- End Contact Section -->

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="container">
            <div class="copyright">
                &copy; Copyright <strong><span>Aslan Onu</span></strong>. All Rights Reserved
            </div>
            <div class="credits">
                Designed by <a href="/">Aslan Onu</a>
            </div>
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('scaffold/assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('scaffold/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('scaffold/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('scaffold/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('scaffold/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('scaffold/assets/vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('scaffold/assets/js/main.js') }}"></script>

</body>

</html>
