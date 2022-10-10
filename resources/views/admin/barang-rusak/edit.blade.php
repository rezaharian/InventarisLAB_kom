@extends('adminlte::page')

@section('title', 'Edit Inventaris Rusak')


@section('content')
    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
    </div>

    <div class="text-center text-primary ">
        <b class="">Edit Data Inventaris Rusak </b>
        </div>




    <form action="{{ route('barang-rusak.update', $barang_rusak->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <input type="hidden" name="id" value="">
        <div class="row  m-4">

            <div class="col-md-4">
                <div class="form-group">
                    <strong for="">Barang</strong>
                    <select name="barang_id" class="form-control" required>
                        <option value="{{ $barang_rusak->barang->id }}">{{ $barang_rusak->barang->nama }}</option>
                        @foreach ($barang as $row)
                            <option value="{{ $row->id }}">{{ $row->nama }}</option>
                        @endforeach
                    </select>
                </div>
                </div>

            <div class="col-md-4">
                <div class="form-group">
                    <strong>Jumlah Barang </strong>
                    <input type="text" name="jumlah" class="form-control" placeholder="jumlah"
                        value="{{ $barang_rusak->jumlah }}">
                </div>
            </div>

                <div class="col-md-4">
                <div class="form-group">
                    <strong>Tanggal Rusak</strong>
                    <input type="date" name="tanggal" class="form-control" placeholder="tanggal"
                        value="{{ $barang_rusak->tanggal }}">
                </div>
            </div>
                <div class="col-md-4">
                <div class="form-group">
                    <strong>Keterangan Barang</strong>
                    <input type="text" name="keterangan" class="form-control" placeholder="keterangan"
                        value="{{ $barang_rusak->keterangan }}">
                </div>
            </div>
            
        </div>

       
        <div class="mb-4 ml-5">
            <a class="btn btn-sm btn-secondary  " href="{{ route('barang-rusak.index') }}"><i class="fas fa-chevron-left">
            </i> Back</a>
            <button type="submit" class="btn btn-sm btn-primary m-1"><i class="fas fa-save"></i> Save </button>

        </div>
 

</form>



@endsection
