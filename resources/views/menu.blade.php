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
        <div class="row">
            <!-- Menu Item 1 -->
            <div class="col-md-4 mb-4 menu-item">
                <div class="card menu-card">
                    <img src="https://via.placeholder.com/400x200" class="card-img-top" alt="Menu 1">
                    <div class="card-body">
                        <h5 class="card-title">Nasi Goreng Spesial</h5>
                        <p class="card-text">Hidangan favorit dengan bumbu khas resto kami.</p>
                        <p class="text-primary fw-bold item-price">Rp25.000</p>
                        <div class="quantity-control">
                            <button class="btn btn-outline-primary btn-sm" onclick="updateQuantity('item1', -1)">-</button>
                            <span id="item1" class="fw-bold item-quantity">0</span>
                            <button class="btn btn-outline-primary btn-sm" onclick="updateQuantity('item1', 1)">+</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="text-center">
        <p id="total-price" class="fw-bold mt-3">Total: Rp0</p>
    </div>
@endsection

@section('script')
<script>
    function updateQuantity(itemId, change) {
        const quantityElement = document.getElementById(itemId);
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
            const priceText = row.querySelector('.item-price').textContent.replace('Rp', '').replace('.', ''); 
            const price = parseFloat(priceText);
            const quantity = parseInt(row.querySelector('.item-quantity').textContent) || 0; 
            totalPrice += price * quantity; 
        });

        document.getElementById('total-price').textContent = `Total: Rp${totalPrice.toLocaleString()}`; 
    }
</script>
@endsection
