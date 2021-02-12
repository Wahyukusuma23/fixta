@extends('front-app')
@section('content')
<style>
    table th, table td{
        color: white
    }
    .contact-form ::placeholder {
        color: #ccafaf;
    }
    .page-item.active .page-link{
        background-color: #34c130;
        border-color: #34c130;
    }
    .main-button{
        padding: 6px 20px;
        background-color: #5c9f4e;
    }
</style>
<div class="row">

<div class="col-lg-12 col-md-12 col-sm-12">
<div class="contact-form">

    <h3 style="color: white;text-align:left;margin-bottom:1rem">List Pengajuan</h3>
    <p style="color: white;text-align:left;margin-bottom:3rem">
        User :
        <span style="text-transform: capitalize"> {{auth('kary')->user()->nama}}</span>
        <a href="{{route('register.view')}}" class="main-button">Tambah Pengguna</a>
    </p>
    <h5 style="text-align: left;
    color: #495057;
    margin-bottom: 1rem;
    font-weight: bold;">Filter Pencarian</h5>
    <div class="form-inline">
    <form class="form-inline" method="GET" style="margin-bottom: 1rem">
        {{ csrf_field() }}
        <div class="form-group">
            <input name="name" value="{{ $name??'' }}" style="width: 225px;height: unset;margin: 0 .5rem 0 0;font-size: 1rem;border-radius: .25rem;" type="text" class="form-control" id="inputPassword2" placeholder="Cari Berdasar Nama Karyawan">
        </div>
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">Dari Tanggal</div>
                </div>
                <input name="from" value="{{ $from??'' }}" type="date" style="padding-left: 10px;padding-right: 10px;width: 140px;height: unset;margin: 0 .5rem 0 0;font-size: 1rem;border-radius: 0 .25rem .25rem 0;" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">Sampai Tanggal</div>
                </div>
                <input name="to" value="{{ $to??'' }}" type="date" style="width: 145px;padding-left: 10px;padding-right: 10px;height: unset;margin: 0 .5rem 0 0;font-size: 1rem;border-radius: 0 .25rem .25rem 0;" class="form-control">
            </div>
        </div>
        <span style="height: 40px;background: whitesmoke;width: 2px;display: block;margin-right: 7px;"></span>
        <div class="form-group">
            <select name="line" id="" class="custom-select mr-2" autocomplete="off">
                <option value="">Pilih Berdasar Line</option>
                @foreach ($lines as $line)
                    <option value="{{$line->nama}}" {{isset($linefr)?($linefr==$line->nama?'selected':''):''}}>{{$line->nama.' - '.$line->car_line}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary"  formaction="{{route('human_resources_option')}}">Terapkan</button>
        <button type="submit" id="exc" formaction="{{route('human_resources_report')}}" class="btn btn-light" style="padding: 4px 14px; margin-left:10px"><img src="/images/excel.png" style="width: 29px"></button>
    </form>
    </div>
    <table class="table">
        <thead class="thead-light">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Tanggal Pengajuan</th>
                <th scope="col">Nama</th>
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
                <td scope="col">{{$list->karyawan->nama}}</td>
                <td scope="col">{{$list->karyawan->line_kav}}</td>
                <td scope="col">{{$list->tgl_ijin->format('d-m-Y')}}</td>
                <td scope="col">{{$list->lama_ijin}}</td>
                <td scope="col" style="color:{{$list->approve_ll?'green':'red'}}">{{$list->approve_ll?'Sudah Approve':'Belum Approve'}}</td>
                <td scope="col" style="color:{{$list->approve_spv?'green':'red'}}">{{$list->approve_spv?'Sudah Approve':'Belum Approve'}}</td>
            </tr>
            @empty
            <tr>
                <td colspan="8" style="text-align: center">[Belum ada data]</td>
            </tr>
            @endforelse
        </tbody>
    </table>
    {{ $lists->links('vendor.pagination.bootstrap-4') }}
</div>
</div>
</div>
@endsection
@section('script')
<script>
    // $('#exc').on('click', function(){
    //     $.ajax({
    //         url: "/human_resources_report", // your php file
    //         type: 'POST', // type of the HTTP request
    //         data:{
    //             "_token": "{{ csrf_token() }}"
    //         },
    //         success: function (data) {
    //             console.log(data)
    //         },
    //         error:function () {
    //             alert('Sedang terjadi Gangguan, Mohon Coba Lagi')
    //         }
    //     });
    // })
</script>
@endsection
