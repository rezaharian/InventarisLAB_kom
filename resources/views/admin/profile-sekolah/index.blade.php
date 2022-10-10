@extends('adminlte::page')

@section('title', 'Profile Sekolah')


@section('content')
    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
    </div>




    {{-- @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif --}}

    <table class="table table-bordered">
        <tr>
            <th>Image</th>
            <th>Nama</th>
            <th>alamat</th>
            <th>telepon</th>
            <th>website</th>
            <th>kepsek</th>
            <th>profile</th>
            <th width="140px">Action</th>
        </tr>
        @foreach ($profile_sekolah as $profiles)
            <tr>
                <td><img src="/image/{{ $profiles->image }}" width="100px"></td>
                <td>{{ $profiles->nama }}</td>
                <td>{{ $profiles->alamat }}</td>
                <td>{{ $profiles->telpon }}</td>
                <td>{{ $profiles->website }}</td>
                <td>{{ $profiles->kepsek }}</td>
                <td>{{ $profiles->profile }}</td>
                <td>
                    <form  action="{{ route('profile-sekolah.destroy', $profiles->id) }}" method="POST">

                        <a class="btn btn-primary" href="{{ route('profile-sekolah.show', $profiles->id) }}">lihat</a>

                        <a class="btn btn-primary" href="{{ route('profile-sekolah.edit', $profiles->id) }}"> Edit </a>

                        @csrf
                        {{-- @method('DELETE')

                        <button type="submit" class="btn btn-danger">Delete</button> --}}
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {{-- {!! $profile_sekolah->links() !!} --}}

@endsection
