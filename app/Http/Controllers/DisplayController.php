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
        ->whereHas('gallery')
        ->orderBy('created_at', 'desc') // urutkan berdasarkan terbaru
        ->get();

    return view('welcome', compact('items', 'categories'));
}


public function categories(Request $request)
{
    $categories = Category::all();

    $query = Item::where('stock', '>', 0)
        ->whereHas('gallery')
        ->orderBy('created_at', 'desc'); // urutkan berdasarkan terbaru

    if ($request->filled('search')) {
        $query->where('name', 'like', '%' . $request->search . '%');
    }

    $items = $query->paginate(12); 

    return view('categories', compact('items', 'categories'));
}


public function categoryShow($categoryId)
{
    $categories = Category::all();
    $items = Item::where('category_id', $categoryId)
        ->where('stock', '>', 0)
        ->whereHas('gallery')
        ->orderBy('created_at', 'desc') // urutkan berdasarkan terbaru
        ->paginate(12);

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
