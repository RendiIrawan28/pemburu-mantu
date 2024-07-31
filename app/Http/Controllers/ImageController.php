<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function create()
    {
        return view('images.upload');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'produk_name' =>'required|string',
            'produk_price' =>'required|string',
            'description' => 'required|string',
        ]);

        if ($request->file('image')) {
            $imagePath = $request->file('image')->store('uploads', 'public');
            $imageName = $request->file('image')->getClientOriginalName();
            $produk_name = $request->input('produk_name');
            $produk_price = $request->input('produk_price');
            $description = $request->input('description');

            $image = new Image();
            $image->user_id = Auth::id();
            $image->image_name = $imageName;
            $image->image_path = '/storage/' . $imagePath;
            $image->produk_name = $produk_name;
            $image->produk_price = $produk_price;
            $image->description = $description;
            $image->save();

            return back()->with('success', 'Image and text uploaded successfully');
        }

        return back()->with('error', 'Image upload failed');
    }

    public function index()
    {
        $images = Image::where('user_id', Auth::id())->get();
        return view('images.index', compact('images'));
    }

    public function destroy(Image $image)
    {
        // Hapus file gambar dari penyimpanan
        Storage::disk('public')->delete(str_replace('/storage/', '', $image->image_path));
        
        // Hapus record dari database
        $image->delete();
        
        return back()->with('success', 'Image deleted successfully');
    }

    public function edit(Image $image)
    {
        return view('images.edit', compact('image'));
    }

    public function update(Request $request, Image $image)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'produk_name' =>'required|string',
            'produk_price' =>'required|string',
            'description' => 'required|string',
        ]);

        if ($request->file('image')) {
            // Hapus file gambar lama dari penyimpanan
            Storage::disk('public')->delete(str_replace('/storage/', '', $image->image_path));

            // Unggah gambar baru
            $imagePath = $request->file('image')->store('uploads', 'public');
            $imageName = $request->file('image')->getClientOriginalName();
            $image->image_name = $imageName;
            $image->image_path = '/storage/' . $imagePath;
        }
        $image->produk_name = $request->input('produk_name');
        $image->produk_price = $request->input('produk_price');
        $image->description = $request->input('description');
        $image->save();

        return redirect()->route('images.index')->with('success', 'Image updated successfully');
    }
}
