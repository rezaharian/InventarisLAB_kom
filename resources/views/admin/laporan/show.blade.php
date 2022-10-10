@extends('adminlte::page')

@section('title', 'Dashboard')


@section('content')
    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
    </div>
    <div class="text-center text-primary ">
        <b class="">Detail Inventarisasi Masuk </b>
        </div>
        

    <div class="row  ">
        <div class="col-lg-12 margin-tb">
            <div class="text-left  ml-4">
                <a class="btn btn-sm btn-secondary shadow " href="{{ route('barang.index') }}"><i class="fas fa-chevron-left">
                    </i> Back</a>
                <a class="btn btn-primary btn-sm shadow " href="{{ route('barang.edit', $barang->id) }}"><i
                        class="fas fa-edit"></i> Edit</a>
            </div>
        </div>
    </div>
    <div class="row m-4   border rounded shadow">

        <div class="col-md-6 mb-4 ">
            <table class="table   ">
                <tbody>
                    <tr>
                        <th scope="row">Kode Barang </th>
                        <td> : {{ $barang->kode }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Nama Barang</th>
                        <td> : {{ $barang->nama }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Tanggal Masuk</th>
                        <td> : {{ $barang->tanggal }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Jenis Barang</th>
                        <td> : {{ $barang->jenis }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Kondisi Barang</th>
                        <td> :
                            @if ($barang->kondisi == 0)
                                <span class="badge bg-success">Baru</span>
                            @else
                                <span class="badge bg-danger">Bekas</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Sumber Barang </th>
                        <td> : {{ $barang->sumber }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Penerima Barang</th>
                        <td> : {{ $barang->penerima }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Penempatan Barang</th>
                        <td> : {{ $barang->ruang }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Jumlah Barang</th>
                        <td>{{ $barang->jumlah }}</td>
                        {{-- <td>{{ $barang->sum('jumlah') }}</td> --}}
                    </tr>
                    <tr>
                        <th scope="row">Keterangan</th>
                        <td> : {{ $barang->keterangan }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col mb-4 ">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group text-center mt-1 shadow">
                    <img src="/image/brg/{{ $barang->image }}" width="100%">
                    <small><i>Gambar {{ $barang->nama }}</i></small>
                </div>
            </div>

        </div>

        <div class="div mb-4">

        </div>
    </div>
    


@endsection
