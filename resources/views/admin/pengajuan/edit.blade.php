@extends('adminlte::page')

@section('title', 'Edit Pengajuan')


@section('content')
    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
    </div>
    
    <div class="text-center text-primary ">
        <b class="">Edit Data Pengajuan </b>
        </div>

    <div class="text-left  ml-4">
        <a class="btn btn-sm btn-secondary shadow " href="{{ route('pengajuan.index') }}"><i class="fas fa-chevron-left">
            </i> Back</a>

    </div>


    <form action="{{ route('pengajuan.update', $pengajuan->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <input type="hidden" name="id" value="">
        <div class="row  m-3">
            <div class="col-md-4">
                <div class="form-group">
                    <strong>KNo Pengajuan</strong>
                    <input type="text" name="nopengajuan" class="form-control" placeholder="nopengajuan"
                        value="{{ $pengajuan->nopengajuan }}">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <strong>Nama Barang</strong>
                    <input type="text" name="nama" class="form-control" placeholder="nama"
                        value="{{ $pengajuan->nama }}">
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group ">
                    <strong for="">Jenis Barang</strong>
                    <select name="jenis" class="form-control" required>
                        <option value="{{ $pengajuan->jenis }}">{{ $pengajuan->jenis }}</option>
                        <option value="Elektronik"> Elektronik</option>
                        <option value="Non Elektronik"> Non Elektronik</option>
                        <option value="Berkas"> Berkas</option>
                        <option value="Software"> Software</option>

                    </select>
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <strong>Merek Barang</strong>
                    <input type="text" name="merek" class="form-control" placeholder="merek"
                        value="{{ $pengajuan->merek }}">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <strong>Tipe Barang</strong>
                    <input type="text" name="tipe" class="form-control" placeholder="tipe"
                        value="{{ $pengajuan->tipe }}">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group ">
                    <strong for="">Penempatan </strong>
                    <select name="penempatan" class="form-control" required>
                        <option value="{{ $pengajuan->penempatan }}">{{ $pengajuan->penempatan }}</option>
                        <option value="LAB TKJ 1"> LAB TKJ 1</option>
                        <option value="LAB TKJ 2"> LAB TKJ 2</option>
                        <option value="LAB Bahasa 1"> LAB Bahasa 1</option>
                        <option value="LAB Bahasa 2"> LAB Bahasa 2</option>

                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <strong>Jumlah Barang</strong>
                    <input type="text" name="jumlah"  id="txt1" onkeyup="abc();" class="form-control" placeholder="jumlah"
                        value="{{ $pengajuan->jumlah }}">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <strong>Harga Barang</strong>
                    <input type="text"  id="txt2" onkeyup="abc();" name="harga" class="form-control" placeholder="harga"
                        value="{{ $pengajuan->harga }}">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <strong>Harga Total</strong>
                    <input type="text"   id="txt3" name="hargatotal" class="form-control" value="{{ $pengajuan->hargatotal }}">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <strong> Tanggal</strong>
                    <input type="date"    name="tanggal" class="form-control" value="{{ $pengajuan->tanggal }}">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <strong>Kondisi Barang</strong>
                    <select name="kondisi" class="form-control">
                        <option value="{{ $pengajuan->kondisi }}">
                            @if ($pengajuan->kondisi == 0)
                                <span class="badge bg-success">Baru</span>
                            @else
                                <span class="badge bg-danger">Bekas</span>
                            @endif
                        </option>
                        <option value="0">Baru</option>
                        <option value="1">Bekas</option>
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <strong>Keperluan Barang</strong>
                    <select name="keperluan" class="form-control">
                        <option value="{{ $pengajuan->keperluan }}">
                            @if ($pengajuan->keperluan == 0)
                                <span class="badge bg-success">Tidak Mendesak</span>
                            @else
                                <span class="badge bg-danger"> Mendesak</span>
                            @endif
                        </option>
                        <option value="0">Tidak Mendesak</option>
                        <option value="1"> Mendesak</option>
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <strong>Status Pengajuan</strong>
                    <select name="status" class="form-control">
                        <option value="{{ $pengajuan->status }}">
                            @if ($pengajuan->status == 0)
                            <span class="badge bg-danger">Belum ACC</span>
                            @else
                            <span class="badge bg-success">ACC</span>
                            @endif
                        </option>
                        <option value="0">Belum ACC</option>
                        <option value="1">ACC</option>
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <strong>Pengaju</strong>
                    <input type="text" name="pengaju" class="form-control" placeholder="pengaju"
                        value="{{ $pengajuan->pengaju }}">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <strong>Link</strong>
                    <input type="text" name="link" class="form-control" placeholder="link"
                        value="{{ $pengajuan->link }}">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <strong>Keterangan Barang</strong>
                    <input type="text" name="keterangan" class="form-control" placeholder="keterangan"
                        value="{{ $pengajuan->keterangan }}">
                </div>
            </div>
        </div>

        </div>     

    <div class="text-center mb-4">
        <button type="submit" class="btn btn-sm btn-primary m-1"><i class="fas fa-save"></i> Save </button>

    </div>

</form>

<div>

    <script>
        function abc() {
            var txtFirstNumberValue = document.getElementById('txt1').value;
            var txtSecondNumberValue = document.getElementById('txt2').value;
            var result = parseFloat(txtFirstNumberValue) * parseFloat(txtSecondNumberValue);
            if (!isNaN(result)) {
                document.getElementById('txt3').value = result;
            }
        }
    </script>
</div>




@endsection
