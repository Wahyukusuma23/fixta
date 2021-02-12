@extends('front-app')
@section('content')
<!-- ***** Welcome Area Start ***** -->
<div class="welcome-area" id="welcome">

    <!-- ***** Header Text Start ***** -->
    <div class="header-text">
        <div class="container">
            <div class="row">
                <div class="left-text col-lg-6 col-md-6 col-sm-12 col-xs-12" data-scroll-reveal="enter left move 30px over 0.6s after 0.4s">
                    <p style="margin-bottom: 0">Selamat Datang,</p>
                    <h1 style="text-transform: capitalize"> {{auth('kary')->user()->nama}}</h1>
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
                                <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">Tanggal Lahir</div>
                                <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">: {{date('d M Y',strtotime(auth('kary')->user()->ttl))}}</div>
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
                                <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">: {{auth('kary')->user()->status_kerja==1?'kontrak':'tetap'}}</div>
                            </div>
                            <div class="row">
                                <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">Line Kavling</div>
                                <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">: {{auth('kary')->user()->line->nama.' - '.auth('kary')->user()->line->car_line}}</div>
                            </div>
                        </div>
                    </div>
                    @if (auth('kary')->user()->posisi == 'operator')
                    <a href="{{route('karyawan.pengajuan')}}" class="main-button">Ajukan IMP</a>
                    <a href="#" class="main-button" data-toggle="modal" data-target="#chpwd">Ubah Password</a>
                    <a href="#" class="main-button" data-toggle="modal" data-target="#chln">Ubah Line</a>
                    @else
                    <a href="{{route(auth('kary')->user()->posisi)}}" class="main-button">Lihat Pengajuan</a>
                    <a href="#" class="main-button" data-toggle="modal" data-target="#chpwd">Ubah Password</a>
                    @endif
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="hr"></div>
            </div>
        </div>
        @if (auth('kary')->user()->posisi == 'operator')
        <br>
        <div class="row">
            <div class="col-lg-12">
                <h5>List Pengajuan</h5>
                <table class="table table-bordered">
                    <colgroup>
                        <col style="width: 15%">
                        <col style="width: 15%">
                        <col style="width: 10%">
                        <col style="width: 10%">
                        <col style="width: 10%">
                        <col style="width: 20%">
                        <col style="width: 10%">
                        <col style="width: 10%">
                    </colgroup>
                    <tr>
                        <th>Tanggal Pengajuan</th>
                        <th>No. IMP</th>
                        <th>Tgl Ijin</th>
                        <th>Lama Ijin</th>
                        <th>Jenis Ijin</th>
                        <th>Alasan Ijin</th>
                        <th>LL</th>
                        <th>SPV</th>
                    </tr>
                    @forelse ($imps as $imp)
                        <tr>
                            <td>{{date('d-m-Y', strtotime($imp->created_at))}}</td>
                            <td>{{$imp->no_imp}}</td>
                            <td>{{date('d-m-Y', strtotime($imp->tgl_ijin))}}</td>
                            <td>{{$imp->lama_ijin}}</td>
                            <td>{{$imp->ijin->id_ijin}}</td>
                            <td>{{$imp->alasan_ijin}}</td>
                            <td>{{$imp->approve_ll?date('d-m-Y', strtotime($imp->approve_ll)):'Belum'}}</td>
                            <td>{{$imp->approve_spv?date('d-m-Y', strtotime($imp->approve_spv)):'Belum'}}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" style="text-align: center">[Belum ada data]</td>
                        </tr>
                    @endforelse
                </table>
            </div>
        </div>
        @endif
    </div>
</section>
<!-- ***** Features Big Item End ***** -->
@endsection
