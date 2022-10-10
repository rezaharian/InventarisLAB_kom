@extends('adminlte::page')

@section('title', ' Create Inventaris Rusak')


@section('content')
    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
    </div>

    <div class="text-center text-primary ">
        <b class=""> Inventaris Rusak </b>
        </div>
        
        <div class="text-left  ml-4">
            <a class="btn btn-sm btn-secondary shadow " href="{{ route('barang-rusak.index') }}"><i class="fas fa-chevron-left">
                </i> Back</a>
        </div>

    <form action="{{ route('barang-rusak.store') }}" method="post" class="form-group" enctype="multipart/form-data">
        @csrf
        <div class="row  p-4">

            <div class=" col-md-4 form-group">
                <strong for="">Barang</strong>
                <select name="barang_id" class="form-control" required>
                    <option value="">-- Pilih Barang --</option>
                    @foreach ($barang as $row)
                        <option value="{{ $row->id }}">{{ $row->nama }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <strong for="">Jumlah Barang Rusak </strong>
                    <input type="text" class="form-control" name="jumlah" required>
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <strong for="">Keterangan</strong>
                    <input type="text" value="." class="form-control" name="keterangan">
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <strong for="">Tanggal</strong>
                    <input type="date" value="" class="form-control" name="tanggal">
                </div>
            </div>


        </div>

        <div class="row ml-4">
            <button type="reset" class="btn btn-sm btn-primary m-1 shadow"><i class="fas fa-undo"></i> Reset</button>
            <button type="submit" class="btn btn-sm btn-primary m-1 shadow"><i class="fas fa-save"></i> Save </button>
        </div>

    </form>

@endsection
