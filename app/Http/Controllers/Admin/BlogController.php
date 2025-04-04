<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\BlogDataTable;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(BlogDataTable $dataTable)
    {
        return $dataTable->render('admin.blog.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = BlogCategory::all();
        return view('admin.blog.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg,webp', 'max:5000'],
            'title' => ['required', 'max:255'],
            'description' => ['required'],
            'category_id' => ['required', 'numeric'],
            'status' => ['required', 'in:published,draft'],
        ]);

        $imagePath = handleUpload('image');

        $blog = new Blog();

        $blog->image = $imagePath;
        $blog->title = $request->title;
        $blog->description = $request->description;
        $blog->category_id = $request->category_id;
        $blog->status = $request->status;



        $blog->save();
        toastr()->success('New Blog Created Successfully');
        return redirect()->route('admin.blog.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categories = BlogCategory::all();
        $blog = Blog::findOrFail($id);

        return view('admin.blog.edit', compact('categories', 'blog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:5000'],
            'title' => ['required', 'max:255'],
            'description' => ['required'],
            'category_id' => ['required', 'numeric'],
            'status' => ['required', 'in:published,draft'],
        ]);

        $blog = Blog::findOrFail($id);

        // Only upload a new image if one is provided
        if ($request->hasFile('image')) {
            $imagePath = handleUpload('image', $blog);
            $blog->image = $imagePath;
        }
        $blog->title = $request->title;
        $blog->description = $request->description;
        $blog->category_id = $request->category_id;
        $blog->status = $request->status;

        $blog->save();
        toastr()->success('Blog Item Updated Successfully');
        return redirect()->route('admin.blog.index');
    }


    // Updte status
    public function updateStatus(Request $request, string $id)
    {
        $item = Blog::findOrFail($id);
        $item->status = $request->status;
        $item->save();

        return response()->json(['message' => 'Status updated']);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $blog = Blog::findOrFail($id);
        // Delete the image file if it exists
        if ($blog->image && file_exists(public_path($blog->image))) {
            @unlink(public_path($blog->image));
        }
        $blog->delete();

        return response()->json([
            'message' => 'Deleted Successfully'
        ]);
    }
}
