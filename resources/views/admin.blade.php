@extends('front-app')
@section('content')
<style>
    table th, table td{
        color: white
    }
</style>
<div class="row">

<div class="col-lg-12 col-md-12 col-sm-12">
<div class="contact-form">

    <h3 style="color: white;text-align:left;margin-bottom:1rem">List Pengajuan</h3>
    <p style="color: white;text-align:left;margin-bottom:3rem">User : {{auth('kary')->user()->nama}}</p>
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
            <th scope="col">Aksi</th>
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
            <td>
                <button class="btn btn-warning btn-det"
                data-noimp="{{$list->no_imp}}"
                data-nik="{{$list->nik}}"
                data-nmkar="{{$list->karyawan->nama}}"
                data-tglijin="{{$list->tgl_ijin}}"
                data-lmijin="{{$list->lama_ijin}}"
                data-idijin="{{$list->id_ijin}}"
                data-alsijin="{{$list->alasan_ijin}}"
                data-toggle="modal"
                data-target="#view_detail" >Lihat Detail</button>
            </td>
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
    $('.btn-det').on('click', function() {
        $('#md-noimp').html($(this).data('noimp'))
        $('#md-nik').html($(this).data('nik'))
        $('#md-nm').html($(this).data('nmkar'))
        $('#md-tgl-ijn').html($(this).data('tglijin'))
        $('#md-lm-ijn').html($(this).data('lmijin'))
        $('#md-jns-ijn').html($(this).data('idijin'))
        $('#md-als').html($(this).data('alsijin'))
        $('#accept').attr('data-impid',$(this).data('noimp'))
    })
    $('.modal-footer').on('click','#accept', function(){
        // console.log($(this).data('impid'))
        accept_imp($(this).data('impid'))
    })
    function accept_imp(no_imp) {
        $.ajax({
            url: "/ll_accept", // your php file
            type: 'POST', // type of the HTTP request
            data:{
                "_token": "{{ csrf_token() }}",
                noimp:no_imp
            },
            success: function (data) {
                if (data == 'ok') {
                    var assigned = "{{auth('kary')->user()->posisi}}";
                    window.location.assign(assigned);
                } else {
                    alert('Sedang terjadi Gangguan, Mohon Coba Lagi')
                }
            },
            error:function () {
                alert('Sedang terjadi Gangguan, Mohon Coba Lagi')
            }
        });
    }
</script>
@endsection
