@extends('adminlte::page')

@section('title', 'Show Konfirmasi Pengajuan')


@section('content')
    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
    </div>

    <div class="ml-4 ">
        <strong>Detail Pengajuan </strong>
    </div>

    <div class="row m-4  ">
        <div class="col-md-4 mb-4 border rounded    ">
            <table class="table  ">
                <tbody>
                    <tr>
                        <th scope="row">No Pengajuan </th>
                        <td> : {{ $pengajuan_konfirmasi->nopengajuan }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Nama Barang </th>
                        <td> : {{ $pengajuan_konfirmasi->nama }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Jenis Barang </th>
                        <td> : {{ $pengajuan_konfirmasi->jenis }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Jumlah Barang </th>
                        <td> : {{ $pengajuan_konfirmasi->jumlah }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Merek Barang </th>
                        <td> : {{ $pengajuan_konfirmasi->merek }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Tipe Barang </th>
                        <td> : {{ $pengajuan_konfirmasi->tipe }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="col-md-4 mb-4 border rounded ">
            <table class="table  ">
                <tbody>

                    <tr>
                        <th scope="row">Harga Barang </th>
                        <td> : {{ $pengajuan_konfirmasi->harga }}</td>
                    </tr>
                    <tr>
                        <th scope="row"> Tanggal </th>
                        <td> : {{ $pengajuan_konfirmasi->tanggal }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Kondisi Barang </th>
                        <td> : @if ($pengajuan_konfirmasi->kondisi == 0)
                                <span class="badge bg-success">Baru</span>
                            @else
                                <span class="badge bg-danger">Bekas</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Keperluan Barang </th>
                        <td> : @if ($pengajuan_konfirmasi->keperluan == 0)
                                <span class="badge bg-success">Tidak Mendesak</span>
                            @else
                                <span class="badge bg-danger">Mendesak</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Status Barang </th>
                        <td> : @if ($pengajuan_konfirmasi->status == 0)
                            <span class="badge bg-danger">Belum ACC</span>
                            @else
                            <span class="badge bg-success">ACC</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Keterangan Barang </th>
                        <td> : {{ $pengajuan_konfirmasi->keterangan }}</td>
                    </tr>

                </tbody>


            </table>

        </div>
        <form action="{{ route('pengajuan-konfirmasi.update', $pengajuan_konfirmasi->id) }}"
            class="col-md-4 mb-4 border bg-secondary rounded" method="POST">
            @csrf
            @method('PUT')
            <div class="col-md-12  ">
                <div class="form-group">
                    <div class="bg text-center rounded m-1">
                        <small><i>Untuk merubah mengkonfirmasi pengajuan , silahkan pilih <b>ACC</b> lalu simpan
                                .</i></small><br>
                    </div>
                    <strong>Konfirmasi :</strong>
                    <select name="status" class="form-control">
                        <option value="{{ $pengajuan_konfirmasi->status }}">
                            @if ($pengajuan_konfirmasi->status == 0)
                            <span class="badge bg-danger">Belum ACC</span>
                            @else
                            <span class="badge bg-success">ACC</span>
                            @endif
                        </option>
                        <option class=" bg-danger" value="0">Belum ACC</option>
                        <option class=" bg-success" value="1">ACC</option>
                    </select>
                </div>
                <div class="text-center">
                    <a class="btn btn-sm btn-dark" href="{{ route('pengajuan-konfirmasi.index') }}"><i
                            class="fas fa-home"></i> Back</a>
                    <button type="submit" class="btn btn-sm btn-primary m-1"><i class="fas fa-save"></i> Save </button>
                </div>
            </div>






        </form>

    </div>

@endsection
