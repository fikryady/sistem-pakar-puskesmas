<?php

namespace App\Http\Controllers;

use App\Models\Disease;
use Illuminate\Http\Request;

class InformasiController extends Controller
{
    public function index()
    {
        return view('informasi.index', [
            "title" => "Informasi",
            "diseases" => Disease::with('rules.symptom')->get()
        ]);
    }
}
