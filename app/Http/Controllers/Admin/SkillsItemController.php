<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\SkillsItemDataTable;
use App\Http\Controllers\Controller;
use App\Models\SkillsItem;
use Illuminate\Http\Request;

class SkillsItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(SkillsItemDataTable $dataTable)
    {
        return $dataTable->render('admin.skills-item.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.skills-item.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
        [
            'name' => ['required', 'max:100'],
            'percentage' => ['required', 'numeric', 'max:100', 'min:0'],
        ],[
            'percentage.max' => 'Percentage must not exceed 100%',
            'percentage.min' => 'Percentage cannot be less than 0%',
        ]);

        $skills = new SkillsItem();
        $skills->name = $request->name;
        $skills->percentage = $request->percentage;

        $skills->save();
        toastr()->success('Skills Item Created Successfully');
        return redirect()->route('admin.skills-item.index');
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
        $skillsItem = SkillsItem::findOrFail($id);
        return view('admin.skills-item.edit', compact('skillsItem'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => ['required', 'max:100'],
            'percentage' => ['required', 'numeric', 'max:100', 'min:0'],
        ], [
            'percentage.max' => 'Percentage must not exceed 100%',
            'percentage.min' => 'Percentage cannot be less than 0%',
        ]);
    
        $skills = SkillsItem::findOrFail($id);
        $skills->name = $request->name;
        $skills->percentage = $request->percentage; 
        $skills->save();
    
        toastr()->success('Skills Item Updated Successfully');
        return redirect()->route('admin.skills-item.index');
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $skills = SkillsItem::findOrFail($id);
        $skills->delete();

        return response()->json([
            'message' => 'Deleted Successfully'
        ]);

    }
}
