<?php

namespace App\Http\Controllers;

use App\Models\CustomImage;
use App\Models\CustomOrder;
use App\Models\Tag;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class CustomOrderController extends Controller
{
    public function create() {
        $tagGroups = Tag::all()->groupBy('category');
        $generatedImages = CustomImage::where('type', 'ai_generated')->orderBy('updated_at', 'desc')->limit(40)->get();

        return view('cakes.custom', compact('tagGroups', 'generatedImages'));
    }

    public function store(Request $request) {
        // dd(request()->all());
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0|max:999999.99',
            'description' => 'required|string',
            'age' => 'required|integer|min:1',
            'candle' => 'required|string|max:255',
            'dedication' => 'required|string',
            'quantity' => 'required|integer|min:1',
            'additional-image.*' => 'nullable|image|max:10240',
            'imageInput' => 'nullable|image|max:10240',
        ]);

        // Check if `imageInput` exists; otherwise, use `ai_generated_image`
        $imagePath = null;
        if ($request->hasFile('imageInput')) {
            $imagePath = $request->file('imageInput')->store('public/images/custom-order');
        } else {
            $customImage = CustomImage::find($request->input('ai_generated_image'));
            if ($customImage) {
                $imagePath = $customImage->path;
            } else {
                throw ValidationException::withMessages([
                    'image' => 'No uploaded image or AI image found.',
                ]);
            }
        }

        // Create a record in the CustomOrder table
        $customOrder = CustomOrder::create([
            'image_src' => $imagePath,
            'cake_name' => $request->input('name'),
            'budget' => $request->input('price'),
            'description' => $request->input('description'),
            'age' => $request->input('age'),
            'candle_type' => $request->input('candle'),
            'dedication' => $request->input('dedication'),
            'quantity' => $request->input('quantity'),
            'status' => 'new',
            'user_id' => auth()->id(),
        ]);

        // Store additional images in CustomImage table
        $files = request()->file('additional-image');
        if (!empty($files)) {
            foreach ($files as $file) {
                $pathAdditional = $file->store('public/images/additional');
                CustomImage::create([
                    'type' => 'additional',
                    'path' => $pathAdditional,
                    'custom_order_id' => $customOrder->id,
                    'user_id' => auth()->id(),
                ]);
            }
        }

        // Sync tags with the CustomOrder
        if ($request->has('selected-tag')) {
            $customOrder->tags()->sync($request->input('selected-tag'));
        }

        return redirect('/user/custom-order')->with('success', 'Custom order created successfully!');
    }



    public function trackCustom () {
        $customOrders = Auth::user()->customOrders()->with('tags', 'customImages')->orderBy('updated_at', 'desc')->get();
        return view('user.track-custom', compact('customOrders'));
    }


    public function manageCustom () {
        $customOrders = CustomOrder::with('tags', 'customImages')->orderBy('updated_at', 'desc')->get();
        return view('user.admin.manage-custom', compact('customOrders'));
    }
}

