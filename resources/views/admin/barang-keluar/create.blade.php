
@extends('adminlte::page')

@section('title', 'Create Inventaris Pinjam')


@section('content')
                  <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
				<div class="card-body">
					@if (session('status'))
						<div class="alert alert-error" role="alert">
							{{ session('status') }}
						</div>
					@endif
				</div>

				<div class="text-center text-primary ">
					<b class=""> Inventaris Pinjam </b>
					</div>
					
					<div class="text-left  ml-4">
						<a class="btn btn-sm btn-secondary shadow " href="{{ route('barang-keluar.index') }}"><i class="fas fa-chevron-left">
							</i> Back</a>
					</div>

    
    <form action="{{ route('barang-keluar.store') }}" method="post" class="form-group">
			@csrf
			<div class="row p-4">
				<div class="col-md-4">
					<div class="form-group">
						<label for="">Peminjam</label>
						<input type="text"  class="form-control" name="peminjam" required>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label for="">Barang</label>
						<select name="barang_id" class="form-control">
							<option value="">-- Pilih Barang --</option>
							@foreach ($barang as $row)
								<option value="{{ $row->id }}">{{ $row->nama }}  </option>
							@endforeach
						</select>
					</div>
				</div>	
					<div class="col-md-4">
					<div class="form-group">
						<label for="">Jumlah</label>
						<input type="number" value="" class="form-control" name="jumlah" required>
					</div>
				</div>
		
			<div class="col-md-4 form-group">
				<label for="">Catatan</label>
				<input type="text" value=""  class="form-control" name="catatan" >
			</div>
		</div>
		<div class="row ml-4">
            
            <button type="reset" class="btn btn-sm btn-primary m-1 shadow"><i class="fas fa-undo"></i> Reset</button>
            <button type="submit" class="btn btn-sm btn-primary m-1 shadow"><i class="fas fa-save"></i> Save </button>
        </div>		</form>




        @endsection