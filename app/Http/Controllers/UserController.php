<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Items;

class UserController extends Controller
{
    function Index() {
        return view('user/item/upload');
    }

    public function Store(Request $request, string $userId)
    {
        // Validate the form input
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'location' => 'nullable|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Ensure it's an image
        ]);

        // Handle file upload
        if ($request->hasFile('image')) {
            // Store the uploaded file and get its path
        $path = $request->file('image')->store('images', 'public');
       
        }

        // Perform other logic like saving data to the database
        // Example: Saving to a database
        $userData = [
            'name' => $validatedData['name'],
            'description' => $validatedData['description'],
            'location' => $validatedData['location'],
            'image_path' => $path ?? null, // Save file path
        ];

        // Here you can save $userData to a model if you have one, e.g.:
        // User::create($userData);

        return back()->with('success', 'File uploaded successfully!');
    }
}
