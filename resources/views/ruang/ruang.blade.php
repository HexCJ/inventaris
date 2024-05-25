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
            <h3 class="m-3">Data Ruang</h3>
            @if (auth()->user()->hasRole('Administrator'))
            <a  class="m-3 btn btn-primary" style="height: 30px" href="{{route ('ruangexport')}}">Download Excel</a>
            @endif
            <button type="button" class="btn btn-success m-3 ms-auto" data-bs-toggle="modal" data-bs-target="#addRuangModal">
                <i class="fa fa-plus me-2" aria-hidden="true"></i>Tambah Data Ruang
            </button>
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
                                        Nama Ruang
                                    </th>
                                    <th scope="col">
                                        aksi
                                    </th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($data as $d)
                                <tr>
                                    <th>
                                        {{$loop->iteration}}
                                    </th>
                                    <td>
                                        {{$d->nama_ruang}}
                                    </td>
                                    <td class="d-flex justify-content-center align-items-center">
                                        <div class="dropdown py-3">
                                          <a class="button py-2 px-3 rounded text-decoration-none text-center dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="bi bi-person-fill-gear me-2 i-icon"></i>Option
                                          </a>
                                          <ul class="dropdown-menu text-center">
                                            {{-- <li><a href="{{ route('datapembelianedit',['id' => $d->id]) }}" class="dropdown-item" href="#"><i class="bi bi-person-fill-gear me-2 i-icon"></i>Edit</a></li> --}}
                                            <li>
                                            <button type="button" class="btn btn-success m-3 ms-auto" style="width: 90px" data-bs-toggle="modal" data-bs-target="#editRuangModal{{$d->id}}">
                                                <i class="fa fa-pencil me-2" aria-hidden="true"></i> Edit
                                            </button>
                                            </li>
                                            <li>
                                              <form id="hapus-ruang-{{ $d->id }}" action="{{ route('ruanghapus', $d->id) }}" method="POST">
                                                <button type="button" id="btnHapusruang{{ $d->id }}" class="dropdown-item text-danger">
                                                  <i class="bi bi-trash me-2 i-icon"></i>Hapus
                                                </button>
                                                @csrf
                                                @method('DELETE')
                                              </form>
                                              <script>
                                                document.addEventListener('DOMContentLoaded', function() {
                                                    document.getElementById('btnHapusruang{{ $d->id }}').addEventListener('click', function() {
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
                                                                document.getElementById('hapus-ruang-{{ $d->id }}').submit();
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

<!-- Modal Add-->
<div class="modal fade" id="addRuangModal" tabindex="-1" aria-labelledby="addRuangModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addRuangModalLabel">Tambah Data Ruang</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('tambah_ruang') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="nama_ruang" class="form-label">Nama Ruang</label>
                        <input type="text" class="form-control" id="nama_ruang" name="nama_ruang" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>

@foreach($data as $d)
    <!-- Modal Edit -->
    <div class="modal fade" id="editRuangModal{{ $d->id }}" tabindex="-1" aria-labelledby="editRuangModalLabel{{ $d->id }}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editRuangModalLabel{{ $d->id }}">Edit Data Ruang</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('update_ruang', $d->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="nama_ruang" class="form-label">Nama Ruang</label>
                            <input type="text" class="form-control" id="nama_ruang{{ $d->id }}" name="nama_ruang" value="{{ $d->nama_ruang }}" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach

