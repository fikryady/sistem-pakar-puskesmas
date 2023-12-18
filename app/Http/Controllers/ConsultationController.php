<?php

namespace App\Http\Controllers;

use App\Models\Disease;
use Dompdf\Dompdf;
use App\Models\History;
use App\Models\Rule;
use App\Models\Symptom;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConsultationController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if (!$user->isProfileComplete()) {
            return redirect()->route('profile.edit', ['username' => $user->username])->with('incompleteProfile', true);
        }

        return view('konsultasi.index', [
            "title" => "Konsultasi",
            "symptoms" => Symptom::all(),
            "user" => $user
        ]);
    }

    public function process(Request $request)
{
    $title = "Hasil Konsultasi";
    $userId = $request->input('id');
    $tanggalKonsultasi = $request->input('tanggal');
    $selectedSymptoms = $request->input('symptom', []);

    // Mengambil semua rule yang memiliki gejala yang dipilih
    $symptoms = Symptom::whereIn('id', $selectedSymptoms)->get();
    $rules = Rule::whereIn('symptom_id', $selectedSymptoms)->get();

    // Mengelompokkan gejala-gejala berdasarkan penyakit
    $result = [];
foreach ($rules as $rule) {
    $symptomId = $rule->symptom_id;
    $diseaseId = $rule->disease_id;

    // Find the symptom with the given ID in the collection
    $symptom = $symptoms->where('id', $symptomId)->first();

    // Check if the symptom was found before accessing the bobot property
    if ($symptom) {
        $bobot = $symptom->bobot;

        if (!isset($result[$diseaseId][$symptomId])) {
            $result[$diseaseId][$symptomId] = $bobot;
        } else {
            $result[$diseaseId][$symptomId] += $bobot;
        }
    }
}

    // Menghitung nilai probabilitas penyakit
    $probabilitasPenyakit = [];
    foreach ($result as $diseaseId => $symptoms) {
        $selectedSymptomCount = count($symptoms);
        $totalSelectedSymptoms = count($selectedSymptoms);
        $probability = $selectedSymptomCount / $totalSelectedSymptoms;
        $probabilitasPenyakit[$diseaseId] = $probability;
    }

    // Menghitung nilai probabilitas gejala
    $probabilitasGejala = [];
    foreach ($result as $diseaseId => $symptoms) {
        $sumWeights = array_sum($symptoms);
        $probabilitasGejala[$diseaseId] = $sumWeights;
    }

    // Bobot masing-masing gejala
    $bobotGejala = [];
    foreach ($result as $diseaseId => $symptoms) {
        foreach ($symptoms as $symptomId => $weight) {
            $bobotGejala[$diseaseId][$symptomId] = $weight;
        }
    }

    // Menghitung probabilitas penyakit terhadap gejala
    $probabilitasPenyakitTerhadapGejala = [];
    foreach ($probabilitasPenyakit as $diseaseId => $probability) {
        $probabilitasPenyakitTerhadapGejala[$diseaseId] = $probability * $probabilitasGejala[$diseaseId];
    }

    // Menjumlahkan probabilitas penyakit terhadap gejala
    $totalProbabilitas = array_sum($probabilitasPenyakitTerhadapGejala);

    // Menghitung nilai teorema Bayes
    $teoremaBayes = [];
    foreach ($probabilitasPenyakitTerhadapGejala as $diseaseId => $probabilityToSymptom) {
        $teoremaBayes[$diseaseId] = $probabilityToSymptom / $totalProbabilitas;
    }

    // Menghitung nilai persentase perkiraan teorema Bayes
    $persentasi = [];
    foreach ($teoremaBayes as $diseaseId => $bayesValue) {
        $persentasi[$diseaseId] = $bayesValue * 100;
    }

    // Generate Kode Konsultasi (KDK___)
    $highestDiseaseCode = "KDK" . sprintf("%03d", rand(001, 999));

    // Mengecek apakah kode konsultasi sudah digunakan sebelumnya
    while (History::where('kd_konsultasi', $highestDiseaseCode)->exists()) {
        $highestDiseaseCode = "KDK" . sprintf("%03d", rand(001, 999));
    }

    // Retrieve user information
    $user = User::find($userId);
    $userName = $user->name;
    $userUmur = date_diff(date_create($user->tgl_lahir), date_create('today'))->y;
    $userPhoneNumber = $user->no_hp;
    $userOccupation = $user->pekerjaan;
    $userAddress = $user->alamat;

    // Save the history record
    $history = new History();
    $history->tgl = now(); // or use $tanggalKonsultasi if it represents the consultation date
    $history->user_id = $userId;
    $history->disease_id = array_search(max($teoremaBayes), $teoremaBayes); // get the disease with the highest probability
    $history->symptom_id = json_encode($selectedSymptoms); // Save selected symptoms as JSON
    $history->bayes_value = max($persentasi); // get the highest probability
    $history->kd_konsultasi = $highestDiseaseCode; // Assign the generated code
    $history->save();

    // Redirect ke halaman result dengan menggunakan kode konsultasi
    return redirect()->route('result', ['kodeKonsultasi' => $highestDiseaseCode])->with([
        'teoremaBayes' => $teoremaBayes,
        'persentasi' => $persentasi,
        'userName' => $userName,
        'userUmur' => $userUmur,
        'userPhoneNumber' => $userPhoneNumber,
        'userOccupation' => $userOccupation,
        'userAddress' => $userAddress,
        'highestDiseaseCode' => $highestDiseaseCode
    ]);
}

