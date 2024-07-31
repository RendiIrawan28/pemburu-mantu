<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Image;

class ImageController extends Controller
{
    public function index()
    {
        $images = Image::all();
        return response()->json($images);
    }

    public function show(Image $image)
    {
        return response()->json($image);
    }

    public function store(Request $request)
    {
        $request->validate([
            'image_name' => 'required|string|max:255',
            'image_path' => 'required|string',
            'description' => 'nullable|string',
        ]);

        $image = Image::create($request->all());
        return response()->json($image, 201);
    }

    public function update(Request $request, Image $image)
    {
        $request->validate([
            'image_name' => 'sometimes|required|string|max:255',
            'image_path' => 'sometimes|required|string',
            'description' => 'nullable|string',
        ]);

        $image->update($request->all());
        return response()->json($image);
    }

    public function destroy(Image $image)
    {
        $image->delete();
        return response()->json(null, 204);
    }
}
