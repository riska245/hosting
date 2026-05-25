<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Riwayat Sensor {{ $incubatorCode }}</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #1e293b;
            background-color: #ffffff;
            margin: 20px;
            font-size: 13px;
            line-height: 1.5;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            border-bottom: 2px solid #e2e8f0;
            padding-bottom: 15px;
            margin-bottom: 20px;
        }
        .title h1 {
            font-size: 20px;
            font-weight: 700;
            color: #0f172a;
            margin: 0 0 5px 0;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        .title p {
            font-size: 12px;
            color: #64748b;
            margin: 0;
        }
        .meta-info {
            text-align: right;
            font-size: 11px;
            color: #64748b;
        }
        .meta-info div {
            margin-bottom: 3px;
        }
        .meta-value {
            font-weight: 600;
            color: #334155;
        }
        .filter-summary {
            background-color: #f8fafc;
            border: 1px dashed #cbd5e1;
            border-radius: 8px;
            padding: 12px 16px;
            margin-bottom: 20px;
        }
        .filter-summary h3 {
            font-size: 12px;
            font-weight: 600;
            margin: 0 0 8px 0;
            color: #475569;
            text-transform: uppercase;
        }
        .filter-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 8px;
            font-size: 11px;
        }
        .filter-item {
            color: #64748b;
        }
        .filter-item span {
            color: #334155;
            font-weight: 500;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th {
            background-color: #f1f5f9;
            color: #475569;
            font-weight: 600;
            text-align: left;
            padding: 8px 12px;
            font-size: 11px;
            text-transform: uppercase;
            border-bottom: 2px solid #cbd5e1;
        }
        td {
            padding: 10px 12px;
            border-bottom: 1px solid #e2e8f0;
            font-size: 12px;
        }
        tr:nth-child(even) td {
            background-color: #f8fafc;
        }
        .badge {
            display: inline-block;
            padding: 3px 8px;
            border-radius: 9999px;
            font-size: 10px;
            font-weight: 600;
            text-align: center;
        }
        .bg-red {
            background-color: #fee2e2;
            color: #991b1b;
        }
        .bg-blue {
            background-color: #dbeafe;
            color: #1e40af;
        }
        .bg-green {
            background-color: #dcfce7;
            color: #166534;
        }
        .footer {
            margin-top: 30px;
            text-align: center;
            font-size: 10px;
            color: #94a3b8;
            border-top: 1px solid #e2e8f0;
            padding-top: 10px;
        }
        @media print {
            body {
                margin: 1cm;
                color: #000000;
            }
            .filter-summary {
                background-color: #ffffff;
                border: 1px solid #cbd5e1;
            }
            tr {
                page-break-inside: avoid;
            }
            @page {
                size: portrait;
                margin: 1.5cm 1cm;
            }
        }
    </style>
</head>
<body>

    <div class="header">
        <div class="title">
            <h1>Laporan Riwayat Sensor</h1>
            <p>Sistem Pemantauan Inkubator Telur Pintar (Pitik)</p>
        </div>
        <div class="meta-info">
            <div>ID Perangkat: <span class="meta-value">{{ $incubatorCode }}</span></div>
            <div>Waktu Cetak: <span class="meta-value">{{ now()->setTimezone('Asia/Jakarta')->format('d M Y, H:i') }} WIB</span></div>
            <div>Total Catatan: <span class="meta-value">{{ $sensorHistory->count() }}</span></div>
        </div>
    </div>

    <!-- Filter Summary Section -->
    <div class="filter-summary">
        <h3>Filter yang Diterapkan</h3>
        <div class="filter-grid">
            <div class="filter-item">Rentang Tanggal: 
                <span>
                    @if($filters['date_filter'] === 'today')
                        Hari Ini
                    @elseif($filters['date_filter'] === 'week')
                        Minggu Ini
                    @elseif($filters['date_filter'] === 'month')
                        Bulan Ini
                    @elseif($filters['date_filter'] === 'custom')
                        Kustom ({{ $filters['start_date'] ?? 'Awal' }} s.d {{ $filters['end_date'] ?? 'Akhir' }})
                    @else
                        Semua Waktu
                    @endif
                </span>
            </div>
            <div class="filter-item">Suhu: 
                <span>
                    @if(isset($filters['temp_filter']))
                        @if($filters['temp_filter'] === '36')
                            Suhu 36&deg;C
                        @elseif($filters['temp_filter'] === '37')
                            Suhu 37&deg;C
                        @elseif($filters['temp_filter'] === '38')
                            Suhu 38&deg;C
                        @elseif($filters['temp_filter'] === '39')
                            Suhu 39&deg;C
                        @elseif($filters['temp_filter'] === 'custom')
                            Kustom ({{ $filters['min_temp'] ?? '0' }}&deg;C - {{ $filters['max_temp'] ?? 'Max' }}&deg;C)
                        @else
                            Semua Suhu
                        @endif
                    @else
                        Semua Suhu
                    @endif
                </span>
            </div>
            <div class="filter-item">Kelembapan: 
                <span>
                    @if(isset($filters['hum_filter']))
                        @if($filters['hum_filter'] === '40-50')
                            40-50%
                        @elseif($filters['hum_filter'] === '51-60')
                            51-60%
                        @elseif($filters['hum_filter'] === '61-70')
                            61-70%
                        @elseif($filters['hum_filter'] === 'custom')
                            Kustom ({{ $filters['min_hum'] ?? '0' }}% - {{ $filters['max_hum'] ?? 'Max' }}%)
                        @else
                            Semua Kelembapan
                        @endif
                    @else
                        Semua Kelembapan
                    @endif
                </span>
            </div>
            <div class="filter-item">Kondisi: 
                <span>
                    @if($filters['status_filter'] === 'optimal')
                        Optimal
                    @elseif($filters['status_filter'] === 'panas')
                        Terlalu Panas
                    @elseif($filters['status_filter'] === 'dingin')
                        Kurang Panas
                    @elseif($filters['status_filter'] === 'lembap')
                        Terlalu Lembap
                    @elseif($filters['status_filter'] === 'kering')
                        Kurang Lembap
                    @else
                        Semua
                    @endif
                </span>
            </div>
        </div>
    </div>

    <table>
        <thead>
            <tr>
                <th style="width: 50px;">No</th>
                <th>Tanggal</th>
                <th>Waktu</th>
                <th>Suhu</th>
                <th>Kelembapan</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @forelse($sensorHistory as $index => $history)
                @php
                    $temp = (float)$history->temperature;
                    $hum = (float)$history->humidity;
                    if ($temp > 38.5) {
                        $badge = 'bg-red';
                        $statusText = 'Terlalu Panas';
                    } elseif ($temp < 37.0) {
                        $badge = 'bg-red';
                        $statusText = 'Kurang Panas';
                    } elseif ($hum > 65.0) {
                        $badge = 'bg-blue';
                        $statusText = 'Terlalu Lembap';
                    } elseif ($hum < 50.0) {
                        $badge = 'bg-blue';
                        $statusText = 'Kurang Lembap';
                    } else {
                        $badge = 'bg-green';
                        $statusText = 'Optimal';
                    }
                    $histTime = $history->created_at->setTimezone('Asia/Jakarta');
                @endphp
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $histTime->format('d M Y') }}</td>
                    <td>{{ $histTime->format('H:i:s') }} WIB</td>
                    <td style="font-weight: 600;">{{ number_format($temp, 2) }}°C</td>
                    <td style="font-weight: 600;">{{ number_format($hum, 1) }}%</td>
                    <td>
                        <span class="badge {{ $badge }}">{{ $statusText }}</span>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" style="text-align: center; color: #64748b; padding: 20px;">
                        Tidak ada data sensor yang sesuai dengan filter yang dipilih.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="footer">
        Dokumen laporan ini dicetak secara otomatis dari Sistem Pemantauan Inkubator Telur Pintar (Pitik).
    </div>

    <script>
        window.onload = function() {
            // Auto open print dialog
            window.print();
            // Automatically close the window/tab after print dialog closes, but let user see it first if they cancel
            window.onafterprint = function() {
                window.close();
            };
        };
    </script>
</body>
</html>
