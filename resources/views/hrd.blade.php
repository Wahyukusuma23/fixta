@extends('front-app')
@section('content')
<style>
    table th, table td{
        color: white
    }
    .contact-form ::placeholder {
        color: #ccafaf;
    }
</style>
<div class="row">

<div class="col-lg-12 col-md-12 col-sm-12">
<div class="contact-form">

    <h3 style="color: white;text-align:left;margin-bottom:1rem">List Pengajuan</h3>
    <p style="color: white;text-align:left;margin-bottom:3rem">User : {{auth('kary')->user()->nama}}</p>
    <h5 style="text-align: left;
    color: #495057;
    margin-bottom: 1rem;
    font-weight: bold;">Filter Pencarian</h5>
    <form class="form-inline" action="" method="POST " style="margin-bottom: 1rem">
        <div class="form-group">
            <input style="height: unset;
            margin: 0 .5rem 0 0;
            font-size: 1rem;border-radius: .25rem;" type="text" class="form-control" id="inputPassword2" placeholder="Cari Berdasar Nama Karyawan">
        </div>
        <div class="form-group">
            <div class="input-group mb-2">
                <div class="input-group-prepend">
                  <div class="input-group-text">@</div>
                </div>
                <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Username">
              </div>
        </div>
        <button type="submit" class="btn btn-primary">Terapkan</button>
    </form>
    <table class="table">
        <thead class="thead-light">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Tanggal Pengajuan</th>
                <th scope="col">NIK</th>
                <th scope="col">Line</th>
                <th scope="col">Tanggal Ijin</th>
                <th scope="col">Lama Ijin</th>
                <th>LL Approve</th>
                <th>SPV Approve</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($lists as $list)
            <tr>
                <td scope="col">{{$loop->iteration}}</td>
                <td scope="col">{{$list->created_at->format('d-m-Y')}}</td>
                <td scope="col">{{$list->nik}}</td>
                <td scope="col">{{$list->karyawan->line_kav}}</td>
                <td scope="col">{{$list->tgl_ijin->format('d-m-Y')}}</td>
                <td scope="col">{{$list->lama_ijin}}</td>
                <td scope="col" style="color:{{$list->approve_ll?'green':'red'}}">{{$list->approve_ll?'Sudah Approve':'Belum Approve'}}</td>
                <td scope="col" style="color:{{$list->approve_spv?'green':'red'}}">{{$list->approve_spv?'Sudah Approve':'Belum Approve'}}</td>
            </tr>
            @empty

            @endforelse
        </tbody>
    </table>
</div>
</div>
</div>
@endsection
@section('script')
<script>
</script>
@endsection
