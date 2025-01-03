<?php

namespace App\Http\Controllers\Admin;

use App\Models\Menu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function create()
    {
        return view('admin.create');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|integer',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category' => 'required|string'
        ]);

        try {
            // Simpan file gambar jika ada
            $imagePath = $request->file('image')->store('public/images');
            $imagePath = Storage::url($imagePath);


            // Menyimpan data menu
            Menu::create([
                'name' => $validated['name'],
                'price' => $validated['price'],
                'description' => $validated['description'],
                'image' => $imagePath,
                'category' => $validated['category']
            ]);

            return redirect()->route('admin.dashboard')->with('success', 'Menu created successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors([
                'error' => 'Failed to create menu: ' . $e->getMessage(),
            ]);
        }
        // dd($request->all());
    }
}
