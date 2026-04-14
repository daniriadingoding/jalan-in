<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class AdminDashboardController extends Controller
{
    /**
     * Display the admin dashboard.
     */
    public function index()
    {
        $totalUsers = User::count();
        $totalOperators = User::where('role', 'operator')->count();
        $operators = User::where('role', 'operator')->latest()->take(5)->get();

        return view('admin.dashboard', compact('totalUsers', 'totalOperators', 'operators'));
    }
}
