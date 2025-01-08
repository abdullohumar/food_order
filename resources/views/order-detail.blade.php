@extends('layouts.default')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Detail Pesanan</h1>

    <!-- Informasi Pelanggan -->
    <div class="card mb-4">
        <div class="card-body">
            <h5>Informasi Pelanggan</h5>
            <p><strong>Nama:</strong> {{ $order->customer_name }}</p>
            <p><strong>Total Harga:</strong> Rp{{ number_format($order->total_price, 0, ',', '.') }}</p>
            <p><strong>Tanggal Pesanan:</strong> {{ $order->created_at->format('d-m-Y H:i') }}</p>
        </div>
    </div>

    <!-- Detail Pesanan -->
    <div class="card">
        <div class="card-body">
            <h5>Detail Item</h5>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Menu</th>
                        <th>Harga Satuan</th>
                        <th>Jumlah</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order->items as $index => $item)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $item->menu->name }}</td>
                        <td>Rp{{ number_format($item->price, 0, ',', '.') }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>Rp{{ number_format($item->price * $item->quantity, 0, ',', '.') }}</td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="4" class="text-end">Total</th>
                        <th>Rp{{ number_format($order->total_price, 0, ',', '.') }}</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
@endsection
