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
        <a href="{{route('human_resources')}}" class="main-button">Daftar Pengajuan</a>
        <a href="{{route('register.view')}}" class="main-button">Tambah Pengguna</a>
        <a href="#" class="main-button">Tambah Line</a>
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
                <td scope="col"><button class="btn btn-warning mlines"
                    data-nm_line="{{$list_line->nama}}"
                    data-car_line="{{$list_line->car_line}}"
                    data-id_line="{{$list_line->id}}"
                    data-toggle="modal"
                    data-target="#lines">Ubah</button>
                </td>
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
</div>
</div>
<div class="modal fade" id="lines" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" style="text-align: left" id="myModalLabel">Change Line</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form action="{{route('list_line_post')}}" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" name="id_line" id="id_line" value="">
                    <div class="form-group">
                        <label for="nik">Nama</label>
                        <input type="text" name="nik" class="form-control" placeholder="Kavling Line" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="nik">Car Line</label>
                        <input type="text" name="nik" class="form-control" placeholder="Car Line" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="">Supervisor</label>
                        <select class="form-control" name="new_line" autocomplete="off" required>
                            <option value="">----</option>
                            <?php
                            $spvs = \App\Models\TbKaryawan::where('posisi','supervisor')->get();
                            ?>
                            @foreach ($spvs as $spv)
                                <option value="{{$spv->nik}}">{{$spv->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Line Leader</label>
                        <select class="form-control" name="new_line" autocomplete="off" required>
                            <option value="">----</option>
                            <?php
                            $lls = \App\Models\TbKaryawan::where('posisi','line_leader')->get();
                            ?>
                            @foreach ($lls as $ll)
                                <option value="{{$ll->nik}}">{{$ll->nik.' - '.$ll->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="lines" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" style="text-align: left" id="myModalLabel">Change Line</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form action="{{route('list_line_add')}}" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" name="id_line" id="id_line" value="">
                    <div class="form-group">
                        <label for="nik">Nama</label>
                        <input type="text" name="nik" class="form-control" placeholder="Kavling Line" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="nik">Car Line</label>
                        <input type="text" name="nik" class="form-control" placeholder="Car Line" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="">Supervisor</label>
                        <select class="form-control" name="new_line" autocomplete="off" required>
                            <option value="">----</option>
                            <?php
                            $spvs = \App\Models\TbKaryawan::where('posisi','supervisor')->get();
                            ?>
                            @foreach ($spvs as $spv)
                                <option value="{{$spv->nik}}">{{$spv->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Line Leader</label>
                        <select class="form-control" name="new_line" autocomplete="off" required>
                            <option value="">----</option>
                            <?php
                            $lls = \App\Models\TbKaryawan::where('posisi','line_leader')->get();
                            ?>
                            @foreach ($lls as $ll)
                                <option value="{{$ll->nik}}">{{$ll->nik.' - '.$ll->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    $('.mlines').on('click', function() {
        var cc = $(this).data('id_line')
        console.log('oho')
        $('#id_line').val($(this).data('id_line'))
        $('#id_line').val($(this).data('id_line'))
        $('#id_line').val($(this).data('id_line'))
    })
</script>
@endsection
