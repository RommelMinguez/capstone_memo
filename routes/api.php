<?php

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
            "steps" => 30,
            "n" => 1
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
