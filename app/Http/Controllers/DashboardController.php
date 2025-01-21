<?php

// namespace App\Http\Controllers;

// use App\Services\DashboardService;
// use Illuminate\Support\Facades\Log;
// use Illuminate\Http\Request;

// class DashboardController extends Controller
// {
//     protected $dashboardService;

//     public function __construct(DashboardService $dashboardService)
//     {
//         $this->dashboardService = $dashboardService;
//         $this->middleware('auth'); // Pastikan middleware auth diterapkan
//     }

//     public function index(Request $request)
//     {
//         // Log data sesi
//         Log::info('Session data in Dashboard:', $request->session()->all());
//         $dashboard = $this->dashboardService->GetLaporanDashboard();
//         return view('dashboard', ['dashboard' => $dashboard]);
//     }

// }


namespace App\Http\Controllers;

use App\Services\DashboardService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DashboardController extends Controller
{
    protected $dashboardService;

    public function __construct(DashboardService $dashboardService)
    {
        $this->dashboardService = $dashboardService;
        $this->middleware('auth'); // Pastikan middleware auth diterapkan
    }

    public function index(Request $request)
    {
        // Log data sesi
        Log::info('Session data in Dashboard:', $request->session()->all());

        $dashboard = $this->dashboardService->GetLaporanDashboard();
        return view('dashboard', ['dashboard' => $dashboard]);
    }
}
