@extends('adminlte::page')

@section('title', 'Dashboard')



@section('content_header')


@stop

@section('content')

    <div class="container">


        <div class="text-center ">
            <h4 class=""><b>INVENTARIS LAB KOMPUTER {{ $profile_sekolah->nama }}</b></h4>
        </div>
        <div class="row mt-4 ">
            <div class="col-md-3 ">
                <div class="info-box rounded-pill ">
                    <span class="info-box-icon bg-info rounded-pill">
                        <i class="far fa-copy"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Keseluruhan Barang</span>
                        <span class="info-box-number">{{ $data }}</span>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="info-box rounded-pill ">
                    <span class="info-box-icon bg-warning rounded-pill">
                        <i class="far fa-copy"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Barang dipinjam</span>
                        <span class="info-box-number">{{ $barang_keluar->where('status', '0')->sum('jumlah') }}</span>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="info-box rounded-pill ">
                    <span class="info-box-icon bg-danger rounded-pill "><i class="far fa-copy"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Barang Rusak</span>
                        <span class="info-box-number">{{ $barang_rusak->sum('jumlah') }}</span>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="info-box rounded-pill ">
                    <span class="info-box-icon bg-success rounded-pill "><i class="far fa-copy"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Barang Tersedia</span>
                        <span class="info-box-number">{{ $akhir }}</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="row m-4  ">

            <div class="col-md-8 border  shadow ">

                <div class="m-3">
                    <strong style="color: blue;">Cetak PDF Laporan Inventaris </strong>
                </div>

                <div class="row">
                    <div class="col">
                    <div class="info-box">
                        <span class="info-box-icon bg-danger"><i class="fas fa-file-pdf"></i></span>
                        <div class="info-box-content text-center">
                            <strong>
                                <span class="info-box-text">Inv Masuk</span></strong>
                            <a href="/admin/laporan/laporanbmpdf" target="_blank"><button
                                    class="btn bg-primary">Cetak</button> </a>
                        </div>
                    </div>
                  </div>
                  <div class="col">
                    <div class="info-box">
                        <span class="info-box-icon bg-danger"><i class="fas fa-file-pdf"></i></span>
                        <div class="info-box-content text-center">
                            <strong>
                                <span class="info-box-text">Inv Keluar</span></strong>
                            <a href="/admin/laporan/laporanbkpdf" target="_blank"><button
                                    class="btn bg-primary">Cetak</button> </a>
                        </div>
                    </div>
                    </div>
                  <div class="col">
                    <div class="info-box">
                        <span class="info-box-icon bg-danger"><i class="fas fa-file-pdf"></i></span>
                        <div class="info-box-content text-center">
                            <strong>
                                <span class="info-box-text">Inv Pinjam</span></strong>
                            <a href="/admin/laporan/laporanbjpdf" target="_blank"><button
                                    class="btn bg-primary">Cetak</button> </a>
                        </div>
                    </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col">
                    <div class="info-box">
                        <span class="info-box-icon bg-danger"><i class="fas fa-file-pdf"></i></span>
                        <div class="info-box-content text-center">
                            <strong>
                                <span class="info-box-text">Inv Rusak</span></strong>
                            <a href="/admin/laporan/laporanbrpdf" target="_blank"><button
                                    class="btn bg-primary">Cetak</button> </a>
                        </div>
                    </div>
                  </div>
                  <div class="col">
                    <div class="info-box">
                        <span class="info-box-icon bg-danger"><i class="fas fa-file-pdf"></i></span>
                        <div class="info-box-content text-center">
                            <strong>
                                <span class="info-box-text"> Pengajuan</span></strong>
                            <a href="/admin/laporan/laporanbppdf" target="_blank"><button
                                    class="btn bg-primary">Cetak</button> </a>
                        </div>
                    </div>
                    </div>
                  <div class="col">
                    <div class="info-box">
                        <span class="info-box-icon bg-danger"><i class="fas fa-file-pdf"></i></span>
                        <div class="info-box-content text-center">
                            <strong>
                                <span class="info-box-text">Ruang</span></strong>
                            <a href="/admin/laporan/laporanperruang" target="_blank"><button
                                    class="btn bg-primary">Cetak</button> </a>
                        </div>
                    </div>
                    </div>

                </div>
                <div class="row">
                  <div class="col ml-1" style="color: red">
                     <i> Note : <br> + Sebelum mencetak laporan, silahkan periksa dulu kesesuaian pada setiap data.</i> <br>
                     <i> + Hanya Admin yang dapat merubah User dan profile Sekolah.</i><br>
                     <i> + Silahkan hubungi admin jika ada kendala.</i>
                  </div>
                </div>



   

            </div>

            <div class="col-md-4 p-2 rounded border light shadow-lg ">
                <div class="ribbon-wrapper">
                    <div class="ribbon bg-primary">
                        Informasi
                    </div>
                </div>
                <strong class="" style="color: blue;"> Pengajuan :</strong>
                <ol class="list-group mb-3 list-group-numbered  ">
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            Jumlah Pengajuan
                        </div>
                        <span class="badge bg-primary rounded-pill">{{ $datapengajuan }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            Pengajuan Telah ACC
                        </div>
                        <span class="badge bg-warning rounded-pill">{{ $acc }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            Pengajuan Belum ACC
                        </div>
                        <span class="badge bg-danger rounded-pill">{{ $belumacc }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            Total Biaya Pengajuan
                        </div>
                        <span class="badge bg-info rounded-pill">Rp.{{ $totalbiaya }}</span>
                    </li>
                </ol>


                <strong style="color: blue;"> Peminjaman :</strong>
                <ol class="list-group  list-group-numbered">
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            Jumlah Peminjaman
                        </div>
                        <span class="badge bg-warning rounded-pill">{{ $datapeminjaman }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            Jumlah Barang dipinjam
                        </div>
                        <span class="badge bg-warning rounded-pill">{{ $barangdipinjam }}</span>
                    </li>
                </ol>

            </div>




        </div>

    </div>
    </div>
    </div>



@stop

@section('css')

@stop

@section('js')

@stop
