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
        <b class="">Detail User </b>
        </div>
        

    <div class="row  ">
        <div class="col-lg-12 margin-tb">
            <div class="text-left  ml-4">
                <a class="btn btn-sm btn-secondary shadow " href="{{ route('user.index') }}"><i class="fas fa-chevron-left">
                    </i> Back</a>
                <a class="btn btn-primary btn-sm shadow " href="{{ route('user.edit', $user->id) }}"><i
                        class="fas fa-edit"></i> Edit</a>
            </div>
        </div>
    </div>
    <div class="row m-4   border rounded shadow">

        <div class="col-md-2"></div>
        <div class="col-md-8 mb-4 ">
            <table class="table m-2  ">
                <tbody>
                    <tr>
                        <th scope="row">Nama </th>
                        <td> : {{ $user->name }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Email</th>
                        <td> : {{ $user->email }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Role</th>
                        <td> : {{ $user->role }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Password</th>
                        <td> : {{ $user->password }}</td>
                    </tr>
               
                </tbody>
            </table>
        </div>

        <div class="div mb-4">

        </div>
    </div>
    


@endsection
