<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TagController extends Controller
{
    public function index() {
        $tags = Tag::where('is_archived', false)->get();
        $categories = Tag::select('category')->distinct()->get();

        return view('user.admin.tags', compact('tags', 'categories'));
    }

    public function store() {

        request()->validate([
            'tag_name' => 'required|unique:tags,name',
            'tag_category' => 'required',
        ]);

        Tag::create([
            'name' => request()->tag_name,
            'category' => request()->tag_category,
        ]);

        return redirect('admin/tags')->with('success', 'Tag Added Succesfully');
    }

    public function update() {
        request()->validate([
            'edit_name' => ['required', Rule::unique('tags', 'name')->ignore(request('edit_id'))],
            'edit_category' => 'required',
        ]);

        Tag::find(request()->edit_id)->update([
            'name' => request('edit_name'),
            'category' => request('edit_category')
        ]);

        return redirect('admin/tags')->with('success', 'Tag Edited Succesfully');
    }


    public function destroy() {
        Tag::find(request()->delete_id)->update([
            'is_archived' => true
        ]);

        return redirect('admin/tags')->with('success', 'Tag Deleted Succesfully');
    }
}
