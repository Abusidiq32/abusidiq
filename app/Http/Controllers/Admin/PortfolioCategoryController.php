<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\PortfolioCategoryDataTable;
use App\Http\Controllers\Controller;
use App\Models\PortfolioCategory;
use App\Models\PortfolioItem;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PortfolioCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(PortfolioCategoryDataTable $datatable)
    {
        return $datatable->render('admin.portfolio-category.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.portfolio-category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:255']
        ]);

        $slug = Str::slug($request->name);
        // Check if the slug already exists
        if (PortfolioCategory::where('slug', $slug)->exists()) {
            toastr()->error('Category already exists');
            return redirect()->back()->withInput();
        }

        $category = new PortfolioCategory();
        $category->name = $request->name;
        $category->slug = $slug;
        $category->save();

        toastr()->success('Portfolio category created successfully');
        return redirect()->route('admin.portfolio-category.index');
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
        $category = PortfolioCategory::findOrFail($id);
        return view('admin.portfolio-category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => ['required', 'max:255']
        ]);

        $slug = Str::slug($request->name);
        $category = PortfolioCategory::findOrFail($id);
        // Check if the slug already exists
        if(
            PortfolioCategory::where('slug', $slug)
            ->where('id', '!=', $category->id)
            ->exists()
        ){
            toastr()->error('Category already exists');
            return redirect()->back()->withInput();
        }
        $category->name = $request->name;
        $category->slug = $slug;
        $category->save();

        toastr()->success('Portfolio category updated successfully');
        return redirect()->route('admin.portfolio-category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $category = PortfolioCategory::findOrFail($id);
        $hasItem  = PortfolioItem::where('category_id', $category->id)->exists();
    
        if ($hasItem) {
            return response()->json([
                'status' => 'error',
                'message' => 'Cannot delete category with associated portfolio items.'
            ]);
        }
    
        $category->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Deleted successfully'
        ]);
    }
}
