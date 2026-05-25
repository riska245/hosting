<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SensorData;
use App\Models\User;
use Carbon\Carbon;

class SensorController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'incubator_code' => 'required|string|max:50',
            'temperature' => 'required|numeric',
            'humidity' => 'required|numeric',
            'lamp_status' => 'required|string|max:50',
            'turning_status' => 'nullable|string|max:50',
            'turned_at' => 'nullable|date',
        ]);

        $normalizedIncubatorCode = strtoupper(trim($validated['incubator_code']));

        $incubatorExists = User::where('role', 'user')
            ->whereRaw('UPPER(TRIM(incubator_code)) = ?', [$normalizedIncubatorCode])
            ->exists();

        if (!$incubatorExists) {
            return response()->json([
                'message' => 'Kode inkubator tidak terdaftar',
            ], 422);
        }

        $now = now();
        $turningStatus = strtolower($validated['turning_status'] ?? 'menunggu');
        $turningEventStatuses = ['berputar', 'selesai', 'rotating', 'completed', 'done', 'turned'];
        $previousTurn = SensorData::where('incubator_code', $normalizedIncubatorCode)
            ->whereNotNull('turned_at')
            ->latest('turned_at')
            ->first();

        if (!empty($validated['turned_at'])) {
            $turnedAt = Carbon::parse($validated['turned_at']);
        } elseif (
            in_array($turningStatus, $turningEventStatuses, true)
            && (!$previousTurn || $previousTurn->turned_at->lessThanOrEqualTo($now->copy()->subHours(4)))
        ) {
            $turnedAt = $now;
        } else {
            $turnedAt = $previousTurn?->turned_at;
        }

        $data = SensorData::create([
            'incubator_code' => $normalizedIncubatorCode,
            'temperature' => $validated['temperature'],
            'humidity' => $validated['humidity'],
            'lamp_status' => $validated['lamp_status'],
            'turning_status' => $turningStatus,
            'turned_at' => $turnedAt,
            'next_turn_at' => $turnedAt ? Carbon::parse($turnedAt)->addHours(4) : null,
        ]);

        return response()->json([
            'message' => 'Data berhasil disimpan',
            'update_interval' => [
                'temperature_humidity' => '3 menit',
                'turning' => '4 jam',
            ],
            'data' => $data
        ], 200);
    }

    public function latest(Request $request)
    {
        $query = SensorData::query();

        if ($request->filled('incubator_code')) {
            $query->where('incubator_code', strtoupper(trim((string) $request->incubator_code)));
        }

        return response()->json($query->latest()->first());
    }
}
