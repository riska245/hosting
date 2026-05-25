<?php

use App\Models\SensorData;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Schema;

/*
|--------------------------------------------------------------------------
| HALAMAN UTAMA
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('pages.beranda');
});

Route::get('/about', function () {
    return view('pages.about');
});

Route::get('/monitoring', function () {
    return view('pages.monitoring');
});

Route::get('/pemahaman', function () {
    return view('pages.pemahaman');
});

Route::get('/panduan-kalibrasi', function () {
    return view('pages.kalibrasi');
});

Route::get('/panduan-penggunaan', function () {
    return view('pages.penggunaan');
});

Route::get('/kontak', function () {
    return view('pages.kontak');
});

/*
|--------------------------------------------------------------------------
| LOGIN & REGISTRASI USER
|--------------------------------------------------------------------------
*/

Route::get('/login', function () {
    if (Session::get('login')) {
        if (Session::get('role') === 'admin') {
            return redirect('/admin-dashboard');
        }
        return redirect('/dashboard-detail');
    }
    return view('pages.user.login');
});

Route::post('/login', function (Request $request) {
    $credentials = $request->validate([
        'username' => 'required|string',
        'email' => 'required|email',
        'password' => 'required|string',
    ], [
        'username.required' => 'Nama / Username wajib diisi.',
        'email.required' => 'Email wajib diisi.',
        'email.email' => 'Format email tidak valid.',
        'password.required' => 'Password wajib diisi.',
    ]);

    $user = User::where('role', 'user')
        ->where('username', $credentials['username'])
        ->where('email', $credentials['email'])
        ->first();

    if (!$user || !Hash::check($credentials['password'], $user->password)) {
        return back()->withInput()->with('error', 'Nama, email, atau password user salah!');
    }

    DB::table('login_users')->insert([
        'username' => $user->username,
        'email' => $user->email,
        'incubator_code' => $user->incubator_code,
        'role' => 'user',
        'ip_address' => $request->ip(),
        'user_agent' => $request->userAgent(),
        'login_at' => now(),
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    Session::put('login', true);
    Session::put('user_id', $user->id);
    Session::put('role', 'user');
    Session::put('username', $user->username);
    Session::put('email', $user->email);
    Session::put('incubator_code', $user->incubator_code);

    return redirect('/dashboard-detail');
});

Route::get('/register', function () {
    if (Session::get('login')) {
        if (Session::get('role') === 'admin') {
            return redirect('/admin-dashboard');
        }
        return redirect('/dashboard-detail');
    }
    return view('pages.user.register');
});

Route::post('/register', function (Request $request) {
    $data = $request->validate([
        'username' => 'required|string|max:255|unique:users,username',
        'email' => 'required|email|max:255|unique:users,email',
        'incubator_code' => ['required', 'string', 'max:255', 'unique:users,incubator_code', 'regex:/^INC-\d+X$/'],
        'password' => 'required|string|min:6',
    ], [
        'username.required' => 'Nama / Username wajib diisi.',
        'username.unique' => 'Nama / Username sudah terdaftar.',
        'email.required' => 'Email wajib diisi.',
        'email.email' => 'Format email tidak valid.',
        'email.unique' => 'Email sudah terdaftar.',
        'incubator_code.required' => 'Nomor Inkubator wajib diisi.',
        'incubator_code.unique' => 'Nomor Inkubator sudah terdaftar.',
        'incubator_code.regex' => 'Format nomor inkubator harus "INC-(nomor_inkubator)X" (Contoh: INC-001X, INC harus huruf besar).',
        'password.required' => 'Password wajib diisi.',
        'password.min' => 'Password minimal terdiri dari 6 karakter.',
    ]);

    $user = User::create([
        'name' => $data['username'],
        'username' => $data['username'],
        'email' => $data['email'],
        'incubator_code' => $data['incubator_code'],
        'password' => Hash::make($data['password']),
        'role' => 'user',
    ]);

    DB::table('login_users')->insert([
        'username' => $user->username,
        'email' => $user->email,
        'incubator_code' => $user->incubator_code,
        'role' => 'user',
        'ip_address' => $request->ip(),
        'user_agent' => $request->userAgent(),
        'login_at' => now(),
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    Session::put('login', true);
    Session::put('user_id', $user->id);
    Session::put('role', 'user');
    Session::put('username', $user->username);
    Session::put('email', $user->email);
    Session::put('incubator_code', $user->incubator_code);

    return redirect('/dashboard-detail')->with('success', 'Registrasi berhasil dan Anda telah masuk.');
});

/*
|--------------------------------------------------------------------------
| LOGIN & PORTAL ADMIN
|--------------------------------------------------------------------------
*/

Route::get('/admin', function () {
    if (Session::get('login') && Session::get('role') === 'admin') {
        return redirect('/admin-dashboard');
    }
    return view('pages.admin.login');
});

Route::post('/admin', function (Request $request) {
    $credentials = $request->validate([
        'username_or_email' => 'required|string',
        'password' => 'required|string',
    ], [
        'username_or_email.required' => 'Username atau Email wajib diisi.',
        'password.required' => 'Password wajib diisi.',
    ]);

    $admin = User::where('role', 'admin')
        ->where(function ($query) use ($credentials) {
            $query->where('username', $credentials['username_or_email'])
                  ->orWhere('email', $credentials['username_or_email']);
        })
        ->first();

    if (!$admin || !Hash::check($credentials['password'], $admin->password)) {
        return back()->withInput()->with('error', 'Username/Email atau password admin salah!');
    }

    Session::put('login', true);
    Session::put('user_id', $admin->id);
    Session::put('role', 'admin');
    Session::put('username', $admin->username);
    Session::put('email', $admin->email);

    DB::table('login_users')->insert([
        'username' => $admin->username,
        'email' => $admin->email,
        'role' => 'admin',
        'ip_address' => $request->ip(),
        'user_agent' => $request->userAgent(),
        'login_at' => now(),
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    if (Schema::hasTable('admin_activities')) {
        \App\Models\AdminActivity::create([
            'username' => $admin->username,
            'activity' => 'login',
            'description' => 'Admin berhasil login',
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);
    }

    return redirect('/admin-dashboard');
});

/*
|--------------------------------------------------------------------------
| DASHBOARD USER
|--------------------------------------------------------------------------
*/

if (!function_exists('applySensorFilters')) {
    function applySensorFilters($query, Request $request) {
        $dateFilter = $request->input('date_filter');
        if ($dateFilter === 'today') {
            $query->whereDate('created_at', \Carbon\Carbon::today());
        } elseif ($dateFilter === 'week') {
            $query->where('created_at', '>=', \Carbon\Carbon::now()->startOfWeek());
        } elseif ($dateFilter === 'month') {
            $query->where('created_at', '>=', \Carbon\Carbon::now()->startOfMonth());
        } elseif ($dateFilter === 'custom') {
            $startDate = $request->input('start_date');
            $endDate = $request->input('end_date');
            if ($startDate && $endDate) {
                $query->whereBetween('created_at', [$startDate . ' 00:00:00', $endDate . ' 23:59:59']);
            } elseif ($startDate) {
                $query->where('created_at', '>=', $startDate . ' 00:00:00');
            } elseif ($endDate) {
                $query->where('created_at', '<=', $endDate . ' 23:59:59');
            }
        }

        $tempFilter = $request->input('temp_filter');
        if ($tempFilter === '36') {
            $query->whereBetween('temperature', [36.0, 36.999]);
        } elseif ($tempFilter === '37') {
            $query->whereBetween('temperature', [37.0, 37.999]);
        } elseif ($tempFilter === '38') {
            $query->whereBetween('temperature', [38.0, 38.999]);
        } elseif ($tempFilter === '39') {
            $query->whereBetween('temperature', [39.0, 39.999]);
        } elseif ($tempFilter === 'custom') {
            if ($request->filled('min_temp')) {
                $query->where('temperature', '>=', (float)$request->input('min_temp'));
            }
            if ($request->filled('max_temp')) {
                $query->where('temperature', '<=', (float)$request->input('max_temp'));
            }
        }

        $humFilter = $request->input('hum_filter');
        if ($humFilter === '40-50') {
            $query->whereBetween('humidity', [40.0, 50.0]);
        } elseif ($humFilter === '51-60') {
            $query->whereBetween('humidity', [51.0, 60.0]);
        } elseif ($humFilter === '61-70') {
            $query->whereBetween('humidity', [61.0, 70.0]);
        } elseif ($humFilter === 'custom') {
            if ($request->filled('min_hum')) {
                $query->where('humidity', '>=', (float)$request->input('min_hum'));
            }
            if ($request->filled('max_hum')) {
                $query->where('humidity', '<=', (float)$request->input('max_hum'));
            }
        }

        $statusFilter = $request->input('status_filter');
        if ($statusFilter) {
            if ($statusFilter === 'optimal') {
                $query->whereBetween('temperature', [37.0, 38.5])
                      ->whereBetween('humidity', [50.0, 65.0]);
            } elseif ($statusFilter === 'panas') {
                $query->where('temperature', '>', 38.5);
            } elseif ($statusFilter === 'dingin') {
                $query->where('temperature', '<', 37.0);
            } elseif ($statusFilter === 'lembap') {
                $query->whereBetween('temperature', [37.0, 38.5])
                      ->where('humidity', '>', 65.0);
            } elseif ($statusFilter === 'kering') {
                $query->whereBetween('temperature', [37.0, 38.5])
                      ->where('humidity', '<', 50.0);
            }
        }
        return $query;
    }
}

Route::get('/dashboard-detail', function (Request $request) {
    if (!Session::get('login')) {
        return redirect('/login');
    }

    if (Session::get('role') !== 'user') {
        return redirect('/');
    }

    $incubatorCode = Session::get('incubator_code');
    $latestSensor = SensorData::where('incubator_code', $incubatorCode)->latest()->first();
    
    $query = SensorData::where('incubator_code', $incubatorCode);
    $query = applySensorFilters($query, $request);
    
    $sensorHistory = $query->latest()->paginate(10)->appends($request->query());
    $sensorCount = $sensorHistory->total();

    // Overall device statistics
    $avgTemp = SensorData::where('incubator_code', $incubatorCode)->avg('temperature') ?? 0;
    $avgHum = SensorData::where('incubator_code', $incubatorCode)->avg('humidity') ?? 0;

    return view('pages.user.dashboard', compact('latestSensor', 'sensorHistory', 'sensorCount', 'avgTemp', 'avgHum'));
});

Route::get('/dashboard-detail/realtime-data', function (Request $request) {
    if (!Session::get('login') || Session::get('role') !== 'user') {
        return response()->json(['error' => 'Unauthorized'], 401);
    }

    $incubatorCode = Session::get('incubator_code');
    $latestSensor = SensorData::where('incubator_code', $incubatorCode)->latest()->first();
    
    if (!$latestSensor) {
        return response()->json(['has_data' => false]);
    }

    // Latest 10 for chart (in chronological order)
    $chartData = SensorData::where('incubator_code', $incubatorCode)
        ->latest()
        ->limit(10)
        ->get()
        ->reverse()
        ->values()
        ->map(function ($item) {
            return [
                'time' => $item->created_at->setTimezone('Asia/Jakarta')->format('H:i'),
                'temp' => (float)$item->temperature,
                'hum' => (float)$item->humidity
            ];
        });

    // Latest 10 for table
    $tableQuery = SensorData::where('incubator_code', $incubatorCode);
    $tableQuery = applySensorFilters($tableQuery, $request);
    
    $tableData = $tableQuery->latest()
        ->limit(10)
        ->get()
        ->map(function ($item, $index) {
            $temp = (float)$item->temperature;
            $hum = (float)$item->humidity;
            
            if ($temp > 38.5) {
                $statusClass = 'bg-red-600';
                $statusText = 'Terlalu Panas';
            } elseif ($temp < 37.0) {
                $statusClass = 'bg-red-600';
                $statusText = 'Kurang Panas';
            } elseif ($hum > 65.0) {
                $statusClass = 'bg-blue-600';
                $statusText = 'Terlalu Lembap';
            } elseif ($hum < 50.0) {
                $statusClass = 'bg-blue-600';
                $statusText = 'Kurang Lembap';
            } else {
                $statusClass = 'bg-green-600';
                $statusText = 'Optimal';
            }

            return [
                'no' => $index + 1,
                'date' => $item->created_at->setTimezone('Asia/Jakarta')->format('d M Y'),
                'time' => $item->created_at->setTimezone('Asia/Jakarta')->format('H:i') . ' WIB',
                'temp' => number_format($item->temperature, 2) . '°C',
                'hum' => number_format($item->humidity, 1) . '%',
                'status_class' => $statusClass,
                'status_text' => $statusText
            ];
        });

    // Latest logs (latest 4)
    $latestLogs = SensorData::where('incubator_code', $incubatorCode)
        ->latest()
        ->limit(4)
        ->get()
        ->map(function ($log) {
            $logTime = $log->created_at->setTimezone('Asia/Jakarta');
            $timeFormatted = $logTime->isToday() 
                ? 'Hari ini, ' . $logTime->format('H:i') . ' WIB' 
                : ($logTime->isYesterday() ? 'Kemarin, ' . $logTime->format('H:i') . ' WIB' : $logTime->format('d M Y, H:i') . ' WIB');
            
            $temp = (float)$log->temperature;
            $hum = (float)$log->humidity;
            $turning = strtolower($log->turning_status);
            $lamp = strtolower($log->lamp_status);

            $icon = 'info';
            $bg = 'bg-blue-50 dark:bg-blue-500/10';
            $color = 'text-blue-600 dark:text-blue-400';
            
            if ($temp > 38.5) {
                $icon = 'warning';
                $bg = 'bg-orange-50 dark:bg-orange-500/10';
                $color = 'text-orange-600 dark:text-orange-400';
                $message = "Peringatan: Suhu terdeteksi terlalu tinggi ({$temp}°C)";
            } elseif ($temp < 37.0) {
                $icon = 'warning';
                $bg = 'bg-red-50 dark:bg-red-500/10';
                $color = 'text-red-600 dark:text-red-400';
                $message = "Peringatan: Suhu terdeteksi terlalu rendah ({$temp}°C)";
            } elseif (in_array($turning, ['berputar', 'rotating'], true)) {
                $icon = 'spin';
                $bg = 'bg-amber-50 dark:bg-amber-500/10';
                $color = 'text-amber-600 dark:text-amber-400';
                $message = "Rak telur sedang diputar otomatis";
            } elseif (in_array($turning, ['selesai', 'completed', 'done', 'turned'], true)) {
                $icon = 'check';
                $bg = 'bg-green-50 dark:bg-green-500/10';
                $color = 'text-green-600 dark:text-green-400';
                $message = "Rak telur berhasil diputar";
            } elseif ($lamp === 'menyala' || $lamp === 'on') {
                $icon = 'lamp';
                $bg = 'bg-orange-50 dark:bg-orange-500/10';
                $color = 'text-orange-600 dark:text-orange-400';
                $message = "Pemanas (Lampu) diaktifkan otomatis";
            } elseif ($lamp === 'mati' || $lamp === 'off') {
                $icon = 'lamp-off';
                $bg = 'bg-slate-50 dark:bg-slate-500/10';
                $color = 'text-slate-600 dark:text-slate-400';
                $message = "Pemanas (Lampu) dinonaktifkan otomatis";
            } elseif ($hum > 65.0) {
                $icon = 'warning';
                $bg = 'bg-blue-50 dark:bg-blue-500/10';
                $color = 'text-blue-600 dark:text-blue-400';
                $message = "Peringatan: Kelembapan terdeteksi terlalu tinggi ({$hum}%)";
            } elseif ($hum < 50.0) {
                $icon = 'warning';
                $bg = 'bg-blue-50 dark:bg-blue-500/10';
                $color = 'text-blue-600 dark:text-blue-400';
                $message = "Peringatan: Kelembapan terdeteksi terlalu rendah ({$hum}%)";
            } else {
                $message = "Kondisi sistem stabil dan optimal.";
            }

            return [
                'message' => $message,
                'time' => $timeFormatted,
                'icon' => $icon,
                'bg' => $bg,
                'color' => $color
            ];
        });

    $isDeviceConnected = $latestSensor->created_at->greaterThanOrEqualTo(now()->subMinutes(5));
    $tempDiff = (float)$latestSensor->temperature - 38.0;
    $humDiff = (float)$latestSensor->humidity - 60.0;

    $turningStatus = strtolower($latestSensor->turning_status);
    $isRotating = in_array($turningStatus, ['berputar', 'rotating'], true);
    $turnedAtFormatted = $latestSensor->turned_at 
        ? \Carbon\Carbon::parse($latestSensor->turned_at)->setTimezone('Asia/Jakarta')->format('d M Y, H:i') . ' WIB' 
        : 'Belum ada data';
        
    $nextTurn = $latestSensor->next_turn_at ? \Carbon\Carbon::parse($latestSensor->next_turn_at) : null;
    $diffInMinutes = $nextTurn ? now()->diffInMinutes($nextTurn, false) : 0;
    if ($diffInMinutes > 0) {
        $hours = floor($diffInMinutes / 60);
        $mins = $diffInMinutes % 60;
        $dueLabel = $hours > 0 ? "± {$hours} Jam {$mins} Menit lagi" : "± {$mins} Menit lagi";
        $progressPct = max(0, min(100, 100 - ($diffInMinutes / 240) * 100));
    } else {
        $dueLabel = $nextTurn ? 'Jadwal pemutaran tiba' : 'Belum dijadwalkan';
        $progressPct = 100;
    }
    $nextTurnTime = $nextTurn ? $nextTurn->setTimezone('Asia/Jakarta')->format('H:i') : '--:--';

    $filteredTotalCount = applySensorFilters(SensorData::where('incubator_code', $incubatorCode), $request)->count();

    return response()->json([
        'has_data' => true,
        'is_device_connected' => $isDeviceConnected,
        'sync_time' => $latestSensor->created_at->setTimezone('Asia/Jakarta')->format('d M Y, H:i') . ' WIB',
        'temperature' => number_format((float)$latestSensor->temperature, 1),
        'temp_diff' => number_format(abs($tempDiff), 2),
        'temp_diff_sign' => $tempDiff >= 0 ? 'up' : 'down',
        'temp_diff_status' => abs($tempDiff) <= 0.5 ? 'normal' : 'danger',
        'humidity' => number_format((float)$latestSensor->humidity, 1),
        'hum_diff' => number_format(abs($humDiff), 1),
        'hum_diff_sign' => $humDiff >= 0 ? 'up' : 'down',
        'hum_diff_status' => abs($humDiff) <= 5 ? 'normal' : 'danger',
        
        'turned_at' => $turnedAtFormatted,
        'turning_status' => $turningStatus,
        'is_rotating' => $isRotating,
        'next_turn_time' => $nextTurnTime,
        'next_turn_due_label' => $dueLabel,
        'next_turn_progress' => $progressPct,

        'chart_data' => $chartData,
        'table_data' => $tableData,
        'latest_logs' => $latestLogs,
        'total_count' => $filteredTotalCount
        ])->header('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0')
          ->header('Pragma', 'no-cache')
          ->header('Expires', '0');
});

Route::get('/dashboard-detail/export/pdf', function (Request $request) {
    if (!Session::get('login') || Session::get('role') !== 'user') {
        return redirect('/login');
    }

    $incubatorCode = Session::get('incubator_code');
    $query = SensorData::where('incubator_code', $incubatorCode);
    $query = applySensorFilters($query, $request);

    $sensorHistory = $query->latest()->limit(5000)->get();
    
    $filters = [
        'date_filter' => $request->input('date_filter'),
        'start_date' => $request->input('start_date'),
        'end_date' => $request->input('end_date'),
        'temp_filter' => $request->input('temp_filter'),
        'min_temp' => $request->input('min_temp'),
        'max_temp' => $request->input('max_temp'),
        'hum_filter' => $request->input('hum_filter'),
        'min_hum' => $request->input('min_hum'),
        'max_hum' => $request->input('max_hum'),
        'status_filter' => $request->input('status_filter'),
    ];

    return view('pages.user.print_report', compact('sensorHistory', 'incubatorCode', 'filters'));
});

Route::get('/dashboard-detail/export/excel', function (Request $request) {
    if (!Session::get('login') || Session::get('role') !== 'user') {
        return redirect('/login');
    }

    $incubatorCode = Session::get('incubator_code');
    $query = SensorData::where('incubator_code', $incubatorCode);
    $query = applySensorFilters($query, $request);

    $sensorHistory = $query->latest()->limit(5000)->get();

    $headers = [
        'Content-Type' => 'text/csv',
        'Content-Disposition' => 'attachment; filename="riwayat_sensor_' . $incubatorCode . '_' . now()->setTimezone('Asia/Jakarta')->format('Ymd_His') . '.csv"',
        'Pragma' => 'no-cache',
        'Cache-Control' => 'must-revalidate, post-check=0, pre-check=0',
        'Expires' => '0'
    ];

    $callback = function() use ($sensorHistory) {
        $file = fopen('php://output', 'w');
        // UTF-8 BOM for Excel
        fprintf($file, chr(0xEF).chr(0xBB).chr(0xBF));
        
        fputcsv($file, ['No', 'Tanggal', 'Waktu', 'Suhu (°C)', 'Kelembapan (%)', 'Keterangan']);
        
        foreach ($sensorHistory as $index => $history) {
            $temp = (float)$history->temperature;
            $hum = (float)$history->humidity;
            
            if ($temp > 38.5) {
                $statusText = 'Terlalu Panas';
            } elseif ($temp < 37.0) {
                $statusText = 'Kurang Panas';
            } elseif ($hum > 65.0) {
                $statusText = 'Terlalu Lembap';
            } elseif ($hum < 50.0) {
                $statusText = 'Kurang Lembap';
            } else {
                $statusText = 'Optimal';
            }

            $histTime = $history->created_at->setTimezone('Asia/Jakarta');
            
            fputcsv($file, [
                $index + 1,
                $histTime->format('Y-m-d'),
                $histTime->format('H:i:s'),
                number_format($temp, 2),
                number_format($hum, 1),
                $statusText
            ]);
        }
        fclose($file);
    };

    return response()->stream($callback, 200, $headers);
});

/*
|--------------------------------------------------------------------------
| DASHBOARD ADMIN
|--------------------------------------------------------------------------
*/

Route::get('/admin-dashboard', function () {
    if (!Session::get('login')) {
        return redirect('/admin');
    }

    if (Session::get('role') !== 'admin') {
        return redirect('/');
    }

    $registeredUsers = User::where('role', 'user')
        ->whereNotNull('username')
        ->orderBy('username')
        ->get();

    $incubatorCodes = $registeredUsers
        ->pluck('incubator_code')
        ->filter()
        ->unique()
        ->values();

    $latestSensors = SensorData::whereIn('incubator_code', $incubatorCodes)
        ->latest('id')
        ->get()
        ->unique('incubator_code')
        ->keyBy('incubator_code');

    $loginStats = DB::table('login_users')
        ->select(
            'username',
            DB::raw('COUNT(*) as total_login'),
            DB::raw('MAX(login_at) as last_login')
        )
        ->where('role', 'user')
        ->groupBy('username')
        ->get()
        ->keyBy('username');

    $userSummary = $registeredUsers->map(function (User $user) use ($latestSensors, $loginStats) {
        $sensor = $user->incubator_code ? $latestSensors->get($user->incubator_code) : null;
        $stats = $loginStats->get($user->username);
        $sensorUpdatedAt = $sensor?->created_at;
        $nextTurnAt = $sensor?->next_turn_at;

        return (object) [
            'id' => $user->id,
            'username' => $user->username,
            'email' => $user->email,
            'incubator_code' => $user->incubator_code,
            'total_login' => $stats->total_login ?? 0,
            'last_login' => $stats->last_login ?? null,
            'temperature' => $sensor?->temperature,
            'humidity' => $sensor?->humidity,
            'lamp_status' => $sensor?->lamp_status,
            'turning_status' => $sensor?->turning_status ?? 'belum ada data',
            'turned_at' => $sensor?->turned_at,
            'next_turn_at' => $nextTurnAt,
            'sensor_updated_at' => $sensorUpdatedAt,
            'sensor_is_fresh' => $sensorUpdatedAt ? $sensorUpdatedAt->greaterThanOrEqualTo(now()->subMinutes(3)) : false,
            'turning_is_due' => $nextTurnAt ? $nextTurnAt->isPast() : false,
        ];
    });

    $userLogins = DB::table('login_users')
        ->where('role', 'user')
        ->orderBy('login_at', 'desc')
        ->paginate(10, ['*'], 'user_page')
        ->appends(request()->query());

    $adminActivities = \App\Models\AdminActivity::orderBy('created_at', 'desc')
        ->paginate(10, ['*'], 'admin_page')
        ->appends(request()->query());

    $totalUsers = $registeredUsers->count();

    $todayLogins = DB::table('login_users')
        ->where('role', 'user')
        ->whereDate('login_at', today())
        ->count();

    $totalIncubators = $incubatorCodes->count();

    $monthLogins = DB::table('login_users')
        ->where('role', 'user')
        ->whereMonth('login_at', now()->month)
        ->whereYear('login_at', now()->year)
        ->count();

    return view('pages.admin.dashboard', compact(
        'userLogins',
        'adminActivities',
        'totalUsers',
        'todayLogins',
        'totalIncubators',
        'monthLogins',
        'userSummary'
    ));
});

/*
|--------------------------------------------------------------------------
| LOGOUT
|--------------------------------------------------------------------------
*/

Route::delete('/admin/delete-user/{id}', function (Request $request, $id) {
    if (!Session::get('login') || Session::get('role') !== 'admin') {
        return redirect('/admin');
    }

    $user = User::find($id);
    if (!$user) {
        return back()->with('error', 'User tidak ditemukan.');
    }

    $username = $user->username;
    $incubator = $user->incubator_code;

    // Log aktivitas sebelum dihapus agar data username & incubator masih valid
    if (Schema::hasTable('admin_activities')) {
        \App\Models\AdminActivity::create([
            'username' => Session::get('username'),
            'activity' => 'delete_user',
            'description' => "Menghapus user: {$username} (Inkubator: {$incubator})",
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);
    }

    $user->delete();

    return back()->with('success', "User {$username} berhasil dihapus.");
});

Route::post('/logout', function (Request $request) {
    if (Session::get('role') === 'admin') {
        if (Schema::hasTable('admin_activities')) {
            \App\Models\AdminActivity::create([
                'username' => Session::get('username'),
                'activity' => 'logout',
                'description' => 'Admin logout dari sistem',
                'ip_address' => $request->ip(),
                'user_agent' => $request->userAgent(),
            ]);
        }
    }

    Session::flush();

    return redirect('/');
});

Route::get('/send-alert', function () {
    $email = Session::get('email');

    Mail::raw(
        "Peringatan!\n\nSuhu atau kelembapan inkubator tidak stabil.\nSilakan cek sistem inkubator Anda.",
        function ($message) use ($email) {
            $message->to($email)
                ->subject('Peringatan Inkubator');
        }
    );

    return "Email notifikasi berhasil dikirim!";
});

// Route Pembantu Sementara untuk Menjalankan Migrasi & Seed Database di Server Online
Route::get('/run-migrations-online', function () {
    try {
        \Illuminate\Support\Facades\Artisan::call('migrate:fresh', [
            '--force' => true,
            '--seed' => true
        ]);
        
        return response()->json([
            'status' => 'success',
            'message' => 'Database online berhasil dimigrasi dan diseed (diisi data awal)!',
            'output' => \Illuminate\Support\Facades\Artisan::output()
        ]);
    } catch (\Exception $e) {
        return response()->json([
            'status' => 'error',
            'message' => 'Gagal menjalankan migrasi: ' . $e->getMessage()
        ], 500);
    }
});
