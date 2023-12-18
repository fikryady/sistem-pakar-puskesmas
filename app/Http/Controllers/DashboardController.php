<?php

namespace App\Http\Controllers;

use App\Models\Disease;
use App\Models\History;
use App\Models\Symptom;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index', [
            'diseases' => Disease::count(),
            'symptoms' => Symptom::count(),
            'users' => User::count(),
            'histories' => History::count()
        ]);
    }
}
