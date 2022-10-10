@extends('adminlte::page')

@section('title', 'Inventaris Masuk')


@section('content')

    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
    </div>
    <div class="text-center text-primary ">
        <b class=""> Data Inventaris Masuk </b>
    </div>

   @if(session('success'))
   @include('sweetalert::alert')
    @endif

    <a href="/admin/barang/create">
        <button class="btn btn-sm btn-success m-1"><b>Add +</b></button>
    </a>
    <a class="btn btn-primary btn-sm" href="/admin/laporan/laporanbmpdf" target="_blank"><i
        class="fas fa-print"></i>Cetak</a>

    <table class="table table-hover m-1 border" id="daftar">
        <thead>
            <tr>
                <th>Gambar Barang</th>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Tanggal Masuk</th>
                <th>Jumlah Barang</th>
                <th>Kondisi Barang</th>
                <th class="text-center">Opsi</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $row)
                <tr>
                    <td><img src="/image/brg/{{ $row->image }}" width="100"></td>
                    <td>{{ $row->kode }}</td>
                    <td>{{ $row->nama }}</td>
                    <td>{{ $row->tanggal }}</td>
                    <td>{{ $row->jumlah }}</td>
                    <td>
                        @if ($row->kondisi == 0)
                            <span class="badge bg-success">Baru</span>
                        @else
                            <span class="badge bg-danger">Bekas</span>
                        @endif
                    </td>


                    <td class="text-center">

                        <form action="{{ route('barang.destroy', $row->id) }}" method="POST">

                            <a class="btn btn-info btn-sm" href="{{ route('barang.show', $row->id) }}"><i
                                    class="fas fa-eye"></i></a>

                            <a class="btn btn-primary btn-sm" href="{{ route('barang.edit', $row->id) }}"><i
                                    class="fas fa-edit"></i></a>



                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"> <i
                                    class="fas fa-trash"></i></button>
                        </form>


                    </td>
                </tr>
            @endforeach
            {{-- {{ $data->link() }} --}}

        </tbody>
    </table>
    



   
 

@endsection
