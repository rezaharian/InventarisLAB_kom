@extends('adminlte::page')

@section('title', 'Create Pengajuan')


@section('content')
    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
    </div>

    <div class="text-center text-primary ">
        <b class=""> Inventaris Tambah Pengajuan </b>
        </div>
        
        <div class="text-left  ml-4">
            <a class="btn btn-sm btn-secondary shadow " href="{{ route('pengajuan.index') }}"><i class="fas fa-chevron-left">
                </i> Back</a>
        </div>

    <form action="{{ route('pengajuan.store') }}" method="post" class="form-group" >
        @csrf
        <div class="row  p-4">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="">No Pengajuan</label>
                    <input type="text" class="form-control"  name="nopengajuan" value="{{ $okee }}" >
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="">Nama Barang</label>
                    <input type="text" class="form-control" name="nama" required>
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
                <div class="form-group ">
                    <label for="">Penempatan Ruang</label>
                    <select name="penempatan" class="form-control" required>
                        <option value="ruang belum dipilih">--- Pilih Ruang ---</option>
                        <option value="LAB TKJ 1"> LAB TKJ 1</option>
                        <option value="LAB TKJ 2"> LAB TKJ 2</option>
                        <option value="LAB Bahasa 1"> LAB Bahasa 1</option>
                        <option value="LAB Bahasa 2"> LAB Bahasa 2</option>

                    </select>
                </div>
            </div>


            <div class="col-md-4">
                <div class="form-group">
                    <label for="">Merek Barang</label>
                    <input type="text" placeholder="merek barang" class="form-control" name="merek" >
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="">Tipe Barang</label>
                    <input type="text" placeholder="tipe Barang" class="form-control" name="tipe" >
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
                    <label for="">Keperluan Barang</label>
                    <select name="keperluan" class="form-control" required>
                        <option value="">--- Pilih Keperluan ---</option>
                        <option value="0">Tidak Mendesak</option>
                        <option value="1">Mendesak</option>
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="">Status Pengajuan</label>
                    <select name="status" class="form-control" required>
                        <option value="">--- Pilih Status ---</option>
                        <option value="0">Belum</option>
                        <option value="1">ACC</option>
                    </select>
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label for="">Jumlah Barang</label>
                    <input type="number" id="txt1" onkeyup="kali();" placeholder="jumlah" class="form-control"
                        name="jumlah" required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="">Harga Barang</label>
                    <input type="text" id="txt2" onkeyup="kali();" class="form-control" name="harga">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="">Harga Total</label>
                    <input type="text" id="txt3" class="form-control" name="hargatotal">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="">Tanggal</label>
                    <input type="date"  class="form-control" name="tanggal">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="">Link </label>
                    <input type="text" placeholder="link" class="form-control" name="link" >
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="">Pengaju </label>
                    <input type="text" placeholder="Pengaju" class="form-control" name="pengaju" >
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="">Keterangan </label>
                    <input type="text" placeholder="keterangan" class="form-control" name="keterangan" >
                </div>
            </div>

        </div>

        <div class="row ml-4">
            
            <button type="reset" class="btn btn-sm btn-primary m-1 shadow"><i class="fas fa-undo"></i> Reset</button>
            <button type="submit" class="btn btn-sm btn-primary m-1 shadow"><i class="fas fa-save"></i> Save </button>
        </div>
    </form>

@endsection


<div>

    <script>
        function kali() {
            var txtFirstNumberValue = document.getElementById('txt1').value;
            var txtSecondNumberValue = document.getElementById('txt2').value;
            var result = parseFloat(txtFirstNumberValue) * parseFloat(txtSecondNumberValue);
            if (!isNaN(result)) {
                document.getElementById('txt3').value = result;
            }
        }
    </script>
</div>
