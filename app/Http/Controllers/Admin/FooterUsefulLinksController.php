<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\FooterUsefulLinksDataTable;
use App\Http\Controllers\Controller;
use App\Models\FooterUsefulLinks;
use Illuminate\Http\Request;

class FooterUsefulLinksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(FooterUsefulLinksDataTable $dataTables)
    {
        return $dataTables->render('admin.footer-useful.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.footer-useful.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'unique:footer_useful_links,name'],
            'url' => ['required', 'url', 'unique:footer_useful_links,url'],
        ]);
        
        $usefulLink = new FooterUsefulLinks();
        $usefulLink->name = $request->name;
        $usefulLink->url = $request->url;

        $usefulLink->save();
        toastr()->success('Useful-Link Created Successfully');
        return redirect()->route('admin.footer-useful.index');
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
        $usefulLink = FooterUsefulLinks::findOrFail($id);
        return view('admin.footer-useful.edit', compact('usefulLink'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => ['required', 'unique:footer_useful_links,name,' . $id],
            'url' => ['required', 'url', 'unique:footer_useful_links,url,' . $id],
        ]);
        
        $usefulLink = FooterUsefulLinks::findOrFail($id);
        $usefulLink->name = $request->name;
        $usefulLink->url = $request->url;

        $usefulLink->save();
        toastr()->success('Useful-Link Updated Successfully');
        return redirect()->route('admin.footer-useful.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $usefulLink = FooterUsefulLinks::findOrFail($id);
        $usefulLink->delete();

        return response()->json([
            'message' => 'Deleted Successfully'
        ]);



    }
}
