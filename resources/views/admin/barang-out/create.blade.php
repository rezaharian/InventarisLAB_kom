@extends('adminlte::page')

@section('title', 'Create Inventaris Keluar')


@section('content')
    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
    </div>

    <div class="text-center text-primary ">
        <b class=""> Inventaris Keluar </b>
        </div>
        
        <div class="text-left  ml-4">
            <a class="btn btn-sm btn-secondary shadow " href="{{ route('barang-out.index') }}"><i class="fas fa-chevron-left">
                </i> Back</a>
        </div>

    <form action="{{ route('barang-out.store') }}" method="post" class="form-group" enctype="multipart/form-data">
        @csrf
        <div class="row  p-4">
            <div class="col-md-4 form-group">
                <strong for="">Barang</strong>
                <select name="barang_rusak_id" class="form-control" required>
                    <option value="">-- Pilih Barang --</option>
                    @foreach ($barang_rusak as $row)
                        <option value="{{ $row->id }}">{{ $row->barang->nama }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <strong for="">Jumlah Barang</strong>
                    <input type="number" class="form-control" name="jumlah" required>
                </div>
            </div>


            <div class="col-md-4">
                <div class="form-group">
                    <strong for="">tanggal</strong>
                    <input type="date" class="form-control" name="tanggal" required>
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <strong for="">Keterangan</strong>
                    <input type="text" value="." class="form-control" name="keterangan" required>
                </div>
            </div>


        </div>

        <div class="row ml-4">
            
            <button type="reset" class="btn btn-sm btn-primary m-1 shadow"><i class="fas fa-undo"></i> Reset</button>
            <button type="submit" class="btn btn-sm btn-primary m-1 shadow"><i class="fas fa-save"></i> Save </button>
        </div>
    </form>

@endsection
