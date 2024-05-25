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
            <h3 class="m-3">Data Pemakaian</h3>
            @if (auth()->user()->hasRole('Administrator'))
            <a  class="m-3 btn btn-primary" style="height: 30px" href="{{route ('datapemakaianexport')}}">Download Excel</a>
            @endif
            <a href="{{route ('datapemakaianadd')}}" class="py-1 px-3 text-center align-items-center d-flex rounded text-decoration-none button ms-auto"><i class="fa-solid fa-plus-circle me-2"></i>Tambah Data Pemakaian</a>
          </div>  
          <main class="content px-3 py-2">
            <div class="container-fluid">
                <!-- Table Element -->
                <div class="card border-0">
                    <div class="card-body">
                        <table id="table-pemakaian" class="table table-centered text-center">
                            <thead>
                                <tr>
                                    <th scope="col">
                                        No
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Kode Barang
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Nama Barang
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Jumlah Pakai
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Tanggal Pakai
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Pemakai
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Ruang
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Keterangan
                                    </th>
                                    <th scope="col" class="px-6 py-3">
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
                                        {{$d->kode_barang}}
                                    </td>
                                    <td>
                                        {{$d->nama_barang}}
                                    </td>
                                    <td>
                                        {{$d->jumlah_pakai}}
                                    </td>
                                    <td>
                                        {{$d->tanggal_pemakaian}}
                                    </td>
                                    <td>
                                        {{$d->pemakai}}
                                    </td>
                                    <td>
                                        {{$d->ruang}}
                                    </td>
                                    <td>
                                        {{$d->keterangan}}
                                    </td>
                                    <td class="d-flex justify-content-center align-items-center">
                                        <div class="dropdown py-3">
                                          <a class="button py-2 px-3 rounded text-decoration-none text-center dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="bi bi-gear me-2 i-icon"></i>Option
                                          </a>
                                          <ul class="dropdown-menu">
                                            <li><a href="{{ route('datapemakaianedit',['id' => $d->id]) }}" class="dropdown-item" href="#"><i class="bi bi-pencil me-2 i-icon"></i>Edit</a></li>
                                            <li>
                                              <form id="hapus-datapemakaian-{{ $d->id }}" action="{{ route('datapemakaianhapus', $d->id) }}" method="POST">
                                                <button type="button" id="btnHapusdatapemakaian{{ $d->id }}" class="dropdown-item text-danger">
                                                  <i class="bi bi-trash me-2 i-icon"></i>Hapus
                                                </button>
                                                @csrf
                                                @method('DELETE')
                                              </form>
                                              <script>
                                                document.addEventListener('DOMContentLoaded', function() {
                                                    document.getElementById('btnHapusdatapemakaian{{ $d->id }}').addEventListener('click', function() {
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
                                                                document.getElementById('hapus-datapemakaian-{{ $d->id }}').submit();
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
                        {{ $data->links() }}
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>

