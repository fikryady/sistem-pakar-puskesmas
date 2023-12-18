<?php

namespace App\Http\Controllers;

use App\Models\Disease;
use App\Models\History;
use App\Models\Symptom;
use App\Models\User;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    return view('dashboard.history.index', [
        "riwayat" => History::orderby('kd_konsultasi', 'asc')->filter(request(['search', 'name']))->paginate(8)->withQueryString(),
        "title" => 'riwayat',
        
    ]);
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function cetakLaporan()
{
    // Retrieve all history records
    $riwayat = History::all();

    // Menginisialisasi variabel tanggal cetak
    $printDate = date('j F, Y');

    if ($riwayat->isEmpty()) {
        // Jika tidak ada history yang ditemukan, handle error atau redirect ke halaman lain
        return redirect()->back()->with('error', 'No history records found.');
    }

    // Create new instance of Dompdf
    $pdf = new Dompdf();

    // Generate HTML content for the PDF
    $html = view('dashboard.history.cetak', compact('riwayat', 'printDate'))->render();

    // Load HTML content into Dompdf
    $pdf->loadHtml($html);

    // (Optional) Set paper size and orientation
    $pdf->setPaper('A4', 'portrait');

    // Render the PDF
    $pdf->render();

    // Set header untuk memberitahu browser bahwa konten adalah file PDF yang akan diunduh
    header('Content-Type: application/pdf');
    header('Content-Disposition: attachment; filename="laporan_konsultasi.pdf"');

    // Tampilkan PDF untuk diunduh
    return $pdf->stream('laporan_konsultasi.pdf');
}

}
