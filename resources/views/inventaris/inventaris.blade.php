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
            <h3 class="m-3">Data Inventaris</h3>
            <a  class="m-3 btn btn-primary" style="height: 30px" href="{{route ('inventarisexport')}}">Download Excel</a>
          </div>          
          <main class="content px-3 py-2">
            <div class="container-fluid">
                <!-- Table Element -->
                <div class="card border-0">
                    <div class="card-body">
                        <table class="table table-centered text-center">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Barang</th>
                                    <th>Jenis Barang</th>
                                    <th>Jumlah Barang</th>
                                    <th>Tanggal Pembelian</th>
                                    <th>Tanggal Pemakaian</th>
                                    <th>Nama Pemakai</th>
                                    <th>Ruangan</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($data as $d)
                                <tr>
                                    <td>{{ $loop->iteration}}</td>
                                    <td>{{ $d->kode_barang }}</td>
                                    <td>{{ $d->jenis_barang }}</td>
                                    <td>{{ $d->jumlah }}</td>
                                    <td>{{ $d->tanggal_pembelian }}</td>
                                    <td>{{ $d->tanggal_pemakaian }}</td>
                                    <td>{{ $d->name }}</td>
                                    <td>
                                        @if($d->nama_ruang)
                                            {{ $d->nama_ruang }}
                                        @else
                                            N/A
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                    
                            </tbody>

                            {{-- <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Jacob</td>
                                    <td>Thornton</td>
                                    <td>@fat</td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td colspan="2">Larry the Bird</td>
                                    <td>@twitter</td>
                                </tr>
                            </tbody> --}}
                        </table>
                        {{ $data->links() }}
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>