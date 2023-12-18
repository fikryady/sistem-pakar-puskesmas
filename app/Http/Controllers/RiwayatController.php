<?php

namespace App\Http\Controllers;

use App\Models\History;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RiwayatController extends Controller
{
    public function index()
    {
        $title = "Riwayat";
        // Mengambil ID pengguna yang sedang login
        $userId = Auth::id();
        
        // Mengambil data riwayat konsultasi berdasarkan ID pengguna
        $riwayat = History::where('user_id', $userId)->get();

        // Mengambil data biodata pengguna
        $user = Auth::user();
        $userName = $user->name;
        $userUmur = date_diff(date_create($user->tgl_lahir), date_create('today'))->y;
        $userPhoneNumber = $user->no_hp;
        $userOccupation = $user->pekerjaan;
        $userAddress = $user->alamat;

        return view('riwayat.index', compact('riwayat', 'userName', 'userUmur', 'userPhoneNumber', 'userOccupation', 'userAddress', 'title'));
    }
}
