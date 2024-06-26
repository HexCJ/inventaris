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
            <h3 class="m-3">Tambah Data Pembelian</h3>
            {{-- <a href="" class="py-1 px-3 text-center align-items-center d-flex rounded text-decoration-none button ms-auto"><i class="fa-solid fa-user-plus me-2"></i>Tambah Barang</a> --}}
          </div>        
          <main class="content px-3 py-2">
            <form action="{{route ('tambah_datapembelian')}}" method="POST">
                @csrf
                <div class="row" data-aos="fade-up">
                    <div class="mb-3 col-md-6">
                        <label for="nama_barang" class="form-label">Nama Barang</label>
                        <input type="text" class="form-control" id="nama_barang" name="nama_barang" required>
                    </div>
                    <div class="mb-3 col-md-6">
                            <label for="merk" class="form-label">Merk / type</label>
                            <input type="text" class="form-control" id="merk" name="merk" required>
                    </div>
                </div>    
                <div class="row" data-aos="fade-up">
                    <div class="mb-3 col-md-6">
                        <label for="kode_barang" class="form-label">Kode Barang</label>
                        <div class="input-group">
                            <select class="form-select" id="kode_barang" name="kode_barang" required>
                          <option value="">Pilih Kode barang</option>
                          @foreach($barangs as $barang)
                              <option value="{{ $barang->kode_barang }}">{{ $barang->kode_barang }}</option>
                          @endforeach
                            </select>
                            <input type="text" class="form-control" id="kode_barang_input" name="kode_barang" placeholder="Masukkan yang lain" aria-label="Masukkan yang lain" disabled>
                        </div>
                    </div>

                    <div class="mb-3 col-md-6">
                        <label for="jenis_barang" class="form-label">Jenis Barang</label>
                        <input type="text" class="form-control" id="jenis_barang" name="jenis_barang" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="jumlah" class="form-label">Jumlah</label>
                    <input type="text" class="form-control" id="jumlah" name="jumlah" required>
                    {{-- @error('jumlah')
                    <small class="text-danger">{{ $message }}</small>
                  @enderror --}}
                </div>
                <div class="mb-3">
                    <label for="tanggal_pembelian" class="form-label">Tanggal Pembelian</label>
                    <input type="date" class="form-control" id="tanggal_pembelian" name="tanggal_pembelian" required>
                </div>
                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga</label>
                        <input type="text" class="form-control" id="harga" name="harga" required>
                    </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </main>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', (event) => {
    const kode_barangSelect = document.getElementById('kode_barang');
    const kode_barangInput = document.getElementById('kode_barang_input');

    kode_barangSelect.addEventListener('change', function() {
        if (this.value === "") {
            kode_barangInput.disabled = false;
        } else {
            kode_barangInput.disabled = true;
        }
    });

    kode_barangInput.addEventListener('input', function() {
        if (this.value.length > 0) {
            kode_barangSelect.disabled = true;
        } else {
            kode_barangSelect.disabled = false;
        }
    });
});
</script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>