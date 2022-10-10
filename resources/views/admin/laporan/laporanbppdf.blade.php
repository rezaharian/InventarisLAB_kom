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
        <th>No Pengajuan</th>
        <th>Nama</th>
        <th>Jumlah</th>
        <th>Harga</th>
        <th>Keperluan</th>
        <th>penempatan</th>
        <th>Status</th>
    </tr>
</thead>
<tbody>
    @foreach ($bp as $row)
        <tr style="font-size: 9pt;">
            <td>{{ $row->nopengajuan }}</td>
                    <td>{{ $row->nama }}</td>
                    <td>{{ $row->jumlah }}</td>
                    <td>{{ $row->hargatotal }}</td>
                    <td>
                        @if ($row->keperluan == 0)
                            <span >Tidak Mendesak</span>
                        @else
                            <span >Mendesak</span>
                        @endif
                    </td>
                    <td>{{ $row->penempatan }}</td>

                    <td>
                        @if ($row->status == 0)
                        <span >Belum ACC</span>
                        @else
                        <span >ACC</span>
                        @endif
                    </td>



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