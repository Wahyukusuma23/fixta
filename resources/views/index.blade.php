@extends('front-app')
@section('content')
<!-- ***** Welcome Area Start ***** -->
<div class="welcome-area" id="welcome">

    <!-- ***** Header Text Start ***** -->
    <div class="header-text">
        <div class="container">
            <div class="row">
                <div class="left-text col-lg-6 col-md-6 col-sm-12 col-xs-12" data-scroll-reveal="enter left move 30px over 0.6s after 0.4s">
                    <h1>Pengajuan <strong>IMP Online</strong></h1>
                    <p>Bentuk baru dalam pengajuan Form Ijin Meninggalkan Perusahaan. Efektif, Efisien dan Transparan.</p>
                    @if (Auth::guard('kary')->check())
                    <a href="{{route('karyawan.pengajuan')}}" class="main-button-slider" style="cursor:pointer;color:white;width: auto;display: inline-block;text-align: center;">Buat Pengajuan</a>
                    @else
                    <a href="{{route('register.view')}}" class="main-button-slider" style="cursor:pointer;color:white;width: auto;display: inline-block;text-align: center;">Register</a>
                    @endif
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" data-scroll-reveal="enter right move 30px over 0.6s after 0.4s">
                    <img src="/images/right-image.png" class="rounded img-fluid d-block mx-auto" alt="First Vector Graphic">
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Header Text End ***** -->
</div>
<!-- ***** Welcome Area End ***** -->
<!-- ***** Features Big Item Start ***** -->
<section class="section" id="about">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-12 col-sm-12" data-scroll-reveal="enter left move 30px over 0.6s after 0.4s">
                <img src="/images/left-image.png" class="rounded img-fluid d-block mx-auto" alt="App">
            </div>
            <div class="right-text col-lg-5 col-md-12 col-sm-12 mobile-top-fix">
                <div class="left-heading">
                    <h5>Tentang Perusahaan</h5>
                </div>
                <div class="left-text">
                    <p>Surabaya Autocomp Indonesia atau PT. SAI yang berlokasi di Mojokerto, merupakan perusahaan penanaman modal asing dari Jepang, yang bergerak di bidang produksi Komponen Otomotif Wiring Harness Untuk Mobil Toyota, Daihatsu, Madza. Perusahaan ini terletak di Ktr Pusat Kawasan Ngoro Industri Persada Kawasan Ngoro Industri Persada Kav T-1 Ngoro Ngoro Industri 61385 Jawa Timur.</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="hr"></div>
            </div>
        </div>
    </div>
</section>
<!-- ***** Features Big Item End ***** -->
@endsection
