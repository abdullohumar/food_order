<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::paginate(10); 
        return view('menu', compact('menus'));
    }

    public function show($slug)
    {
        $menu = Menu::where('slug', $slug)->first();
        return view('menu-detail', compact('menu'));
    }
}
