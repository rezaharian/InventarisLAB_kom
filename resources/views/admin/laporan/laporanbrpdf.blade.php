@extends('admin.laporan.tmp')

@section('content')
    


<div class="header"
style="text-align: center; font-size:20px; font-family:Arial, Helvetica, sans-serif; font-style:unset;">
@foreach ($ps as $p)
   <strong > <p>LAPORAN INVENTARIS LAB KOMPUTER <br>
   {{ $p->nama }}</p> </strong>
</div>
<div>
<p>Jneis Laporan : {{ $jl }} <br>Petugas : {{ $user->name }}<br>{{ $tgl }}</p>

</div>

<table class="table-line">
<thead>
    <tr style="font-size: 9pt;">
        <th>Nama Barang</th>
        <th>jumlah Rusak</th>
        <th>Tanggal Rusak</th>
        <th>Keterangan</th>
    </tr>
</thead>
<tbody>
    @foreach ($br as $row)
        <tr style="font-size: 9pt;">
            <td>{{ $row->barang->nama }}</td>
            <td>{{ $row->jumlah }}</td>
            <td>{{ $row->tanggal }}</td>
            <td>{{ $row->keterangan }}</td>



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