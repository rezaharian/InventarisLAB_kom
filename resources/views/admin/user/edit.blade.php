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
        <b class="">Edit Data User </b>
        </div>

    <div class="text-left  ml-4">
        <a class="btn btn-sm btn-secondary shadow " href="{{ route('user.index') }}"><i class="fas fa-chevron-left">
            </i> Back</a>

    </div>


    <form action="{{ route('user.update', $user->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <input type="hidden" name="id" value="">
        <div class="row p-4">
            <div class="col-md-4">
                <div class="form-group">
                    <strong>Nama </strong>
                    <input type="text" name="name" class="form-control" placeholder="name "
                        value="{{ $user->name }}">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group ">
                    <strong for="">Role user</strong>
                    <select name="ruang" class="form-control" required>
                        <option value="{{ $user->role }}">{{ $user->role }}</option>
                        <option value="admin"> admin</option>
                        <option value="petugas"> petugas</option>
                        <option value="tu"> tu</option>
                        <option value="kepsek"> kepsek</option>

                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <strong> Email</strong>
                    <input type="email" name="email" class="form-control" placeholder="email "
                        value="{{ $user->email }}">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <strong> Password</strong>
                    <input type="text" name="password" class="form-control"
                        value="{{ $user->password }}">
                </div>
            </div>



        </div>
        <div class="text-center mb-4">
            <button type="submit" class="btn btn-sm btn-primary m-1"><i class="fas fa-save"></i> Save </button>

        </div>

    </form>



@endsection
