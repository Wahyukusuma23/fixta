@extends('front-app')
@section('content')
    <style>
        .rwfrm{
        }
    </style>
    <div class="container">
        <div class="row rwfrm">
            <div class="col-lg-8 col-md-10 col-sm-12 col-xs-12 align-self-center" data-scroll-reveal="enter left move 30px over 0.6s after 0.4s">
                <h3>Daftar</h3>
                <br>
                <form method="POST" action="{{route('register.post')}}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="NIK" name="nik">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Nama" name="nama">
                    </div>
                    <div class="form-group">
                        <input type="date" class="form-control" placeholder="Tanggal Lahir" name="ttl">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Departemen" name="dept">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Posisi" name="posisi">
                    </div>
                    <div class="form-group">
                        <label for="">Status Kerja</label>
                        <select class="form-control" name="status_kerja">
                            <option value="1">Kontrak</option>
                            <option value="2">Tetap</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Line Kav" name="line_kav">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="Password" name="password">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary right" type="submit">Daftar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection