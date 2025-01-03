@extends('layouts.default')
@section('title', 'Admin - Kelola Menu')
@section('style')
    <style>
        .admin-header {
            background-color: #343a40;
            color: white;
            padding: 20px;
            text-align: center;
        }

        .admin-container {
            padding: 40px 20px;
        }

        .table-actions button {
            margin-right: 5px;
        }
    </style>
@endsection
@section('content')
    <!-- Admin Header -->
    <header class="admin-header">
        <h1>Admin Panel - Kelola Menu</h1>
    </header>

    <!-- Admin Section -->
    <div class="admin-container container">
        <div class="d-flex justify-content-between mb-4">
            <h2>Daftar Menu</h2>
            {{-- <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addMenuModal">Tambah Menu</button> --}}
            <a href="{{ route('admin.menu.create') }}" class="btn btn-success">Tambah Menu</a>
        </div>

        <!-- Menu Table -->
        <table class="table table-striped">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Menu</th>
                    <th>Harga</th>
                    <th>Deskripsi</th>
                    <th>Kategori</th>
                    <th>Gambar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Nasi Goreng Spesial</td>
                    <td>Rp25.000</td>
                    <td>Hidangan favorit dengan bumbu khas.</td>
                    <td>Makanan</td>
                    <td><img src="https://via.placeholder.com/100" alt="Menu" style="height: 50px;"></td>
                    <td class="table-actions">
                        <button class="btn btn-primary btn-sm">Edit</button>
                        <button class="btn btn-danger btn-sm">Hapus</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    
    {{-- <div class="modal fade" id="addMenuModal" tabindex="-1" aria-labelledby="addMenuModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addMenuModalLabel">Tambah Menu Baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    
                </div>
            </div>
        </div>
    </div> --}}
@endsection
