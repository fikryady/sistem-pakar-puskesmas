<?php

namespace App\Http\Controllers;

use App\Models\Disease;
use Illuminate\Http\Request;

class DashboardDiseaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.diseases.index', [
            "diseases" => Disease::orderby('kd', 'asc')->filter(request(['search', 'diseases']))->paginate(8)->withQueryString()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.diseases.create', [
            'diseases' => Disease::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'kd' => 'required|max:255',
            'nama' => 'required|unique:diseases',
            'keterangan' => 'required',
            'solusi' => 'required',
        ]);

        Disease::create($validatedData);

        return redirect('/dashboard/diseases')->with('success', 'New disease has been added');
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
     * @param  \App\Models\Disease  $disease
     * @return \Illuminate\Http\Response
     */
    public function edit(string $kd)
    {
        $disease = Disease::where('kd', $kd)->first();

        if (!$disease) {
            abort(404); // Jika penyakit tidak ditemukan, tampilkan error 404
        }
    
        return view('dashboard.diseases.edit', [
            'disease' => $disease,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $kd)
    {
        $rules = [
            'kd' => 'required|max:255',
            'nama' => 'required',
            'keterangan' => 'required',
            'solusi' => 'required'
        ];

        $validatedData = $request->validate($rules);
        
        Disease::where('kd', $kd)
            ->update($validatedData);

        return redirect('/dashboard/diseases')->with('success', 'Disease has been Updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Disease $disease)
    {
        Disease::destroy($disease->id);

        return redirect('/dashboard/diseases')->with('success', 'Disease has been deleted');
    }
}
