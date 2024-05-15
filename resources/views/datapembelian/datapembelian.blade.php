@extends('layouts.app')
@section('content')

{{-- <div class="relative overflow-x-auto shadow-md ml-60">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3">
                    No
                </th>
                <th scope="col" class="px-6 py-3">
                    Nama Barang
                </th>
                <th scope="col" class="px-6 py-3">
                    Merk/Type
                </th>
                <th scope="col" class="px-6 py-3">
                    Jumlah
                </th>
                <th scope="col" class="px-6 py-3">
                    Harga
                </th>
                <th scope="col" class="px-6 py-3">
                    Total
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
                    {{$d->nama_barang}}
                </td>
                <td class="px-6 py-4">
                    {{$d->merk}}
                </td>
                <td class="px-6 py-4">
                    {{$d->jumlah}}
                </td>
                <td class="px-6 py-4">
                    {{$d->harga}}
                </td>
                <td class="px-6 py-4">
                    {{$d->total}}
                </td>
                <td class="px-6 py-4">
                    <a href="#" class="font-medium text-blue-600 hover:underline">Edit</a>
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>
</div> --}}

<div class="wrapper">
    <div class="sidebar">
        @include('partials.sidebar')
    </div>
    <div class="main">
        <div class="navbar-custom">
            @include('partials.navbar')
        </div>
        <div class="d-flex">
            <h3>Data Pembelian</h3>
            <a href="" class="py-1 px-3 text-center align-items-center d-flex rounded text-decoration-none button ms-auto"><i class="fa-solid fa-user-plus me-2"></i>Tambah Data Pembelian</a>
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
                                        Merk/Type
                                    </th>
                                    <th scope="col">
                                        Jumlah
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
                                        {{$d->merk}}
                                    </td>
                                    <td>
                                        {{$d->jumlah}}
                                    </td>
                                    <td>
                                        {{$d->harga}}
                                    </td>
                                    <td>
                                        {{$d->total}}
                                    </td>
                                    <td>
                                        <a href="#" class="font-medium text-blue-600 hover:underline">Edit</a>
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
