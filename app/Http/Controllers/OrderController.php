<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'customer_name' => 'required|string|max:255',
            'orders' => 'required|array',
            'orders.*.id' => 'required|integer|exists:menus,id',
            'orders.*.quantity' => 'required|integer|min:1',
            'orders.*.price' => 'required|numeric',
            'total_price' => 'required|numeric|min:0',
        ]);

        // Simpan data pesanan ke database
        $order = Order::create([
            'customer_name' => $validated['customer_name'],
            'total_price' => $validated['total_price'],
        ]);

        foreach ($validated['orders'] as $item) {
            $order->items()->create([
                'menu_id' => $item['id'],
                'quantity' => $item['quantity'],
                'price' => $item['price'],
            ]);
        }

        return response()->json(['success' => true]);
    }
    public function show(Order $order)
    {
        // Load order with its items and related menus
        $order->load('items.menu');

        return view('order-detail', compact('order'));
    }
}
