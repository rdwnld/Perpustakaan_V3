@extends ('layout')

@section('title', 'Daftar')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Daftar Anggota Baru</h1>
    </div>

    <div class="row">

        <!-- Daftar -->
        <div class="col">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Daftar</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <form action="/userstore" method="post">
                        @csrf
                        <label for="">Username</label>
                        <input type="text" name="username" class="form-control">
                        @error('username')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror

                        <label for="">Password</label>
                        <input type="password" name="password" class="form-control">
                        @error('password')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror

                        <label for="">Level</label>
                        <select name="level" id="" class="form-control">
                            <option value="" hidden>- Pilih Level -</option>
                            <option value="Admin">Admin</option>
                            <option value="Petugas">Petugas</option>
                        </select>
                        @error('level')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror

                        <div class="mt-3">
                            <input type="submit" class="btn btn-primary" value="Simpan">
                            <a href="/users" class="btn btn-secondary">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection