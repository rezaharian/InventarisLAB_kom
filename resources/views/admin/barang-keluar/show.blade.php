@extends('adminlte::page')

@section('title', 'Show Inventaris Pinjam')


@section('content')
    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
    </div>


    <div class="text-center text-primary ">
        <b class="">Detail Inventaris Pinjam </b>
    </div>
  
    <div class="row  ">
      <div class="col-md-2">

      </div>
      <div class="col-md-8 mb-4  rounded ">
          <div class="row mb-3 ">
              <div class="col-lg-12 margin-tb">
                  <div class="text-left  ml-4">
                      <a class="btn btn-sm btn-secondary shadow " href="{{ route('barang-keluar.index') }}"><i
                              class="fas fa-chevron-left">
                          </i> Back</a>
                      <a class="btn btn-primary btn-sm shadow " href="{{ route('barang-keluar.edit', $barang_keluar->id) }}"><i
                              class="fas fa-edit"></i> Edit</a>
                  </div>
              </div>
          </div>
          <table class="table border shadow  ">
                <tbody>
                    <tr>
                        <th scope="row">Peminjam </th>
                        <td> : {{ $barang_keluar->peminjam }}</td>
                    </tr>
                    <tr>
                      <th scope="row">Kode Barang </th>
                      <td> : {{ $barang_keluar->barang->kode }}</td>
                  </tr>
                    <tr>
                        <th scope="row">Nama Barang</th>
                        <td> : {{ $barang_keluar->barang->nama }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Jumlah </th>
                        <td> :{{ $barang_keluar->jumlah}}</td>
                    </tr><tr>
                        <th scope="row">Status Peminjamanr</th>
                        <td> :
                        @if ($barang_keluar->status == 0)
                        <span class="badge bg-danger">DIPINJAM</span>
                    @else
                        <span class="badge bg-success">DIKEMBALIKAN</span>
                    @endif </td>                   </tr>
                    <tr>
                        <th scope="row">Catatan </th>
                        <td> : {{ $barang_keluar->catatan }}</td>
                    </tr>
                    
                </tbody>
            </table>
        </div>

    
  



@endsection
