@extends('layouts.app')
@section('content')

{{-- <h2 class="ml-60 text-2xl font-sans font-extrabold m-6">Inventaris Barang</h2> --}}

{{-- awal --}}
{{-- <div class="relative overflow-x-auto shadow-md ml-60">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3">
                    No
                </th>
                <th scope="col" class="px-6 py-3">
                    Kode Barang
                </th>
                <th scope="col" class="px-6 py-3">
                    Jenis Barang
                </th>
                <th scope="col" class="px-6 py-3">
                    Jumlah
                </th>
                <th scope="col" class="px-6 py-3">
                    Tanggal Pembelian
                </th>
                <th scope="col" class="px-6 py-3">
                    Tanggal Pemakaian
                </th>
                <th scope="col" class="px-6 py-3">
                    Penggunaan
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
            <tr class="bg-white border-b">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                    {{$loop->iteration}}
                </th>
                <td class="px-6 py-4">
                    {{$d->kode_barang}}
                </td>
                <td class="px-6 py-4">
                    {{$d->jenis_barang}}
                </td>
                <td class="px-6 py-4">
                    {{$d->jumlah}}
                </td>
                <td class="px-6 py-4">
                    {{$d->tanggal_pembelian}}
                </td>
                <td class="px-6 py-4">
                    {{$d->tanggal_pemakaian}}
                </td>
                <td class="px-6 py-4">
                    {{$d->penggunaan}}
                </td>
                <td class="px-6 py-4">
                    {{$d->ruang}}
                </td>
                <td class="px-6 py-4">
                    {{$d->keterangan}}
                </td>
                <td class="px-6 py-4">
                    <a href="#" class="font-medium text-blue-600 hover:underline">Edit</a>
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>
</div> --}}

{{-- asli --}}
{{-- <main class="content px-3 py-2">
    <div class="container-fluid">
        <div class="mb-3">
            <h4>Admin Dashboard</h4>
        </div>
        <div class="row">
            <div class="col-12 col-md-6 d-flex">
                <div class="card flex-fill border-0 illustration">
                    <div class="card-body p-0 d-flex flex-fill">
                        <div class="row g-0 w-100">
                            <div class="col-6">
                                <div class="p-3 m-1">
                                    <h4>Welcome Back, Admin</h4>
                                    <p class="mb-0">Admin Dashboard, CodzSword</p>
                                </div>
                            </div>
                            <div class="col-6 align-self-end text-end">
                                <img src="image/customer-support.jpg" class="img-fluid illustration-img"
                                    alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 d-flex">
                <div class="card flex-fill border-0">
                    <div class="card-body py-4">
                        <div class="d-flex align-items-start">
                            <div class="flex-grow-1">
                                <h4 class="mb-2">
                                    $ 78.00
                                </h4>
                                <p class="mb-2">
                                    Total Earnings
                                </p>
                                <div class="mb-0">
                                    <span class="badge text-success me-2">
                                        +9.0%
                                    </span>
                                    <span class="text-muted">
                                        Since Last Month
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Table Element -->
        <div class="card border-0">
            <div class="card-header">
                <h5 class="card-title">
                    Basic Table
                </h5>
                <h6 class="card-subtitle text-muted">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum ducimus,
                    necessitatibus reprehenderit itaque!
                </h6>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">First</th>
                            <th scope="col">Last</th>
                            <th scope="col">Handle</th>
                        </tr>
                    </thead>
                    <tbody>
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
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main> --}}


<div class="wrapper">
    <div class="sidebar">
        @include('partials.sidebar')
    </div>
    <div class="main">
        <div class="navbar-custom">
            @include('partials.navbar')
        </div>
        <div class="d-flex">
            <h3>Data Inventaris</h3>
            <a href="" class="py-1 px-3 text-center align-items-center d-flex rounded text-decoration-none button ms-auto"><i class="fa-solid fa-user-plus me-2"></i>Tambah Inventaris</a>
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
                                        Kode Barang
                                    </th>
                                    <th scope="col">
                                        Jenis Barang
                                    </th>
                                    <th scope="col">
                                        Jumlah
                                    </th>
                                    <th scope="col">
                                        Tanggal Pembelian
                                    </th>
                                    <th scope="col">
                                        Tanggal Pemakaian
                                    </th>
                                    <th scope="col">
                                        Penggunaan
                                    </th>
                                    <th scope="col">
                                        Ruang
                                    </th>
                                    <th scope="col">
                                        Keterangan
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
                                        {{$d->kode_barang}}
                                    </td>
                                    <td>
                                        {{$d->jenis_barang}}
                                    </td>
                                    <td>
                                        {{$d->jumlah}}
                                    </td>
                                    <td>
                                        {{$d->tanggal_pembelian}}
                                    </td>
                                    <td>
                                        {{$d->tanggal_pemakaian}}
                                    </td>
                                    <td>
                                        {{$d->penggunaan}}
                                    </td>
                                    <td>
                                        {{$d->ruang}}
                                    </td>
                                    <td>
                                        {{$d->keterangan}}
                                    </td>
                                    <td>
                                        <a href="#" class="font-medium text-blue-600 hover:underline">Edit</a>
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
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>