@extends('layouts.master')

@section('title', 'Tentang Kami')
@section('header', 'Tentang Kami')
@section('header-description', 'Menyajikan Informasi tentang Ubi Jalar di Kampung Bersahati, Distrik Tanah Miring,
Merauke')

@section('content')
<section class="py-5">
    <div class="container">
        <!-- About Start -->
        <div class="row g-5 align-items-center">
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                <div class="about-img position-relative overflow-hidden p-5 pe-0">
                    <img class="img-fluid w-100" src="{{ asset('assets/about.jpg') }}" alt="Gambar Tentang Kami">
                </div>
            </div>
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                <h1 class="mb-4 text-black">Ubi Jalar Organik Terbaik</h1>
                <p class="mb-4 text-black">Eksplorasi dunia ubi jalar yang kaya dan beragam di KAMPUNG BERSEHATI,
                    DISTRIK TANAH MIRING, MERAUKE. Dapatkan pengalaman perjalanan menarik umbi yang kaya gizi dan
                    serbaguna ini
                    yang
                    telah menjadi makanan pokok di komunitas setempat.</p>
                <div class="mb-4">
                    <i class="fa fa-check text-black me-3"></i>Temukan proses pertumbuhan alami dan teknik bercocok
                    tanam<br>
                    <i class="fa fa-check text-black me-3"></i>Rasakan rasa dan variasi unik dari ubi jalar<br>
                    <i class="fa fa-check text-black me-3"></i>Pelajari praktik-praktik pertanian yang aman secara
                    biologis<br>
                    <i class="fa fa-check text-black me-3"></i>Menjelajahi signifikansi budaya ubi jalar dalam
                    komunitas<br>
                    <i class="fa fa-check text-black me-3"></i>Menjelajahi kontribusi ubi jalar terhadap pertanian
                    organik dan berkelanjutan
                </div>

                <a class="btn btn-outline-dark rounded-pill" href="#">Selengkapnya</a>
            </div>
        </div>
        <!-- About End -->

        <!-- Feature Start -->
        <div class="container-fluid bg-light bg-icon py-6">
            <div class="container">
                <div class="section-header text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s"
                    style="max-width: 500px;">
                    <h1 class="text-black">Fitur Kami</h1>
                    <p>Temukan keunikan ubi jalar di KAMPUNG BERSEHATI, DISTRIK TANAH MIRING, MERAUKE.</p>
                </div>
                <div class="row g-4">
                    <!-- Natural Process -->
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="bg-white text-center h-100 p-4 p-xl-5 rounded">
                            <img class="img-fluid mb-4" src="{{ asset('assets/icon-1.png') }}" alt="Ikon 1">
                            <h4 class="mb-3">Proses Alami</h4>
                            <p class="mb-4">Temukan proses alami di balik ubi jalar kami. Mengetahui lebih lanjut
                                tentang bagaimana
                                kami membudidayakan ubi jalar secara organik dan menghormati lingkungan.</p>
                            <a class="btn btn-outline-dark rounded-pill" href="#">Selengkapnya</a>
                        </div>
                    </div>

                    <!-- Organic Products -->
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="bg-white text-center h-100 p-4 p-xl-5 rounded">
                            <img class="img-fluid mb-4" src="{{ asset('assets/icon-2.png') }}" alt="Ikon 2">
                            <h4 class="mb-3">Produk Organik</h4>
                            <p class="mb-4">Jelajahi rangkaian produk ubi jalar organik kami. Temukan bagaimana kami
                                menghasilkan
                                produk berkualitas tinggi yang ramah lingkungan dan bebas bahan kimia.</p>
                            <a class="btn btn-outline-dark rounded-pill" href="#">Selengkapnya</a>
                        </div>
                    </div>

                    <!-- Biologically Safe -->
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="bg-white text-center h-100 p-4 p-xl-5 rounded">
                            <img class="img-fluid mb-4" src="{{ asset('assets/icon-3.png') }}" alt="Ikon 3">
                            <h4 class="mb-3">Aman Secara Biologis</h4>
                            <p class="mb-4">Rasakan ubi jalar yang aman secara biologis. Pelajari lebih lanjut tentang
                                bagaimana kami
                                menjaga keamanan produk kami dengan praktik pertanian yang ramah lingkungan.</p>
                            <a class="btn btn-outline-dark rounded-pill" href="#">Selengkapnya</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- Feature End -->
    </div>
</section>

@endsection