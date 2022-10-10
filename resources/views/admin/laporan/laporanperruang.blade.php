@extends('admin.laporan.tmp')

@section('content')
    <div class="header"
        style="text-align: center; font-size:20px; font-family:Arial, Helvetica, sans-serif; font-style:unset;">
        @foreach ($ps as $p)
            <strong>
                <p>LAPORAN INVENTARIS LAB KOMPUTER <br>
                    {{ $p->nama }}</p>
            </strong>
    </div>
    <div>
        <p>Jneis Laporan : {{ $jl }} <br>Petugas : {{ $user->name }}<br>{{ $tgl }}
            <br>
        </p>
    </div>

    <div
        style="background-color:  rgba(11, 11, 131, 0.246); margin-top:10%; color:rgb(3, 3, 3); font-size:12px; font-style:bold; padding:1%; font-family:Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;">
        Ruang : {{ $nr1 }} <br> Jumlah Barang : {{ $ruang1j }} <br>
        Dengan Rincian :
    </div>
    <table class="table-line">
        <thead>
            <tr style="font-size: 9pt;">
                <th>Kode  </th>
                <th>Nama </th>
                <th>Tanggal </th>
                <th>Jumlah </th>
                <th>Rusak </th>
                <th>Dipinjam </th>
                <th>Tersedia </th>
                <th>Jenis </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ruang1 as $row)
                <tr style="font-size: 9pt;">
                    <td>{{ $row->kode }}</td>
                    <td>{{ $row->nama }}</td>
                    <td>{{ $row->tanggal }}</td>
                    <td>{{ $row->jumlah }}</td>
                    <td>{{ $row->barang_rusaks->sum('jumlah') }}</td>
                    <td>{{ $row->barang_keluars->where('status', '0')->sum('jumlah') }}</td>
                    <td> {{ $row->jumlah - ($row->barang_keluars->where('status', '0')->sum('jumlah') + $row->barang_rusaks->sum('jumlah')) }}</td>
                    <td>{{ $row->jenis }}</td>
                </tr>
            @endforeach

        </tbody>
    </table>

    <div
        style="background-color:  rgba(11, 11, 131, 0.246); margin-top:10%; color:rgb(3, 3, 3); font-size:12px; font-style:bold; padding:1%; font-family:Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;">
        Ruang : {{ $nr2 }} <br> Jumlah Barang : {{ $ruang2j }} <br>
        Dengan Rincian :
    </div>
    <table class="table-line">
        <thead>
            <tr style="font-size: 9pt;">
                <th>Kode </th>
                <th>Nama </th>
                <th>Tanggal </th>
                <th>Jumlah </th>
                <th>Rusak </th>
                <th>Dipinjam </th>
                <th>Tersedia </th>
                <th>Jenis </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ruang2 as $row)
                <tr style="font-size: 9pt;">
                    <td>{{ $row->kode }}</td>
                    <td>{{ $row->nama }}</td>
                    <td>{{ $row->tanggal }}</td>
                    <td>{{ $row->jumlah }}</td>
                    <td>{{ $row->barang_rusaks->sum('jumlah') }}</td>
                    <td>{{ $row->barang_keluars->where('status', '0')->sum('jumlah') }}</td>
                    <td> {{ $row->jumlah - ($row->barang_keluars->where('status', '0')->sum('jumlah') + $row->barang_rusaks->sum('jumlah')) }}</td>
                    <td>{{ $row->jenis }}</td>
                </tr>
            @endforeach

        </tbody>
    </table>

    <div
        style="background-color:  rgba(11, 11, 131, 0.246); margin-top:10%; color:rgb(3, 3, 3); font-size:12px; font-style:bold; padding:1%; font-family:Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;">
        Ruang : {{ $nr3 }} <br> Jumlah Barang : {{ $ruang3j }} <br>
        Dengan Rincian :
    </div>
    <table class="table-line">
        <thead>
            <tr style="font-size: 9pt;">
                <th>Kode </th>
                <th>Nama </th>
                <th>Tanggal </th>
                <th>Jumlah </th>
                <th>Rusak </th>
                <th>Dipinjam </th>
                <th>Tersedia </th>
                <th>Jenis </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ruang3 as $row)
                <tr style="font-size: 9pt;">
                    <td>{{ $row->kode }}</td>
                    <td>{{ $row->nama }}</td>
                    <td>{{ $row->tanggal }}</td>
                    <td>{{ $row->jumlah }}</td>
                    <td>{{ $row->barang_rusaks->sum('jumlah') }}</td>
                    <td>{{ $row->barang_keluars->where('status', '0')->sum('jumlah') }}</td>
                    <td> {{ $row->jumlah - ($row->barang_keluars->where('status', '0')->sum('jumlah') + $row->barang_rusaks->sum('jumlah')) }}</td>
                    <td>{{ $row->jenis }}</td>
                </tr>
            @endforeach

        </tbody>
    </table>

    <div
        style="background-color:  rgba(11, 11, 131, 0.246); margin-top:10%; color:rgb(3, 3, 3); font-size:12px; font-style:bold; padding:1%; font-family:Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;">
        Ruang : {{ $nr4 }} <br> Jumlah Barang : {{ $ruang4j }} <br>
        Dengan Rincian :
    </div>
    <table class="table-line">
        <thead>
            <tr style="font-size: 9pt;">
                <th>Kode </th>
                <th>Nama </th>
                <th>Tanggal </th>
                <th>Jumlah </th>
                <th>Rusak </th>
                <th>Dipinjam </th>
                <th>Tersedia </th>
                <th>Jenis </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ruang4 as $row)
                <tr style="font-size: 9pt;">
                    <td>{{ $row->kode }}</td>
                    <td>{{ $row->nama }}</td>
                    <td>{{ $row->tanggal }}</td>
                    <td>{{ $row->jumlah }}</td>
                    <td>{{ $row->barang_rusaks->sum('jumlah') }}</td>
                    <td>{{ $row->barang_keluars->where('status', '0')->sum('jumlah') }}</td>
                    <td> {{ $row->jumlah - ($row->barang_keluars->where('status', '0')->sum('jumlah') + $row->barang_rusaks->sum('jumlah')) }}</td>
                    <td>{{ $row->jenis }}</td>
                </tr>
            @endforeach

        </tbody>
    </table>





    <div style="text-align: center;">
        <p>Bekasi, {{ $tgl }}<br> Kepala Sekolah</p><br><br>
    </div>
    <div style="text-align: center;">
        <p> {{ $p->kepsek }}</p>
    </div>
    @endforeach
@endsection
