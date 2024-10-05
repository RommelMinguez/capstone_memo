<?php

namespace App\Http\Controllers;

use App\Models\Cake;
use App\Models\Tag;
use Illuminate\Http\Request;

class CakeController extends Controller
{
    public function index() {
        return view('cakes.index', [
            'cakes' => Cake::simplePaginate(21),
            'tagGroups' => Tag::all()->groupBy('category'),
        ]);
    }

    public function show(Cake $cake) {

        $cake->with('tags');

        return view('cakes.show', [
            'cake' => $cake,
            'show_modal' => session('showModal'),
        ]);
    }

    public function create() {
        $tagGroups = Tag::all()->groupBy('category');
        $cakes = Cake::latest()->simplePaginate(20);
        return view('user.admin.catalog', compact('tagGroups', 'cakes'));
    }

    public function searchCatalog() {

        request()->validate([
            'cake' => 'max:25',
        ]);

        $query = request()->input('cake');

        $cakes = Cake::where('name', 'LIKE', '%' . $query . '%')->simplePaginate(21);

        $tagGroups = Tag::all()->groupBy('category');

        return view('user.admin.catalog', compact('cakes', 'tagGroups'));
    }


    public function store() {
        //dd(request('selected-tag'));

        request()->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric|min:0',
            'imageInput' => 'required|image|mimes:jpeg,png,jpg,gif|max:10240'
        ]);

        $path = request()->file('imageInput')->store('public/images/memo-cake');

        $cake = Cake::create([
            'name' => request()->name,
            'description' => request()->description,
            'price' => request()->price,
            'image_src' => $path
        ]);

        $cake->tags()->sync(request('selected-tag'));

        return redirect()->back()->with('success', "New Cake is Added Successfully.");

    }

    public function search() {
        // dd(request()->all());
        // request()->validate([
        //     'cake' => 'max:25',
        // ]);
        // // Get the search query
        // $query = request()->input('cake');
        // // Retrieve all records that match the input (case-insensitive)
        // $cakes = Cake::where('name', 'LIKE', '%' . $query . '%')->simplePaginate(21);

        //dd(request()->all());

        $searchText = request()->input('cake');
        $tagIds = request()->input('selected-tag', []);

        $cakes = Cake::with('tags')
            ->where(function($query) use ($searchText) {
                // Search for cakes where the name or description matches the search text
                $query->where('name', 'LIKE', '%' . $searchText . '%')
                    ->orWhere('description', 'LIKE', '%' . $searchText . '%');
            });

        if (!empty(request('selected-tag'))) {
            $cakes->whereHas('tags', function($query) use ($tagIds) {
                // Filter cakes that have all the selected tags
                if (!empty($tagIds)) {
                    $query->whereIn('tags.id', $tagIds);
                }
            });
        }

        $selectedTags = Tag::whereIn('id', $tagIds)->get();
        $cakes = $cakes->simplePaginate(21);
        $tagGroups = Tag::all()->groupBy('category');

        //dd(request()->all(), $cakes, request('selected-tag'), empty(request('selected-tag')));

        return view('cakes.index', compact('cakes', 'tagGroups', 'selectedTags'));
    }


    public function customStore() {
        dd(request()->all(), 'todo');
    }



}
