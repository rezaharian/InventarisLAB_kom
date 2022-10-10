@extends('adminlte::page')

@section('title', 'Edit Konfirmasi Pengajuan')


@section('content')
    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
    </div>
    
    <div class="text-center text-primary ">
        <b class="">Konfirmasi pengajuan </b>
        </div>

    <div class="text-left  ml-4">
        <a class="btn btn-sm btn-secondary shadow " href="{{ route('pengajuan-konfirmasi.index') }}"><i class="fas fa-chevron-left">
            </i> Back</a>

    </div>


    <form action="{{ route('pengajuan-konfirmasi.update', $pengajuan_konfirmasi->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <input type="hidden" name="id" value="">
        <div class="row  m-3">
            <div class="col-md-4">
                <div class="form-group">
                    <strong>KNo Pengajuan</strong>
                    <input type="text" name="nopengajuan" disabled class="form-control" placeholder="nopengajuan"
                        value="{{ $pengajuan_konfirmasi->nopengajuan }}">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <strong>Nama Barang</strong>
                    <input type="text" name="nama" disabled  class="form-control" placeholder="nama"
                        value="{{ $pengajuan_konfirmasi->nama }}">
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group ">
                    <strong for="">Jenis Barang</strong>
                    <select name="jenis" disabled class="form-control" required>
                        <option value="{{ $pengajuan_konfirmasi->jenis }}">{{ $pengajuan_konfirmasi->jenis }}</option>
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
                    <input type="text" disabled name="merek" class="form-control" placeholder="merek"
                        value="{{ $pengajuan_konfirmasi->merek }}">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <strong>Tipe Barang</strong>
                    <input type="text" disabled name="tipe" class="form-control" placeholder="tipe"
                        value="{{ $pengajuan_konfirmasi->tipe }}">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group ">
                    <strong for="">Penempatan </strong>
                    <select name="penempatan" disabled class="form-control" required>
                        <option value="{{ $pengajuan_konfirmasi->penempatan }}">{{ $pengajuan_konfirmasi->penempatan }}</option>
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
                    <input type="text" name="jumlah"   id="txt1" onkeyup="abc();" class="form-control" placeholder="jumlah"
                        value="{{ $pengajuan_konfirmasi->jumlah }}">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <strong>Harga Barang</strong>
                    <input type="text" disabled  id="txt2" onkeyup="abc();" name="harga" class="form-control" placeholder="harga"
                        value="{{ $pengajuan_konfirmasi->harga }}">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <strong>Harga Total</strong>
                    <input type="text" disabled  id="txt3" name="hargatotal" class="form-control" value="{{ $pengajuan_konfirmasi->hargatotal }}">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <strong> Tanggal</strong>
                    <input type="date"    name="tanggal" class="form-control" value="{{ $pengajuan_konfirmasi->tanggal }}">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <strong>Kondisi Barang</strong>
                    <select name="kondisi" disabled class="form-control">
                        <option value="{{ $pengajuan_konfirmasi->kondisi }}">
                            @if ($pengajuan_konfirmasi->kondisi == 0)
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
                    <select name="keperluan" disabled class="form-control">
                        <option value="{{ $pengajuan_konfirmasi->keperluan }}">
                            @if ($pengajuan_konfirmasi->keperluan == 0)
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
                    <strong>Status </strong>
                    <select name="status" class="form-control">
                        <option value="{{ $pengajuan_konfirmasi->status }}">
                            @if ($pengajuan_konfirmasi->status == 0)
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
                    <input type="text" disabled name="pengaju" class="form-control" placeholder="pengaju"
                        value="{{ $pengajuan_konfirmasi->pengaju }}">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <strong>Link</strong>
                    <input type="text" disabled name="link" class="form-control" placeholder="link"
                        value="{{ $pengajuan_konfirmasi->link }}">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <strong>Keterangan </strong>
                    <input type="text"  name="keterangan" class="form-control" placeholder="keterangan"
                        value="{{ $pengajuan_konfirmasi->keterangan }}">
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
