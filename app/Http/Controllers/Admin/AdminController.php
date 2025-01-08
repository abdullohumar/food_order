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
        $menus = Menu::paginate(10); 
        return view('admin.index', compact('menus'));  
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

        // dd($validated);
        try {
            $imagePath = $request->file('image')->store('images', 'public');

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
            // dd($e);
            return redirect()->back()->withErrors([
                'error' => 'Failed to create menu: ' . $e->getMessage(),
            ]);
        }
    }
    public function edit($id)
    {
        $menu = Menu::findOrFail($id);
        return view('admin.edit', compact('menu'));
    }

    // Proses update menu
    public function update(Request $request, $id)
    {
        $menu = Menu::findOrFail($id);

        // Validasi input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|integer',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category' => 'required|string',
        ]);

        try {
            // Jika ada gambar baru, ganti gambar lama
            if ($request->hasFile('image')) {
                // Hapus gambar lama jika ada
                if ($menu->image && file_exists(public_path($menu->image))) {
                    unlink(public_path($menu->image));
                }

                // Simpan gambar baru
                $imagePath = $request->file('image')->store('images', 'public');
                $menu->image = 'storage/' . $imagePath;
            }

            // Update data menu
            $menu->update([
                'name' => $validated['name'],
                'price' => $validated['price'],
                'description' => $validated['description'],
                'image' => $menu->image,
                'category' => $validated['category'],
            ]);

            return redirect()->route('admin.dashboard')->with('success', 'Menu updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Failed to update menu: ' . $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        $menu = Menu::findOrFail($id);
        if ($menu->image && file_exists(public_path($menu->image))) {
            unlink(public_path($menu->image));
        }
        $menu->delete();
        return redirect()->route('admin.dashboard')->with('success', 'Menu deleted successfully.');
    }
}
