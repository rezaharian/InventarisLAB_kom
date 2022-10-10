@extends('adminlte::page')

@section('title', 'Show Pengajuan')


@section('content')
    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
    </div>


    <div class="row  ">
        <div class="col-md-2">

        </div>
        <div class="col-md-8 mb-4 border rounded shadow">
            <table class="table  ">
                <tbody>
                    <tr>
                        <th scope="row">Nama Barang </th>
                        <td> : {{ $pengajuan->nama }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Jenis Barang </th>
                        <td> : {{ $pengajuan->jenis }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Jumlah Barang </th>
                        <td> : {{ $pengajuan->jumlah }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Merek Barang </th>
                        <td> : {{ $pengajuan->merek }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Tipe Barang </th>
                        <td> : {{ $pengajuan->tipe }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Harga Barang </th>
                        <td> : {{ $pengajuan->harga }}</td>
                    </tr>
                    <tr>
                        <th scope="row"> Tanggal </th>
                        <td> : {{ $pengajuan->tanggal }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Kondisi Barang </th>
                        <td> : {{ $pengajuan->kondisi }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Keperluan Barang </th>
                        <td> : {{ $pengajuan->keperluan }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Status Barang </th>
                        <td> : {{ $pengajuan->status }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Keterangan Barang </th>
                        <td> : {{ $pengajuan->keterangan }}</td>
                    </tr>
               
                </tbody>


            </table>
            <div class="row mt-1 mb-2">
                <div class="col-lg-12 margin-tb">
                    <div class="text-center">
                        <a class="btn btn-sm btn-secondary" href="{{ route('pengajuan.index') }}">Back</a>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
