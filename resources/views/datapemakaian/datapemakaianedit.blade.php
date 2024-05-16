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
            <h3 class="m-3">Update Data Pemakaian</h3>
            {{-- <a href="" class="py-1 px-3 text-center align-items-center d-flex rounded text-decoration-none button ms-auto"><i class="fa-solid fa-user-plus me-2"></i>Tambah Barang</a> --}}
          </div>        
          <main class="content px-3 py-2">
            <form action="{{route ('update_datapemakaian',['id' => $data->id])}}" method="POST">                
                @csrf
                @method('PUT')
                <div class="row" data-aos="fade-up">
                    <div class="col-12 col-md-6 mb-3">
                        <label for="kode_barang" class="text-secondary mb-3">kode barang</label>
                        {{-- <select class="form-select form-select-sm py-2 mb-2 text-secondary" aria-label="Small select example" id="kode_barang" name="kode_barang" >
                          <option selected disabled>Pilih Kode barang</option>
                          @foreach ($barangs as $barang)
                          <option value="{{ $barang->kode_barang }}"
                              {{ $data->kode_barang == $barang->kode_barang ? 'selected' : '' }}>
                              {{ $barang->kode_barang }}</option>
                      @endforeach --}}
                        <input type="text" class="form-control" id="kode_barang" name="kode_barang" disabled value="{{$data->kode_barang}}" >
                        {{-- </select> --}}
                        @error('barang')
                          <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3 col-md-6">
                            <label for="jumlah_pakai" class="form-label" >Jumlah  Pakai</label>
                            <input type="text" class="form-control" id="jumlah_pakai" name="jumlah_pakai" disabled value="{{$data->jumlah_pakai}}" >
                    </div>
                </div>    
                <div class="row" data-aos="fade-up">
                    <div class="mb-3 col-md-6">
                        <label for="tanggal_pemakaian" class="form-label">Tanggal Pemakaian</label>
                        <input type="date" class="form-control" id="tanggal_pemakaian" name="tanggal_pemakaian" value="{{$data->tanggal_pemakaian}}" required>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="pemakaian" class="form-label">Pemakaian</label>
                        <input type="text" class="form-control" id="pemakaian" name="pemakaian" value="{{$data->pemakaian}}" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="keterangan" class="form-label">Keterangan</label>
                    <input type="text" class="form-control" id="keterangan" name="keterangan" value="{{$data->keterangan}}" required>
                    {{-- @error('jumlah')
                    <small class="text-danger">{{ $message }}</small>
                  @enderror --}}
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </main>
    </div>
</div>