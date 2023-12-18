<!DOCTYPE html>
<html>
<head>
    <title>{{ $title }}</title>
</head>
<body>
    <h1>{{ $title }}</h1>

    @if (count($persentasi) > 0)
        <h2>Perkiraan Probabilitas Penyakit:</h2>
        <ul>
            @foreach ($persentasi as $diseaseId => $percentage)
                <li>Penyakit {{ $diseaseId }}: {{ number_format($percentage, 2) }}%</li>
            @endforeach
        </ul>
    @else
        <p>Tidak ada perkiraan probabilitas penyakit karena gejala tidak cocok dengan aturan penyakit.</p>
    @endif

    @if (count($boboGejala) > 0)
        <h2>Bobot Gejala untuk Setiap Penyakit:</h2>
        <ul>
            @foreach ($boboGejala as $diseaseId => $symptoms)
                <li>Penyakit {{ $diseaseId }}:</li>
                <ul>
                    @foreach ($symptoms as $symptomId => $weight)
                        <li>Gejala {{ $symptomId }}: {{ $weight }}</li>
                    @endforeach
                </ul>
            @endforeach
        </ul>
    @else
        <p>Tidak ada bobot gejala karena gejala tidak cocok dengan aturan penyakit.</p>
    @endif
</body>
</html>
