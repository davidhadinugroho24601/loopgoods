<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Item;
use App\Models\Category;
use App\Models\Chat;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    protected $items;
    protected $categories;
    protected $chats;

    // Constructor to inject the models
    public function __construct(Item $items, Category $categories, Chat $chats)
    {
        $this->items = $items;
        $this->categories = $categories;
        $this->chats = $chats;
    }
    public function Index() {
        return view('user/item/upload');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'locationName' => 'required|string', 
            'location' => 'required|string', // latitude,longitude format
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Ensure it's a valid image
        ]);
    
        // Get the current authenticated user
        $user = auth()->user();
    
        // Split the location string into latitude and longitude
        $location = explode(',', $request->location);
        $latitude = $location[0];
        $longitude = $location[1];
    
        // Handle file upload
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public'); // Save to the 'public/images' directory
        }
    
        // Store the item and location data
        $item = new Item();
        $item->name = $request->name;
        $item->description = $request->description;
        $item->location = $request->locationName; 
        $item->latitude = $latitude; // Store the latitude if needed separately
        $item->longitude = $longitude; // Store the longitude if needed separately
        $item->image_path = $imagePath; // Store the image path
        $item->user_id = $user->id; // Assign the user_id to associate with the logged-in user
        $item->save();
    
        return redirect()->route('home')->with('success', 'Item uploaded successfully!');
    }
    


    public function dashboard()
    {
        // Get the logged-in user
        $user = Auth::user();

        // Fetch the user's items
        $items = Item::where('user_id', $user->id)->get();
        
        $chats = Chat::with('receiver')
        ->where('sender_id', Auth::id())
        ->orWhere('receiver_id', Auth::id())
        ->get()
        ->groupBy('receiver_id'); // Group by receiver_id to eliminate duplicates
    

        return view('dashboard', compact('items', 'chats'));
    }

    public function edit($item_id)
{
    $item = Item::findOrFail($item_id);
    return view('user.item.edit', compact('item')); // Pass the item to the edit view
}

public function update(Request $request, $item_id)
{
    $item = Item::findOrFail($item_id);
    $item->update($request->all()); // Update item with validated data
    return redirect()->route('dashboard'); // Redirect back to the dashboard
}

public function destroy($item_id)
{
    $item = Item::findOrFail($item_id);
    $item->delete(); // Delete item
    return redirect()->route('dashboard'); // Redirect back to the dashboard
}

}
