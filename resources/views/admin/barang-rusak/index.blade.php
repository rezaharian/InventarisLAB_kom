@extends('adminlte::page')

@section('title', 'Inventaris Rusak')


@section('content')

    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
    </div>



    <div class="text-center text-primary ">
        <b class=""> Data Inventaris Rusak </b>
    </div>

   @if(session('success'))
   @include('sweetalert::alert')
    @endif


    
    <a href="/admin/barang-rusak/create">
        <button class="btn btn-sm btn-success m-1"><b>Add +</b></button>

    </a>


    <table class="table table-hover mb-3" id="daftar">
        <thead>
            <tr>
                <th>Nama Barang</th>
                <th>jumlah Rusak</th>
                <th>Tanggal Rusak</th>
                <th>Keterangan</th>
                <th class="text-center">Opsi</th>

                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $row)
                <tr>
                    <td>{{ $row->barang->nama }}</td>
                    <td>{{ $row->jumlah }}</td>
                    <td>{{ $row->tanggal }}</td>
                    <td>{{ $row->keterangan }}</td>



                    <td class="text-center">

                        <form action="{{ route('barang-rusak.destroy', $row->id) }}" method="POST">

                            <a class="btn btn-info btn-sm" href="{{ route('barang-rusak.show', $row->id) }}"><i
                                    class="fas fa-eye"></i></a>

                            <a class="btn btn-primary btn-sm" href="{{ route('barang-rusak.edit', $row->id) }}"><i
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

        </tbody>
    </table>
    {{-- {{ $row->links() }} --}}

@endsection
