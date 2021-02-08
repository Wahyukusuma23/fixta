@extends('front-app')
@section('content')

<style>
    #about{
        padding: 0;
    }
    .contact-form h1, .contact-form p{
        color: white;
        text-align: left;
    }
    select.contact-field{
        color: #777;
font-size: 14px;
border: none;
width: 100%;
height: 50px;
outline: none;
padding-left: 20px;
padding-right: 20px;
border-radius: 0px;
margin-bottom: 30px;
    }
</style>
<!-- ***** Features Big Item Start ***** -->
<section class="section" id="about">
<div class="row">

<div class="col-lg-12 col-md-12 col-sm-12" data-scroll-reveal="enter left move 30px over 0.6s after 0.4s">
    <div class="contact-form">
        <h1>Form Pengajuan</h1>
        <p>Harap isi dengan lengkap</p>
        <form id="contact" action="{{route('karyawan.pengajuan.post')}}" method="post">
            {{ csrf_field() }}
          <div class="row">
            <div class="col-md-12 col-sm-12">
              <fieldset>
                <input name="tgl_ijin" type="date" id="tgl_ijin" placeholder="Tanggal Ijin" required="" class="contact-field">
              </fieldset>
            </div>
            <div class="col-md-12 col-sm-12">
              <fieldset>
                  <select name="kode_ijin" id="" class="contact-field">
                      @foreach ($list_ijins as $list_ijin)
                        <option value="{{$list_ijin->id}}">{{$list_ijin->id_ijin.' - '.$list_ijin->jenis_ijin}}</option>
                      @endforeach
                  </select>
                {{-- <input name="kode_ijin" type="text" id="kode_ijin" placeholder="Kode Ijin" required="" class="contact-field"> --}}
              </fieldset>
            </div>
            <div class="col-md-12 col-sm-12">
              <fieldset>
                <input name="lama_ijin" type="number" id="lama_ijin" placeholder="Lama Ijin" required="" class="contact-field">
              </fieldset>
            </div>
            <div class="col-md-12 col-sm-12">
              <fieldset style="text-align: left">
                  <label for="" style="color: white">Keterangan</label>
                  <textarea name="alasan" id="" cols="30" rows="7" placeholder="Penjelasan"></textarea>
                </fieldset>
            </div>
            <div class="col-lg-12">
              <fieldset>
                <button type="submit" id="form-submit" class="main-button">Kirim</button>
              </fieldset>
            </div>
          </div>
        </form>
    </div>
</div>
</div>
</section>
<!-- ***** Contact Form End ***** -->
@endsection
