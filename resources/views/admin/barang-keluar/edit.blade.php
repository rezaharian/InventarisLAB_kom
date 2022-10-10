 @extends('adminlte::page')

 @section('title', 'Edit Inventaris Pinjam')


 @section('content')
     <div class="card-body">
         @if (session('status'))
             <div class="alert alert-success" role="alert">
                 {{ session('status') }}
             </div>
         @endif
     </div>

     <div class="text-center text-primary ">
         <b class="">Edit Data Inventaris Pinjam </b>
     </div>



     <form action="{{ route('barang-keluar.update', $barang_keluar->id) }}" method="POST">
         @csrf
         @method('PUT')

         <div class="row p-4   ">
             <div class="col-md-4">
                 <div class="form-group">
                     <strong>Peminjam</strong>
                     <input type="text" name="peminjam" class="form-control" placeholder="peminjam "
                         value="{{ $barang_keluar->peminjam }}">
                 </div>
             </div>
             <div class="col-md-4">
                 <div class="form-group">
                     <strong for="">Barang</strong>
                     <select name="barang_id" class="form-control">
                         <option value="{{ $barang_keluar->barang->id }}">{{ $barang_keluar->barang->nama }}</option>
                         @foreach ($barang as $row)
                             <option value="{{ $row->id }}">{{ $row->nama }}</option>
                         @endforeach
                     </select>
                 </div>
             </div>
             <div class="col-md-4">
                 <div class="form-group">
                     <strong for="">Jumlah</strong>
                     <input type="number" value="{{ $barang_keluar->jumlah }}" class="form-control" name="jumlah">
                 </div>
             </div>
             <div class="col-md-4">
                <div class="form-group">
                    <strong>Status Pengembalian</strong>
                    <select name="status" class="form-control">
                        <option value="{{ $barang_keluar->status }}">
                            @if ($barang_keluar->status == 0)
                                <span class="badge bg-danger">DIPINJAM</span>
                            @else
                                <span class="badge bg-success">DIKEMBALIKAN</span>
                            @endif
                        </option>
                        <option value="0">DIPINJAM</option>
                        <option value="1">DIKEMBALIKAN</option>
                    </select>
                </div>
            </div>
             <div class="col-md-4">
                 <div class="form-group">
                     <strong>Catatan :</strong>
                     <input type="text" name="catatan" class="form-control" placeholder="Barang keluar"
                         value="{{ $barang_keluar->catatan }}">
                 </div>
             </div>
         </div>
         <div class="mb-4 ml-4">
             <a class="btn btn-sm btn-secondary  " href="{{ route('barang-keluar.index') }}"><i class="fas fa-chevron-left">
                 </i> Back</a>
             <button type="submit" class="btn btn-sm btn-primary m-1"><i class="fas fa-save"></i> Save </button>

         </div>

     </form>
 @endsection
