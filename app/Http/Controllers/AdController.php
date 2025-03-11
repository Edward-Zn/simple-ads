<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use Illuminate\Http\Request;

class AdController extends Controller
{
    // Display the list of ads
    public function index()
    {
        $ads = Ad::all();

        return view('ads.index', compact('ads'));
    }

    // Show the form to create a new ad
    public function create()
    {
        return view('ads.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'photos.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'photos' => 'array|max:5',
        ]);
    
        $photos = [];
        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $photo) {
                $photos[] = $photo->store('photos', 'public');
            }
        }
    
        Ad::create([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'price' => $validated['price'],
            'photos' => json_encode($photos),
        ]);
    
        return redirect()->route('ads.index')->with('success', 'Ad created successfully.');
    }
}
