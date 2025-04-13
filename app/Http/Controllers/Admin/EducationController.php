<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\EducationDataTable;
use App\Http\Controllers\Controller;
use App\Models\Education;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(EducationDataTable $dataTable)
    {
        return $dataTable->render('admin.education.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.education.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'university' =>['required', 'string', 'max:255'],
            'degree' => ['string', 'nullable', 'max:255'],
            'field_of_study' => ['required', 'string', 'max:255'],
            'graduation_date' => ['required', 'date'],
            'description' => ['nullable', 'string', 'max:900'],
        ]);

        // Store the education record in the database
        $education = new Education();
        $education->university = $request->university;
        $education->degree = $request->degree;
        $education->field_of_study = $request->field_of_study;
        $education->graduation_date = $request->graduation_date;
        $education->description = $request->description;

        $education->save();


        // toastr()->success('Education Record Created Successfully');
        // return redirect()->route('admin.education.index');

        return redirect()->route('admin.education.index')->with('success', 'Education record created successfully.');
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
        $education = Education::findOrFail($id);
        return view('admin.education.edit', compact('education'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'university' => ['required', 'string', 'max:255'],
            'degree' => ['string', 'nullable', 'max:255'],
            'field_of_study' => ['required', 'string', 'max:255'],
            'graduation_date' => ['required', 'date'],
            'description' => ['nullable', 'string', 'max:900'],
        ]);

        // Update the education record in the database
        $education = Education::findOrFail($id);
        $education->university = $request->university;
        $education->degree = $request->degree;
        $education->field_of_study = $request->field_of_study;
        $education->graduation_date = $request->graduation_date;
        $education->description = $request->description;

        $education->save();

        return redirect()->route('admin.education.index')->with('success', 'Education record updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $education = Education::findOrFail($id);
        $education->delete();

        return response()->json([
            'message' => 'Deleted Successfully'
        ]);
    }
}
