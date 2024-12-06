<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class DisplayController extends Controller
{
    public function index()
    {
        // Fetch all items from the database
        $items = Item::all();

        // Return the view and pass the items
        return view('welcome', compact('items'));
    }

    public function show($id)
    {
        // Find the item by ID or fail
        $item = Item::findOrFail($id);

        // Return the item detail view with the item data
        return view('show', compact('item'));
    }

}
