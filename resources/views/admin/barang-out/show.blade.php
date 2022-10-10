@extends('adminlte::page')

@section('title', 'Show Inventaris Keluar')


@section('content')
    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
    </div>


    <div class="text-center text-primary ">
        <b class="">Detail Inventaris Keluar </b>
    </div>

    <div class="row  ">
        <div class="col-md-2">

        </div>
        <div class="col-md-8 mb-4  rounded ">
            <div class="row mb-3 ">
                <div class="col-lg-12 margin-tb">
                    <div class="text-left  ml-4">
                        <a class="btn btn-sm btn-secondary shadow " href="{{ route('barang-out.index') }}"><i
                                class="fas fa-chevron-left">
                            </i> Back</a>
                        <a class="btn btn-primary btn-sm shadow " href="{{ route('barang-out.edit', $barang_out->id) }}"><i
                                class="fas fa-edit"></i> Edit</a>
                    </div>
                </div>
            </div>
            <table class="table border shadow  ">
                <tbody>
                    <tr>
                        <th scope="row">Nama Barang </th>
                        <td> : {{ $barang_out->barang_rusak->barang->nama }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Jumlah Barang </th>
                        <td> : {{ $barang_out->jumlah }}</td>
                    </tr>

                    <tr>
                        <th scope="row">Tanggal Masuk</th>
                        <td> : {{ $barang_out->barang_rusak->barang->tanggal }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Tanggal Keluar</th>
                        <td> : {{ $barang_out->tanggal }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Keterangan </th>
                        <td> : {{ $barang_out->keterangan }}</td>
                    </tr>
                    <tr>


                </tbody>


            </table>

        </div>

    </div>

@endsection
