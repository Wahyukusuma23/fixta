@extends('front-app')
@section('content')
<!-- ***** Welcome Area Start ***** -->
<div class="welcome-area" id="welcome">

    <!-- ***** Header Text Start ***** -->
    <div class="header-text">
        <div class="container">
            <div class="row">
                <div class="left-text col-lg-6 col-md-6 col-sm-12 col-xs-12" data-scroll-reveal="enter left move 30px over 0.6s after 0.4s">
                    <p>Selamat Datang,</p>
                    <h1> {{auth('kary')->user()->nama}}</h1>
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
            <div class="col-lg-5 col-md-12 col-sm-12" data-scroll-reveal="enter left move 30px over 0.6s after 0.4s">
                <img src="/images/left-image.png" class="rounded img-fluid d-block mx-auto" alt="App">
            </div>
            <div class="right-text col-lg-7 col-md-12 col-sm-12 mobile-top-fix">
                <div class="left-heading">
                    <h5>Data Karyawan</h5>
                </div>
                <div class="left-text">
                    <div class="card border-info mb-3">
                        {{-- <div class="card-header">Data Karyawan</div> --}}
                        <div class="card-body text-info">
                            <div class="row">
                                <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">NIK</div>
                                <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">: {{auth('kary')->user()->nik}}</div>
                            </div>
                            <div class="row">
                                <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">Nama</div>
                                <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">: {{auth('kary')->user()->nama}}</div>
                            </div>
                            <div class="row">
                                <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">Tempat Tanggal Lahir</div>
                                <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">: {{auth('kary')->user()->ttl}}</div>
                            </div>
                            <div class="row">
                                <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">Departemen</div>
                                <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">: {{auth('kary')->user()->dept}}</div>
                            </div>
                            <div class="row">
                                <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">Posisi</div>
                                <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">: {{auth('kary')->user()->posisi}}</div>
                            </div>
                            <div class="row">
                                <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">Status Kerja</div>
                                <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">: {{auth('kary')->user()->status}}</div>
                            </div>
                            <div class="row">
                                <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">Line Kavling</div>
                                <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">: {{auth('kary')->user()->line_kav}}</div>
                            </div>
                        </div>
                    </div>
                    <a href="{{route('karyawan.pengajuan')}}" class="main-button">Ajukan IMP</a>
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
