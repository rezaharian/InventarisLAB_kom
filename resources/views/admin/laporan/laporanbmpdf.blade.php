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
        <th>Kode </th>
        <th>Nama </th>
        <th>Tanggal </th>
        <th>Qty</th>
        <th>Ruang</th>
        <th>Penerima</th>
        <th>Kondisi</th>
        <th>Sumber</th>
        <th></th>

    </tr>
</thead>
<tbody>
    @foreach ($bm as $row)
        <tr style="font-size: 9pt;">
            <td>{{ $row->kode }}</td>
            <td>{{ $row->nama }}</td>
            <td>{{ $row->tanggal }}</td>
            <td>{{ $row->jumlah }}</td>
            <td>{{ $row->ruang }}</td>
            <td>{{ $row->penerima }}</td>
            <td>
                @if ($row->kondisi == 0)
                    <span>Baru</span>
                @else
                    <span>Bekas</span>
                @endif
            </td>
            <td>{{ $row->sumber }}</td>



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