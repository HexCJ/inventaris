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
            <h3 class="m-3">Data Pembelian</h3>
            @if (auth()->user()->hasRole('Administrator'))
            <a  class="m-3 btn btn-primary" style="height: 30px" href="{{route ('datapembelianexport')}}">Download Excel</a>
            @endif
            <a href="{{route ('datapembelianadd')}}" class="py-1 px-3 text-center align-items-center d-flex rounded text-decoration-none button ms-auto"><i class="fa fa-cart-plus me-2" aria-hidden="true"></i>Tambah Data Pembelian</a>
          </div> 
        <main class="content px-3 py-2">
            <div class="container-fluid">
                <!-- Table Element -->
                <div class="card border-0">
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">
                                        No
                                    </th>
                                    <th scope="col">
                                        Nama Barang
                                    </th>
                                    <th scope="col">
                                        Kode Barang
                                    </th>
                                    <th scope="col">
                                        Jenis Barang
                                    </th>
                                    <th scope="col">
                                        Merk/Type
                                    </th>
                                    <th scope="col">
                                        Jumlah
                                    </th>
                                    <th scope="col">
                                        Tanggal Pembelian
                                    </th>
                                    <th scope="col">
                                        Harga
                                    </th>
                                    <th scope="col">
                                        Total
                                    </th>
                                    <th scope="col">
                                        Aksi
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
                                        {{$d->nama_barang}}
                                    </td>
                                    <td>
                                        {{$d->kode_barang}}
                                    </td>
                                    <td>
                                        {{$d->jenis_barang}}
                                    </td>
                                    <td>
                                        {{$d->merk}}
                                    </td>
                                    <td>
                                        {{$d->jumlah}}
                                    </td>
                                    <td>
                                        {{$d->tanggal_pembelian}}
                                    </td>
                                    <td>
                                        {{$d->harga}}
                                    </td>
                                    <td>
                                        {{$d->total}}
                                    </td>
                                    <td class="d-flex justify-content-center align-items-center">
                                        <div class="dropdown py-3">
                                          <a class="button py-2 px-3 rounded text-decoration-none text-center dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="bi bi-person-fill-gear me-2 i-icon"></i>Option
                                          </a>
                                          <ul class="dropdown-menu">
                                            <li><a href="{{ route('datapembelianedit',['id' => $d->id]) }}" class="dropdown-item" href="#"><i class="bi bi-person-fill-gear me-2 i-icon"></i>Edit</a></li>
                                            <li>
                                              <form id="hapus-datapembelian-{{ $d->id }}" action="{{ route('datapembelianhapus', $d->id) }}" method="POST">
                                                <button type="button" id="btnHapusdatapembelian{{ $d->id }}" class="dropdown-item text-danger">
                                                  <i class="bi bi-trash me-2 i-icon"></i>Hapus
                                                </button>
                                                @csrf
                                                @method('DELETE')
                                              </form>
                                              <script>
                                                document.addEventListener('DOMContentLoaded', function() {
                                                    document.getElementById('btnHapusdatapembelian{{ $d->id }}').addEventListener('click', function() {
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
                                                                document.getElementById('hapus-datapembelian-{{ $d->id }}').submit();
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
