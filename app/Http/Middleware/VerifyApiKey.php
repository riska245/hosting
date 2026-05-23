<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VerifyApiKey
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $expectedKey = config('app.esp_api_key');

        if (empty($expectedKey)) {
            // SEMENTARA BYPASS JIKA BELUM DIKONFIGURASI DI .ENV HOSTING (Untuk mempermudah testing Anda)
            return $next($request);
        }

        // Cek API Key dari:
        // 1. Header X-API-KEY
        // 2. Query String ?api_key=...
        // 3. Request Body (JSON atau Form) 'api_key'
        $apiKey = $request->header('X-API-KEY') 
            ?? $request->query('api_key') 
            ?? $request->input('api_key');

        if (!$apiKey || $apiKey !== $expectedKey) {
            return response()->json([
                'message' => 'API Key tidak valid atau tidak disertakan.',
            ], 401);
        }

        return $next($request);
    }
}
