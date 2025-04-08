<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Models\WebSettings;
use Illuminate\Http\Request;

class WebSettingsConttroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $webSettings = WebSettings::first();
        return view('admin.general-setttings.web-settings.index', compact('webSettings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'logo' => ['nullable', 'image', 'max:5000'],
            'favicon' => ['nullable', 'image', 'max:5000'],
        ]);
    
        $webSettings = WebSettings::find($id); 
    
        $logo = handleUpload('logo', $webSettings);
        $favicon = handleUpload('favicon', $webSettings);
    
        WebSettings::updateOrCreate(
            ['id' => $id],
            [
                'logo' => $logo ?? optional($webSettings)->logo,
                'favicon' => $favicon ?? optional($webSettings)->favicon,
            ]
        );
    
        toastr()->success('Settings Updated successfully');
        return redirect()->back();
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
