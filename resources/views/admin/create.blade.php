@extends('layouts.default')

@section('title', 'Admin - Tambah Menu')

@section('content')
    <div class="container py-5">

        <form action="{{ route('admin.menu.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            <div class="mb-3">
                <label for="name" class="form-label">Nama Menu</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Masukkan nama menu" required>
            </div>
        
            <div class="mb-3">
                <label for="price" class="form-label">Harga</label>
                <input type="number" name="price" class="form-control" id="price" placeholder="Masukkan harga menu" required>
            </div>
        
            <div class="mb-3">
                <label for="description" class="form-label">Deskripsi</label>
                <textarea class="form-control" name="description" id="description" rows="4" placeholder="Deskripsikan menu" required></textarea>
            </div>
        
            <div class="mb-3">
                <label for="category" class="form-label">Kategori</label>
                <select class="form-select" name="category" id="category" required>
                    <option selected disabled value="">Pilih kategori...</option>
                    <option value="Makanan">Makanan</option>
                    <option value="Minuman">Minuman</option>
                    <option value="Snack">Snack</option>
                </select>
            </div>
        
            <div class="mb-3">
                <label for="image" class="form-label">Gambar</label>
                <input type="file" name="image" class="form-control" id="image" accept="image/*" required>
            </div>
        
            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-primary px-4">Simpan</button>
                <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary px-4">Kembali</a>
            </div>
        </form>
        
    </div>

@endsection
