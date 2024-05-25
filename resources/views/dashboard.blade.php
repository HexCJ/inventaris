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
                                        <a  class="mb-3 mt-1 btn me-3 btn-primary" style="height: 30px; width: 180px;" href="{{route ('userexport')}}">Data User</a>
                                        <a  class="mb-3 mt-1 btn btn-primary" style="height: 30px; width: 180px;" href="{{route ('databarangexport')}}">Data Barang</a>
                                        </div>
                                        <div class="d-flex justify-content-center">
                                        <a  class="mb-3 mt-1 btn me-3 btn-primary" style="height: 30px;  width: 180px;" href="{{route ('datapembelianexport')}}"> Data Pembelian</a>
                                        <a  class="mb-3 mt-1 btn btn-primary" style="height: 30px; width: 180px;" href="{{route ('datapemakaianexport')}}">Data Pemakaian</a>
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
                    
                </div>
            </div>
        </main>
    </div>
</div>