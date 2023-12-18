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
                max-width: 200mm; /* Mengubah lebar maksimum container */
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

            table {
                margin: 0 auto;
                border-collapse: collapse;
                width: 100%;
            }

            th, td {
                padding: 8px;
                text-align: left;
                border: 1px solid #000;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h3 style="text-align: center;">SISTEM PAKAR METODE TEOREMA BAYES</h3>
        <h3 style="text-align: center;">MENDIAGNOSA PENYAKIT TUBERKULOSIS</h3>
        <hr>
        <h4 style="text-align: center;">LAPORAN KONSULTASI PASIEN</h4>
        <table style="margin: 0 auto; border: 1px solid #000; width: 100%;">
            <thead>
                <tr>
                    <th style="border: 1px solid #000; padding: 8px; width: 5%;">No</th>
                    <th style="border: 1px solid #000; padding: 8px; width: 25%;">Kode Konsultasi</th>
                    <th style="border: 1px solid #000; padding: 8px; width: 30%;">Nama Pasien</th>
                    <th style="border: 1px solid #000; padding: 8px; width: 30%;">Tanggal Konsultasi</th>
                    <th style="border: 1px solid #000; padding: 8px; width: 30%;">Nama Penyakit</th>
                    <th style="border: 1px solid #000; padding: 8px; width: 10%;">Hasil</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($riwayat as $index => $item)
                <tr>
                    <td style="border: 1px solid #000; padding: 8px;">{{ $loop->iteration }}</td>
                    <td style="border: 1px solid #000; padding: 8px;">{{ $item->kd_konsultasi }}</td>
                    <td style="border: 1px solid #000; padding: 8px;">{{ $item->user->name }}</td>
                    <td style="border: 1px solid #000; padding: 8px;">{{ date_format(date_create($item->tgl), 'd-m-Y') }}</td>
                    <td style="border: 1px solid #000; padding: 8px;">{{ $item->disease->nama }}</td>
                    <td style="border: 1px solid #000; padding: 8px;">{{ $item->bayes_value }}%</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="signature">
            <p style="text-align: right">Padang, {{ $printDate }}</p>
            <br><br>
            <p style="text-align: right; margin-right: 25px">Nama Dokter</p>
        </div>
    </div>
</body>
</html>
