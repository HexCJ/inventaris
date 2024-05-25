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
            <h3 class="m-3">Data User</h3>
            @if (auth()->user()->hasRole('Administrator'))
            <a  class="m-3 btn btn-primary" style="height: 30px" href="{{route ('userexport')}}">Download Excel</a>
            @endif
            <a href="{{route ('useradd')}}" class="py-1 px-3 text-center align-items-center d-flex rounded text-decoration-none button ms-auto"><i class="fa-solid fa-user-plus me-2"></i>Tambah User</a>
          </div>        
          <main class="content px-3 py-2">
            <div class="container-fluid">
                <!-- Table Element -->
                <div class="card border-0">
                    <div class="card-body">
                        <table class="table table-centered text-center">
                            <thead>
                                <tr>
                                    <th scope="col">
                                        No
                                    </th>
                                    <th scope="col">
                                        Nama
                                    </th>
                                    <th scope="col">
                                        Username
                                    </th>
                                    <th scope="col">
                                        Gender
                                    </th>
                                    <th scope="col">
                                        Email
                                    </th>
                                    <th scope="col">
                                        Role
                                    </th>
                                    <th scope="col">
                                        Aksi
                                    </th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($data as $d)
                                <tr>
                                    <th scope="row">
                                        {{$loop->iteration}}
                                    </th>
                                    <td>
                                        {{$d->name}}
                                    </td>
                                    <td>
                                        {{$d->username}}
                                    </td>
                                    <td>
                                        {{$d->jenis_kelamin}}
                                    </td>
                                    <td>
                                        {{$d->email}}
                                    </td>
                                    <td>
                                        {{$d->role}}
                                    </td>
                                    <td class="d-flex justify-content-center align-items-center">
                                        <div class="dropdown py-3">
                                          <a class="button py-2 px-3 rounded text-decoration-none text-center dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="bi bi-person-fill-gear me-2 i-icon"></i>Option
                                          </a>
                                          <ul class="dropdown-menu">
                                            <li><a href="{{ route('useredit',['id' => $d->id]) }}" class="dropdown-item" href="#"><i class="bi bi-person-fill-gear me-2 i-icon"></i>Edit</a></li>
                                            <li>
                                              <form id="hapus-users-{{ $d->id }}" action="{{ route('userhapus', $d->id) }}" method="POST">
                                                <button type="button" id="btnHapusUsers{{ $d->id }}" class="dropdown-item text-danger">
                                                  <i class="bi bi-trash me-2 i-icon"></i>Hapus
                                                </button>
                                                @csrf
                                                @method('DELETE')
                                              </form>
                                              <script>
                                                document.addEventListener('DOMContentLoaded', function() {
                                                    document.getElementById('btnHapusUsers{{ $d->id }}').addEventListener('click', function() {
                                                        Swal.fire({
                                                            title: 'Apakah Anda yakin menghapus {{ $d->name}} ?',
                                                            text: "Data yang dihapus tidak dapat dikembalikan!",
                                                            icon: 'warning',
                                                            background: '#272829',
                                                            color: '#ffffff',
                                                            showCancelButton: true,
                                                            confirmButtonColor: '#d33',
                                                            cancelButtonColor: '#FCDC2A',
                                                            confirmButtonText: 'Ya, hapus!',
                                                            cancelButtonText: 'Batal'
                                                        }).then((result) => {
                                                            if (result.isConfirmed) {
                                                                document.getElementById('hapus-users-{{ $d->id }}').submit();
                                                            }
                                                        });
                                                    });
                                                });
                                              </script>
                                            </li>
                                          </ul>
                                        </div>
                                      </td>
                                </tr>
                                @endforeach
                    
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>