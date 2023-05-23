@extends ('layout')

@section('title', 'Users')

@section('content')

@include('sweetalert::alert')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Daftar Users Baru</h1>
    </div>

    <div class="row">

        <!-- Daftar -->
        <div class="col">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Users</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <a href="/tambahuser" class="btn btn-primary mb-3">Tambah User</a>
                    <table class="table">
                        <tr>
                            <th>No</th>
                            <th>Username</th>
                            <th>Level</th>
                            <th>Aksi</th>
                        </tr>
                        @php
                        $no=1;
                        @endphp
                        @foreach ($users as $u)
                        <tr>
                            <td>{{ $no }}</td>
                            <td>{{$u->username}}</td>
                            <td>{{$u->level}}</td>
                            <td>
                                <a href="/edit/{{$u->user_id}}" class="btn btn-success">Edit</a>
                                <a href="/delete/{{$u->user_id}}" class="btn btn-danger" data-confirm-delete="true">Delete</a>
                            </td>
                        </tr>
                        @php
                        $no++;
                        @endphp
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection