<!-- about.blade.php -->

@extends('layouts.master')

@section('title', 'About Us')
@section('header', 'About Us')
@section('header-description', 'Information about sweet potatoes in Kampung Bersahati, Distrik Tanah Miring, Merauke')

@section('content')
<section class="py-5">
    <!-- About Start -->
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                <div class="about-img position-relative overflow-hidden p-5 pe-0">
                    <img class="img-fluid w-100" src="{{ asset('assets/about.jpg') }}" alt="About Image"
                        style="width: 100%; height: auto;">
                </div>
            </div>
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                <h1 class="mb-4 text-black">Best Organic Sweet Potatoes</h1>
                <p class="mb-4 text-black">Explore the rich and diverse world of sweet potatoes in KAMPUNG
                    BERSEHATI, DISTRIK TANAH MIRING, MERAUKE. Immerse yourself in the fascinating journey of this
                    nutritious and versatile tuber that has become a staple in the local community.</p>
                <div class="checklist mb-4">
                    <p><i class="fa fa-check text-black me-3"></i>Discover the natural growth process and
                        cultivation techniques</p>
                    <p><i class="fa fa-check text-black me-3"></i>Experience the unique flavors and varieties of
                        sweet potatoes</p>
                    <p><i class="fa fa-check text-black me-3"></i>Learn about the biologically safe practices
                        followed by local farmers</p>
                    <p><i class="fa fa-check text-black me-3"></i>Explore the cultural significance of sweet
                        potatoes in the community</p>
                    <p><i class="fa fa-check text-black me-3"></i>Explore sweet potatoes' contribution to organic
                        and sustainable agriculture</p>
                </div>
                <a class="btn btn-outline-dark rounded-pill" href="#">Read More</a>
            </div>
        </div>
    </div>
    </div>
    <!-- About End -->

    <!-- Feature Start -->
    <div class="container-fluid bg-light bg-icon py-6">
        <div class="container">
            <div class="section-header text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s"
                style="max-width: 500px;">
                <h1 class="text-black">Our Features</h1>
                <p>Discover sweet potatoes in KAMPUNG BERSEHATI, DISTRIK TANAH MIRING, MERAUKE.</p>
            </div>
            <div class="row g-4">
                <!-- Natural Process -->
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-white text-center h-100 p-4 p-xl-5">
                        <img class="img-fluid mb-4" src="{{ asset('assets/icon-1.png') }}" alt="Icon 1">
                        <h4 class="mb-3">Natural Process</h4>
                        <p class="mb-4">Discover the natural process behind our sweet potatoes. Lorem ipsum dolor sit
                            amet,
                            consectetur adipiscing elit.</p>
                        <a class="btn btn-outline-dark rounded-pill" href="#">Read More</a>
                    </div>
                </div>

                <!-- Organic Products -->
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-white text-center h-100 p-4 p-xl-5">
                        <img class="img-fluid mb-4" src="{{ asset('assets/icon-2.png') }}" alt="Icon 2">
                        <h4 class="mb-3">Organic Products</h4>
                        <p class="mb-4">Explore our range of organic sweet potato products. Lorem ipsum dolor sit amet,
                            consectetur adipiscing elit.</p>
                        <a class="btn btn-outline-dark rounded-pill" href="#">Read More</a>
                    </div>
                </div>

                <!-- Biologically Safe -->
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="bg-white text-center h-100 p-4 p-xl-5">
                        <img class="img-fluid mb-4" src="{{ asset('assets/icon-3.png') }}" alt="Icon 3">
                        <h4 class="mb-3">Biologically Safe</h4>
                        <p class="mb-4">Experience biologically safe sweet potatoes. Lorem ipsum dolor sit amet,
                            consectetur
                            adipiscing elit.</p>
                        <a class="btn btn-outline-dark rounded-pill" href="#">Read More</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Feature End -->
</section>

@endsection