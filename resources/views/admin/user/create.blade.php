@extends('adminlte::page')

@section('title', 'Dashboard')


@section('content')
    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
    </div>

<div class="text-center text-primary ">
<b class=""> User Add </b>
</div>

<div class="text-left  ml-4">
    <a class="btn btn-sm btn-secondary shadow " href="{{ route('user.index') }}"><i class="fas fa-chevron-left">
        </i> Back</a>
</div>

    <form action="{{ route('user.store') }}" method="post" class="form-group" enctype="multipart/form-data">
        @csrf
        <div class="row  p-4">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="">Nama</label>
                    <input type="text" class="form-control"  name="name" required >
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" value="" class="form-control" name="email" required>
                </div>
            </div>
 
            <div class="col-md-4">
                <div class="form-group">
                    <label for="">Role</label>
                    <select name="role" class="form-control" required>
                        <option value="">--- Pilih role ---</option>
                        <option value="admin">Admin</option>
                        <option value="petugas">Petugas</option>
                        <option value="tu">TU</option>
                        <option value="kepsek">Kepsek</option>
                    </select>
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="text" value="OK" class="form-control" name="password" >
                </div>
            </div>
        </div>


        <div class="row ml-4">
            
            <button type="reset" class="btn btn-sm btn-primary m-1 shadow"><i class="fas fa-undo"></i> Reset</button>
            <button type="submit" class="btn btn-sm btn-primary m-1 shadow"><i class="fas fa-save"></i> Save </button>
        </div>
    </form>

@endsection
