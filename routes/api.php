<?php


use App\Models\CustomImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::post('/generate-horde', function(Request $request) {
    $validated = $request->validate([
        'prompt' => 'required|string',
        'params' => 'nullable|array',
    ]);

    $url = 'https://aihorde.net/api/v2/generate/async';

    $response = Http::withHeaders([
        'apikey' => env('AI_HORDE_API_KEY') ?? '0000000000',
        'Accept' => 'application/json',
    ])->post($url, [
        'prompt' => $validated['prompt'],
        'params' => $validated['params'] ?? [
            'sampler_name' => 'k_euler',
            'width' => 512,
            'height' => 512,
            "karras" => true,
            "steps" => 25,
            "n" => 2
        ],
        "nsfw" => false,
        "slow_workers" => true,
    ]);

    if ($response->failed()) {
        return response()->json([
            'error' => 'Failed to generate image',
            'details' => $response->json(),
        ], $response->status());
    }

    return response()->json($response->json());
});


Route::get('/generate-horde/status/{id}', function($id) {
    $response = Http::get("https://aihorde.net/api/v2/generate/status/".$id);

    if ($response->failed()) {
        return response()->json([
            'error' => 'Failed to retrieve generation status',
            'details' => $response->json(),
        ], $response->status());
    }

    return response()->json($response->json());
});



Route::group(['middleware' => ['web']], function () {
    Route::post('/save-generated-image', function() {
        if (request()->hasFile('image')) {
            $imageContents = file_get_contents(request()->file('image'));
            $imageHash = md5($imageContents);
            $imageRecord = CustomImage::where('hash', $imageHash)->first();

            if ($imageRecord) { // exist
                $imageRecord->touch();
                return response()->json(['message' => 'Image already exist.', 'storedData' => $imageRecord]);
            } else { // new image

                $imagePath = request()->file('image')->store('public/images/ai_generated');

                $img = CustomImage::create([
                    'type' => 'ai_generated',
                    'ai_name' => request()->ai_name,
                    'path' => $imagePath,
                    'prompt' => request()->prompt,
                    'hash' => $imageHash,
                    'user_id' => Auth::user()->id,
                ]);
                return response()->json(['message' => 'Image stored successfully.', 'storedData' => $img]);
            }
        }
        return response()->json(['message' => 'No image found'], 400);
    });

});

