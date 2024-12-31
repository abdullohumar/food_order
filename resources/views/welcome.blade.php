<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web Pemesanan Makanan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .hero-section {
            background-image: url('https://payungi.org/wp-content/uploads/2023/01/kuliner.jpg'); /* Ganti dengan gambar resto Anda */
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
</head>
<body>
    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">RestoKu</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#menu">Menu</a></li>
                    <li class="nav-item"><a class="nav-link" href="#promo">Promo</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contact">Hubungi Kami</a></li>
                    @if (Auth::check())
                        <li class="nav-item"><a class="nav-link" href="{{ route('logout') }}">Logout</a></li>
                    @endif
                    @if (!Auth::check())
                        <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="hero-section text-center d-flex align-items-center justify-content-center">
        <div>
            <h1>Pesan Makanan Favorit Anda</h1>
            <p class="lead">Nikmati hidangan lezat dari kenyamanan rumah Anda</p>
            <a href="#menu" class="btn btn-primary btn-lg">Lihat Menu</a>
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
                    <img src="https://img.kurio.network/ewrCJ9eRNpljU-80vrqWDQkN7o4=/1200x675/filters:quality(80)/https://kurio-img.kurioapps.com/20/10/10/a7e9eaa0-1c22-42b0-a11f-0a5ad1d30126.jpeg" class="card-img-top" alt="Menu 1">
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
                    <img src="https://images.tokopedia.net/img/JFrBQq/2022/8/15/06fce354-78b3-4aa2-b070-efaa73343a81.jpg" class="card-img-top" alt="Menu 2">
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
                    <img src="https://static.promediateknologi.id/crop/0x0:0x0/0x0/webp/photo/indizone/2021/03/17/Byspoza/coba-buat-yuk-ayam-bakar-pedas-manis-seperti-ini-resepnya23.jpg" class="card-img-top" alt="Menu 3">
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

    <!-- Footer -->
    <footer class="bg-light text-center py-4">
        <p>&copy; 2024 RestoKu. All rights reserved.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
