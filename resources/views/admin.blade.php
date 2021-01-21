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
    <p style="color: white;text-align:left;margin-bottom:3rem">User : Inayatul</p>
<table class="table">
    <thead class="thead-light">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Tanggal Pengajuan</th>
        <th scope="col">NIK</th>
        <th scope="col">Line</th>
        <th scope="col">Tanggal Ijin</th>
        <th scope="col">Lama Ijin</th>
        <th scope="col">Aksi</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td scope="col">1</td>
        <td scope="col">01-01-2021</td>
        <td scope="col">10890</td>
        <td scope="col">8A</td>
        <td scope="col">02-04-2021</td>
        <td scope="col">1</td>
        <td>
            <button class="btn btn-warning">Lihat Detail</button>
        </td>
      </tr>
      <tr>
        <td scope="col">2</td>
        <td scope="col">01-01-2021</td>
        <td scope="col">10450</td>
        <td scope="col">8A</td>
        <td scope="col">02-04-2021</td>
        <td scope="col">1</td>
        <td>
            <button class="btn btn-warning">Lihat Detail</button>
        </td>
      </tr>
      <tr>
        <td scope="col">3</td>
        <td scope="col">01-01-2021</td>
        <td scope="col">15789</td>
        <td scope="col">8A</td>
        <td scope="col">02-04-2021</td>
        <td scope="col">1</td>
        <td>
            <button class="btn btn-warning">Lihat Detail</button>
        </td>
      </tr>
      <tr>
        <td scope="col">4</td>
        <td scope="col">01-01-2021</td>
        <td scope="col">34778</td>
        <td scope="col">8A</td>
        <td scope="col">02-04-2021</td>
        <td scope="col">1</td>
        <td>
            <button class="btn btn-warning">Lihat Detail</button>
        </td>
      </tr>
      <tr>
        <td scope="col">5</td>
        <td scope="col">01-01-2021</td>
        <td scope="col">8907</td>
        <td scope="col">8A</td>
        <td scope="col">02-04-2021</td>
        <td scope="col">1</td>
        <td>
            <button class="btn btn-warning">Lihat Detail</button>
        </td>
      </tr>
    </tbody>
  </table>
</div>
</div>
</div>
@endsection
