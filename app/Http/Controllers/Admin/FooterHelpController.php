<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\FooterHelpDataTable;
use App\Http\Controllers\Controller;
use App\Models\FooterHelp;
use Illuminate\Http\Request;

class FooterHelpController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(FooterHelpDataTable $dataTables)
    {
        return $dataTables->render('admin.footer-help.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.footer-help.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'unique:footer_helps,name'],
            'url' => ['required', 'url', 'unique:footer_helps,url'],
        ]);
        
        $helpLink = new FooterHelp();
        $helpLink->name = $request->name;
        $helpLink->url = $request->url;

        $helpLink->save();
        toastr()->success('Help-Link Created Successfully');
        return redirect()->route('admin.footer-help.index');

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
        $helpLink = FooterHelp::findOrFail($id);
        return view('admin.footer-help.edit', compact('helpLink'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => ['required', 'unique:footer_helps,name,' . $id],
            'url' => ['required', 'url', 'unique:footer_helps,url,' . $id],
        ]);
    
        $helpLink = FooterHelp::findOrFail($id);
        $helpLink->name = $request->name;
        $helpLink->url = $request->url;
        $helpLink->save();
    
        toastr()->success('Help-Link Updated Successfully');
        return redirect()->route('admin.footer-help.index');
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $helpLink = FooterHelp::findOrFail($id);
        $helpLink->delete();

        return response()->json([
            'message' => 'Deleted Successfully'
        ]);


    }
}
