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
                @forelse ($menus as $menu)
                    <tr>
                        <td>{{ $loop->iteration + ($menus->currentPage() - 1) * $menus->perPage() }}</td>
                        <td>{{ $menu->name }}</td>
                        <td>Rp{{ number_format($menu->price, 0, ',', '.') }}</td>
                        <td>{{ $menu->description }}</td>
                        <td>{{ $menu->category }}</td>
                        <td>
                            <img src="{{ asset('storage/' . $menu->image) }}" alt="{{ $menu->name }}" style="height: 70px;">
                        </td>
                        <td class="table-actions">
                            <a href="{{ route('admin.menu.edit', $menu->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <form action="{{ route('admin.menu.destroy', $menu->id) }}" method="POST"
                                style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm"
                                    onclick="return confirm('Are you sure?')">Hapus</button>
                            </form>
                        </td>

                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center">Tidak ada data menu.</td>
                    </tr>
                @endforelse
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
