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
| PILIH LOGIN
|--------------------------------------------------------------------------
*/

Route::get('/login', function () {
    return view('pages.choose-login');
});

/*
|--------------------------------------------------------------------------
| LOGIN USER
|--------------------------------------------------------------------------
*/

Route::get('/login-user', function () {
    return view('pages.login-user');
});

/*
|--------------------------------------------------------------------------
| LOGIN ADMIN
|--------------------------------------------------------------------------
*/

Route::get('/login-admin', function () {
    return view('pages.login-admin');
});

/*
|--------------------------------------------------------------------------
| PROSES LOGIN USER
|--------------------------------------------------------------------------
*/

Route::post('/login-user-process', function (Request $request) {
    $credentials = $request->validate([
        'username' => 'required|string',
        'email' => 'required|email',
        'password' => 'required|string',
    ]);

    $user = User::where('role', 'user')
        ->where('username', $credentials['username'])
        ->where('email', $credentials['email'])
        ->first();

    if (!$user || !Hash::check($credentials['password'], $user->password)) {
        return back()->with('error', 'Username, email, atau password user salah!');
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

/*
|--------------------------------------------------------------------------
| PROSES LOGIN ADMIN
|--------------------------------------------------------------------------
*/

Route::post('/login-admin-process', function (Request $request) {
    $credentials = $request->validate([
        'username' => 'required|string',
        'email' => 'required|email',
        'password' => 'required|string',
    ]);

    $admin = User::where('role', 'admin')
        ->where('username', $credentials['username'])
        ->where('email', $credentials['email'])
        ->first();

    if (!$admin || !Hash::check($credentials['password'], $admin->password)) {
        return back()->with('error', 'Username, email, atau password admin salah!');
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

    return view('pages.dashboard-detail', compact('latestSensor', 'sensorHistory'));
});

/*
|--------------------------------------------------------------------------
| DASHBOARD ADMIN
|--------------------------------------------------------------------------
*/

Route::get('/admin-dashboard', function () {
    if (!Session::get('login')) {
        return redirect('/login-admin');
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
        ->get();

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

    return view('pages.dashboard-admin', compact(
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
