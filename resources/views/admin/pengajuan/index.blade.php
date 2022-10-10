@extends('adminlte::page')

@section('title', 'Pengajuan')


@section('content')

    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
    </div>

    <div class="text-center text-primary ">
        <b class=""> Data Inventaris Pengajuan </b>
    </div>

  

   @if(session('success'))
   @include('sweetalert::alert')
    @endif

<div class="row m-3">

	<div class="col-md-3 ">
		<div class="info-box rounded-pill ">
			<span class="info-box-icon bg-primary rounded-pill">
				<i class="far fa-copy"></i></span>
			<div class="info-box-content">
				<span class="info-box-text"> <small> <strong> Jumlah Pengajuan :</strong></small></span>
				<span class="info-box-number">{{ $data }}</span>
			</div>
		</div>
	</div>

	<div class="col-md-3 ">
		<div class="info-box rounded-pill ">
			<span class="info-box-icon bg-success rounded-pill">
				<i class="far fa-copy"></i></span>
			<div class="info-box-content">
				<span class="info-box-text"> <small> <strong>  Pengajuan Telah ACC :</strong></small></span>
				<span class="info-box-number">{{ $acc }}</span>
			</div>
		</div>
	</div>

	<div class="col-md-3 ">
		<div class="info-box rounded-pill ">
			<span class="info-box-icon bg-warning rounded-pill">
				<i class="far fa-copy"></i></span>
			<div class="info-box-content">
				<span class="info-box-text"> <small> <strong> Pengajuan Belum ACC :</strong></small></span>
				<span class="info-box-number">{{ $belumacc }}</span>
			</div>
		</div>
	</div>

	<div class="col-md-3 ">
		<div class="info-box rounded-pill ">
			<span class="info-box-icon bg-danger rounded-pill">
				<i class="far fa-copy"></i></span>
			<div class="info-box-content">
				<span class="info-box-text"> <small> <strong> Pengajuan Mendesak :</strong></small></span>
				<span class="info-box-number">{{ $mendesak }}</span>
			</div>
		</div>
	</div>
	
</div>



   
    <a href="/admin/pengajuan/create">
        <button class="btn btn-sm btn-success m-1"><b>Add +</b></button>
    </a>


    <table class="table table-hover mb-3" id="daftar">
        <thead>
            <tr>
                <th>No Pengajuan</th>
                <th>Nama</th>
                <th>Jumlah</th>
                <th>Harga</th>
                <th>Keperluan</th>
                <th>penempatan</th>
                <th>Status</th>
                <th class="text-center">Opsi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pengajuan as $row)
                <tr>
                    <td>{{ $row->nopengajuan }}</td>
                    <td>{{ $row->nama }}</td>
                    <td>{{ $row->jumlah }}</td>
                    <td>{{ $row->hargatotal }}</td>
                    <td>
                        @if ($row->keperluan == 0)
                            <span class="badge bg-success">Tidak Mendesak</span>
                        @else
                            <span class="badge bg-danger">Mendesak</span>
                        @endif
                    </td>
                    <td>    @if ($row->penempatan == 'ruang belum dipilih')
                        <span class="badge bg-danger">Ruang Belum Di Update</span>
                        @else
                        <span class="badge bg-success">Sudah diUpdate</span>
                        @endif</td>

                    <td>
                        @if ($row->status == 0)
                        <span class="badge bg-danger">Belum ACC</span>
                        @else
                        <span class="badge bg-success">ACC</span>
                        @endif
                    </td>




                    <td class="text-center">

                        <form action="{{ route('pengajuan.destroy', $row->id) }}" method="POST">

                            <a class="btn btn-info btn-sm" href="{{ route('pengajuan.show', $row->id) }}"><i
                                    class="fas fa-eye"></i></a>

                            <a class="btn btn-primary btn-sm" href="{{ route('pengajuan.edit', $row->id) }}"><i
                                    class="fas fa-edit"></i></a>

                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"> <i
                                    class="fas fa-trash"></i></button>
                        </form>


                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
    {{-- {{ $row->links() }} --}}

@endsection
