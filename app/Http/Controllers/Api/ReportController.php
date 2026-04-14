<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

use App\Http\Resources\ReportResource;

class ReportController extends Controller
{
    /**
     * Get user's reports history
     */
    public function index()
    {
        $reports = Report::where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->get();

        return response()->json([
            'success' => true,
            'data' => ReportResource::collection($reports)
        ]);
    }

    /**
     * Store new report from mobile
     */
    public function store(Request $request)
    {
        $request->validate([
            'description' => 'nullable|string',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'photo' => 'required|image|mimes:jpeg,png,jpg|max:5120', // Max 5MB
        ]);

        $photoPath = $request->file('photo')->store('reports', 'public');

        $report = Report::create([
            'user_id' => Auth::id(),
            'description' => $request->description,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'photo_path' => $photoPath,
            'status' => 'Dilaporkan',
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Laporan berhasil terkirim',
            'data' => new ReportResource($report)
        ], 201);
    }
}
