<?php

namespace App\Http\Controllers;

use App\Models\ArchivedCake;
use App\Models\Cake;
use App\Models\Tag;
use Auth;
use DB;
use Illuminate\Http\Request;

class CakeController extends Controller
{
    /**
     *
     * EXPLORE PAGE
     *
     */
    public function index() {
        return view('cakes.index', [
            'cakes' => Cake::latest()->simplePaginate(21),
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



    /**
     *
     * SEARCH FOR EXPLORE AND ADMIN CATALOG
     *
     */
    public function searchCatalog() {
        return $this->searchCakeCatalog(Auth::user()->is_admin);
    }
    public function search() {
        return $this->searchCakeCatalog(false);
    }
    private function searchCakeCatalog($isAdmin) {
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

        if (!empty(request('sort'))) {
            switch (request('sort')) {
                case 'latest':
                    $cakes->orderBy('created_at', 'desc');
                    break;
                case 'alphabetical':
                    $cakes->orderBy('name', 'asc');
                    break;
                default:
                    // todo sort by rating
            }
        }

        $selectedTags = Tag::whereIn('id', $tagIds)->get();
        $cakes = $cakes->simplePaginate(21);
        $tagGroups = Tag::all()->groupBy('category');

        //dd(request()->all(), $cakes, request('selected-tag'), empty(request('selected-tag')));

        if ($isAdmin) {
            return view('user.admin.catalog', compact('cakes', 'tagGroups', 'selectedTags'));
        }
        return view('cakes.index', compact('cakes', 'tagGroups', 'selectedTags'));
    }


    /**
     *
     * ADMIN CATALOG CRUD
     *
     */
    public function create() {
        $tagGroups = Tag::all()->groupBy('category');
        $cakes = Cake::latest()->with('tags')->simplePaginate(20);
        return view('user.admin.catalog', compact('tagGroups', 'cakes'));
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

        $cake->tags()->sync(request('attached-tag'));

        return redirect()->back()->with('success', "New Cake is Added Successfully.");
    }

    function archivedCake(Cake $cake) {
        DB::transaction(function () use ($cake) {
            ArchivedCake::create($cake->toArray());
            $cake->delete();
        });
        return redirect('/admin/catalog')->with('success', 'Cake Deleted Successfully.');
    }

    function update(Cake $cake) {

        request()->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric|min:0',
            'update_image' => 'image|mimes:jpeg,png,jpg,gif|max:10240'
        ]);

        if(request()->update_image == '') {
            $path = $cake->image_src;
        } else {
            $path = request()->file('update_image')->store('public/images/memo-cake');
        }

        $cake->update([
            'name' => request()->name,
            'description' => request()->description,
            'price' => request()->price,
            'image_src' => $path
        ]);

        $cake->tags()->sync(request('updated-tag'));

        return redirect()->back()->with('success', "Cake is Updated Successfully.");
    }









    public function customStore() {
        dd(request()->all(), 'todo');
    }


}
