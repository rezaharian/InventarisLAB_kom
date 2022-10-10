@extends('adminlte::page')

@section('title', ' Pengajuan')


@section('content')

    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
    </div>

    <div class="text-center text-primary m-3 ">
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
                <th>Harga Total</th>
                <th>Keperluan</th>
                <th>penempatan</th>
                <th>Status</th>
                <th>Link</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pengajuan as $row)
                <tr>
                    <td>{{ $row->nopengajuan }}</td>
                    <td>{{ $row->nama }}</td>
                    <td>{{ $row->jumlah }}</td>
                    <td>{{ $row->harga }}</td>
                    <td>{{ $row->hargatotal }}</td>
                    <td>
                        @if ($row->keperluan == 0)
                            <span class="badge bg-success">Tidak Mendesak</span>
                        @else
                            <span class="badge bg-danger">Mendesak</span>
                        @endif
                    </td>
                    <td>    @if ($row->penempatan == 'ruang belum dipilih')
                        <span class="badge bg-danger">Ruang Belum Di Update</span>
                        @else
                        <span class="badge bg-success">Sudah diUpdate</span>
                        @endif</td>

                    <td>
                        @if ($row->status == 0)
                        <span class="badge bg-danger">Belum ACC</span>
                        @else
                        <span class="badge bg-success">ACC</span>
                        @endif
                    </td>
                    <td class=""  > <button class="btn btn-sm bg-primary">  <a href="//{{ $row->link }}" target="_blank" >{{ $row->link }}</a></button></td>




                </tr>
            @endforeach

        </tbody>
    </table>
    {{-- {{ $row->links() }} --}}

@endsection