public function result($kodeKonsultasi)
{
    // Retrieve history record berdasarkan kode konsultasi
    $history = History::where('kd_konsultasi', $kodeKonsultasi)->first();

    if (!$history) {
        // Jika history tidak ditemukan, handle error atau redirect ke halaman lain
    }

    // Retrieve data lain yang diperlukan
    $title = "Hasil Konsultasi";
    $tanggalKonsultasi = $history->tgl; // Ganti dengan kolom yang sesuai dalam model History
    $selectedSymptoms = json_decode($history->symptom_id);

    // Retrieve symptom information
    $symptoms = Symptom::whereIn('id', $selectedSymptoms)->pluck('nama')->all();

    // Retrieve user information
    $user = User::find($history->user_id);
    $userName = $user->name;
    $userUmur = date_diff(date_create($user->tgl_lahir), date_create('today'))->y;
    $userPhoneNumber = $user->no_hp;
    $userOccupation = $user->pekerjaan;
    $userAddress = $user->alamat;

    // Retrieve disease information
    $highestDisease = Disease::find($history->disease_id);
    $highestDiseaseName = $highestDisease->nama;
    $highestDiseaseSolution = $highestDisease->solusi;
    $highestDiseaseBayesPercent = $history->bayes_value;
    $highestDiseaseCode = $kodeKonsultasi; // Tambahkan inisialisasi variabel $highestDiseaseCode

    return view('konsultasi.result', compact(
        'title',
        'selectedSymptoms',
        'userName',
        'userUmur',
        'userPhoneNumber',
        'userOccupation',
        'userAddress',
        'highestDiseaseName',
        'highestDiseaseCode',
        'highestDiseaseSolution',
        'tanggalKonsultasi',
        'highestDiseaseBayesPercent',
        'symptoms'
    ));
}


public function cetak($kodeKonsultasi)
{
    // Retrieve history record berdasarkan kode konsultasi
    $history = History::where('kd_konsultasi', $kodeKonsultasi)->first();

    if (!$history) {
        // Jika history tidak ditemukan, handle error atau redirect ke halaman lain
        return redirect()->back()->with('error', 'History record not found.');
    }

    // Retrieve data lain yang diperlukan
    $tanggalKonsultasi = $history->tgl; // Ganti dengan kolom yang sesuai dalam model History
    $selectedSymptoms = json_decode($history->symptom_id);

    // Retrieve symptom information
    $symptoms = Symptom::whereIn('id', $selectedSymptoms)->pluck('nama')->all();

    // Retrieve user information
    $user = User::find($history->user_id);
    $userName = $user->name;
    $userPhoneNumber = $user->no_hp;
    $userOccupation = $user->pekerjaan;
    $userAddress = $user->alamat;

    // Retrieve disease information
    $highestDisease = Disease::find($history->disease_id);
    $highestDiseaseName = $highestDisease->nama;
    $highestDiseaseBayesPercent = $history->bayes_value;
    $highestDiseaseSolution = $highestDisease->solusi;

    // Create new instance of Dompdf
    $pdf = new Dompdf();

    // Generate HTML content for the PDF
    $html = view('.konsultasi.cetak', compact(
        'tanggalKonsultasi',
        'userName',
        'userPhoneNumber',
        'userOccupation',
        'userAddress',
        'symptoms',
        'highestDiseaseName',
        'highestDiseaseBayesPercent',
        'highestDiseaseSolution'
    ))->render();

    // Load HTML content into Dompdf
    $pdf->loadHtml($html);

    // (Optional) Set paper size and orientation
    $pdf->setPaper('A4', 'portrait');

    // Render the PDF
    $pdf->render();

    // Atur nama file PDF yang akan diunduh
    $filename = 'hasil_konsultasi_'.$kodeKonsultasi.'.pdf';

    // Set header untuk memberitahu browser bahwa konten adalah file PDF yang akan diunduh
    header('Content-Type: application/pdf');
    header('Content-Disposition: attachment; filename="'.$filename.'"');

    // Tampilkan PDF untuk diunduh
    return $pdf->stream('hasil_konsultasi_' . $tanggalKonsultasi . '.pdf');
}



}
