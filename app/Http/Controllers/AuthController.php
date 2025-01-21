<?php
namespace App\Http\Controllers;

use App\Services\AuthService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class AuthController extends Controller
{
    protected $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function login()
    {
        return view('auth.login');
    }

    public function loginAksi(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            Log::error('Validation failed', ['errors' => $validator->errors()]);
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Mendapatkan platform dari header
        $platform = $request->header('X-Platform', 'web'); // Default to 'web' if not provided

        // Proses login melalui AuthService
        $response = $this->authService->login($request->username, $request->password, $platform);

        // Log untuk debug
        Log::info('Login response:', ['response' => $response]);

        // Validasi respons dari AuthService
        if (!$response || !isset($response['kd_pegawai'])) {
            Log::error('Login failed', ['response' => $response]);
           // Extract the specific error message from the API response if available
           $errorMessage = isset($response['error']) ? $response['error'] : trans('auth.failed');
           return redirect()->back()->withErrors(['username' => $errorMessage])->withInput();
        } else {
            $responseData = $response;

            // Temukan pengguna di database berdasarkan kd_pegawai
          
            $request->session()->regenerate();
            $request->session()->put('user', $responseData);
            Log::info('Session data:', $request->session()->all());
            Log::info('Login successful, redirecting to dashboard');

            // Arahkan pengguna ke dashboard setelah login berhasil
            return redirect()->intended('dashboard');
        }
    }
    public function logout(Request $request)
    {
        // Dapatkan informasi pengguna dari sesi
        $user = $request->session()->get('user');

        if ($user) {
            // Proses logout melalui AuthService
            $this->authService->logout($user['kd_pegawai']);
        }

        // Logout pengguna dari sesi Laravel
        Auth::guard('web')->logout();

        // Hapus semua data dari sesi
        $request->session()->flush();

        // Regenerasi token sesi
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
