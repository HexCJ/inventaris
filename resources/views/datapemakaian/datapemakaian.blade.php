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
                    Jumlah Pakai
                </th>
                <th scope="col" class="px-6 py-3">
                    Tanggal Pakai
                </th>
                <th scope="col" class="px-6 py-3">
                    Pemakaian
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
                    {{$d->jumlah_pakai}}
                </td>
                <td class="px-6 py-4">
                    {{$d->tanggal_pakai}}
                </td>
                <td class="px-6 py-4">
                    {{$d->pemakaian}}
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

<div class="wrapper">
    <div class="sidebar">
        @include('partials.sidebar')
    </div>
    <div class="main">
        <div class="navbar-custom">
            @include('partials.navbar')
        </div>
        <div class="d-flex">
            <h3>Data Pemakaian</h3>
            <a href="" class="py-1 px-3 text-center align-items-center d-flex rounded text-decoration-none button ms-auto"><i class="fa-solid fa-user-plus me-2"></i>Tambah Data Pemakaian</a>
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
                                    <th scope="col" class="px-6 py-3">
                                        Jumlah Pakai
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Tanggal Pakai
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Pemakaian
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
                                        {{$d->jumlah_pakai}}
                                    </td>
                                    <td>
                                        {{$d->tanggal_pakai}}
                                    </td>
                                    <td>
                                        {{$d->pemakaian}}
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
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>