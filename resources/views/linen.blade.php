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
{{-- <div class="row"> --}}

<div class="col-lg-12 col-md-12 col-sm-12">

    <h3 style="color: white;text-align:left;margin-bottom:1rem">List Pengajuan</h3>
    <p style="color: white;text-align:left;margin-bottom:3rem">
        User :
        <span style="text-transform: capitalize"> {{auth('kary')->user()->nama}}</span>
        <a href="{{route('register.view')}}" class="main-button">Tambah Pengguna</a>
        <a href="{{route('human_resources')}}" class="main-button">Daftar Pengajuan</a>
    </p>
    <table class="table">
        <thead class="thead-light">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama</th>
                <th scope="col">Car Line</th>
                <th scope="col">Line Leader</th>
                <th scope="col">SPV</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($list_lines as $list_line)
            <tr>
                <td scope="col">{{$loop->iteration}}</td>
                <td scope="col">{{$list_line->nama}}</td>
                <td scope="col">{{$list_line->car_line}}</td>
                <td scope="col">{{$list_line->line_leader}}</td>
                <td scope="col">{{$list_line->spv}}</td>
                <td scope="col"><a href="#" class="btn btn-warning" data-id_line="{{$list_line->id}}" class="mlines" data-target="#lines">Ubah</a></td>
            </tr>
            @empty
            <tr>
                <td colspan="8" style="text-align: center">[Belum ada data]</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    {{-- {{ $list_lines->links('vendor.pagination.bootstrap-4') }} --}}
</div>
{{-- </div> --}}
{{-- </div> --}}
@endsection
@section('script')
<script>
    $(document).ready(function () {
        console.log('welcome')
        $('a.mlines').on('click', function() {
            var cc = $(this).data('id_line')
            console.log('oho')
            // $('#id_line').val($(this).data('id_line'))
        })
    })
</script>
@endsection
