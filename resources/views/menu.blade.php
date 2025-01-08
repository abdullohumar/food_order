@extends('layouts.default')
@section('title', 'Menu - RestoKu')
@section('style')
    <style>
        .menu-header {
            background-color: #ff6f61;
            color: white;
            padding: 20px;
            text-align: center;
        }

        .menu-card img {
            height: 200px;
            object-fit: cover;
        }

        .menu-card {
            transition: transform 0.3s;
            width: 300px;
            padding: 10px;
        }

        .menu-card:hover {
            transform: scale(1.05);
        }

        .menu-container {
            padding: 40px 20px;
        }

        .quantity-control {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .quantity-control button {
            width: 35px;
            height: 35px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>
@endsection
@section('content')
    <header class="menu-header">
        <h1>Pilihan Menu Kami</h1>
        <p>Silakan pilih menu favorit Anda</p>
    </header>
    <div class="menu-container container">
        @forelse ($menus as $menu)
            <div class="row">
                <!-- Menu Item 1 -->
                <div class="col-md-4 mb-4 menu-item" data-id="{{ $menu->id }}">
                    <div class="card menu-card">
                        <img src="{{ asset('storage/' . $menu->image) }}" class="card-img-top" alt="Menu 1"
                            style="width: 100%; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $menu->name }}</h5>
                            <p class="card-text">{{ $menu->description }}</p>
                            <p class="text-primary fw-bold item-price">Rp{{ number_format($menu->price, 0, ',', '.') }}</p>
                            <div class="quantity-control">
                                <button class="btn btn-outline-primary btn-sm"
                                    onclick="updateQuantity({{ $menu->id }}, -1)">-</button>
                                <span id="{{ $menu->id }}" class="fw-bold item-quantity">0</span>
                                <button class="btn btn-outline-primary btn-sm"
                                    onclick="updateQuantity({{ $menu->id }}, 1)">+</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <p>Tidak ada menu yang tersedia.</p>
        @endforelse
    </div>
    <div class="text-center">
        <p id="total-price" class="fw-bold mt-3">Total: Rp0</p>
    </div>
    <div class="text-center mt-4">
        <button class="btn btn-success" onclick="submitOrder()">Checkout</button>
    </div>
@endsection

@section('script')
    <script>
        function updateQuantity(menuId, change) {
            const quantityElement = document.getElementById(`${menuId}`);
            let currentQuantity = parseInt(quantityElement.textContent);
            let newQuantity = currentQuantity + change;
            if (newQuantity < 0) newQuantity = 0;
            quantityElement.textContent = newQuantity;

            updateTotalPrice();
        }

        function updateTotalPrice() {
            const rows = document.querySelectorAll('.menu-item');
            let totalPrice = 0;

            rows.forEach(row => {
                const priceText = row.querySelector('.item-price').textContent.replace('Rp', '').replace(/\./g, '');
                const price = parseFloat(priceText);
                const quantity = parseInt(row.querySelector('.item-quantity').textContent) || 0;
                totalPrice += price * quantity;
            });

            document.getElementById('total-price').textContent = `Total: Rp${totalPrice.toLocaleString()}`;
        }

        function submitOrder() {
            const rows = document.querySelectorAll('.menu-item');
            const orders = [];
            let totalPrice = 0;

            rows.forEach(row => {
                const id = row.dataset.id;
                const name = row.querySelector('.card-title').textContent.trim();
                const priceText = row.querySelector('.item-price').textContent.replace('Rp', '').replace('.', '');
                const price = parseFloat(priceText);
                const quantity = parseInt(row.querySelector('.item-quantity').textContent) || 0;

                if (quantity > 0) {
                    orders.push({
                        id,
                        name,
                        quantity,
                        price
                    });
                    totalPrice += price * quantity;
                }
            });

            const customerName = prompt('Masukkan nama Anda:');
            if (!customerName) return alert('Nama harus diisi.');

            const data = {
                customer_name: customerName,
                orders,
                total_price: totalPrice,
            };

            fetch('/order', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify(data)
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Server error: ' + response.statusText);
                    }
                    return response.json();
                })
                .then(result => {
                    if (result.success) {
                        alert('Pesanan berhasil dikirim!');
                        window.location.reload();
                    } else {
                        alert('Terjadi kesalahan saat mengirim pesanan.');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Terjadi kesalahan: ' + error.message);
                });
        }
    </script>
@endsection
