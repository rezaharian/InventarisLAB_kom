@extends('adminlte::page')

@section('title', 'Edit Profile Sekolah')


@section('content')
    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
    </div>



    <form action="{{ route('profile-sekolah.update', $profile_sekolah->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nama Sekolah:</strong>
                    <input type="text" name="nama" value="{{ $profile_sekolah->nama }}" class="form-control"
                        placeholder="nama">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Alamat Sekolah:</strong>
                    <input type="text" name="alamat" value="{{ $profile_sekolah->alamat }}" class="form-control"
                        placeholder="alamat">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Telepon Sekolah:</strong>
                    <input type="text" name="telpon" value="{{ $profile_sekolah->telpon }}" class="form-control"
                        placeholder="telpon">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Website Sekolah:</strong>
                    <input type="text" name="website" value="{{ $profile_sekolah->website }}" class="form-control"
                        placeholder="website">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Kepala Sekolah:</strong>
                    <input type="text" name="kepsek" value="{{ $profile_sekolah->kepsek }}" class="form-control"
                        placeholder="kepsek">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Profile Sekolah:</strong>
                    <input type="text" name="profile" value="{{ $profile_sekolah->profile }}" class="form-control"
                        placeholder="profile">
                </div>
            </div>




            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Image:</strong>
                    <input type="file" name="image" class="form-control" placeholder="image">
                    <img src="/image/{{ $profile_sekolah->image }}" width="300px">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>
@endsection
