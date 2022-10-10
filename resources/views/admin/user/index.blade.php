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
        <b class=""> Data Users </b>
    </div>


    <a href="/admin/user/create">
        <button class="btn btn-sm btn-success m-1"><b>Add +</b></button>
    </a>

    <table class="table table-hover m-1 border" id="daftar">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Email</th>
                <th>Role</th>
                <th>Password</th>
                <th class="text-center">Opsi</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($user as $row)
                <tr>
                    <td>{{ $row->name }}</td>
                    <td>{{ $row->email }}</td>
                    <td>{{ $row->role }}</td>
                    <td>{{ $row->password }}</td>


                    <td class="text-center">

                        <form action="{{ route('user.destroy', $row->id) }}" method="POST">

                            <a class="btn btn-info btn-sm" href="{{ route('user.show', $row->id) }}"><i
                                    class="fas fa-eye"></i></a>

                            <a class="btn btn-primary btn-sm" href="{{ route('user.edit', $row->id) }}"><i
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
