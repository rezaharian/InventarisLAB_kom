@extends('adminlte::page')

@section('title', 'Edit Inventaris Masuk')


@section('content')
    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
    </div>

    <div class="text-center text-primary ">
        <b class="">Edit Data Inventaris Masuk </b>
        </div>

    <div class="text-left  ml-4">
        <a class="btn btn-sm btn-secondary shadow " href="{{ route('barang.index') }}"><i class="fas fa-chevron-left">
            </i> Back</a>

    </div>


    <form action="{{ route('barang.update', $barang->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <input type="hidden" name="id" value="">
        <div class="row p-4">
            {{-- <div class="col-md-4">
                <div class="form-group">
                    <strong>Kode</strong>
                    <input type="text" name="kode" class="form-control" placeholder="kode "
                        value="{{ $barang->kode }}">
                </div>
            </div> --}}
            <div class="col-md-4">
                <div class="form-group">
                    <strong>Nama Barang</strong>
                    <input type="text" name="nama" class="form-control" placeholder="nama "
                        value="{{ $barang->nama }}">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group ">
                    <strong for="">Penempatan Barang</strong>
                    <select name="ruang" class="form-control" required>
                        <option value="{{ $barang->ruang }}">{{ $barang->ruang }}</option>
                        <option value="LAB TKJ 1"> LAB TKJ 1</option>
                        <option value="LAB TKJ 2"> LAB TKJ 2</option>
                        <option value="LAB Bahasa 1"> LAB Bahasa 1</option>
                        <option value="LAB Bahasa 2"> LAB Bahasa 2</option>

                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <strong>Tanggal Masuk</strong>
                    <input type="date" name="tanggal" class="form-control" placeholder="tanggal "
                        value="{{ $barang->tanggal }}">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <strong>Jumlah Barang</strong>
                    <input type="number" name="jumlah" class="form-control" placeholder="nama "
                        value="{{ $barang->jumlah }}">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <strong>Penerima Barang</strong>
                    <input type="text" name="penerima" class="form-control" placeholder="penerima "
                        value="{{ $barang->penerima }}">
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group ">
                    <strong for="">Jenis Barang</strong>
                    <select name="jenis" class="form-control" required>
                        <option value="{{ $barang->jenis }}">{{ $barang->jenis }}</option>
                        <option value="Elektronik"> Elektronik</option>
                        <option value="Non Elektronik"> Non Elektronik</option>
                        <option value="Berkas"> Berkas</option>
                        <option value="Software"> Software</option>

                    </select>
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <strong>Kondisi Barang</strong>
                    <select name="kondisi" class="form-control">
                        <option value="{{ $barang->kondisi }}">
                            @if ($barang->kondisi == 0)
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
                    <strong for="">Sumber Barang</strong>
                    <select name="sumber" class="form-control" required>
                        <option value="{{ $barang->sumber }}">{{ $barang->sumber }}</option>
                        <option value="Dana BOS">Dana BOS</option>
                        <option value="Pemprov Jabar">Pemprov Jabar</option>
                        <option value="Pusat">Pusat</option>
                        <option value="Yayasan">Yayasan</option>
                        <option value="Lain Lain">Lain-lain</option>
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <strong>Tanggal Masuk</strong>
                    <input type="text" name="keterangan" class="form-control" placeholder="keterangan "
                        value="{{ $barang->keterangan }}">
                </div>
            </div>



        </div>


        <div class="row ">
            <div class="col-md-3"></div>
            <div class="col-md-6 ">
                <div class="pl-4 pr-4 text-center mb-1">
                    <div class="form-group">
                        <strong>Gambar </strong>
                        <input type="file" name="image" class="form-control" placeholder="image">
                        <img class="mt-1" src="/image/brg/{{ $barang->image }}" width="100%">
                    </div>

                </div>
            </div>
            <div class="col-md-3 "></div>
        </div>
        <div class="text-center mb-4">
            <button type="submit" class="btn btn-sm btn-primary m-1"><i class="fas fa-save"></i> Save </button>

        </div>

    </form>



@endsection
