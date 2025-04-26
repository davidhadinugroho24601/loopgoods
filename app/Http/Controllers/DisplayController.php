<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Category;
class DisplayController extends Controller
{
    public function index()
    {
        // Fetch all categories and items
        $categories = Category::all();
        $items = Item::all();
           
               // Return the view with both datasets
        return view('welcome', compact('items', 'categories'));
    }



    
    public function categories()
    {
        // Fetch all categories and items
        $categories = Category::all();
        $items = Item::all();
    
        // Return the view with both datasets
        return view('categories', compact('items', 'categories'));
    }
    

    public function categoryShow($categoryId)
    {
        // Fetch all categories
        $categories = Category::all();
    
        // Fetch items that belong to the given category
        $items = Item::where('category_id', $categoryId)->get();
    
        // Return the view with both datasets
        return view('categories', compact('items', 'categories'));
    }
    

    public function show($id)
    {
        // Find the item by ID or fail
        $item = Item::findOrFail($id);

        // Return the item detail view with the item data
        return view('show', compact('item'));
    }

}
