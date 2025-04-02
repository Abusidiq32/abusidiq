<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SkillsSettings;
use Illuminate\Http\Request;

class SkillsSettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $skillsSettings = SkillsSettings::first();
        return view('admin.skills-settings.index', compact('skillsSettings'));
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
            'title' => ['required', 'string', 'max:50'],
            'sub_title' => ['required', 'string', 'max:255'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:2048'],
        ]);
    
        $skills = SkillsSettings::first();
        $imagePath = handleUpload('image', $skills);
    
        SkillsSettings::updateOrCreate(
            ['id' => $id],
            [
                'title' => $request->title,
                'sub_title' => $request->sub_title,
                'image' => $imagePath ?? ($skills->image ?? null),

            ]
        );
    
        toastr()->success('Skills Settings Updated Successfully');
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
