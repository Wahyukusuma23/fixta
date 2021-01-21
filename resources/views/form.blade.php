@extends('front-app')
@section('content')
<!-- ***** Contact Form Start ***** -->
{{-- <div class="container"> --}}
    <div class="row">

<div class="col-lg-12 col-md-12 col-sm-12">
    <div class="contact-form">
        <h1>Form Pengajuan</h1>
        <p>Harap isi dengan lengkap</p>
        <form id="contact" action="" method="post">
          <div class="row">
            <div class="col-md-12 col-sm-12">
              <fieldset>
                <input name="tgl_ijin" type="date" id="tgl_ijin" placeholder="Tanggal Ijin" required="" class="contact-field">
              </fieldset>
            </div>
            <div class="col-md-12 col-sm-12">
              <fieldset>
                <input name="lama_ijin" type="number" id="email" placeholder="Lama Ijin" required="" class="contact-field">
              </fieldset>
            </div>
            <div class="col-md-12 col-sm-12">
              <fieldset>
                <input name="kode_ijin" type="text" id="email" placeholder="Kode Ijin" required="" class="contact-field">
              </fieldset>
            </div>
            <div class="col-md-12 col-sm-12">
              <fieldset>
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
{{-- </div> --}}
<!-- ***** Contact Form End ***** -->
@endsection
