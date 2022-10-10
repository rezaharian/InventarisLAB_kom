@extends('adminlte::page')

@section('title', 'Show Inventaris Rusak')


@section('content')
    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
    </div>

    <div class="text-center text-primary ">
        <b class="">Detail Inventaris Rusak </b>
        </div>
        

 


    <div class="row  ">
        <div class="col-md-2">

        </div>
        <div class="col-md-8 mb-4  rounded ">
            <div class="row mb-3 ">
                <div class="col-lg-12 margin-tb">
                    <div class="text-left  ml-4">
                        <a class="btn btn-sm btn-secondary shadow " href="{{ route('barang-rusak.index') }}"><i class="fas fa-chevron-left">
                            </i> Back</a>
                        <a class="btn btn-primary btn-sm shadow " href="{{ route('barang-rusak.edit', $barang_rusak->id) }}"><i
                                class="fas fa-edit"></i> Edit</a>
                    </div>
                </div>
            </div>
            
            <table class="table border shadow  ">
                <tbody>
                    <tr>
                        <th scope="row">Kode Barang </th>
                        <td> : {{ $barang_rusak->barang->kode }}</td>
                    </tr>
                   
                    <tr>
                        <th scope="row">Nama Barang </th>
                        <td> : {{ $barang_rusak->barang->nama }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Jumlah Barang Rusak </th>
                        <td> : {{ $barang_rusak->jumlah }}</td>
                    </tr>

                    <tr>
                        <th scope="row">Tanggal Masuk </th>
                        <td> : {{ $barang_rusak->barang->tanggal }}</td>
                    </tr>
                   
                    <tr>
                        <th scope="row">Tanggal Rusak </th>
                        <td> : {{ $barang_rusak->tanggal }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Lokasi Barang </th>
                        <td> : {{ $barang_rusak->barang->ruang }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Keterangan </th>
                        <td> : {{ $barang_rusak->keterangan }}</td>
                    </tr>
                    <tr>
                  
               
                </tbody>


            </table>

        </div>

    </div>

@endsection
