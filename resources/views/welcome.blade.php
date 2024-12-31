@extends('layouts.default')
@section('title', 'Restoku')
@section('style')
    <style>
        .hero-section {
            background-image: url('https://payungi.org/wp-content/uploads/2023/01/kuliner.jpg');
            /* Ganti dengan gambar resto Anda */
            background-size: cover;
            background-position: center;
            height: 500px;
            color: white;
        }

        .hero-section h1 {
            margin-top: 150px;
            font-size: 3rem;
        }

        .menu-card img {
            height: 200px;
            object-fit: cover;
        }

        .promo-banner {
            background-color: #ff6f61;
            color: white;
            padding: 20px;
            text-align: center;
        }
    </style>
@endsection
@section('content')
    <!-- Hero Section -->
    <div class="hero-section text-center d-flex align-items-center justify-content-center">
        <div>
            <h1>Pesan Makanan Favorit Anda</h1>
            <p class="lead">Nikmati hidangan lezat dari kenyamanan rumah Anda</p>
            <a href="{{ route('menu') }}" class="btn btn-primary btn-lg">Lihat Menu</a>
        </div>
    </div>

    <!-- Promo Section -->
    <div id="promo" class="promo-banner">
        <h2>Promo Hari Ini: Diskon 20% untuk Pesanan Pertama!</h2>
    </div>

    <!-- Menu Section -->
    <div id="menu" class="container py-5">
        <h2 class="text-center mb-4">Menu Kami</h2>
        <div class="row">
            <!-- Menu Card 1 -->
            <div class="col-md-4 mb-4">
                <div class="card menu-card">
                    <img src="https://img.kurio.network/ewrCJ9eRNpljU-80vrqWDQkN7o4=/1200x675/filters:quality(80)/https://kurio-img.kurioapps.com/20/10/10/a7e9eaa0-1c22-42b0-a11f-0a5ad1d30126.jpeg"
                        class="card-img-top" alt="Menu 1">
                    <div class="card-body">
                        <h5 class="card-title">Nasi Goreng Spesial</h5>
                        <p class="card-text">Hidangan favorit dengan bumbu khas resto kami.</p>
                        <p class="text-primary fw-bold">Rp25.000</p>
                        <a href="#" class="btn btn-primary">Pesan Sekarang</a>
                    </div>
                </div>
            </div>
            <!-- Menu Card 2 -->
            <div class="col-md-4 mb-4">
                <div class="card menu-card">
                    <img src="https://images.tokopedia.net/img/JFrBQq/2022/8/15/06fce354-78b3-4aa2-b070-efaa73343a81.jpg"
                        class="card-img-top" alt="Menu 2">
                    <div class="card-body">
                        <h5 class="card-title">Mie Ayam</h5>
                        <p class="card-text">Lezat dan nikmat dengan topping ayam spesial.</p>
                        <p class="text-primary fw-bold">Rp20.000</p>
                        <a href="#" class="btn btn-primary">Pesan Sekarang</a>
                    </div>
                </div>
            </div>
            <!-- Menu Card 3 -->
            <div class="col-md-4 mb-4">
                <div class="card menu-card">
                    <img src="https://static.promediateknologi.id/crop/0x0:0x0/0x0/webp/photo/indizone/2021/03/17/Byspoza/coba-buat-yuk-ayam-bakar-pedas-manis-seperti-ini-resepnya23.jpg"
                        class="card-img-top" alt="Menu 3">
                    <div class="card-body">
                        <h5 class="card-title">Ayam Bakar</h5>
                        <p class="card-text">Dibakar dengan bumbu spesial hingga sempurna.</p>
                        <p class="text-primary fw-bold">Rp30.000</p>
                        <a href="#" class="btn btn-primary">Pesan Sekarang</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
