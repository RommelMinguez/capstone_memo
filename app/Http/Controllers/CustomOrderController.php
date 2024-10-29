<?php

namespace App\Http\Controllers;

use App\Models\CustomImage;
use App\Models\CustomOrder;
use App\Models\Tag;
use Illuminate\Http\Request;

class CustomOrderController extends Controller
{
    public function create() {
        $tagGroups = Tag::all()->groupBy('category');
        $generatedImages = CustomImage::where('type', 'ai_generated')->orderBy('updated_at', 'desc')->limit(40)->get();

        return view('cakes.custom', compact('tagGroups', 'generatedImages'));
    }

    public function store() {
        $files = request()->file('additional-image'); // Get the uploaded files
        dump($files);
        // foreach ($files as $file) {
        //     // Process each file (e.g., store it)
        //     $path = $file->store('public/images/additional'); // Adjust the path as needed
        //     dump($path);
        // }


        dd(request()->all());
    }
}
