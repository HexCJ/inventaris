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
        <main class="content px-3 py-2">
            <div class="container-fluid">
                <div class="mb-3">
                    <h3>{{$role}} Dashboard</h3>
                </div>
                <div class="row">
                    @if (auth()->user()->hasRole('Administrator'))
                    <div class="col-12 col-md-6 d-flex">
                        <div class="card flex-fill border-0 illustration">
                            <div class="card-body p-0 d-flex flex-fill">
                                <div class="row g-0 w-100">
                                    <div class="col-6">
                                        <div class="p-3 m-1">
                                            <h4>Welcome Back, {{$name}}</h4>
                                            <p class="mb-0">Dashboard {{$role}}, {{$name}}</p>
                                        </div>
                                    </div>
                                    <div class="col-6 align-self-end text-end">
                                        <img src="image/customer-support.jpg" class="img-fluid illustration-img" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    @if (auth()->user()->hasRole('Operator') || auth()->user()->hasRole('Petugas'))
                    <div class="col-12 d-flex">
                        <div class="card flex-fill border-0 illustration">
                            <div class="card-body p-0 d-flex flex-fill">
                                <div class="row g-0 w-100">
                                    <div class="col-6">
                                        <div class="p-3 m-1">
                                            <h4>Welcome Back, {{$name}}</h4>
                                            <p class="mb-0">Dashboard {{$role}}, {{$name}}</p>
                                        </div>
                                    </div>
                                    <div class="col-6 align-self-end text-end">
                                        <img src="image/customer-support.jpg" class="img-fluid illustration-img" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    @if (auth()->user()->hasRole('Administrator'))
                    <div class="col-12 col-md-6 d-flex">
                        <div class="card flex-fill border-0">
                            <div class="card-body py-4">
                                <div class="d-flex align-items-start">
                                    <div class="flex-grow-1">
                                        @if (auth()->user()->hasRole('Administrator'))
                                        <h4 class="mb-3 d-flex justify-content-center">Download Export Data</h4>
                                        <div class="d-flex justify-content-center">
                                        <a  class="mb-3 mt-1 btn me-3 btn-primary" style="height: 35px; width: 120px;" href="{{route ('multiexport')}}">Laporan</a>
                                        {{-- <div class="d-flex justify-content-center">
                                        <a  class="mb-3 mt-1 btn me-3 btn-primary" style="height: 30px; width: 120px;" href="{{route ('userexport')}}">User</a>
                                        <a  class="mb-3 mt-1 btn me-3 btn-primary" style="height: 30px; width: 120px;" href="{{route ('databarangexport')}}">Barang</a>
                                        <a  class="mb-3 mt-1 btn btn-primary" style="height: 30px;  width: 120px;" href="{{route ('ruangexport')}}">Ruang</a>
                                        </div>
                                        <div class="d-flex justify-content-center">
                                        <a  class="mb-3 mt-1 btn me-3 btn-primary" style="height: 30px;  width: 120px;" href="{{route ('datapembelianexport')}}"> Pembelian</a>
                                        <a  class="mb-3 mt-1 btn me-3 btn-primary" style="height: 30px; width: 120px;" href="{{route ('datapemakaianexport')}}">Pemakaian</a>
                                        <a  class="mb-3 mt-1 btn btn-primary" style="height: 30px; width: 120px;" href="{{route ('inventarisexport')}}">Inventaris</a>
                                        </div> --}}
                                        <div class="dropdown text-center">
                                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                              Download salah satu
                                            </button>
                                            <ul class="dropdown-menu text-center" aria-labelledby="dropdownMenuButton1">
                                              <li>
                                                <a  class="mb-2 mt-1 btn btn-primary" style="height: 30px; width: 120px;" href="{{route ('userexport')}}">User</a>
                                              </li>
                                              <li>
                                                <a  class="mb-2 mt-1 btn btn-primary" style="height: 30px; width: 120px;" href="{{route ('databarangexport')}}">Barang</a>
                                              </li>
                                              <li>
                                                <a  class="mb-2 mt-1 btn  btn-primary" style="height: 30px;  width: 120px;" href="{{route ('ruangexport')}}">Ruang</a>
                                              </li>
                                              <li>
                                                <a  class="mb-2 mt-1 btn btn-primary" style="height: 30px;  width: 120px;" href="{{route ('datapembelianexport')}}"> Pembelian</a>
                                              </li>
                                              <li>
                                                <a  class="mb-2 mt-1 btn btn-primary" style="height: 30px; width: 120px;" href="{{route ('datapemakaianexport')}}">Pemakaian</a>
                                              </li>
                                              {{-- <li>
                                                <a  class="mb-3 mt-1 btn btn-primary" style="height: 30px; width: 120px;" href="{{route ('inventarisexport')}}">Inventaris</a>
                                              </li> --}}
                                            </ul>
                                          </div>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>

                <div class="row">
                    @if (auth()->user()->hasRole('Administrator'))
                    <div class="col-12 col-md-4 d-flex">
                        <div class="card flex-fill border-0 position-relative">
                            <div class="card-body p-0 d-flex flex-fill">
                                <div class="row g-0 w-100">
                                    <div class="col-12">
                                        <div class="m-1 mb-1 d-flex justify-content-between w-100 p-3">
                                            <i class="bi bi-person ms-1" style="font-size: 50px;"></i>
                                            <h3 class="me-3">{{$datauserall}}</h3>
                                        </div>
                                        <p class="position-absolute end-0 bottom-0 m-3 mt-2">Total Data User</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-4 d-flex">
                        <div class="card flex-fill border-0 position-relative">
                            <div class="card-body p-0 d-flex flex-fill">
                                <div class="row g-0 w-100">
                                    <div class="col-12">
                                        <div class="m-1 mb-1 d-flex justify-content-between w-100 p-3">
                                            <i class="bi bi-archive ms-1" style="font-size: 50px;"></i>
                                            <h3 class="me-3">{{$databarangall}}</h3>
                                        </div>
                                        <p class="position-absolute end-0 bottom-0 m-3 mt-2">Total Data Barang</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    @if (auth()->user()->hasRole('Administrator') || auth()->user()->hasRole('Operator') || auth()->user()->hasRole('Petugas'))
                    <div class="col-12 col-md-4 d-flex">
                        <div class="card flex-fill border-0 position-relative">
                            <div class="card-body p-0 d-flex flex-fill">
                                <div class="row g-0 w-100">
                                    <div class="col-12">
                                        <div class="m-1 mb-1 d-flex justify-content-between w-100 p-3">
                                            <i class="bi bi-cart ms-1" style="font-size: 50px;"></i>
                                            <h3 class="me-3">{{$datapembelianall}}</h3>
                                        </div>
                                        <p class="position-absolute end-0 bottom-0 m-3 mt-2">Total Data Pembelian</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    @if (auth()->user()->hasRole('Administrator') || auth()->user()->hasRole('Operator'))
                    <div class="col-12 col-md-4 d-flex">
                        <div class="card flex-fill border-0 position-relative">
                            <div class="card-body p-0 d-flex flex-fill">
                                <div class="row g-0 w-100">
                                    <div class="col-12">
                                        <div class="m-1 mb-1 d-flex justify-content-between w-100 p-3">
                                            <i class="bi bi-clipboard-data ms-1" style="font-size: 50px;"></i>
                                            <h3 class="me-3">{{$datapemakaianall}}</h3>
                                        </div>
                                        <p class="position-absolute end-0 bottom-0 m-3 mt-2">Total Data Pemakaian</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    @if (auth()->user()->hasRole('Administrator'))
                    <div class="col-12 col-md-4 d-flex">
                        <div class="card flex-fill border-0 position-relative">
                            <div class="card-body p-0 d-flex flex-fill">
                                <div class="row g-0 w-100">
                                    <div class="col-12">
                                        <div class="m-1 mb-1 d-flex justify-content-between w-100 p-3">
                                            <i class="bi bi-building ms-1" style="font-size: 50px;"></i>
                                            <h3 class="me-3">{{$dataruangall}}</h3>
                                        </div>
                                        <p class="position-absolute end-0 bottom-0 m-3 mt-2">Total Data Ruang</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>


                <h3 class="mt-5">Laporan cepat</h3>
                {{-- laporan cepat pembelian --}}
                <p>Data Pembelian</p>
                <div class="card border-0">
                    <div class="card-body">
                        <table class="table table-centered text-center table-sm">
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
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($datapembelian as $p)
                                <tr>
                                    <th>
                                        {{$loop->iteration}}
                                    </th>
                                    <td>
                                        {{$p->nama_barang}}
                                    </tp>
                                    <td>
                                        {{$p->kode_barang}}
                                    </td>
                                    <td>
                                        {{$p->jenis_barang}}
                                    </td>
                                    <td>
                                        {{$p->merk}}
                                    </td>
                                    <td>
                                        {{$p->jumlah}}
                                    </td>
                                    <td>
                                        {{$p->tanggal_pembelian}}
                                    </td>
                                    <td>
                                        {{$p->harga}}
                                    </td>
                                    <td>
                                        {{$p->total}}
                                    </td>
                                </tr>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $datapembelian->links() }}
                    </div>
                </div>
                
                {{-- laporan cepat pemakaian --}}
                <p>Data Pemakaian</p>
                <div class="card border-0">
                    <div class="card-body">
                        <table id="table-pemakaian" class="table table-centered text-center table-sm">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Kode Barang</th>
                                    <th scope="col">Nama Barang</th>
                                    <th scope="col">Jumlah Pakai</th>
                                    <th scope="col">Tanggal Pakai</th>
                                    <th scope="col">Pemakai</th>
                                    <th scope="col">Ruang</th>
                                    <th scope="col">Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($datapemakaian as $d)
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{$d->kode_barang}}</td>
                                    <td>{{$d->nama_barang}}</td>
                                    <td>{{$d->jumlah_pakai}}</td>
                                    <td>{{$d->tanggal_pemakaian}}</td>
                                    <td>{{$d->pemakai}}</td>
                                    <td>{{$d->ruang}}</td>
                                    <td>{{$d->keterangan}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $datapemakaian->links() }}
                    </div>
                </div>
                
            </div>
        </main>
    </div>
</div>