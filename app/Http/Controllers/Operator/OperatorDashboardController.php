<?php

namespace App\Http\Controllers\Operator;

use App\Http\Controllers\Controller;
use App\Models\Report;
use Carbon\Carbon;

class OperatorDashboardController extends Controller
{
    public function index()
    {
        $counts = [
            'dilaporkan'  => Report::where('status', 'Dilaporkan')->count(),
            'disurvey'    => Report::where('status', 'Disurvey')->count(),
            'tidak_valid' => Report::where('status', 'Tidak Valid')->count(),
            'diproses'    => Report::where('status', 'Diproses')->count(),
            'selesai'     => Report::where('status', 'Selesai')->count(),
        ];

        // Data tren laporan mingguan (7 hari terakhir per hari)
        $weeklyTrend = [];
        $days = ['SEN', 'SEL', 'RAB', 'KAM', 'JUM', 'SAB', 'MIN'];
        $startOfWeek = Carbon::now()->startOfWeek(Carbon::MONDAY);

        for ($i = 0; $i < 7; $i++) {
            $date = $startOfWeek->copy()->addDays($i);
            $weeklyTrend[] = Report::whereDate('created_at', $date)->count();
        }

        // 3 laporan terbaru
        $latestReports = Report::with('user')
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get();

        // Semua laporan untuk mini-map (hanya koordinat + status)
        $mapReports = Report::select('id', 'latitude', 'longitude', 'status', 'description')
            ->whereIn('status', ['Dilaporkan', 'Disurvey', 'Diproses'])
            ->get();

        return view('operator.dashboard', compact(
            'counts', 'weeklyTrend', 'days', 'latestReports', 'mapReports'
        ));
    }
}
