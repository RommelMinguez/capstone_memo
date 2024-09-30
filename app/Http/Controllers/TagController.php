<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TagController extends Controller
{
    public function index() {

        $categories = Tag::select('*')->get()->groupBy('category');

        $categoryArr = [];
        foreach($categories as $category => $tags) {
            $categoryArr[] = $category;
        }

        return view('user.admin.tags', compact('categoryArr', 'categories'));
    }

    public function store() {

        request()->validate([
            'tag_name' => 'required|unique:tags,name',
            'tag_category' => 'required',
        ]);

        Tag::create([
            'name' => request()->tag_name,
            'category' => strtoupper(request()->tag_category)
        ]);

        return redirect('admin/tags')->with('success', 'Tag Added Succesfully');
    }

    public function update() {
        //dd(request('edit_id'));
        request()->validate([
            'edit_name' => ['required', Rule::unique('tags', 'name')->ignore(request('edit_id'))],
            'edit_category' => 'required',
        ]);

        Tag::find(request()->edit_id)->update([
            'name' => request('edit_name'),
            'category' => strtoupper(request()->edit_category)
        ]);

        return redirect('admin/tags')->with('success', 'Tag Edited Succesfully');
    }


    public function destroy() {
        Tag::find(request()->delete_id)->delete();

        return redirect('admin/tags')->with('success', 'Tag Deleted Succesfully');
    }
}
