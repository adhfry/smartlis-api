<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class AuthController extends Controller
{
    /**
     * Summary of login with cookie
     * @param \Illuminate\Http\Request $request
     */
    public function store(LoginRequest $request)
    {
        $credentials = $request->only('username', 'password');

        // Coba login
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            // Buat token API
            $token = $user->createToken('authToken')->plainTextToken;

            // Buat HTTP-only cookie, masa hidup 1 hari (1440 menit)
            $cookie = cookie(
                'smartlis_token',
                $token,
                1440,
                '/',
                null,
                false,      // secure false agar jalan di HTTP
                true,       // httpOnly tetap true
                false,
                'Lax'       // Lax akan kirim cookie untuk navigasi standar dan XHR
            );

            return response()->json([
                'data' => [
                    'user' => $user,
                    'r' => $user->getHighestRole(),
                ],
                'message' => 'Login berhasil',
            ], 200)
                ->withCookie($cookie);
        }

        return response()->json([
            'message' => 'Login gagal, username atau password salah'
        ], 401);
    }

    /**
     * Summary of regiter with cookie
     * @param \Illuminate\Http\Request $request
     */
    public function regiter(Request $request)
    {

    }

    /**
     * Summary of logout with cookie
     * @param \Illuminate\Http\Request $request
     */
    public function logout(Request $request)
    {
        // Hapus semua token milik user sekarang (atau bisa spesifik currentAccessToken)
        $request->user()->tokens()->delete();

        // Logout guard web (jika pakai session)
        Auth::guard('web')->logout();

        // Buat “forget cookie”
        $forget = Cookie::forget('smartlis_token');

        return response()->json([
            'message' => 'Logout berhasil'
        ], 200)
            ->withCookie($forget);
    }
}