<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\PortfolioItemDataTable;
use App\Http\Controllers\Controller;
use App\Models\PortfolioCategory;
use App\Models\PortfolioItem;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Calculation\Category;

class PortfolioItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(PortfolioItemDataTable $datatable)
    {
        return $datatable->render('admin.portfolio-item.index');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = PortfolioCategory::all();
        return view('admin.portfolio-item.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg,webp', 'max:5000'],
            'title' => ['required', 'max:255'],
            'description' => ['required', 'max:5000'],
            'category_id' => ['required', 'numeric'],
            'status' => ['required', 'in:published,draft'],
            'client' => ['max:255'],
            'website' => ['url'],
        ]);

        $imagePath = handleUpload('image');

        $portfolioItem = new PortfolioItem();

        $portfolioItem->image = $imagePath;
        $portfolioItem->title = $request->title;
        $portfolioItem->description = $request->description;
        $portfolioItem->category_id = $request->category_id;
        $portfolioItem->client = $request->client;
        $portfolioItem->website = $request->website;
        $portfolioItem->status = $request->status;



        $portfolioItem->save();
        toastr()->success('Portfolio Item Created Successfully');
        return redirect()->route('admin.portfolio-item.index');
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
        $categories = PortfolioCategory::all();
        $categoryItem = PortfolioItem::findOrFail($id);

        return view('admin.portfolio-item.edit', compact('categories', 'categoryItem'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        dd($request->all());
    }

    // Updte status
    public function updateStatus(Request $request, string $id)
    {
        $item = PortfolioItem::findOrFail($id);
        $item->status = $request->status;
        $item->save();

        return response()->json(['message' => 'Status updated']);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
