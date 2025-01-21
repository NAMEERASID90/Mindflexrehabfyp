<?php

namespace App\Http\Controllers;

use App\Models\Speciality;
use Illuminate\Http\Request;

class SpecialityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $specialities = Speciality::all();
        return view('specialities.index', compact('specialities'));
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
  
        $request->validate([
            'name' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $speciality = new Speciality();
        $speciality->name = $request->name;

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/specialities'), $imageName);
            $speciality->image = 'uploads/specialities/' . $imageName;
        }

        $speciality->save();

        return redirect()->back()->with('success', 'Speciality added successfully');
    }


    /**
     * Display the specified resource.
     */
    public function show(Speciality $speciality)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Fetch the speciality by its ID
        $speciality = Speciality::findOrFail($id);

        // Pass the speciality data to the view
        return view('admin.specialities.edit', compact('speciality'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $speciality = Speciality::find($id);
        $speciality->name = $request->name;

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/specialities'), $imageName);
            $speciality->image_path = 'uploads/specialities/' . $imageName;
        }

        $speciality->save();

        return redirect()->back()->with('success', 'Speciality updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $speciality = Speciality::find($id);
        $speciality->delete();

        return redirect()->back()->with('success', 'Speciality deleted successfully');
    }

}
