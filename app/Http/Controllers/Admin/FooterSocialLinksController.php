<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\FooterSocialLinksDataTable;
use App\Http\Controllers\Controller;
use App\Models\FooterSocialLinks;
use Illuminate\Http\Request;

class FooterSocialLinksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(FooterSocialLinksDataTable $dataTables)
    {
        return $dataTables->render('admin.footer-social.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.footer-social.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'icon' => ['required', 'unique:footer_social_links,icon'],
            'name' => ['required', 'string', 'unique:footer_social_links,name'],
            'url' => ['required', 'url', 'unique:footer_social_links,url'],
        ]);

        $socialLink = new FooterSocialLinks();
        $socialLink->icon = $request->icon;
        $socialLink->name = $request->name;
        $socialLink->url = $request->url;

        $socialLink->save();
        toastr()->success('Social-Link Created Successfully');
        return redirect()->route('admin.footer-social.index');
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
        $socialLink = FooterSocialLinks::findOrFail($id);
        return view('admin.footer-social.edit', compact('socialLink'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'icon' => ['required', 'unique:footer_social_links,icon,' . $id],
            'name' => ['required', 'string', 'unique:footer_social_links,name,' . $id],
            'url' => ['required', 'url', 'unique:footer_social_links,url,' . $id],
        ]);
        

        $socialLink = FooterSocialLinks::findOrFail($id);
        $socialLink->icon = $request->icon;
        $socialLink->name = $request->name;
        $socialLink->url = $request->url;

        $socialLink->save();
        toastr()->success('Social-Link Updated Successfully');
        return redirect()->route('admin.footer-social.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $socialLink = FooterSocialLinks::findOrFail($id);
        $socialLink->delete();

        return response()->json([
            'message' => 'Deleted Successfully'
        ]);

    }
}
