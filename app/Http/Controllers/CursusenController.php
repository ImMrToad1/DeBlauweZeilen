<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Cursus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CursusenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cursusus = Cursus::all();

        // dd($cursusus);

        return view('cursusen', [
            'cursusus' => $cursusus,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $cursusus = Cursus::all();

        $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
        ]);

        // dd($request);

        Cursus::create([
            'name' => $request->name,
            'location' => $request->location,
        ]);

        return redirect()->route('cursusen.index');
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
    public function edit(Cursus $cursus)
    {
        return view('edit', compact('cursus'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
        ]);

        $cursus = Cursus::find($id);

        $cursus->name = $request->input('name');
        $cursus->location = $request->input('location');

        $cursus->save();

        return redirect()->route('cursusen.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        // dd($id);
        $cursus = Cursus::findOrFail($id);
        $cursus->delete();
        $cursusus = Cursus::all();
        return view('cursusen', [
            'cursusus' => $cursusus,
        ]);
    }
}
