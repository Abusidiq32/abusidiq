<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ExperienceDataTable;
use App\Http\Controllers\Controller;
use App\Models\Experience;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ExperienceDataTable $dataTable)
    {
        return $dataTable->render('admin.experience.index');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.experience.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'company' => ['required', 'string', 'max:255'],
            'title' => ['required', 'string', 'max:255'],
            'start_date' => ['required', 'date'],
            'end_date' => ['nullable', 'date'],
            'description' => ['required', 'string', 'max:900'],
        ]);

        $experience = new Experience();
        $experience->company = $request->company;
        $experience->title = $request->title;
        $experience->start_date = $request->start_date;
        $experience->end_date = $request->end_date;
        $experience->description = $request->description;

        $experience->save();

        return redirect()->route('admin.experience.index')->with('success', 'Experience record created successfully.');
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
        $experience = Experience::findOrFail($id);
        // if (!$experience) {
        //     return redirect()->route('admin.experience.index')->with('error', 'Experience record not found.');
        // }
        return view('admin.experience.edit', compact('experience'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'company' => ['required', 'string', 'max:255'],
            'title' => ['required', 'string', 'max:255'],
            'start_date' => ['required', 'date'],
            'end_date' => ['nullable', 'date'],
            'description' => ['required', 'string', 'max:900'],
        ]);

        $experience = Experience::findOrFail($id);
        $experience->company = $request->company;
        $experience->title = $request->title;
        $experience->start_date = $request->start_date;
        $experience->end_date = $request->end_date;
        $experience->description = $request->description;

        $experience->save();

        return redirect()->route('admin.experience.index')->with('success', 'Experience record updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $experience = Experience::findOrFail($id);
        $experience->delete();

        return response()->json([
            'message' => 'Deleted Successfully'
        ]);
    }
}
