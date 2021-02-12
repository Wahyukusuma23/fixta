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
                    <a href="{{route('register.view')}}" class="main-button-slider" style="cursor:pointer;color:white;width: 120px;display: inline-block;text-align: center;">Register</a>
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
                    <h5>Vivamus sodales nisi id ante molestie venenatis</h5>
                </div>
                <div class="left-text">
                    <p>This template is <a href="#">last updated on 20 August 2019 </a>for main menu drop-down arrow and sub menu text color. Duis auctor dolor eu scelerisque vestibulum. Vestibulum lacinia, nisl sit amet tristique condimentum. <br><br>
                    Sed a consequat velit. Morbi lectus sapien, vestibulum et sapien sit amet, ultrices malesuada odio. Donec non quam euismod, mattis dui a, ultrices nisi.</p>
                    <a href="#about2" class="main-button">Discover More</a>
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
