<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Models\Hero;
use Illuminate\Http\Request;

class HeroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hero = Hero::first();
        return view('admin.hero.index', compact('hero'));
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
            'image' => ['image', 'max:3000'],
        ]);
        
        $hero = Hero::first();

        if ($request->hasFile('image')) {
            if($hero && File::exists(public_path($hero->image))){
                File::delete(public_path($hero->image));
            }

            $image = $request->file('image');
            $image_name = time() . '.' . $image->getClientOriginalName();
            $image->move(public_path('/uploads'), $image_name);

            $image_path = '/uploads/' . $image_name;

        }

        Hero::updateOrCreate(
            ['id' => $id],
            [
                'title' => $request->title,
                'sub_title' => $request->sub_title,
                'btn_text' => $request->btn_text,
                'btn_link' => $request->btn_link,
                'image' => isset($image_path) ? $image_path : $hero->image,
            ]
        );
        toastr()->success('Hero section updated successfully');
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
