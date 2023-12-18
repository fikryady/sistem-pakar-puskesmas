<?php

namespace App\Http\Controllers;

use App\Models\Disease;
use App\Models\Rule;
use App\Models\Symptom;
use Illuminate\Http\Request;

class DashboardRuleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rules = Rule::with('disease', 'symptom')
    ->join('diseases', 'rules.disease_id', '=', 'diseases.id')
    ->orderBy('diseases.kd', 'asc')
    ->select('rules.*')
    ->filter(request(['search', 'rule']))
    ->paginate(10)
    ->withQueryString();

return view('dashboard.rule.index', compact('rules'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $diseases = Disease::orderBy('kd')->get();
        $symptoms = Symptom::orderBy('kd')->get();

        return view('dashboard.rule.create', compact('diseases', 'symptoms'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'disease' => 'required|numeric',
            'symptom' => 'required|numeric',
        ]);

        $disease = Disease::findOrFail($request->input('disease'));
        $disease->symptoms()->attach($request->input('symptom'));


        return redirect('/dashboard/rules')->with('success', 'New rule has been added');
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
        $rules = Rule::findOrFail($id);
        $diseases = Disease::orderBy('kd')->get();
        $symptoms = Symptom::orderBy('kd')->get();

        return view('dashboard.rule.edit', compact('rules', 'diseases', 'symptoms'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{
    $rules = Rule::findOrFail($id);

    $this->validate($request, [
        'disease' => 'required|numeric',
        'symptom' => 'required|numeric',
    ]);

    $rules->disease_id = $request->input('disease');
    $rules->symptom_id = $request->input('symptom');
    $rules->save();

    return redirect('/dashboard/rules')->with('success', 'Rule has been updated successfully');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rule $rule)
    {
        Rule::destroy($rule->id);

        return redirect('/dashboard/rules')->with('success', 'Rule has been deleted');
    }
}
