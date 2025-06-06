<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Category;

class DisplayController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $items = Item::where('stock', '>', 0)
            ->whereHas('gallery') // hanya item yang punya galeri
            ->get();

        return view('welcome', compact('items', 'categories'));
    }

    public function categories()
    {
        $categories = Category::all();
        $items = Item::where('stock', '>', 0)
            ->whereHas('gallery') // hanya item yang punya galeri
            ->get();

        return view('categories', compact('items', 'categories'));
    }

    public function categoryShow($categoryId)
    {
        $categories = Category::all();
        $items = Item::where('category_id', $categoryId)
            ->where('stock', '>', 0)
            ->whereHas('gallery') // hanya item yang punya galeri
            ->get();

        return view('categories', compact('items', 'categories'));
    }

    public function show($id)
    {
        // hanya tampilkan item jika stok tersedia dan punya galeri
        $item = Item::where('id', $id)
            ->where('stock', '>', 0)
            ->whereHas('gallery')
            ->firstOrFail();

        return view('show', compact('item'));
    }
}
