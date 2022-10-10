@extends('adminlte::page')

@section('title', 'Konfirmasi Pengajuan')


@section('content')

    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
    </div>

    <div class="text-center text-primary ">
        <b class=""> Data Inventaris Pengajuan </b>
    </div>

   

   @if(session('success'))
   @include('sweetalert::alert')
    @endif



    <table class="table table-hover mb-3" id="daftar">
        <thead>
            <tr>
                <th>No Pengajuan</th>
                <th>Nama</th>
                <th>Jumlah</th>
                <th>Harga</th>
                <th>Keperluan</th>
                <th>penempatan</th>
                <th>Status</th>
                <th class="text-center">Opsi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pengajuan as $row)
                <tr>
                    <td>{{ $row->nopengajuan }}</td>
                    <td>{{ $row->nama }}</td>
                    <td>{{ $row->jumlah }}</td>
                    <td>{{ $row->hargatotal }}</td>
                    <td>
                        @if ($row->keperluan == 0)
                            <span class="badge bg-success">Tidak Mendesak</span>
                        @else
                            <span class="badge bg-danger">Mendesak</span>
                        @endif
                    </td>
                    <td>{{ $row->penempatan }}</td>

                    <td>
                        @if ($row->status == 0)
                        <span class="badge bg-danger">Belum ACC</span>
                        @else
                        <span class="badge bg-success">ACC</span>
                        @endif
                    </td>
                    <td class="text-center">
                        <a class="btn btn-info btn-sm" href="{{ route('pengajuan-konfirmasi.show', $row->id) }}"><b> ACC ?</b></i></a>
                        </form>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
    {{-- {{ $row->links() }} --}}

@endsection
