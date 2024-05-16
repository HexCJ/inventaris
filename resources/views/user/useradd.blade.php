@extends('layouts.app')
@section('content')

<div class="wrapper">
    <div class="sidebar">
        @include('partials.sidebar')
    </div>
    <div class="main">
        <div class="navbar-custom">
            @include('partials.navbar')
        </div>
        <div class="d-flex">
            <h3 class="m-3">Tambah Data User</h3>
            {{-- <a href="" class="py-1 px-3 text-center align-items-center d-flex rounded text-decoration-none button ms-auto"><i class="fa-solid fa-user-plus me-2"></i>Tambah Barang</a> --}}
          </div>        
          <main class="content px-3 py-2">
            <form action="{{route ('tambah_user')}}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama </label>
                    <input type="text" class="form-control" id="nama" name="nama" required>
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="text" class="form-control" id="password" name="password" required>
                    @error('password')
                    <small class="text-danger">{{ $message }}</small>
                  @enderror
                </div>

                <div class="col-12 mb-3">
                    <label for="jenis_kelamin" class="text-secondary mb-3">Jenis Kelamin</label>
                    <select class="form-select form-select-sm py-2 mb-2 text-secondary" aria-label="Small select example" id="jenis_kelamin" name="jenis_kelamin"  value="{{old('jenis_kelamin')}}">
                      <option selected>Pilih Jenis Kelamin</option>
                      <option value="Laki-laki">Laki-laki</option>
                      <option value="Perempuan">Perempuan</option>
                    </select>
                    @error('jenis_kelamin')
                    <small class="text-danger">{{ $message }}</small>
                  @enderror
                  </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                {{-- <div class="col-12 col-md-6 mb-3"> --}}
                <div class="col-12 mb-3">
                    <label for="role" class="text-secondary mb-3">Role</label>
                    <select class="form-select form-select-sm py-2 mb-2 text-secondary" aria-label="Small select example" id="role" name="role"  value="{{old('role')}}">
                      <option selected>Pilih Role</option>
                      <option value="Administrator">Administrator</option>
                      <option value="Operator">Operator</option>
                      <option value="Petugas">Petugas</option>
                    </select>
                    @error('role')
                    <small class="text-danger">{{ $message }}</small>
                  @enderror
                  </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </main>
    </div>
</div>