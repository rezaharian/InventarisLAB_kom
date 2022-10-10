@extends('adminlte::page')

@section('title', ' Create Inventaris Masuk')


@section('content')
    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
    </div>

<div class="text-center text-primary ">
<b class=""> Inventaris Masuk </b>
</div>

<div class="text-left  ml-4">
    <a class="btn btn-sm btn-secondary shadow " href="{{ route('barang.index') }}"><i class="fas fa-chevron-left">
        </i> Back</a>
</div>

    <form action="{{ route('barang.store') }}" method="post" class="form-group" enctype="multipart/form-data">
        @csrf
        <div class="row  p-4">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="">Kode Barang</label>
                    <input type="text" class="form-control"  name="kode" value="{{ $ok }}" >
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="">Nama Barang</label>
                    <input type="text" value="" class="form-control" name="nama" required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="">Tanggal Masuk</label>
                    <input type="date" value="" class="form-control" name="tanggal" required>
                </div>
            </div>
            <div class="col-md-4">
            <div class="form-group ">
                <label for="">Penempatan Ruang</label>
                <select name="ruang" class="form-control" required>
                    <option value="ruang belum dipilih">--- Pilih Ruang ---</option>
                        <option value="LAB TKJ 1"> LAB TKJ 1</option>
                        <option value="LAB TKJ 2"> LAB TKJ 2</option>
                        <option value="LAB Bahasa 1"> LAB Bahasa 1</option>
                        <option value="LAB Bahasa 2"> LAB Bahasa 2</option>
                    
                </select>
            </div>
            </div>

            <div class="col-md-4">
            <div class="form-group ">
                <label for="">Jenis Barang</label>
                <select name="jenis" class="form-control" required>
                    <option value="jenis belum dipilih">--- Pilih Jenis ---</option>
                        <option value="Elektronik"> Elektronik</option>
                        <option value="Non Elektronik"> Non Elektronik</option>
                        <option value="Berkas"> Berkas</option>
                        <option value="Software"> Software</option>
                    
                </select>
                
            </div>
            </div>
 
            <div class="col-md-4">
                <div class="form-group">
                    <label for="">Jumlah</label>
                    <input type="number" class="form-control" name="jumlah" required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="">Penerima</label>
                    <input type="text" class="form-control" name="penerima" required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="">Kondisi Barang</label>
                    <select name="kondisi" class="form-control" required>
                        <option value="0">--- Pilih Kondisi ---</option>
                        <option value="0">Baru</option>
                        <option value="1">Bekas</option>
                    </select>
                </div>
            </div>
            <div class="col-md-4">
            <div class="form-group">
                <label for="">Sumber</label>
                <select name="sumber" class="form-control" required>
                    <option value="Sumber Belum dipilih">-- Pilih Sumber --</option>
                        <option value="Dana BOS">Dana BOS</option>
                        <option value="Pemprov Jabar">Pemprov Jabar</option>
                        <option value="Pusat">Pusat</option>
                        <option value="Yayasan">Yayasan</option>
                        <option value="Lain Lain">Lain-lain</option>
                </select>
            </div>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                    <label>Gambar</label>
                    <input type="file" name="image" class="form-control" placeholder="image" required>
                </div>

            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="">Keterangan</label>
                    <input type="text" value="OK" class="form-control" name="keterangan" >
                </div>
            </div>
        </div>


        <div class="row ml-4">
            
            <button type="reset" class="btn btn-sm btn-primary m-1 shadow"><i class="fas fa-undo"></i> Reset</button>
            <button type="submit" class="btn btn-sm btn-primary m-1 shadow"><i class="fas fa-save"></i> Save </button>
        </div>
    </form>

@endsection
