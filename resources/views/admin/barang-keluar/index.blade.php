@extends('adminlte::page')

@section('title', 'Inventaris Pinjam')


@section('content')
    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
    </div>

    <div class="text-center text-primary ">
        <b class=""> Data Inventaris Pinjam </b>
    </div>
    @if (session('success'))
        @include('sweetalert::alert')
    @endif
    <div class="row mt-4 ">
        <div class="col-md-3 ">
            <div class="info-box rounded-pill ">
                <span class="info-box-icon bg-info rounded-pill">
                    <i class="far fa-copy"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Barang Tersedia</span>
                    <span class="info-box-number">{{ $datas }}  |  {{ $datajadi1 }}  </span>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="info-box rounded-pill ">
                <span class="info-box-icon bg-warning rounded-pill">
                    <i class="far fa-copy"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Peminjaman</span>
                    <span class="info-box-number">{{ $bk}}</span>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="info-box rounded-pill ">
                <span class="info-box-icon bg-danger rounded-pill "><i class="far fa-copy"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Barang dipinjam</span>
                    <span class="info-box-number">{{ $bdk }} </span>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="info-box rounded-pill ">
                <span class="info-box-icon bg-success rounded-pill "><i class="far fa-copy"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Barang dikembalikan</span>
                    <span class="info-box-number">{{ $sdk }}</span>
                </div>
            </div>
        </div>
    </div>

    <a href="/admin/barang-keluar/create">
        <button class="btn btn-sm btn-success m-1"><b>Add +</b></button>
    </a>

    <table class="table table-hover mb-3">
        <thead>
            <th>Peminjam</th>
            <th>Nama Barang</th>
            <th>Jumlah</th>
            <th>Tgl keluar</th>
            <th>Tgl Pengembalian</th>
            <th>Status</th>
            <th></th>
        </thead>
        <tbody>
            @foreach ($data as $row)
                <tr>
                    <td>{{ $row->peminjam }}</td>
                    <td>{{ $row->barang->nama }}  <small>{{ $row->barang->jumlah }}</small></td>
                    <td>{{ $row->jumlah }}</td>
                    <td>{{ $row->created_at }}</td>
                    <td>{{ $row->updated_at }}</td>
                    <td>
                        @if ($row->status == 0)
                            <span class="badge bg-danger">DIPINJAM</span>
                        @else
                            <span class="badge bg-success">DIKEMBALIKAN</span>
                        @endif
                    </td>
                    <td class="text-center">

                        <form action="{{ route('barang-keluar.destroy', $row->id) }}" method="POST">

                            <a class="btn btn-info btn-sm" href="{{ route('barang-keluar.show', $row->id) }}"><i
                                    class="fas fa-eye"></i></a>

                            <a class="btn btn-primary btn-sm" href="{{ route('barang-keluar.edit', $row->id) }}"><i
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

@endsection
