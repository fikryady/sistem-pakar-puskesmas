<?php

namespace App\Http\Controllers;

use App\Models\Symptom;
use Illuminate\Http\Request;

class DashboardSymptomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.symptoms.index', [
            "symptoms" => Symptom::orderby('kd', 'asc')->filter(request(['search', 'symptoms']))->paginate(10)->withQueryString()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.symptoms.create', [
            'symptoms' => Symptom::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'kd' => 'required|max:255',
            'nama' => 'required|unique:symptoms',
            'bobot' => 'required|numeric|between:0,1',
        ]);

        Symptom::create($validatedData);

        return redirect('/dashboard/symptoms')->with('success', 'New symptom has been added');
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
    public function edit(string $kd)
    {
        $symptom = Symptom::where('kd', $kd)->first();

        if (!$symptom) {
            abort(404); // Jika penyakit tidak ditemukan, tampilkan error 404
        }
    
        return view('dashboard.symptoms.edit', [
            'symptom' => $symptom,
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
            'bobot' => 'required|numeric|between:0,1',
        ];

        $validatedData = $request->validate($rules);

        Symptom::where('kd', $kd)
            ->update($validatedData);

        return redirect('/dashboard/symptoms')->with('success', 'Symptom has been Updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Symptom $symptom)
    {
        Symptom::destroy($symptom->id);

        return redirect('/dashboard/symptoms')->with('success', 'Symptom has been deleted');
    }
}
