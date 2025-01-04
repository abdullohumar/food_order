@extends('layouts.default')

@section('content')
    <div class="container">
        <h1>Edit Menu</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.menu.update', $menu->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Nama Menu</label>
                <input type="text" name="name" class="form-control" id="name" value="{{ $menu->name }}">
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Harga</label>
                <input type="number" name="price" class="form-control" id="price" value="{{ $menu->price }}">
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Deskripsi</label>
                <textarea class="form-control" name="description" id="description" rows="4">{{ $menu->description }}</textarea>
            </div>

            <div class="mb-3">
                <label for="category" class="form-label">Kategori</label>
                <select class="form-select" name="category" id="category">
                    <option disabled>Pilih kategori...</option>
                    <option value="Makanan" {{ $menu->category == 'Makanan' ? 'selected' : '' }}>Makanan</option>
                    <option value="Minuman" {{ $menu->category == 'Minuman' ? 'selected' : '' }}>Minuman</option>
                    <option value="Snack" {{ $menu->category == 'Snack' ? 'selected' : '' }}>Snack</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Gambar</label>
                @if ($menu->image)
                    <img src="{{ asset('storage/' . $menu->image) }}" alt="{{ $menu->name }}" style="height: 70px;">
                @endif
                <input type="file" name="image" class="form-control" id="image" accept="image/*">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
@endsection
