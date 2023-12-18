<!DOCTYPE html>
<html>
<head>
    <title>Cetak Hasil Konsultasi</title>
    <style>
        @media print {
            body {
                margin: 0;
                padding: 0;
                font-family: Arial, sans-serif;
            }

            .container {
                max-width: 180mm;
                margin: 20px auto;
                padding: 20px;
                box-sizing: border-box;
            }

            h4, h3 {
                margin-top: 0;
            }

            hr {
                border: none;
                border-top: 1px solid #000;
                margin: 20px 0;
            }

            p {
                margin: 10px 0;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h3 style="text-align: center;">SISTEM PAKAR METODE TEOREMA BAYES</h3>
        <h3 style="text-align: center;">MENDIAGNOSA PENYAKIT TUBERKULOSIS</h3>
        <hr>
        <h4 style="text-align: center;">HASIL KONSULTASI PASIEN</h4>
        <p>Data diri:</p>
        <p>Tanggal Konsultasi: {{ $tanggalKonsultasi }}</p>
        <p>Nama: {{ $userName }}</p>
        <p>No HP: {{ $userPhoneNumber }}</p>
        <p>Pekerjaan: {{ $userOccupation }}</p>
        <p>Alamat: {{ $userAddress }}</p>

        <p>Berdasarkan hasil analisa berdasarkan gejala-gejala yang dipilih:</p>
        <ul>
            @foreach ($symptoms as $symptom)
                <li>{{ $symptom }}</li>
            @endforeach
        </ul>

        <p>Maka didapat hasil sebagai berikut:</p>
        <p>Nama penyakit yang dialami: {{ $highestDiseaseName }}</p>
        <p>Dengan tingkat kepastian: {{ number_format($highestDiseaseBayesPercent, 2) }}%</p>
        <p>Solusi untuk penyakit ini: {!! $highestDiseaseSolution !!}</p>
    </div>
</body>
</html>
