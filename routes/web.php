<?php

use App\Models\SensorData;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

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
        'incubator_code' => 'required|string|max:255|unique:users,incubator_code',
        'password' => 'required|string|min:6',
    ], [
        'username.required' => 'Nama / Username wajib diisi.',
        'username.unique' => 'Nama / Username sudah terdaftar.',
        'email.required' => 'Email wajib diisi.',
        'email.email' => 'Format email tidak valid.',
        'email.unique' => 'Email sudah terdaftar.',
        'incubator_code.required' => 'Nomor Inkubator wajib diisi.',
        'incubator_code.unique' => 'Nomor Inkubator sudah terdaftar.',
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

    return redirect('/admin-dashboard');
});

/*
|--------------------------------------------------------------------------
| DASHBOARD USER
|--------------------------------------------------------------------------
*/

Route::get('/dashboard-detail', function () {
    if (!Session::get('login')) {
        return redirect('/login');
    }

    if (Session::get('role') !== 'user') {
        return redirect('/');
    }

    $incubatorCode = Session::get('incubator_code');
    $latestSensor = SensorData::where('incubator_code', $incubatorCode)->latest()->first();
    $sensorHistory = SensorData::where('incubator_code', $incubatorCode)->latest()->limit(10)->get();
    $sensorCount = SensorData::where('incubator_code', $incubatorCode)->count();

    return view('pages.user.dashboard', compact('latestSensor', 'sensorHistory', 'sensorCount'));
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
        ->latest()
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
        ->paginate(10);

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

Route::post('/logout', function () {
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
